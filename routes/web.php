<?php
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\ProductController;
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



Route::post('/add-favorited', 'API\FavoriteController@addFavorite')->middleware(['auth'])->name('add-favorite');
Route::get('/favorites/all', 'API\FavoriteController@allFavorite')->middleware(['auth'])->name('all-favorite');
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout'); // Đăng xuất
Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');                                // Trang chủ
Route::get('/compares', 'API\CompareController@index')->name('compare');        // So sánh
Route::get('/contact', function () {
    return view('pages/contact');
});        // liên hệ
Route::get('/about', function () {
    return view('pages/about');
}); //giới thiệu
Route::get('/article/{slug}', 'ProductController@show')->name('article-detail');               // Chi tiết tin đăng
//Danh mục
Route::get('/get-district/{id}', 'API\GetZone@getDistrictByProvince');
Route::get('/get-content-province/{id}', 'API\GetZone@contentProvince');
Route::get('/get-ward/{id}', 'API\GetZone@getWardByDistrict');


Route::get('/mua-ban-nha-dat', 'SearchController@getByCate')->name('cate1'); // Danh mục 1
Route::get('/cho-thue-nha-dat', 'SearchController@getByCate')->name('cate2'); // Danh mục 2
Route::get('/sang-nhuong-nha-dat', 'SearchController@getByCate')->name('cate3'); // Danh mục 3
Route::get('/search/', 'SearchController@index')->name('search');                // Tìm kiếm, lọc tin
Route::get('/searchmobi', 'SearchController@searchMobile')->name('searchmob');   // Tìm kiếm giao diện mobile
//Route::get('/search/filter/','SearchController@filter')->name('filter');


Route::post('/user/create-payment', 'PaymentController@create')->name('create-payment'); // Nạp tiền
Route::get('/user/return-payment', 'PaymentController@return')->name('return-payment');  // Trả về kết quả nạp tiền

// Đăng tin
Route::get('/user/my-article/{id}', 'ProductController@getByUser')->name('user-article');  // Quản lý tin của user


//Profile
//Update profile
Route::post('/user/update/{id}', 'UserController@update')->name('user-update');   // cập nhật thông tin user
Route::post('/user/changepass/{id}', 'UserController@changePassword')->name('user-changePassword');  // Thay đổi mật khẩu
//Change password


Route::post('/contact/create','ContactController@store')->name('up-contact');
 //User
