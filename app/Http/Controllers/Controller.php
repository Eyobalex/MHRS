<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


//    protected function removeImage ( $image )
//    {
//        if ( !empty( $image ) ) {
//            $imagePath = $this->uploadPath . '/' . $image;
//            $ext = substr ( strrchr ( $image , '.' ) , 1 );
//            $property = str_replace(".{$ext}", "_property.{$ext}", $image);
//            $slide = str_replace(".{$ext}", "_slide.{$ext}", $image);
//            $propertyPath = $this->uploadPath . '/' . $property;
//            $slidePath = $this->uploadPath . '/' . $slide;
//
//            if ( file_exists ( $imagePath ) ) unlink ( $imagePath );
//            if ( file_exists ( $propertyPath ) ) unlink ( $propertyPath );
//            if ( file_exists ( $slidePath ) ) unlink ( $slidePath );
//        }
//    }
}
