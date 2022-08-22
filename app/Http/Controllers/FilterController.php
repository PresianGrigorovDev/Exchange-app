<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FilterController extends Controller
{
    public function filter(Request $request) {
        $filter = '';

        if ($request->name) {
            $filter = $filter.'?like=name,'.$request->name;
        }

        if ($request->value) {
            $filter = $filter.'?like=value,'.$request->value;
        }

        return redirect("/admin/rates".$filter);
    }  

    public function filter_home(Request $request) {
        $filter = '';

        if ($request->name) {
            $filter = $filter.'?like=name,'.$request->name;
        }

        if ($request->value) {
            $filter = $filter.'?like=value,'.$request->value;
        }

        return redirect("/".$filter);
    }
}
