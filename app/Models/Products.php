<?php

namespace App\Models;

use App\Helpers\Convert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $appends = [
        'quantity','subQuantity'
    ];

    public function getQuantityAttribute()
    {
        $allQuantities = $this->quantities;
        return Convert::calc_product_quantity($allQuantities);
    }

    public function getSubQuantityAttribute()
    {
        $allQuantities = $this->quantities;
        return Convert::calc_product_sub_quantity($allQuantities);
    }


    public function quantities()
    {
        return $this->belongsToMany(Units::class, 'products_units')
            ->withPivot(['quantity']);

    }
}