//  auth = aka đăng nhập để xem
Route::middleware(['auth'])->group(function(){
    Route::get('/favourites', 'ProductController@productUserFavorite')->name('favorites');      // Yêu thích
    Route::get('/history', 'ProductController@productUserHistory')->name('history');              // Lịch sử xem tin
    
    Route::get('/user/profile', 'UserController@profileUser')->name('profile');          // thông tin user của người login1
    Route::get('/profile/{username}', 'UserController@profileDetail')->name('profile_username');   //Thông tin userr khác
    Route::get('/user/password', 'UserController@formpassword')->name('change-password');          // Thay đổi mật khẩu
    Route::get('/user/add-money', 'UserController@formaddmoney')->name('add-money');               //
    Route::get('/user/payment-history', 'UserController@paymentHistory')->name('payment-history'); // Lịch sử nạp tiền user
});
    Route::middleware(['verified'])->group(function (){
    // route nào cần xác minh tài khoản thì mấy bố vui lòng bỏ hết vào đây
    Route::post('/user/create-payment', 'PaymentController@create')->name('create-payment'); // Nạp tiền
    Route::get('/user/return-payment', 'PaymentController@return')->name('return-payment');  // Trả về kết quả nạp tiền
    // Đăng tin
    Route::get('/user/my-article/{id}', 'ProductController@getByUser')->name('user-article');  // Quản lý tin của user
        // Lịch sử xem tin
    //Profile
    //Update profile
    Route::post('/user/update/{id}', 'UserController@update')->name('user-update');   // cập nhật thông tin user
    Route::post('/user/changepass/{id}', 'UserController@changePassword')->name('user-changePassword');  // Thay đổi mật khẩu
    //Change password
    Route::get('/article/new/{cate}', 'ProductController@create')->name('new');         // Form Đăng tin
    Route::get('/article/delete/{id}', 'ProductController@destroy')->name('delete-article');       // Xóa tin đăng
    Route::get('/article/edit/{id}', 'ProductController@edit')->name('edit-article');              // Form chỉnh sửa
    Route::get('/article/add-date/{id}', 'ProductController@addDateForm')->name('add-date-form');  // Form Gia hạn tin
    Route::post('/article/add-date', 'ProductController@addDate')->name('add-date-article');       // Gia hạn tin
    Route::get('/user/article-posted', 'UserController@articleposted')->name('article-posted');    // Danh sách tin đã đăng của user
    Route::get('/user/article-wait', 'UserController@articlewait')->name('article-wait');          // Danh sách tin đang chờ của user
    Route::get('/user/article-expire', 'UserController@articlexpire')->name('article-expire');     // Danh sách tin hết hạn
    Route::post('/article/new/store', 'ProductController@store')->name('article-store');           // User Đăng tin
    Route::post('/article/update/{id}', 'ProductController@update')->name('update-article');       // User chỉnh sửa tin đã đăng
    });
    Route::group(['middleware' => ['auth', 'admin.auth']], function() {

    //Nạp tiền
    //danh sách admin
    Route::get('/admin/admin-list', 'UserController@admin_list')->name('admin-list');      // Danh sách Admin
    Route::get('/admin/add-admin/{id}', 'UserController@addAdmin')->name('add-admin');     // Thêm quyền admin
    Route::get('/admin/destroy-admin/{id}', 'UserController@destroyAdmin')->name('destroy-admin');  // Hủy quyền admin
    //  admin

    Route::get('admin/index', 'AdminController@index')->middleware('admin.auth')->name('admin-dashboard'); // Trang chủ quản trị, thống kê
    //Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');

    //Wallet
    Route::get('admin/wallet', 'WalletController@index')->name('wallet');                              // Nạp tiền thủ công
    Route::get('admin/wallet/detail/{id}', 'WalletController@Detail_payment')->name('detail-wallet');  // Chi tiết tiền user
    Route::post('admin/wallet/add', 'WalletController@addWallet')->name('add-wallet');                 // Thêm tiền user
    Route::post('admin/wallet/sub', 'WalletController@subWallet')->name('sub-wallet');                 // Trừ tiiền user

    Route::post('/admin/danh-sach-danh-muc/create', 'CategoryController@store')->name('create-cate');        // Form tạo danh sách danh mục
    Route::post('/admin/danh-sach-danh-muc/update/{id}', 'CategoryController@update')->name('update-cate');  // Cập nhật danh mục
    Route::get('/admin/danh-sach-danh-muc/delete/{id}', 'CategoryController@destroy')->name('delete-cate');  // Xóa danh mục
    Route::get('/admin/danh-sach-danh-muc/edit/{id}', 'CategoryController@edit')->name('edit-cate');         // Form chỉnh sửa danh mục
    Route::get('/admin/danh-sach-danh-muc', 'CategoryController@index');                                     //
    Route::get('/admin/danh-sach-tin-tuc/delete/{id}', 'NewsController@destroy')->name('delete-new');
    Route::get('/admin/danh-sach-tin-tuc/edit/{id}', 'NewsController@edit')->name('edit-new');
    Route::get('/admin/danh-sach-tin-tuc', 'NewsController@index')->name('newscate-index');
    // province
    Route::post('/admin/danh-sach-province/update/{id}', 'ProvinceController@update')->name('update-province');
    Route::get('/admin/danh-sach-province/edit/{id}', 'ProvinceController@edit')->name('edit-province');
    Route::get('/admin/danh-sach-province', 'ProvinceController@index');
    //duyet tin
    Route::get('/admin/danh-sach-duyet-tin', 'HistoryPostController@index');
    //Route::post('/admin/danh-sach-duyet-tin/update/{id}','HistoryPostController@update')->name('duyet-new');
    Route::get('/admin/danh-sach-duyet-tin/show/{id}', 'HistoryPostController@show')->name('show-tintuc');
    Route::get('/admin/danh-sach-duyet-tin/cancel/{id}', 'HistoryPostController@cancelPost')->name('cancel-post');
    Route::get('/admin/danh-sach-duyet-tin/delete/{id}', 'HistoryPostController@destroy')->name('del-post');
    Route::get('/admin/post-history/update/dsds/{id}', 'HistoryPostController@updatePost')->name('update-post');

    //Banner
    Route::post('/admin/danh-sach-banner/create', 'ImgController@store')->name('create-banner');
    Route::post('/admin/danh-sach-banner/update/{id}', 'ImgController@update')->name('update-banner');
    Route::get('/admin/danh-sach-banner/edit/{id}', 'ImgController@edit')->name('edit-banner');
    Route::get('/admin/danh-sach-banner/delete/{id}', 'ImgController@destroy')->name('del-banner');
    Route::get('/admin/danh-sach-banner', 'ImgController@index');
    //thông báo chung
    Route::post('/danh-sach-thong-bao/update/{id}', 'NotificationController@update')->name('update-noti');
    Route::get('/admin/danh-sach-thong-bao/edit/{id}', 'NotificationController@edit')->name('edit-noti');
    Route::post('/admin/danh-sach-thong-bao/create', 'NotificationController@store')->name('create-noti');
    Route::get('/admin/danh-sach-thong-bao/delete/{id}', 'NotificationController@destroy')->name('del-noti');
    Route::get('/admin/danh-sach-thong-bao', 'NotificationController@index');
    //Quản lí giá vip
    Route::post('admin/danh-sach-gia-vip/update/{id}', 'PriceTypePostController@update')->name('update-price');
    Route::get('/admin/danh-sach-gia-vip/edit/{id}', 'PriceTypePostController@edit')->name('edit-price');
    // Route::post('/admin/danh-sach-thong-bao/create','NotificationController@store')->name('create-noti');
    Route::get('/admin/danh-sach-gia-vip/delete/{id}', 'PriceTypePostController@destroy')->name('del-price');
    Route::get('/admin/danh-sach-gia-vip', 'PriceTypePostController@index');
    // Quản lý tin đăng

    // ================= hồ sơ ==================
    // update thông tin hồ sơ cá nhân
    // Route admin - user
    Route::get('admin/index/profiles', 'UserController@index');
    Route::get('admin/index/profile/{id}', 'UserController@getprofileDetail');
    // route admin- sản phẩm
    Route::get('/admin/list-product', function () {
        return view('admin/sanpham/danhsachsanpham');
    });
    // Route quản lí tin đã đăng của user
    // Route::get('/my-article/{id}','UserControllers@getPostbyID');
    // User: thay đổi trạng thái user
    Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
    // Tin tức theo danh mục
    Route::get('/tin-tuc/danh-muc/{slug}', 'NewsController@getNewsbyCate');
    // xoa nguoi dung
    // Route::get('/admin/index/profile/delete/{id}', 'UserController@destroy');
    Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
    Route::POST('/admin/index/news/insert', 'NewsController@store'); // thêm tin tức
    Route::get('admin/index/profile/delete/{id}', 'UserController@destroy');
    Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
    Route::get('/admin/cap-nhat-tin-tuc', 'NewsController@getcate');
    Route::POST('/admin/index/news/insert', 'NewsController@store');
    Route::get('/admin/danh-muc-tin-tuc', 'NewsCategoryController@index')->name('news_category.index');
    Route::post('/admin/danh-muc-tin-tuc/them-moi/', 'NewsCategoryController@store')->name('news_category.add');
    Route::get('/admin/index/danh-muc-tin-tuc/xoa-danh-muc/{id}', 'NewsCategoryController@destroy')->name('news_category.destroy');
    Route::put('/admin/index/danh-muc-tin-tuc/sua-danh-muc/{id}', 'NewsCategoryController@update')->name('news_category.update');
    Route::get('/admin/index/danh-muc-tin-tuc/xoa-het', 'NewsCategoryController@deleteall')->name('newsletter_deleteall');
    Route::get('/admin/index/tin-tuc/xoa-het', 'NewsController@deleteall')->name('news_deleteall');
    Route::get('/admin/index/quan-ly-thu-tin-tuc', 'NewsLetterController@index')->name('newsletter.admin.index')->middleware('admin.auth');
    #export
    Route::get('/admin/index/quan-ly-thu-tin-tuc/export', 'NewsLetterController@export')->name('table.export');
    // import
    Route::post('/admin/index/quan-ly-thu-tin-tuc/import', 'NewsLetterController@import')->name('table.import');
    Route::DELETE('/admin/index/danh-muc-tin-tuc/xoa-tin-tuc/{id}', 'NewsController@destroy')->name('news.delet');
    Route::put('/admin/index/danh-muc-tin-tuc/sua-tin-tuc/{id}', 'NewsController@update')->name('news.update');
    Route::post('/admin/index/danh-muc-tin-tuc/checkunique={input}', 'NewsCategoryController@checkunique')->name('news_category.unique');
    Route::get('/admin/quan-li-tin-tuc/changestatus', 'NewsController@ChangeNewsStatus');
    Route::post('/admin/danh-sach-danh-muc/create', 'CategoryController@store')->name('create-cate');
    Route::post('/admin/danh-sach-danh-muc/update/{id}', 'CategoryController@update')->name('update-cate');
    Route::get('/admin/danh-sach-danh-muc/delete/{id}', 'CategoryController@destroy')->name('delete-cate');
    Route::get('/admin/danh-sach-danh-muc/edit/{id}', 'CategoryController@edit')->name('edit-cate');
    Route::get('/admin/danh-sach-danh-muc', 'CategoryController@index');
    /////////////////////////////////////////
    Route::get('/admin/danh-sach-tin-tuc/delete/{id}', 'NewsController@destroy')->name('delete-new');
    Route::get('/admin/danh-sach-tin-tuc/edit/{id}', 'NewsController@edit')->name('edit-new');
    Route::get('/admin/danh-sach-tin-tuc', 'NewsController@index')->name('newscate-index');
    // province
    Route::post('/admin/danh-sach-province/update/{id}', 'ProvinceController@update')->name('update-province');
    Route::get('/admin/danh-sach-province/edit/{id}', 'ProvinceController@edit')->name('edit-province');
    Route::get('/admin/danh-sach-province', 'ProvinceController@index');

    //duyet tin
    Route::get('/admin/danh-sach-duyet-tin', 'HistoryPostController@index');
    //Route::post('/admin/danh-sach-duyet-tin/update/{id}','HistoryPostController@update')->name('duyet-new');
    Route::get('/admin/danh-sach-duyet-tin/show/{id}', 'HistoryPostController@show')->name('show-tintuc');
    Route::get('/admin/danh-sach-duyet-tin/cancel/{id}', 'HistoryPostController@cancelPost')->name('cancel-post');
    Route::GET('/admin/danh-sach-duyet-tin/delete/{id}', 'HistoryPostController@destroy')->name('del-post');
    Route::get('/admin/post-history/update/dsds/{id}', 'HistoryPostController@updatePost')->name('update-post');
    //Banner
    Route::post('/admin/danh-sach-banner/create', 'ImgController@store')->name('create-banner');
    Route::post('/admin/danh-sach-banner/update/{id}', 'ImgController@update')->name('update-banner');
    Route::get('/admin/danh-sach-banner/edit/{id}', 'ImgController@edit')->name('edit-banner');
    Route::get('/admin/danh-sach-banner/delete/{id}', 'ImgController@destroy')->name('del-banner');
    Route::get('/admin/danh-sach-banner', 'ImgController@index');
    //thông báo chung
    Route::post('/danh-sach-thong-bao/update/{id}', 'NotificationController@update')->name('update-noti');
    Route::get('/admin/danh-sach-thong-bao/edit/{id}', 'NotificationController@edit')->name('edit-noti');
    Route::post('/admin/danh-sach-thong-bao/create', 'NotificationController@store')->name('create-noti');
    Route::get('/admin/danh-sach-thong-bao/delete/{id}', 'NotificationController@destroy')->name('del-noti');
    Route::get('/admin/danh-sach-thong-bao', 'NotificationController@index');
    //Quản lí giá vip
    Route::post('admin/danh-sach-gia-vip/update/{id}', 'PriceTypePostController@update')->name('update-price');
    Route::get('/admin/danh-sach-gia-vip/edit/{id}', 'PriceTypePostController@edit')->name('edit-price');
    // Route::post('/admin/danh-sach-thong-bao/create','NotificationController@store')->name('create-noti');
    Route::get('/admin/danh-sach-gia-vip/delete/{id}', 'PriceTypePostController@destroy')->name('del-price');
    Route::get('/admin/danh-sach-gia-vip', 'PriceTypePostController@index');
    //Quản lí contact
    Route::get('/admin/danh-sach-contact', 'ContactController@index');
    Route::get('admin/index/profiles', 'UserController@index');
    Route::get('admin/index/profile/{id}', 'UserController@getprofileDetail');
    // route admin- sản phẩm
    Route::get('/admin/list-product', function () {
    return view('admin/sanpham/danhsachsanpham');
    });
    Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
    Route::get('admin/index/profile/delete/{id}', 'UserController@destroy');
    Route::get('/admin/danh-sach-tin-tuc/changestatus', 'NewsController@ChangeNewsStatus');
    Route::get('/admin/danh-muc-tin-tuc/changestatus', 'NewsCategoryController@ChangeNewsCategoryStatus');
    // ẩn hiện tin tức
    Route::POST('/admin/index/news/insert', 'NewsController@store');
    Route::get('admin/index/profile/delete/{id}', 'UserController@destroy');
    // Route quản lí tin đã đăng của user
    // Route::get('/my-article/{id}','UserControllers@getPostbyID');
    // User: thay đổi trạng thái user
    Route::get('/admin/quan-ly-danh-muc/postbyiduser/{id}','UserController@getBaiVietByID');
    Route::get('/admin/changestatus', 'UserController@ChangeUserStatus');
    Route::get('/admin/index/quan-ly-thu-tin-tuc/products/{id}/{idcity}','ProductController@Productbyprovince');
    Route::delete('/admin/index/quan-ly-thu-tin-tuc/unsub/{email}', 'NewsLetterController@unsubscribe');
    Route::post('/admin/danh-sach-contact/phanhoi/{id}','ContactController@phanhoi');
    });
// Đăng kí
    Route::post('/create-user', 'Auth\RegisterController@create')->name('createUser');
    Route::get('/new-detail', function () {
        return view('pages/new-detail');
    });
    Route::get('/new-list/index', function () {
        return view('pages/new-list');
    });
    Route::get('/forgot-password', function () {
        return view('auth/passwords/email');
    });
    Route::get('/san-pham', function () {
        return view('pages/san-pham');
    });
    Route::get('/tin-tuc/danh-muc/{slug}', 'NewsController@getNewsbyCate');
    Route::get('/news/{slug}', 'NewsController@show');
    Route::get('/tin-tuc/{slug}', 'NewsController@show');
    Route::get('tin-tuc', 'NewsController@listnews');
    Route::post('/sub', 'NewsLetterController@subscribe')->name('newsletter.subscribe');
    Route::post('/send-email', 'NewsLetterController@send_email');
    Route::post('/guithu','NewsLetterController@guithu');
    Route::get('/resend','Usercontroller@resendEmail');
