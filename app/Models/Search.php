<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search';
    public $timestamps = false;
    protected $fillable = ['name', 'brand', 'material', 'mincost', 'maxcost', 'visited_at'];
    protected function casts(): array
    {
        return ['visited_at' => 'datetime'];
    }
}
