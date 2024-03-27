<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function item_detail()
    {
        return $this->belongsTo(ItemDetail::class);
    }
    public function brand()
    {
        return $this->hasOne(Brand::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function subcategory_1()
    {
        return $this->hasOne(Category::class, 'subcategory_id_1');
    }
    public function subcategory_2()
    {
        return $this->hasOne(Category::class, 'subcategory_id_2');
    }
    public function subcategory_3()
    {
        return $this->hasOne(Category::class, 'subcategory_id_3');
    }
    public function subcategory_4()
    {
        return $this->hasOne(Category::class, 'subcategory_id_4');
    }
    public function subcategory_5()
    {
        return $this->hasOne(Category::class, 'subcategory_id_5');
    }
    public function subcategory_6()
    {
        return $this->hasOne(Category::class, 'subcategory_id_6');
    }
    
}
