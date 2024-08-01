<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = ['building_id','unit_id', 'expense_type_id', 'vendor_id', 'date', 'amount', 'description'];

    public function unit()
    {
        return $this->belongsTo(Units::class);
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpenseTypes::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendors::class);
    }

    public function building()
    {
        return $this->belongsTo(Buildings::class);
    }

}
