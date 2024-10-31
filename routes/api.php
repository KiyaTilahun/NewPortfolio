<?php

use App\Filament\Resources\General\SocialmediaResource;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\FooterlinkController;
use App\Http\Controllers\Api\Form\ContactController;
use App\Http\Controllers\Api\Form\SubscriberController;
use App\Http\Controllers\Api\MediaCategoryController;
use App\Http\Controllers\Api\MediaItemController;
use App\Http\Controllers\Api\NavigationController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SiteFeatureController;
use App\Http\Controllers\Api\SocialmediaController;
use App\Http\Controllers\Api\VisitorController;
use App\Http\Controllers\Api\WebContentsController;
use App\Http\Resources\SiteFeatureResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jorenvh\Share\ShareFacade;

use function Pest\Laravel\json;

// Route::get('shower', function () {
//     $arr = ["kk" => "yes"];
//     return response()->json($arr);
// });



Route::apiResource('/navigations', NavigationController::class)
    ->only(['index', 'show'])->parameters(['navigations' => 'menuitem:name']);
Route::apiResource('/sociallink', SocialmediaController::class)
    ->only(['index', 'show'])
    ->parameters(['sociallink' => 'socialmedia:name']);
Route::apiResource('/footerlink', FooterlinkController::class)
    ->only(['index', 'show'])
    ->parameters(['footerlink' => 'footerlink:name']);
Route::apiResource('/faqs', FaqController::class)->only('index');
Route::apiResource('/posts', PostController::class)->only(['index', 'show']);
Route::apiResource('/products', ProductController::class)->only(['index', 'show']);
Route::apiResource('/settings', SettingController::class)->only(['index','show'])->parameters(['settings' => 'settingcategory:name']);;
Route::apiResource('/sitefeature', WebContentsController::class)
    ->only(['index', 'show'])
    ->parameters(['sitefeature' => 'sitefeature:name']);
Route::get('/posts/latest/{day}',[PostController::class,'latest']);
Route::get('/posts/{id}/like', [PostController::class, 'likePost'])->name('posts.like');
Route::apiResource('/mediaCategories', MediaCategoryController::class)->only(['index', 'show']);
Route::get('/visitors', [VisitorController::class,'adder']);

Route::apiResource('/pages',PageController::class)->only(['show']);

Route::middleware(['throttle:forms'])->group(function () {
    Route::apiResource('/form/contacts',ContactController::class)->only(['store']);
    Route::apiResource('/form/subscribers',SubscriberController::class)->only(['store']);

});



// this are just demo views for development purpose only
// Route::get('/demoblog', [PostController::class, 'demoshower']);
// Route::get('/demonavs', [NavigationController::class, 'demoshower']);



