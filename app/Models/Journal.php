<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $connection='inventory';

    protected $fillable = [
        'storage_id',
        'record_date',
        'model_id',
        'type',
        'amount',
        'status',
        'created_by',
    ];

    function creator() {
        return $this->belongsTo(RUser::class, 'created_by');
    }

    function products() {
        return $this->hasMany(ProductModel::class, 'catagory_id');
    }
}
