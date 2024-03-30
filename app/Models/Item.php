<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function enquiry_detail()
    {
        return $this->belongsTo(EnquiryDetail::class);
    }
    public function item_detail()
    {
        return $this->hasMany(ItemDetail::class);
    }
    public function share_product()
    {
        return $this->belongsTo(ShareProduct::class);
    }
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory_1()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_1');
    }
    public function subcategory_2()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_2');
    }
    public function subcategory_3()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_3');
    }
    public function subcategory_4()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_4');
    }
    public function subcategory_5()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_5');
    }
    public function subcategory_6()
    {
        return $this->belongsTo(Category::class, 'subcategory_id_6');
    }
}
