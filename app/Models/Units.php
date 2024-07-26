<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = ['building_id', 'unit_type_id', 'name', 'description', 'area'];

    /**
     * Get the building that owns the units.
     */
    public function building()
    {
        return $this->belongsTo(Buildings::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitTypes::class);
    }

    public function reports()
    {
        return $this->hasMany(Reports::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'unit_id');
    }
}
