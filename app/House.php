<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class House extends Model
{
    private $dir;
    protected $fillable = ['title', 'slug', 'description', 'price', 'location', 'photo_id', 'lessor_id'];


    public function __construct ( array $attributes = [] )
    {
        parent::__construct($attributes);
        $this->dir = config('mhrs.image.directory');
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function lessor(){
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value){
        $imageUrl = "";
        if (!is_null($this->photo_id)){
            $imagePath = public_path()."/{$this->dir}/" .$this->photo()->first()->imagePath;
            if (file_exists($imagePath)) $imageUrl = asset("{$this->dir}/" . $this->photo()->first()->imagePath);
        }
        return $imageUrl;
    }

    public function getImageUrlPropertyAttribute(){
        $imageUrl = "";
        $ext = substr(strrchr($this->photo()->first()->imagePath,'.'), 1 );
        $property= str_replace(".{$ext}", "_property.{$ext}", $this->photo()->first()->imagePath);
        if (!is_null($this->photo_id)){
            $imagePath =public_path()."/{$this->dir}/" .$property;
            if (file_exists($imagePath)) $imageUrl = asset("{$this->dir}/" . $property);
        }
        return $imageUrl;
    }
    public function getImageUrlSlideAttribute(){
        $imageUrl = "";
        $ext = substr(strrchr($this->photo()->first()->imagePath,'.'), 1 );
        $slide= str_replace(".{$ext}", "_slide.{$ext}", $this->photo()->first()->imagePath);
        if (!is_null($this->photo_id)){
            $imagePath = public_path()."/{$this->dir}/" .$slide;
            if (file_exists($imagePath)) $imageUrl = asset("{$this->dir}/" . $slide);
        }
        return $imageUrl;
    }
    public function getDescriptionHtmlAttribute(){
        return $this->description ? Markdown::convertToHtml(e($this->description)) : NULL;
    }

    public function getLessorAttribute(){
        return $this->lessor()->first();
    }


    public function scopeUploadedByUser($query){
        return $query->where('lessor_id', Auth::user()->id);
    }
}
