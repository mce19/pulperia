<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;
    //asigancion masiva
    protected $fillable = [
        'value',
        'description',
        'option_id',
    ];

      //Relacion uno a muchos  invesa
      public function option(){
        return $this->belongsTo(Option::class);
       }

        //Relacion muchos a muchos 
   public function variants(){
    return $this->belongsToMany(Variant::class)->withTimestamps();
   }
}
