<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
     /**
     * この種類に含まれるペット。（ Petstモデルとの関係を定義）
     */
   public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
