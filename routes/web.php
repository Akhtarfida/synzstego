<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Auth::routes();




Route::group(['middleware' => 'auth'], function() {

    Route::get('/admin/stats', [
        'uses' => 'UsersController@stats',
        'as' => 'stats'
    ]);

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin/users', 'UsersController@index')->name('users');

    Route::get('/admin/users/trashed', 'UsersController@trashed')->name('users.trashed');

    Route::get('/user/admin/{id}', [

        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [

        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('/user/delete/{id}', [

        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/kill/{id}', [

        'uses' => 'UsersController@kill',
        'as' => 'user.kill'
    ]);

    Route::get('/user/restore/{id}', [

        'uses' => 'UsersController@restore',
        'as' => 'user.restore'
    ]);

    Route::get('/user/profile', [

        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    // no id because we already know the user with auth user class
    Route::post('/user/profile/update', [

        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/user/watermark/view', [

        'uses' => 'UploadsController@watermarkView',
        'as'   => 'watermark.view'
    ]);

    Route::post('/user/upload/watermark', [

        'uses' => 'UploadsController@watermark',
        'as'   => 'user.upload.watermark'
    ]);

    Route::get('/user/watermark/download', [

        'uses' => 'UploadsController@download',
        'as'   => 'user.watermark.download'
    ]);

    Route::get('/watermark/download/{id}', [

        'uses' => 'UploadsController@downloadImage',
        'as'   => 'watermark.download'
    ]);



    Route::get('/stegimgs/hide/view', [

        'uses' => 'StegController@index',
        'as'   => 'stgimgs.index'

    ]);


    Route::post('/stegimg/hide/data', [

        'uses' => 'StegController@steganofy',
        'as'   => 'stgimg.steganofy'
    ]);


    Route::get('/folders/Myimages', function(){

        return view('admin.photos.folders');
    })->name('folders');


    Route::get('/stegimgs/view/download', [

        'uses' => 'StegController@viewDownloads',
        'as'   => 'stegimgs.view.downloads'
    ]);

    Route::get('/stgimgs/extract/view', [

        'uses' => 'StegController@extract',
        'as'   => 'stgimgs.extract'
    ]);

    Route::post('/stegimgs/extract/data', [

        'uses' => 'StegController@extractData',
        'as'   => 'stegimg.extract.data'
    ]);

    Route::post('/download/textFile', [

        'uses' => 'StegController@downloadText',
        'as'   => 'download.text.file'
    ]);

    Route::get('/stegimg/edit/{id}', [
        'uses' => 'StegController@edit',
        'as'   => 'stegimg.edit'
    ]);

    Route::post('/stgimg/update/{id}', [

        'uses' => 'StegController@update',
        'as'   => 'stgimg.update'
    ]);


    Route::get('/image/trash/{id}', [
        'uses' => 'UploadsController@trash',
        'as'   => 'image.trash'
    ]);

    Route::get('images/trashed', [
        'uses' => 'UploadsController@getTrashed',
        'as'   => 'images.trashed'
    ]);

    Route::get('/image/restore/{id}', [
        'uses' => 'UploadsController@restore',
        'as'   => 'image.restore'
    ]);

    Route::get('/image/kill/{id}', [
        'uses' => 'UploadsController@kill',
        'as'   => 'image.kill'
    ]);










    Route::get('/results', function(){

        $images = \App\Upload::where('title', 'like', '%'.request('query').'%')->get();

        return view('admin.results')->with('images', $images)
                                    ->with('title', 'Search Results: '.request('query'))
                                    ->with('query', request('query'));
    })->name('results');


});


Route::get('/test', function(){
   return view('welcome1');
});