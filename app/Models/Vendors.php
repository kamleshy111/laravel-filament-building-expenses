<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = ['name', 'contact', 'phone', 'email', 'expenses_type'];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function expenseTypes()
    {

        return $this->belongsToMany(
            ExpenseTypes::class,
            'expense_types_vendors',
            'vendor_id',
            'expense_type_id'
        );

    }

}
