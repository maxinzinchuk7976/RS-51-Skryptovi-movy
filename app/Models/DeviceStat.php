<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceStat extends Model
{
    protected $table = 'device';
    public $timestamps = false;
    protected $fillable = ['ip', 'agent', 'visited_at'];
    protected function casts(): array
    {
        return ['visited_at' => 'datetime'];
    }
}
