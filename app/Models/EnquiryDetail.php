<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryDetail extends Model
{
    use HasFactory;
   

    
    protected $fillable = [
        'enquiry_id', 
        'item_id', 
        'item_detail_id', 
        'item_price', 
        'item_quantity',
        'description',
    ];
    
    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function item_detail()
    {
        return $this->belongsTo(ItemDetail::class);
    }
   
    
}
