<?php

namespace App\Http\Controllers;

use App\Models\HousingSchemePlot;
use App\Models\HousingSchemePlotTemp;
use App\Services\ImportClass\HousingSchemeImporter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HousingSchemePlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HousingSchemePlotTemp::all()->toArray();

        return compact("data");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        // Process the Excel file
        // Excel::import(, $file);
        $housingData = Excel::toArray(new HousingSchemeImporter, $file);
        $data = [];
        if (!empty($housingData)) {
            $data = reset($housingData); // to get the data from the array first reset is to get the data array
            foreach ($data as $index => $row) {
                if ($index === 0) { //to skip the first headers row
                    continue;
                }
                HousingSchemePlotTemp::create([
                    'city' => $row[0],
                    'society' => $row[1],
                    'block' => $row[2],
                    'marla' => $row[3],
                    'plot_size' => $row[4],
                    'price' => $row[5],
                    'status' => $row[6],
                ]);
            }
        }
        return compact('data');
    }
}
