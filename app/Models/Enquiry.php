<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    public function enquiry_detail()
    {
        return $this->hasMany(EnquiryDetail::class);
    }
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
