<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('photos')->truncate();

        $extension = "jpg";
        $destination = public_path(config('mhrs.image.directory'));
        for ($i =1; $i <= 10; $i++){
            $filename = "property-".$i.".{$extension}";
            $property = str_replace(".{$extension}", "_property.{$extension}",$filename);
            Image::make($destination . '/' . "property-".$i.".{$extension}")->resize(config('mhrs.image.property.width'), config('mhrs.image.property.height'))->save($destination . '/' . $property);
            $slide = str_replace(".{$extension}" , "_slide.{$extension}" , $filename);
            Image::make($destination . '/' . $filename)->resize(config('mhrs.image.slide.width') , config('mhrs.image.slide.height'))->save($destination . '/' . $slide);

            $photo = new \App\Photo();
            $photo->extension = $extension;
            $photo->imagePath = $filename;

            $photo->save();

        }

    }
}
