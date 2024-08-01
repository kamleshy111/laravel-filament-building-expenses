<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'generation_date', 'building_id', 'total_expenses'];


    public function building()
    {
        return $this->belongsTo(Buildings::class);
    }
}
