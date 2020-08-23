<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['name','species_id',];
    
     /**
     * この種類を所持する中分類
     */
    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
    
    
     /**
     * この種類に含まれるペット。（ Petstモデルとの関係を定義）
     */
   public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
