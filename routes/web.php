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
    return redirect('login');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/redirect/{social}', 'Auth\\SocialAuthController@redirect');
Route::get('/callback/{social}', 'Auth\\SocialAuthController@callback');


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/branches','Dashboard\\BranchController@index');
    Route::get('/branch/edit/{id}','Dashboard\\BranchController@editBranch');
    Route::get('/branch/delete/{id}','Dashboard\\BranchController@delete');
    Route::get('getArrayData','Dashboard\\BranchController@getArrayData');

    Route::post('/edit/BranchPost','Dashboard\\BranchController@editBranchPost');
    Route::post('/branchespost','Dashboard\\BranchController@createBranch');

    // Route phòng ban

    Route::get('/room','Dashboard\\RoomController@index');
    Route::get('/room/getArrayData','Dashboard\\RoomController@getArrayData');
    Route::get('/room/edit/{id}','Dashboard\\RoomController@editRoom');
    Route::get('/room/delete/{id}','Dashboard\\RoomController@delete');

    Route::post('/room/create','Dashboard\\RoomController@createRoom');
    Route::post('/edit/roompost','Dashboard\\RoomController@editRoomPost');

    //Router hình ảnh

    Route::get('/album','Dashboard\\AlbumController@index');
    Route::get('/album/getArrayData','Dashboard\\AlbumController@getArrayData');
    Route::get('/album/create','Dashboard\\AlbumController@create');
    Route::get('/album/delete/{id}','Dashboard\\AlbumController@delete');

    Route::post('/album/createPort','Dashboard\\AlbumController@createPort');

    //Router video

    Route::get('/video','Dashboard\\VideoController@index');
    Route::get('/video/getArrayData','Dashboard\\VideoController@getArrayData');
    Route::get('/video/create','Dashboard\\VideoController@create');
    Route::get('/video/delete/{id}','Dashboard\\VideoController@delete');
    Route::get('/video/edit/{id}','Dashboard\\VideoController@editVideo');

    Route::post('/video/createPort','Dashboard\\VideoController@createPort');
    Route::post('/video/editpost','Dashboard\\VideoController@editVideoPost');

    //Router Bài viết

    Route::get('/news','Dashboard\\NewsController@index');
    Route::get('/news/getArrayData','Dashboard\\NewsController@getArrayData');
    Route::get('/news/create','Dashboard\\NewsController@create');
    Route::get('/news/delete/{id}','Dashboard\\NewsController@delete');
    Route::get('/news/edit/{id}','Dashboard\\NewsController@editNews');

    Route::post('/news/createPort','Dashboard\\NewsController@createPort');
    Route::post('/news/editpost','Dashboard\\NewsController@editNewsPost');

    //Router Bài viết
    Route::get('/profile','Auth\\ProfileController@index');


});
/** BRANCH */
