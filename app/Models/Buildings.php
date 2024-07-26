<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'city', 'zip_code', 'state', 'country'];

    public function units()
    {
        return $this->hasMany(Units::class, 'building_id');
    }
}
