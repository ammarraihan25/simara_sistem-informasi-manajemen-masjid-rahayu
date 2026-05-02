<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date', 'subuh', 'dzuhur', 'ashar', 'maghrib', 'isya', 
        'petugas_imam', 'petugas_muadzin', 'petugas_khotib'
    ];
}
