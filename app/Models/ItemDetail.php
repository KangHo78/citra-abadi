<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->hasOne(Item::class);
    }
    public function spec()
    {
        return $this->hasOne(Spec::class);
    }
    public function material()
    {
        return $this->hasOne(Material::class);
    }
    public function class()
    {
        return $this->hasOne(Classes::class, 'class_id');
    }
    public function conn()
    {
        return $this->hasOne(Conn::class);
    }
    public function size()
    {
        return $this->hasOne(Size::class);
    }
}
