<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'name',
        'type',
        'contactor',
        'phone',
        'address',
        'memo',
        'status',
        'created_by',
    ];

    function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    function journals() {
        return $this->hasMany(Journal::class, 'storage_id');
    }
}
