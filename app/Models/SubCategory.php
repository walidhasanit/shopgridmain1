<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $imageUrl;
    public static $directory;
    public static $imageName;
    public static $sub_categories;
    public static $sub_category;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'sub-category-image/';
        $image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newSubCategory($request)
    {
        self::$sub_category = new SubCategory();
        self::$sub_category->category_id   = $request->category_id;
        self::$sub_category->name          = $request->name;
        self::$sub_category->description   = $request->description;
        self::$sub_category->image         = self::getImageUrl($request->file('image'));
        self::$sub_category->status        = $request->status;
        self::$sub_category->save();

    }
    public static function updateSubCategory($request, $id)
    {
        self::$sub_category = SubCategory::find($id);
        if ($image = $request->file('image'))
            {
                file_exists(self::$sub_category->image);
                {
                unlink(self::$sub_category->image);
                }
                self::$imageUrl = self::getImageUrl($image);
            }
        else
            {
                self::$imageUrl = self::$sub_category->image;
            }
        self::$sub_category->category_id   = $request->category_id;
        self::$sub_category->name          = $request->name;
        self::$sub_category->description   = $request->description;
        self::$sub_category->image         = self::$imageUrl;
        self::$sub_category->status        = $request->status;
        self::$sub_category->save();

    }
    public static function deleteSubCategory($id)
    {
        self::$sub_category = SubCategory::find($id);
        file_exists(self::$sub_category->image);
        {
            unlink(self::$sub_category->image);
        }
        self::$sub_category->delete();
    }
    public  function category()
    {
        return $this->belongsTo(Category::class);
    }
}
