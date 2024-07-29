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

    public function expenses()
    {
        return $this->hasManyThrough(
            Expenses::class, // The model we want to access (Expense)
            Units::class,    // The intermediate model (Unit)
            'building_id',  // Foreign key on the Unit model
            'unit_id',      // Foreign key on the Expense model
            'id',           // Local key on the Building model
            'id'            // Local key on the Unit model
        );
    }
}
