<?php

namespace App\Services\ImportClass;

use App\Models\HousingSchemePlot;
use Maatwebsite\Excel\Concerns\ToModel;

class HousingSchemeImporter implements ToModel
{
    public function model(array $row)
    {
        //Define how to create a model from the Excel row data
        return new HousingSchemePlot([
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
