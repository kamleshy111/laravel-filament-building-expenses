<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact', 'phone', 'email', 'expenses_type'];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpenseTypes::class, 'expenses_type', 'id');
    }

}
