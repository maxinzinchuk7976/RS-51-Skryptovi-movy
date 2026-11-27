<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectionStat extends Model
{
    protected $table = 'redirection';
    public $timestamps = false;
    protected $fillable = ['page', 'ip', 'token', 'visited_at'];
    protected function casts(): array
    {
        return ['visited_at' => 'datetime'];
    }
}
