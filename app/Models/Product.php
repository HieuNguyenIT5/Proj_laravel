<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProduct;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'product_code', 'description', 'price', 'new_price', 'quantity', 'image', 'product_detail', 'cat_id', 'brand_id'];
    public function getPrice()
    {
        if ($this->new_price > 0) {
            return number_format($this->new_price, 0, '.', ',').' VND';
        } else {
            return number_format($this->price, 0, '.', ',').' VND';
        }
    }
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'cat_id');
    }
}
