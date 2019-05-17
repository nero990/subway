<?php
/**
 * Created by PhpStorm.
 * User: nero
 * Date: 1/22/19
 * Time: 8:32 AM
 */

namespace App\Custom\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    protected static $sluggable = [
        'source' => 'name',
        'slug_field_name' => 'slug'
    ];

    protected static function boot()
    {
        static::saving(function ($model) {
            $count = 0;
            do{
                $slug = Str::slug($model->{static::$sluggable['source']});
                if($count > 0) $slug .= "-{$count}";
                $count++;
            } while(static::where(static::$sluggable['slug_field_name'], $slug)->exists());

            $model->{static::$sluggable['slug_field_name']} = $slug;
        });

        parent::boot();
    }

}
