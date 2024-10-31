<?php

namespace App\Http\Controllers;

use App\Models\General\MediaItem;
use App\Models\Navigation\Menuitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DownloadController extends Controller
{
    
    //


    public function download( $record){

      $media=MediaItem::findOrfail($record);
    //   dd($media);
        

        // if (!empty($filePath) && is_array($filePath)) {
        //     foreach ($filePath as $path) {
        //         if (Storage::disk('public')->exists($path)) {
        //              Storage::disk('public')->download($path);
        //         }
        //     }
            
        // } else {
        //     return back()->with('error', 'File not found.');
        // }

        
$filePath = $media->file_path;
        if (!empty($filePath) && is_array($filePath)) {
            // Create a temporary file for the zip
            $zipFileName = 'downloaded_files_' . time() . '.zip';
            $zipFilePath = storage_path('app/public/' . $zipFileName);
        
            $zip = new ZipArchive;
        
            if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                foreach ($filePath as $path) {
                    if (Storage::disk('public')->exists($path)) {
                  
                        $zip->addFile(Storage::disk('public')->path($path), basename($path));
                    }
                }
                $zip->close();
                return response()->download($zipFilePath)->deleteFileAfterSend(true);
            } else {
                return back()->with('error', 'Could not create zip file.');
            }
        } else {
            return back()->with('error', 'File not found.');
        }
    }
}
