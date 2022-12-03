<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'value', 'parent_id',
    ];

    public function scopeUnits()
    {
        return $this->whereNull('parent_id');
    }

    public function subUnits()
    {
        return  $this->hasMany(Units::class, 'parent_id', 'id');
    }


    public function parent()
    {
        return $this->belongsTo(Units::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_units')
            ->withPivot(['quantity']);
    }

}
