<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['extension','imagePath'];
    public function house(){
        return $this->hasOne(House::class);
    }
}
