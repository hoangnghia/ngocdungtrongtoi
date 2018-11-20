<?php

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
    return redirect('index');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/redirect/{social}', 'Auth\\SocialAuthController@redirect');
Route::get('/callback/{social}', 'Auth\\SocialAuthController@callback');


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'Auth\\ProfileController@index');

    Route::get('/branches', 'Backend\\BranchController@index');
    Route::get('/branch/edit/{id}', 'Backend\\BranchController@editBranch');
    Route::get('/branch/delete/{id}', 'Backend\\BranchController@delete');
    Route::get('getArrayData', 'Backend\\BranchController@getArrayData');

    Route::post('/edit/BranchPost', 'Backend\\BranchController@editBranchPost');
    Route::post('/branchespost', 'Backend\\BranchController@createBranch');

    // Route phòng ban

    Route::get('/room', 'Backend\\RoomController@index');
    Route::get('/room/getArrayData', 'Backend\\RoomController@getArrayData');
    Route::get('/room/edit/{id}', 'Backend\\RoomController@editRoom');
    Route::get('/room/delete/{id}', 'Backend\\RoomController@delete');

    Route::post('/room/create', 'Backend\\RoomController@createRoom');
    Route::post('/edit/roompost', 'Backend\\RoomController@editRoomPost');

    //Router hình ảnh

    Route::get('/album', 'Backend\\AlbumController@index');
    Route::get('/album/getArrayData', 'Backend\\AlbumController@getArrayData');
    Route::get('/album/create', 'Backend\\AlbumController@create');
    Route::get('/album/delete/{id}', 'Backend\\AlbumController@delete');

    Route::post('/album/createPort', 'Backend\\AlbumController@createPort');

    //Router video

    Route::get('/video', 'Backend\\VideoController@index');
    Route::get('/video/getArrayData', 'Backend\\VideoController@getArrayData');
    Route::get('/video/create', 'Backend\\VideoController@create');
    Route::get('/video/delete/{id}', 'Backend\\VideoController@delete');
    Route::get('/video/edit/{id}', 'Backend\\VideoController@editVideo');

    Route::post('/video/createPort', 'Backend\\VideoController@createPort');
    Route::post('/video/editpost', 'Backend\\VideoController@editVideoPost');

    //Router Bài viết

    Route::get('/news', 'Backend\\NewsController@index');
    Route::get('/news/getArrayData', 'Backend\\NewsController@getArrayData');
    Route::get('/news/create', 'Backend\\NewsController@create');
    Route::get('/news/delete/{id}', 'Backend\\NewsController@delete');
    Route::get('/news/edit/{id}', 'Backend\\NewsController@editNews');

    Route::post('/news/createPort', 'Backend\\NewsController@createPort');
    Route::post('/news/editpost', 'Backend\\NewsController@editNewsPost');

    // rout Cảm nhận
    Route::get('/feel', 'Backend\\FeelController@index');
    Route::get('/feel/getArrayData', 'Backend\\FeelController@getArrayData');
    Route::get('/feel/create', 'Backend\\FeelController@create');
    Route::get('/feel/delete/{id}', 'Backend\\FeelController@delete');
    Route::get('/feel/edit/{id}', 'Backend\\FeelController@editNews');

    Route::post('/feel/createPort', 'Backend\\FeelController@createFeel');
    Route::post('/feel/editpost', 'Backend\\FeelController@editNewsPost');

    // rout Cảm nhận
    Route::get('/culture', 'Backend\\CultureController@index');
    Route::get('/culture/getArrayData', 'Backend\\CultureController@getArrayData');
    Route::get('/culture/create', 'Backend\\CultureController@create');
    Route::get('/culture/delete/{id}', 'Backend\\CultureController@delete');

    Route::post('/culture/createCulture', 'Backend\\CultureController@createCulture');

});
/** BRANCH */
//Route Frontend

Route::get('/index', 'Frontend\\HomeController@index');
Route::post('/image/get', 'Frontend\\HomeController@getiImagesByAlbum');

Route::get('/albums', 'Frontend\\ImageByAlbumController@index');
Route::get('/van-hoa-ngoc-dung', 'Frontend\\CultureController@index');

Route::get('/videos', 'Frontend\\GetByVideosController@index');
Route::get('/chi-tiet-video/{id}', 'Frontend\\GetByVideosController@detail');


Route::get('/bai-viet', 'Frontend\\NewsController@index');
Route::get('/chi-tiet-bai-viet/{id}', 'Frontend\\NewsController@detail');

/**
 * Content
 */
Route::get('/user', 'Backend\\UserController@index');
Route::get('/user/getUser', 'Backend\\UserController@getArrayUser');
Route::post('/user/postUser', 'Backend\\UserController@postUser');



