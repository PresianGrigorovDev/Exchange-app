<?php

namespace App\Http\Controllers;

use App\Models\User;
use Nette\Utils\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        return view('user.user_acc', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->name) {
            $user->name = $request->name;
            $user->save();
        }
            

        if ($request->email)
            $user->email = $request->email;

        if ($request->password && $request->password_repeat)
            if ($request->password == $request->password_reapeat)
                $user->password = Hash::make($request->password);

        if ($request->avatar) {
            $name = $request->avatar->getClientOriginalName();
            $newPicName = time().'-'.$user->name.'-'.$name;
            $request->avatar->move('storage/avatars/', $newPicName);
            $user->avatar = $newPicName;
            $user->save();
        }

        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::delete('DELETE FROM users where id = ?', [$id]);

        return back();
    }
}
