<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class News extends Model {

    use Sluggable;

    const NO_IMAGE = '/img/no-image.png';

    protected $fillable = ['title', 'content'];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title']
        ];
    }

    public static function add($fields, $image)
    {
        $news = new static();
        $news->fill($fields);
        $news->uploadImage($image);
        $news->save();

        return $news;
    }

    public function edit($fields, $image)
    {
        $this->fill($fields);
        $this->uploadImage($image);
        $this->save();
    }

    public function uploadImage($image)
    {
        if ($image === null)
        {
            return;
        }
        $this->removeImage();
        $filename = $image->store('uploads/news');

        $minImage = Image::make($filename)->widen(150, function ($constraint) {
            $constraint->upsize();
        });
        $minImage->save('uploads/news/' . $minImage->filename . '-min.' . $minImage->extension);

        $this->image = '/' . $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image['normal'] !== static::NO_IMAGE)
        {
            Storage::delete($this->image['normal']);
            Storage::delete($this->image['min']);
        }
    }

    public function hasImage()
    {
        if ($this->image['normal'] !== static::NO_IMAGE)
        {
            return true;
        }

        return false;
    }

    public function getImageAttribute($value)
    {
        if ($value === null)
        {
            return array(
                'normal' => static::NO_IMAGE,
                'min'    => static::NO_IMAGE
            );
        }

        return array(
            'normal' => $value,
            //'min' => implode('-min.', explode('.', $value))
            'min'    => str_replace('.', '-min.', $value)
        );
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
