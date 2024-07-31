<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseTypes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendors::class);
    }
}
