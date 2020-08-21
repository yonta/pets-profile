<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['pet_id','URL','introduction1','introduction2',];

    /**
     * この写真を所有するペット。（ Petモデルとの関係を定義）
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class,'pet_id','id');
    }
}
