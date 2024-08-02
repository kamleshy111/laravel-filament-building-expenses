<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseTypes extends Model
{
    use HasFactory;

    protected $table = 'expense_types';

    protected $fillable = ['name'];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendors::class, 'expense_types_vendors', 'expense_type_id', 'vendor_id');


    }
}
