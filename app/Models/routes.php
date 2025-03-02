<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Routes extends Model
{
    public $incrementing = false; // UUID
    protected $keyType = 'string';
    protected $fillable = ['id', 'transport_id', 'origin', 'destination', 'departure_time', 'arrival_time', 'price'];

    protected $table = 'routes';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
