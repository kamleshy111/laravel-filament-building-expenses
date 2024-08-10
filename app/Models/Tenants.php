<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'first_name', 'last_name', 'email', 'phone', 'birthdate', 'type'];


    public function contract()
    {
        return $this->hasMany(Contract::class);
    }

    protected static function booted()
    {
        static::saving(function ($tenant) {
            if ($tenant->type === 'Private') {
                $tenant->name = $tenant->first_name . ' ' . $tenant->last_name;
            }
        });
    }

}
