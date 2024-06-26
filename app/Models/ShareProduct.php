<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareProduct extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'item_id', 
        'customer_id', 
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function customer()
    {
        return $this->hasOne(User::class);
    }
    
}
