<?php

use App\Http\Controllers\UserController;
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





Auth::routes();
Route::get('/logout','Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');					// Trang chủ
Route::get('home','HomeController@index');								// Trang chủ
Route::get('/compares',function(){return view('pages/compare');});		// So sánh
Route::get('/contact',function(){return view('pages/contact');});		// liên hệ
Route::get('/favourites',function(){return view('pages/favourites');});	// Yêu thích

//Danh mục
Route::get('/article/new/{cate}','ProductController@create')->name('new'); // Đăng bài viết
Route::get('/mua-ban-nha-dat','ProductController@getByCateSlug1');
Route::get('/cho-thue-nha-dat','ProductController@getByCateSlug2');
Route::get('/sang-nhuong-nha-dat','ProductController@getByCateSlug3');

//User
Route::get('/user/my-article',function(){
	return view('pages/quanlytindang');}
);
// Route::get('/user/profile',function(){
// 	return view('pages/thaydoithongtin');}
// );
//
Route::get('/new-detail',function(){
	return view('pages/new-detail');}
);
Route::get('/new-list',function(){
	return view('pages/new-list');}
);

Route::get('/forgot-password',function(){
	return view('auth/quenmk');}
);
Route::get('/san-pham',function(){
	return view('pages/san-pham');}
);

Route::get('/yeuthich',function(){
	return view('pages/favourites');}
);

//API
Route::get('/get-district/{id}','API\GetZone@getDistrictByProvince');
Route::get('/get-ward/{id}','API\GetZone@getWardByDistrict');


//  test
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



Route::post('/dang-tin/store','ProductController@store')->name('dang-tin');

// chức năng đăng kí
Route::post('/create-user','Auth\RegisterController@create')->name('createUser');

// login admin
Route::get('/admin-marvel',function(){
    return view('admin/index');
}); // Trang admin
// ================= hồ sơ ==================
// hồ sơ
Route::get('/user/profile/{id}','UserController@edit')->name('');
// update thông tin hồ sơ cá nhân
Route::post('/user/update/{id}','UserController@update')->name('user-update');
