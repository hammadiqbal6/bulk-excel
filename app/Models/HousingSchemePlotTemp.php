<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingSchemePlotTemp extends Model
{
    use HasFactory;
    protected $connection = "sqlite";
    protected $table = "housing_scheme_plots";
    protected $fillable = [
        'city',
        'society',
        'block',
        'marla',
        'plot_size',
        'price',
        'status',
    ];
}
