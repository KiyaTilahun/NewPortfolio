<?php

use App\Http\Controllers\Api\MediaCategoryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\Web\SiteFeatureController;
use App\Http\Resources\MediaCategoryResource;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect()->route("filament.admin.auth.login");
// });
// Route::get('/', function () {
//     return view('portfolio.index');
// });

Route::get('/docs', function () {
    return file_get_contents(public_path('docs/index.html'));
})->name('public_docs');

Route::get('/', [SiteFeatureController::class,'index']
);

Route::get('/download/{file_label}', [SiteFeatureController::class, 'download'])->name('download');


// Route::get('/demoshare/{post}', [ShareController::class,'share']
// )->name('demoshare');
// Route::get('/reply/{contact}', [ReplyController::class,'reply']
// )->name('reply');
// Route::get('/demoFolder', [MediaCategoryController::class,'demofolder']
// )->name('demofolder');
// Route::get('/download/file/{id}', [DownloadController::class,'download']
// )->name('download.file');
// Route::get('blog',function(){

//     return view('blog');
// });