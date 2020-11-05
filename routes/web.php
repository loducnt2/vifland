<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Models\NewsCategory;
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
Route::get('/testcompare','API\CompareController@testcompare');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');					// Trang chủ
Route::get('home','HomeController@index');								// Trang chủ
Route::get('/compares','API\CompareController@index')->name('compare');		// So sánh
Route::get('/contact',function(){return view('pages/contact');});		// liên hệ

//Danh mục

Route::get('/mua-ban-nha-dat','ProductController@getByCateSlug1')->name('cate1');
Route::get('/cho-thue-nha-dat','ProductController@getByCateSlug2')->name('cate2');
Route::get('/sang-nhuong-nha-dat','ProductController@getByCateSlug3')->name('cate3');
Route::post('/search','SearchController@index')->name('search');
/*Route::get('/mua-ban-nha-dat/{slug}','ProductController@getDetailByCate1')->name('article-detail-1');
Route::get('/cho-thue-nha-dat/{slug}','ProductController@getDetailByCate2')->name('article-detail-2');
Route::get('/sang-nhuong-nha-dat/{slug}','ProductController@getDetailByCate3')->name('article-detail-3');*/

Route::get('/article/{slug}','ProductController@show')->name('article-detail');

Route::group(['middleware'=>'auth'],function(){

	Route::get('/article/new/{cate}','ProductController@create')->name('new');            // Form Đăng tin
	Route::post('/article/new/store','ProductController@store')->name('article-store');   // Đăng tin
	Route::get('/user/my-article/{id}','ProductController@getByUser')->name('user-article');  // Quản lý tin của user
	Route::get('/user/favourites','ProductController@productUserFavorite')->name('favorites');				  // Yêu thích
	Route::get('/user/history','ProductController@productUserHistory')->name('history');					  // Lịch sử xem tin

	//Profile
	Route::get('/user/profile/{id}','UserController@profileDetail')->name('');
	//Update profile
	Route::post('/user/update/{id}','UserController@update')->name('user-update');
    //

});

// Đăng kí
Route::post('/create-user','Auth\RegisterController@create')->name('createUser');



Route::get('/new-detail',function(){
	return view('pages/new-detail');}
);
Route::get('/new-list/index',function(){
	return view('pages/new-list');}
);

Route::get('/forgot-password',function(){
	return view('auth/passwords/email');}
);
Route::get('/san-pham',function(){
	return view('pages/san-pham');}
);


//API
Route::get('/get-district/{id}','API\GetZone@getDistrictByProvince');
Route::get('/get-ward/{id}','API\GetZone@getWardByDistrict');
Route::post('/add-favorited','API\FavoriteController@addFavorite')->name('add-favorite');
Route::get('/all-favorite','API\FavoriteController@allFavorite')->name('all-favorite');
//Route::post('/add-compare','API\CompareController@addCompare')->name('add-compare');


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
//CRUD danh mục
Route::post('/admin/danh-sach-danh-muc/create','CategoryController@store')->name('create-cate');
Route::post('/admin/danh-sach-danh-muc/update/{id}','CategoryController@update')->name('update-cate');
Route::get('/admin/danh-sach-danh-muc/delete/{id}','CategoryController@destroy')->name('delete-cate');
Route::get('/admin/danh-sach-danh-muc/edit/{id}','CategoryController@edit')->name('edit-cate');
Route::get('/admin/danh-sach-danh-muc','CategoryController@index');
//duyệt tin
// Route::post('/admin/danh-sach-danh-muc/create','CategoryController@store')->name('create-cate');
Route::post('/admin/danh-sach-tin-tuc/update/{id}','NewsController@update')->name('update-new');
Route::get('/admin/danh-sach-tin-tuc/delete/{id}','NewsController@destroy')->name('delete-new');
Route::get('/admin/danh-sach-tin-tuc/edit/{id}','NewsController@edit')->name('edit-new');
Route::get('/admin/danh-sach-tin-tuc','NewsController@index');
// province
Route::post('/admin/danh-sach-province/update/{id}','ProvinceController@update')->name('update-province');
Route::get('/admin/danh-sach-province/edit/{id}','ProvinceController@edit')->name('edit-province');
Route::get('/admin/danh-sach-province','ProvinceController@index');



Route::post('/dang-tin/store','ProductController@store')->name('dang-tin');
// Quản lý tin đăng


// login admin
Route::get('/admin/index',function(){
    return view('admin/index');
}); // Trang admin
// ================= hồ sơ ==================

// update thông tin hồ sơ cá nhân
// Route admin - user
Route::get('admin/index/profiles','UserController@index');
Route::get('admin/index/profile/{id}','UserController@getprofileDetail');
// route admin- sản phẩm
Route::get('/admin/list-product',function(){
    return view('admin/sanpham/danhsachsanpham');
});
Route::get('admin/index/profile/delete/{id}','UserController@destroy');
// Route quản lí tin đã đăng của user
// Route::get('/my-article/{id}','UserControllers@getPostbyID');
// User: thay đổi trạng thái user
Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
// Tin tức theo danh mục
Route::get('/tin-tuc/danh-muc/{slug}','NewsController@getNewsbyCate');
Route::get('admin/index/profile/delete/{id}','UserController@destroy');
// Route quản lí tin đã đăng của user
// Route::get('/my-article/{id}','UserControllers@getPostbyID');
// User: thay đổi trạng thái user
Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');

Route::get('/tin-tuc/{slug}','NewsController@show');
// đăng tin tức
Route::get('/admin/cap-nhat-tin-tuc',function(){
    return view('admin.tintuc.quanlytintuc');
});
Route::POST('/admin/index/news/insert','NewsController@store');
// get tất cả các tin đang có
Route::get('/tin-tuc','NewsController@listnews');
// get những bài tin tức bằng tag
Route::get('/tin-tuc/tu-khoa/{tags}','NewsController@getpostsbytag');
// quản lí tin tức
Route::get('/admin/danh-muc-tin-tuc','NewsCategoryController@index')->name('news_category.index');
// ===================danh mục tin tức======================
Route::post('/admin/danh-muc-tin-tuc/them-moi/','NewsCategoryController@store')->name('news_category.add');

Route::delete('/admin/danh-muc-tin-tuc/xoa-danh-muc/{id}','NewsCategoryController@destroy')->name('news_category.destroy');
