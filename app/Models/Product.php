<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
      'name',
      'description',
      'price',
      'stock',
      'image',
      'category_id',
      'manufacturer',
    ];

    public function order(){
      return $this->belongsTo(Order::class);
    }


    public function category()
    {
      return $this->belongsTo(Category::class, 'category_id');
    }

    public function cartItems()
    {
      return $this->hasMany(CartItem::class);
    }
}
