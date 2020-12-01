<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\UserController;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/user/profile','UserController@profileUser')->name('profile');
Route::get('/user/password','UserController@formpassword')->name('change-password');
Route::get('/user/add-money','UserController@formaddmoney')->name('add-money');
Route::get('/user/payment-history','UserController@paymentHistory')->name('payment-history');
Route::get('/user/article-posted','UserController@articleposted')->name('article-posted');
Route::get('/user/article-wait','UserController@articlewait')->name('article-wait');
Route::get('/user/article-expire','UserController@articlexpire')->name('article-expire');

Route::get('/testform',function(){return view('pages/article/testform');} );

Auth::routes();
Route::get('/testcompare','API\CompareController@testcompare');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@sessionUser');				// Trang chủ
Route::get('home','HomeController@index');								// Trang chủ
Route::get('/compares','API\CompareController@index')->name('compare');		// So sánh
Route::get('/contact',function(){return view('pages/contact');});		// liên hệ

//Danh mục

Route::get('/mua-ban-nha-dat','SearchController@getByCate')->name('cate1');
Route::get('/cho-thue-nha-dat','SearchController@getByCate')->name('cate2');
Route::get('/sang-nhuong-nha-dat','SearchController@getByCate')->name('cate3');

//Route::post('/search/{cate}','SearchController@index')->name('search');
Route::get('/search/','SearchController@index')->name('search');
//Route::get('/danh-muc/ds/{cate}','SearchController@getByCate')->name('cate');
//Route::post('/filter','SearchController@filter')->name('filter');
Route::get('/search/filter/','SearchController@filter')->name('filter');

//Route::get('/filter2','SearchController@filter2')->name('filter2');
/*Route::get('/mua-ban-nha-dat/{slug}','ProductController@getDetailByCate1')->name('article-detail-1');
Route::get('/cho-thue-nha-dat/{slug}','ProductController@getDetailByCate2')->name('article-detail-2');
Route::get('/sang-nhuong-nha-dat/{slug}','ProductController@getDetailByCate3')->name('article-detail-3');*/
Route::post('/article/new/store','ProductController@store')->middleware('auth')->name('article-store');
Route::post('/article/update/{id}','ProductController@update')->middleware('auth')->name('update-article');
Route::get('/article/{slug}','ProductController@show')->name('article-detail');
Route::get('/article/delete/{id}','ProductController@destroy')->name('delete-article');
Route::get('/article/edit/{id}','ProductController@edit')->name('edit-article');
Route::get('/article/add-date/{id}','ProductController@addDateForm')->name('add-date-form');
Route::post('/article/add-date','ProductController@addDate')->name('add-date-article');

Route::group(['middleware'=>'auth'],function(){
	//Nạp tiền
	Route::post('/user/create-payment','PaymentController@create')->name('create-payment');
	Route::get('/user/return-payment','PaymentController@return')->name('return-payment');

	Route::get('/article/new/{cate}','ProductController@create')->name('new');            // Form Đăng tin
	   // Đăng tin
	Route::get('/user/my-article/{id}','ProductController@getByUser')->name('user-article');  // Quản lý tin của user
	Route::get('/user/favourites','ProductController@productUserFavorite')->name('favorites');				  // Yêu thích
	Route::get('/user/history','ProductController@productUserHistory')->name('history');					  // Lịch sử xem tin

	//Profile
	Route::get('/user/profile/{id}','UserController@profileDetail')->name('user-profile');
	//Update profile
	Route::post('/user/update/{id}','UserController@update')->name('user-update');
	Route::post('/user/changepass/{id}','UserController@changePassword')->name('user-changePassword');
    //Change password


});

// Đăng kí
Route::post('/create-user','Auth\RegisterController@create')->name('createUser');



Route::get('/new-detail',function(){
	return view('pages/new-detail');}
);
Route::get('/new-list/index',function(){
	return view('pages/new-list');}
);

Route::get('/index/forgot-password',function(){
	return view('auth/passwords/email');}
);
Route::get('/san-pham',function(){
	return view('pages/san-pham');}
);


