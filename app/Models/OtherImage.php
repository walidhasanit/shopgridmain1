<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class OtherImage extends Model
{
    use HasFactory;

    public static $otherImage;
    public static $imageName, $imageUrl,$directory;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'other-image/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newOtherImage($product, $request)
    {
        foreach ($request->file('other_image') as $image)
        {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $product->id;
            self::$otherImage->image      = self::getImageUrl($image);
            self::$otherImage->save();
        }


    }

}
