<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $connection = 'sales2';

    protected $fillable = [
        'name',
        'model',
        'catagory_id',
        'vendor_id',
        'price',
        'briefs',
        'specifications',
        'descriptions',
        'accessories',
        'is_accessories',
        'extra',
        'status',
        'created_by',
    ];

    function creator() {
        return $this->belongsTo(RUser::class, 'created_by');
    }

    function catagory() {
        return $this->belongsTo(Catagory::class, 'catagory_id');
    }

    function vendor() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    function supplier() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    function materials() {
        return $this->hasMany(Material::class, 'model_id');
    }

    function inventory() {
        return null;
    }
}