//API
Route::get('/get-district/{id}','API\GetZone@getDistrictByProvince');
Route::get('/get-content-province/{id}','API\GetZone@contentProvince');
Route::get('/get-ward/{id}','API\GetZone@getWardByDistrict');
Route::post('/add-favorited','API\FavoriteController@addFavorite')->name('add-favorite');
Route::get('/favorites/all','API\FavoriteController@allFavorite')->name('all-favorite');
//Route::post('/add-compare','API\CompareController@addCompare')->name('add-compare');


//  test
Route::get('/dsds/demopusher', function () {
    return view('showNotification');
});
Route::get('/dsds/getPusher', function (){
	return view('form_pusher');
});
Route::get('/dsds/pusher', function(Illuminate\Http\Request $request) {
    event(new App\Events\HelloPusherEvent($request));
    return redirect('/dsds/getPusher');
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
/////////////////////////////////////////
// Route::post('/admin/danh-sach-danh-muc/create','CategoryController@store')->name('create-cate');
// Route::post('/admin/danh-sach-duyet-tin/update/{id}','NewsController@update')->name('update-new');
Route::get('/admin/danh-sach-tin-tuc/delete/{id}','NewsController@destroy')->name('delete-new');
Route::get('/admin/danh-sach-tin-tuc/edit/{id}','NewsController@edit')->name('edit-new');
Route::get('/admin/danh-sach-tin-tuc','NewsController@index')->name('newscate-index');
// province
Route::post('/admin/danh-sach-province/update/{id}','ProvinceController@update')->name('update-province');
Route::get('/admin/danh-sach-province/edit/{id}','ProvinceController@edit')->name('edit-province');
Route::get('/admin/danh-sach-province','ProvinceController@index');

//duyet tin

Route::get('/admin/danh-sach-duyet-tin','HistoryPostController@index');
//Route::post('/admin/danh-sach-duyet-tin/update/{id}','HistoryPostController@update')->name('duyet-new');
Route::get('/admin/danh-sach-duyet-tin/show/{id}','HistoryPostController@show')->name('show-tintuc');
Route::get('/admin/danh-sach-duyet-tin/cancel/{id}','HistoryPostController@cancelPost')->name('cancel-post');
Route::get('/admin/danh-sach-duyet-tin/delete/{id}','HistoryPostController@destroy')->name('del-post');
Route::get('/admin/post-history/update/dsds/{id}','HistoryPostController@updatePost')->name('update-post');

//Banner
Route::post('/admin/danh-sach-banner/create','ImgController@store')->name('create-banner');
Route::post('/admin/danh-sach-banner/update/{id}','ImgController@update')->name('update-banner');
Route::get('/admin/danh-sach-banner/edit/{id}','ImgController@edit')->name('edit-banner');
Route::get('/admin/danh-sach-banner/delete/{id}','ImgController@destroy')->name('del-banner');
Route::get('/admin/danh-sach-banner','ImgController@index');
//thông báo chung
Route::post('/danh-sach-thong-bao/update/{id}','NotificationController@update')->name('update-noti');
Route::get('/admin/danh-sach-thong-bao/edit/{id}','NotificationController@edit')->name('edit-noti');
Route::post('/admin/danh-sach-thong-bao/create','NotificationController@store')->name('create-noti');
Route::get('/admin/danh-sach-thong-bao/delete/{id}','NotificationController@destroy')->name('del-noti');
Route::get('/admin/danh-sach-thong-bao','NotificationController@index');

//Quản lí giá vip
 Route::post('admin/danh-sach-gia-vip/update/{id}','PriceTypePostController@update')->name('update-price');
 Route::get('/admin/danh-sach-gia-vip/edit/{id}','PriceTypePostController@edit')->name('edit-price');
// Route::post('/admin/danh-sach-thong-bao/create','NotificationController@store')->name('create-noti');
 Route::get('/admin/danh-sach-gia-vip/delete/{id}','PriceTypePostController@destroy')->name('del-price');
Route::get('/admin/danh-sach-gia-vip','PriceTypePostController@index');
// Quản lý tin đăng


//  admin
Route::get('admin/index','AdminController@index')->middleware('admin.auth')->name('admin-dashboard');
//Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');


//Wallet
Route::get('admin/wallet','WalletController@index')->name('wallet');
Route::get('admin/wallet/detail/{id}','WalletController@Detail_payment')->name('detail-wallet');
Route::post('admin/wallet/add','WalletController@addWallet')->name('add-wallet');
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
Route::get('/index/tin-tuc/danh-muc/{slug}','NewsController@getNewsbyCate');
Route::get('admin/index/profile/delete/{id}','UserController@destroy');
// Route quản lí tin đã đăng của user
// Route::get('/my-article/{id}','UserControllers@getPostbyID');
// User: thay đổi trạng thái user
Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');

Route::get('/news/{slug}','NewsController@show');
// quản lý tin tứcf

Route::POST('/admin/index/news/insert','NewsController@store'
);
// news list

// route admin- danh muc
// Route::get('/admin/danh-sach-danh-muc',function(){
//     return view('/admin/danhmuc/danhsachdanhmuc');
// });
// Tin tức theo danh mục
Route::get('admin/index/profile/delete/{id}','UserController@destroy');
// Route quản lí tin đã đăng của user
// Route::get('/my-article/{id}','UserControllers@getPostbyID');
// User: thay đổi trạng thái user
Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');

Route::get('/tin-tuc/{slug}','NewsController@show');
// đăng tin tức
Route::get('/admin/cap-nhat-tin-tuc','NewsController@getcate');
Route::POST('/admin/index/news/insert','NewsController@store');
// get tất cả các tin đang có
Route::get('/index/tin-tuc/','NewsController@listnews');
// get những bài tin tức bằng tag
Route::get('/index/tin-tuc/tu-khoa/{tags}','NewsController@getpostsbytag');
// quản lí tin tức

// ===================danh mục tin tức======================
Route::get('/admin/danh-muc-tin-tuc','NewsCategoryController@index')->name('news_category.index');
Route::post('/admin/danh-muc-tin-tuc/them-moi/','NewsCategoryController@store')->name('news_category.add');

Route::delete('/admin/index/danh-muc-tin-tuc/xoa-danh-muc/{id}','NewsCategoryController@destroy')->name('news_category.destroy');
Route::put('/admin/index/danh-muc-tin-tuc/sua-danh-muc/{id}','NewsCategoryController@update')->name('news_category.update');

Route::get('/admin/index/danh-muc-tin-tuc/xoa-het','NewsCategoryController@deleteall')->name('newsletter_deleteall');
Route::get('/admin/index/tin-tuc/xoa-het','NewsController@deleteall')->name('news_deleteall');

// Newsletter
Route::post('/sub','NewsLetterController@subscribe')->name('newsletter.subscribe');
Route::get('/admin/index/quan-ly-thu-tin-tuc','NewsLetterController@index')->name('newsletter.admin.index');
#export
Route::get('/admin/index/quan-ly-thu-tin-tuc/export','NewsLetterController@export')->name('table.export');
// import
Route::post('/admin/index/quan-ly-thu-tin-tuc/import', 'NewsLetterController@import')->name('table.import');
// tag insert keyword
Route::post('/insert','NewsController@insertTag')->name('tag.insert');

#Insert từ khoá
// Route::post('/admin/index/quan-ly-tu-khoa/insert','TagController@store')->name('tag.insert');
// Email
Route::post('/send-email','NewsLetterController@send_email');

// ====== Danh mục tin tức====================

// Route::post('/admin/danh-muc-tin-tuc/them-moi/','NewsController@store')->name('news_category.add');

// Route::delete('/admin/index/danh-muc-tin-tuc/xoa-tin-muc/{id}','NewsCategoryController@destroy')->name('news_category.destroy');
Route::DELETE('/admin/index/danh-muc-tin-tuc/xoa-tin-tuc/{id}','NewsController@destroy')->name('news.delet');
Route::put('/admin/index/danh-muc-tin-tuc/sua-tin-tuc/{id}','NewsController@update')->name('news.update');

Route::post('/admin/index/danh-muc-tin-tuc/checkunique={input}','NewsCategoryController@checkunique')->name('news_category.unique');


Route::get('/admin/quan-li-tin-tuc/changestatus','NewsController@ChangeNewsStatus');
