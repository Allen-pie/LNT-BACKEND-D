<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

// inheritence => class turunan mewariskan properties & methods dari induknya (extends)
class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'category_id',
        'img_path'
    ];

    // liat dari nama methodnya (category())
    public function category(): BelongsTo
    {
        return $this->belongsTo(ItemCategories::class);
    }
    // defaultnya items_id (liat dari nama class Items) karena itu define manual (item_id)
    public function detail(): HasOne
    {
        return $this->hasOne(ItemDetails::class, 'item_id');
    }

    public function warehouses() : BelongsToMany {
        // Items, Warehouses
        // items_warehouses
        // defaultny ambil yang secara alphabetical duluan terus dilowercase + _ + nama tabel lainnya

        // foreignPivotKey => defaultny ambil dari nama model current terus dilowercase + _id
        // relatedPivotKey => defaultny ambil dari nama model lain terus dilowercase + _id
        return $this->belongsToMany(Warehouses::class, 'warehouse_item', 'item_id', 'warehouse_id')->withPivot(['quantity'])->withTimestamps();
    }

}
