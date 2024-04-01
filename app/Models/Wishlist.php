<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 
        'customer_id',
    ];


    public function item_detail()
    {
        return $this->hasMany(ItemDetail::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    
}
