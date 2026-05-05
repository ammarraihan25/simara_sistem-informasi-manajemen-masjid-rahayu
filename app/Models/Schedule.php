<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date', 'subuh', 'dzuhur', 'ashar', 'maghrib', 'isya', 
        'petugas_imam', 'petugas_muadzin', 'petugas_khotib'
    ];

    /**
     * Mutators to ensure colon notation
     */
    public function setSubuhAttribute($value) { $this->attributes['subuh'] = str_replace('.', ':', $value); }
    public function setDzuhurAttribute($value) { $this->attributes['dzuhur'] = str_replace('.', ':', $value); }
    public function setAsharAttribute($value) { $this->attributes['ashar'] = str_replace('.', ':', $value); }
    public function setMaghribAttribute($value) { $this->attributes['maghrib'] = str_replace('.', ':', $value); }
    public function setIsyaAttribute($value) { $this->attributes['isya'] = str_replace('.', ':', $value); }

    /**
     * Accessors to ensure colon notation for display
     */
    public function getSubuhAttribute($value) { return str_replace('.', ':', $value); }
    public function getDzuhurAttribute($value) { return str_replace('.', ':', $value); }
    public function getAsharAttribute($value) { return str_replace('.', ':', $value); }
    public function getMaghribAttribute($value) { return str_replace('.', ':', $value); }
    public function getIsyaAttribute($value) { return str_replace('.', ':', $value); }
}
