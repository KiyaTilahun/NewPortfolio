<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class MediaItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    
    protected $casts = [
        'file_path' => 'json'
    ];
    public function mediaCategory()
    {
        return $this->belongsTo(MediaCategory::class);
    }
    public function mediaType()
    {
        return $this->belongsTo(MediaType::class);
    }


    // public static function boot()
    // {
    //     parent::boot();

        // static::saving(function ($model) {
        //     // Fetch the media type
        //     dd($model);
        //     if ($model->media_type_id) {
        //         $mediaType = MediaType::find($model->media_type_id);
        //         if ($mediaType) {
        //             // Adjust the directory path based on the media type
        //             $directory = 'media/' . $mediaType->name;

        //             // Update the file_path attribute with the new directory
        //             $filePath =$model->file_path;
        //             if ($filePath) {
        //                 foreach ($filePath as &$path) {
        //                     // Assume $path contains the relative file path, adjust it to new directory
        //                     // $path = str_replace('media/', $directory . '/', $path);
        //                     $path = $directory . '/' . basename($path);
        //                     // dd($path);
        //                 }

        //                 $model->file_path = json_encode($filePath);
        //             }
        //         }
        //     }
        // });
    // }

       public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if ($model->media_type_id) {
                $mediaType = MediaType::find($model->media_type_id);
                if ($mediaType) {
                    $directory = 'media/' . $mediaType->name;
        
                    $filePath = $model->file_path;
                    if ($filePath) {
                        $filePath = is_string($filePath) ? json_decode($filePath, true) : $filePath;
        
                        foreach ($filePath as &$path) {
                            $contents = Storage::disk('public')->get($path);
                            $newPath = $directory . '/' . basename($path);
        
                            Storage::disk('public')->put($newPath, $contents);
        
                            $path = $newPath;
                        }
        
                        // $model->file_path = json_encode($filePath);
                        $model->file_path = $filePath;
                    }
                }
            }
        });


        static::deleted(function (MediaItem $model) {
            if ($model->file_path) {
               foreach($model->file_path as $path){

                Storage::delete("public/$path");
               }
            }
        });
    }
}
