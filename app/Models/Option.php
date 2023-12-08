<?php

namespace App\Models;

use App\Models\Feature;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
    ];

      //Relacion muchos a muchos  
      public function option(){
        return $this->belongsToMany(Product::class)->withPivot('value')->withTimestamps();
       }

         //Relacion uno a muchos  
      public function features(){
        return $this->hasMany(Feature::class);
       }

}
