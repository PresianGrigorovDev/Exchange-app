<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rates;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Kyslik\ColumnSortable\Exceptions\ColumnSortableException;

class AdminController extends Controller
{

    // Admin Index
    public function index() {
        $user = User::find(auth()->user()->id);
        $rates = Rates::latest();
        if ($user->is_admin != 1) return view('user.page', compact('user'));
        return view('admin.admin_panel', compact('user', 'rates'));
    }

    // Show all rates
    public function view_rates() {
        $user = User::find(auth()->user()->id);
        $rates = Rates::first()->sortable()->filter()->paginate(20);
        return view('admin.admin_rates', compact('rates', 'user'));
    }

    // Show all users
    public function view_users() {
        $user = User::find(auth()->user()->id);
        $users = User::first()->paginate(10);
        return view('admin.admin_users', compact('user', 'users'));
    }

}
