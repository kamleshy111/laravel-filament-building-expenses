<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'unit_id', 'start_date', 'end_date', 'monthly_rent', 'security_deposit', 'status'];


    public function unit()
    {
        return $this->belongsTo(Units::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenants::class);
    }
}
