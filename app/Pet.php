<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    protected $fillable = ['user_id','name','sex','introduction','breed_id','birthday','cute_count',];

    /**
     * このペットを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     /**
     * このペットを含む種類。（ Breedモデルとの関係を定義）
     */
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    
    /**
     * このユーザが所有する写真。（ Photoモデルとの関係を定義）
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    
}
