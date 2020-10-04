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

// danh mục, new-detail, new-list, quảng lý tin đăng, quên mật khẩu, sản phẩm, thay đổi thông tin

// đăng bài viết
Route::get('/dangbaiviet',function(){
	return view('pages/dangbaiviet');
});
Route::get('/danh-muc',function(){
	return view('pages/danh-muc');}
);
Route::get('/new-detail',function(){
	return view('pages/new-detail');}
);
Route::get('/new-list',function(){
	return view('pages/new-list');}
);
Route::get('/quanlytindang',function(){
	return view('pages/quanlytindang');}
);
Route::get('/quenmk',function(){
	return view('pages/quenmk');}
);
Route::get('/san-pham',function(){
	return view('pages/san-pham');}
);
Route::get('/thaydoithongtin',function(){
	return view('pages/thaydoithongtin');}
);



Auth::routes();
Route::get('/logout','Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');
Route::get('home','HomeController@index');
Route::get('/compares',function(){
	return view('pages/compare');}
);
Route::get('/contact',function(){
	return view('pages/contact');
});
Route::get('/favorites',function(){
	return view('pages/favorite');
});


/*Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('/demopusher', function () {
    return view('showNotification');
});

Route::get('getPusher', function (){
   return view('form_pusher');
});

Route::get('/pusher', function(Illuminate\Http\Request $request) {
    event(new App\Events\HelloPusherEvent($request));
    return redirect('getPusher');
});

Route::get('/test',function(){return view('test/home');});


Route::post('/test/product-unit/create','ProductUnitController@store')->name('create-product-unit');
Route::post('/test/product-unit/update/{id}','ProductUnitController@update')->name('update-product-unit');
Route::get('/test/product-unit/delete/{id}','ProductUnitController@destroy')->name('delete-product-unit');
Route::get('/test/product-unit/edit/{id}','ProductUnitController@edit')->name('edit-product-unit');
Route::get('/test/product-unit/home','ProductUnitController@index');



Route::post('/test/product-cate/create','ProductCateController@store')->name('create-product-cate');
Route::post('/test/product-cate/update/{id}','ProductCateController@update')->name('update-product-cate');
Route::get('/test/product-cate/delete/{id}','ProductCateController@destroy')->name('delete-product-cate');
Route::get('/test/product-cate/edit/{id}','ProductCateController@edit')->name('edit-product-cate');
Route::get('/test/product-cate/home','ProductCateController@index');

Route::post('/test/category/create','CategoryController@store')->name('create-cate');
Route::post('/test/category/update/{id}','CategoryController@update')->name('update-cate');
Route::get('/test/category/delete/{id}','CategoryController@destroy')->name('delete-cate');
Route::get('/test/cate/edit/{id}','CategoryController@edit')->name('edit-cate');
Route::get('/test/cate/home','CategoryController@index');



Route::get('/new/{cate}','ProductExtendController@create')->name('new');
Route::post('/dang-tin/store','ProductExtendController@store')->name('dang-tin');

