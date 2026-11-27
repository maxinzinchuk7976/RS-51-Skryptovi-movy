<?php
namespace App\Queries;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
class ProductQuery
{
    private const SORTABLE = [
        'name' => 'product.name',
        'material' => 'product.material',
        'brand' => 'product.brand',
        'cost' => 'product.cost',
        'orders'   => 'orders_count'
    ];
    public function apply(array $input): Builder
    {
        $query = Product::query() ->with(['orders'])->select('product.*');
        $query->when( $input['name'] ?? null,
            fn (Builder $q, $value) =>
                $q->where(
                'product.name',
                'like',
                "%{$value}%"
                )
            );
        $query->when( $input['material'] ?? null,
            fn (Builder $q, $value) =>
                $q->where(
                'product.material',
                'like',
                "%{$value}%"
            )
        );
        $query->when( $input['brand'] ?? null,
            fn (Builder $q, $value) =>
                $q->where(
                'product.brand',
                'like',
                "%{$value}%"
            )
        );

        $query->when($input['mincost'] ?? null,
            fn (Builder $q, $value) =>
                $q->where(
                'product.cost',
                '>=',
                $value
            )
        );

        $query->when( $input['maxcost'] ?? null,
            fn (Builder $q, $value) =>
                $q->where(
                'product.cost',
                '<=',
                $value
            )
        );

        $query->when( $input['client_name'] ?? null,
            fn (Builder $q, $value) =>
                $q->whereHas(
                'orders',
                fn (Builder $orderQuery) => $orderQuery->where('name', 'like', "%{$value}%")
            )
        );

        $query->when(  $input['order_id'] ?? null,
            fn (Builder $q, $value) =>
                $q->whereHas(
                'orders',
                fn (Builder $related) =>
                    $related->whereKey($value)
                )
        );

        return $this->sort($query, $input['sort'] ?? null);
    }
    private function sort(
        Builder $query,
        ?string $sort
        ): Builder {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;
        if (!isset(self::SORTABLE[$field])) {
            return $query->orderByDesc('product.id');
        }

        if ($field === 'orders') {
            $query->withCount('orders');
        }

        return $query
            ->orderBy(
            self::SORTABLE[$field],
            $desc ? 'desc' : 'asc'
            )
            ->orderByDesc('product.id');
    }
}
