<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    // use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'stock_quantity',
        'category_id',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // 與分類的關聯
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 與訂單項目的關聯
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 與圖片的關聯
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // 範圍查詢：活躍產品
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // 範圍查詢：庫存不足的產品
    public function scopeLowStock($query, $threshold = 10)
    {
        return $query->where('stock_quantity', '<', $threshold);
    }

    // 自定義方法：檢查庫存
    public function inStock()
    {
        return $this->stock_quantity > 0;
    }

    // 自定義方法：減少庫存
    public function decreaseStock($amount)
    {
        if ($this->stock_quantity >= $amount) {
            $this->decrement('stock_quantity', $amount);
            return true;
        }
        return false;
    }
}
