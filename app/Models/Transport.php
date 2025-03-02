<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transport extends Model
{
    public $incrementing = false; // Non-incremental primary key
    protected $keyType = 'string';
    protected $table = 'transports';
    protected $fillable = ['id', 'name', 'type', 'capacity'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid(); // Otomatis generate UUID saat insert
        });
    }
}
