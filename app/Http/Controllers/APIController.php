<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    // Load API for the first time
    public function load() {
        $url = 'https://v6.exchangerate-api.com/v6/ac412f0cf047e66083e55b82/latest/USD';
        $response = file_get_contents($url);
        $newData = json_decode($response);

        foreach ($newData->conversion_rates as $key => $value) {
            $newRate = new Rates();
            $newRate->name = $key;
            $newRate->value = $value;
            $newRate->save();
        }

        return back();
    }

    // Refresh API
    public function refresh() {
        $url = 'https://v6.exchangerate-api.com/v6/ac412f0cf047e66083e55b82/latest/USD';
        $response = file_get_contents($url);
        $newData = json_decode($response);
        $id = 1;

        DB::delete('delete from rates');
        foreach ($newData->conversion_rates as $key => $value) {
            $newRate = new Rates();
            $newRate->id = $id;
            $newRate->name = $key;
            $newRate->value = $value;
            $newRate->save();
            $id++;
        }

        return back();
    }
}
