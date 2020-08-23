<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
   
   protected $fillable = ['name','classification_id',];
   
    /**
     * この種類を所持する大分類
     */
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
    
   
   /**
     * この種類に含まれる小分類。
     */
   public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
    
}
