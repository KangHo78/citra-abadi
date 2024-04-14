<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ItemDetail extends Model
{
    protected $fillable = [
        'spec_id',
        'item_id',
        'material_id',
        'class_id',
        'conn_id',
        'size_id',
    ];

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
    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id','id');
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
