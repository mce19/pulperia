<?php

namespace App\Models;

use App\Models\Feature;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use HasFactory;
    //alamcenamiento masivo
    protected $fillable = [
        'sku',
        'image_path',
        'product_id',
      ];

      //Relacion uno a muchos inversa 
      public function product(){
        return $this->belongsTo(Product::class);
       }

       //Relacion muchos a muchos  
      public function features(){
        return $this->belongsToMany(Feature::class)->withTimestamps();
       }
       
}
