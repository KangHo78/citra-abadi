<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    public function conn()
    {
        return $this->belongsTo(Conn::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
