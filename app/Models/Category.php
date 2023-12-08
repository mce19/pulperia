<?php

namespace App\Models;

use App\Models\Family;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family_id',
    ];

    // protected $fillable = ['name', 'slug', 'image', 'icon'];

    //Relacion uno a muchos inversa
    public function family(){
     return $this->belongsTo(Family::class);
    }

    //Relacion uno a muchos 
    public function subcategoria(){
     return $this->hasMany(Subcategory::class);
    }
   
}
