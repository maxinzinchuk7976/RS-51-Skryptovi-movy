<?php
namespace App\Models;
use App\Models\Translation;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'cost',
        'brand',
        'material',
        'photo_path'
    ];

    public function translation(string $language)
    {
        $result = $this->hasMany(Translation::class, 'product_id', 'id')
            ->where('language',$language)
            ->first(['name','material']) ?? new Translation();;
        $result->name       = $result->name     ?? $this->name;
        $result->material   = $result->material ?? $this->material;
        return $result;
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(
        Order::class,
        'product_order',
        'product_id',
        'order_id'
        );
    }
}
