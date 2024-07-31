<?php


use App\Http\Controllers\Api\AchivementController;
use App\Http\Controllers\Api\CmsController;
use App\Http\Controllers\Api\DescriptionController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\MissionVisionController;
use App\Http\Controllers\Api\OurteamController;
use App\Http\Controllers\Api\StatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// middleware with lang
Route::middleware('checkLang')->group(function (){


    

    Route::prefix('sliders')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\SliderController::class , 'get']);
    });

    Route::prefix('about-us')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\AboutController::class , 'get']);
    });

    Route::prefix('category')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\CategoryController::class , 'get']);
        Route::post('/details' , [\App\Http\Controllers\Api\CategoryController::class , 'get_details']);
        Route::get('/subcategory/get' , [\App\Http\Controllers\Api\CategoryController::class , 'get_category_with_sub']);
        Route::post('/sub_category/category/get' , [\App\Http\Controllers\Api\CategoryController::class , 'get_category_from_sub']);
    });

    Route::prefix('our-works')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\OurWorks::class , 'get']);

    });

    //events
    Route::prefix('events')->group(function(){
        Route::get('/get' , [EventController::class , 'get']);

    });

    // start our team api 
    Route::prefix('our-teams')->group(function(){
         Route::get('/get' ,[OurteamController::class , 'get'] );
    });

    Route::prefix('social-media')->group(function (){
       Route::get('/get' , [\App\Http\Controllers\Api\SocialController::class , 'get']);
    });

    Route::prefix('langs')->group(function (){
      Route::get('/get' , [\App\Http\Controllers\Api\LangController::class , 'get']);
    });

    Route::prefix('meta')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\WebsiteMetaController::class , 'get']);
    });

    Route::prefix('settings')->group(function (){
       Route::get('/get' , [\App\Http\Controllers\Api\SettingsController::class , 'get']);
    });


    Route::prefix('contact')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\ContactusController::class , 'get']);
    });

    Route::prefix('clients')->group(function (){
       Route::get('/get'  , [\App\Http\Controllers\Api\OurClientController::class , 'get']);
    });

    Route::prefix('services')->group(function (){
        Route::get('/get' , [\App\Http\Controllers\Api\ServicesController::class , 'get']);
        Route::post('/service_details/get' , [\App\Http\Controllers\Api\ServicesController::class , 'get_service_details']);
        Route::post('/service/category/get' , [\App\Http\Controllers\Api\ServicesController::class , 'service_with_category']);
    });

    Route::prefix('users')->group(function (){
         Route::get('get' , [ \App\Http\Controllers\Api\UsersController::class, 'get']);
         Route::post('/store' , [\App\Http\Controllers\Api\UsersController::class, 'store']);
    });


    Route::prefix('products')->group(function (){
        Route::get('get' , [\App\Http\Controllers\Api\ProductController::class , 'get']);
        Route::post('/product_details/get' , [\App\Http\Controllers\Api\ProductController::class , 'get_product_details']);
        Route::post('category/get' , [\App\Http\Controllers\Api\ProductController::class , 'get_product_category']);
    });


    Route::prefix('messages')->group(function (){
        Route::post('/store'  , [\App\Http\Controllers\Admin\MessageController::class , 'save']);

    });


    Route::prefix('achivement')->group(function(){

        Route::get('/get' , [AchivementController::class , 'get']);
   

    });


    // start feedback api 
    Route::prefix('feedbacks')->group(function(){

         Route::get('/get' , [FeedbackController::class , 'get']);
    });


    Route::prefix('cms')->group(function(){

        Route::get('/get' , [CmsController::class , 'get']);
        Route::post('/cms_details/get' , [CmsController::class , 'get_cms_details']);

    });


    Route::prefix('faq')->group(function(){
       Route::get('/get' , [FaqController::class , 'get']);
    });

    Route::prefix('mission_vission')->group(function(){ 
        Route::get('/get' , [MissionVisionController::class , 'get']);
    });


    Route::prefix('mdeia')->group(function(){
        Route::get('/media-group/get' , [MediaController::class, 'get_media_group']);
    });

    Route::prefix('/statistics')->group(function(){

        Route::post('/add' , [StatisticsController::class  , 'save' ]);

    });

    Route::prefix('descriptions')->group(function(){

        Route::get('/get' , [DescriptionController::class , 'get']);
    });
    








});

