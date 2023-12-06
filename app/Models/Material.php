<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $connection='inventory';

    protected $fillable = [
        'material',
        'model_id',
        'supplier_id',
        'memo',
        'status',
        'created_by',
    ];

    function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    function model() {
        return $this->belongsTo(ProductModel::class, 'model_id');
    }

    function supplier() {
        return $this->belongsTo(Vendor::class, 'supplier_id');
    }
}
