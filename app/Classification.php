<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
     protected $fillable = ['name',];
     
      /**
     * この種類に含まれる中分類。
     */
   public function species()
    {
        return $this->hasMany(Specie::class);
    }
}
