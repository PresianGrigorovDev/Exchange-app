<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportController extends Controller
{
    public function export (Request $request) {
        
        $rates = Rates::all()->filter();
        $file_name = 'rates.csv';
        $headers = array (
            'Content-Type' => 'text/csv'
        );

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path()."/files");
        }

        $handle = fopen($file_name, 'w');

        fputcsv($handle, [
            "id",
            "name",
            "value",
        ]);

        foreach($rates as $rate) {
            fputcsv($handle, [
                $rate->id,
                $rate->name,
                $rate->value,
            ]);
        }

        fclose($handle);

        return response()->download($file_name, "rates.csv", $headers);
    }
}
