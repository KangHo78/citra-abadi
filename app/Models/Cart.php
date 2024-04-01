<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 
        'item_detail_id', 
        'qty', 
        'user_id', 
        // Add user_id here
        // other fillable attributes...
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function item_detail()
    {
        return $this->belongsTo(ItemDetail::class);
    }
}
