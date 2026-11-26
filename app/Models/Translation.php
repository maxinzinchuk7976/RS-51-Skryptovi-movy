<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translations';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'language',
        'name',
        'material',
        'product_id',
    ];
}
