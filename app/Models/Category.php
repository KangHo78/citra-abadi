<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function subcategory_1_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_1');
    }
    public function subcategory_2_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_2');
    }
    public function subcategory_3_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_3');
    }
    public function subcategory_4_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_4');
    }
    public function subcategory_5_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_5');
    }
    public function subcategory_6_item()
    {
        return $this->belongsTo(Item::class, 'subcategory_id_6');
    }
    public function parent_category()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
    public function child_category()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
