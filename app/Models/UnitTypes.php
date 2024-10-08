<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitTypes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function units()
    {
        return $this->hasMany(Units::class);
    }
}
