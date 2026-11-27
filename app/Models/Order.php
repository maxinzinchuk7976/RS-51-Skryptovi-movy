<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
        Product::class,
        'product_order',
        'order_id',
        'product_id'
        );
    }
}
