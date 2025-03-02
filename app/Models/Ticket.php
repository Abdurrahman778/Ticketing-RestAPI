<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    use HasUuids;

    protected $table = 'tickets';
    protected $fillable = ['user_id', 'route_id', 'price', 'status'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function route()
    {
        return $this->belongsTo(Routes::class, 'route_id');
    }
}
