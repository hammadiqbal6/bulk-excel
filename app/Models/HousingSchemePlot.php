<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingSchemePlot extends Model
{
    use HasFactory;

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
