<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Stock extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $table = "stocks";
    protected $fillable = [
        'product_id',
        'item_id',
        'model_type',
        'model_id',
        'item_type',
        'variation_names',
        'price',
        'quantity',
        'discount',
        'tax',
        'sku',
        'status',
        'subtotal',
        'total',
    ];

    protected $casts = [
        'product_id'    => 'integer',
        'item_id'       => 'integer',
        'model_type'    => 'string',
        'model_id'      => 'integer',
        'item_type'     => 'string',
        'variation_names'=> 'string',
        'price'         => 'decimal:6',
        'quantity'      => 'integer',
        'discount'      => 'decimal:6',
        'tax'           => 'decimal:6',
        'sku'           => 'string',
        'status'        => 'integer',
        'subtotal'      => 'decimal:6',
        'total'         => 'decimal:6',
    ];

    public function item(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function productTax(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }

    public function stockTaxes(): HasMany
    {
        return $this->hasMany(StockTax::class);
    }

}
