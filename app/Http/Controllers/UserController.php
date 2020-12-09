<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PostHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Toastr;
use App;
use Illuminate\Support\Carbon;
use App\User;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Auth\EloquentUserProvider;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get list all user
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        $users =User::where('user_type',0)->paginate(7);

        return view('admin/nguoidung/quanlynguoidung',compact('users'));
    }

    public function admin_list(){
       $admin = User::where('user_type',1)->paginate(7);
       $user = User::select('id','username')->where('user_type',0)->get();
       return view('admin/admin-list/index',compact('admin','user'));
    }
    public function addAdmin($id){
        User::find($id)->update(['user_type'=>1]);
        return redirect()->back();
    }
    public function destroyAdmin($id){
        // huỷ quyền
        User::find($id)->update(['user_type'=>0]);
        Toastr::success('Huỷ quyền thành công','Thông báo');
         return redirect('/login');
    }

    // profile_user
    public function profileDetail($id){
        {

            $profile = User::where('id', '=' , $id);

            if($profile->count()) {
                $profile = $profile->first();
                $posts = PostHistory::where('user_id',$profile->id)
                ->join('product', 'product.id', '=', 'product_id')

                    ->get();

                return view('pages/hoso')->with(
                    [
                        'profile'=>$profile,
                        'posts'=>$posts
                    ]);

            }

            return App::abort(404);
            }
    }
    // hiện thông tin USER ĐANG ĐĂNG NHẬP
    public function profileUser(){
        $id = auth()->user()->id;
        $profile = DB::table('user')->find($id);
       //history post trong trang admin
        $posts = PostHistory::where('user_id',$profile->id)
        ->join('product', 'product.id', '=', 'product_id')

        ->get();
        // dd($posts);
        return view('/pages/user/profile')->with(
        [
            'profile'=>$profile,
            'posts'=>$posts
        ]);

    }
    public function formpassword(){
        $id = auth()->user()->id;
        return view('/pages/user/change-pass',compact('id'));
    }
    public function formaddmoney(){
        $id = auth()->user()->id;
        return view('/pages/user/add-money',compact('id'));
    }
    public function paymentHistory(){
        $id = auth()->user()->id;
        $payment = Payment::where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('/pages/user/payment-history',compact('payment'));
    }
    public function articleposted(){
        $user_id = auth()->user()->id;
        $cate = Category::get();
        $product_posted = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',1)
        ->leftJoin('product','post_history.product_id','product.id')
        ->leftJoin('product_extend','post_history.product_id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->orderBy('datetime_start','desc')
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.cate_id',
            'product.thumbnail',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.type',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->get();
        return  view('/pages/user/article-posted',compact('cate','product_posted'));
    }
    public function articlewait(){
        $user_id = auth()->user()->id;
        $cate = Category::get();
        $product_wait = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',0)
        ->leftJoin('product','post_history.product_id','product.id')
        ->leftJoin('product_extend','post_history.product_id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->orderBy('datetime_start','desc')
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.cate_id',
            'product.thumbnail',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.type',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->get();
        return  view('/pages/user/article-wait',compact('cate','product_wait'));
    }
    public function articlexpire(){
        $user_id = auth()->user()->id;
        $cate = Category::get();
        $product_expire = PostHistory::where('user_id',$user_id)
        ->leftJoin('product','post_history.product_id','product.id')
        ->leftJoin('product_extend','post_history.product_id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->where('product.soft_delete',1)
        ->orderBy('datetime_start','desc')
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.cate_id',
            'product.thumbnail',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.type',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit',
            'post_history.status as status'
            //'ward.name as ward'
        )
        ->get();
        return  view('/pages/user/article-expire',compact('cate','product_expire'));
    }







    // user admin
    public function getprofileDetail($id){
        $profile = DB::table('user')->find($id);
       //history post trong trang admin
        $posts = PostHistory::where('user_id',$profile->id)
        ->join('product', 'product.id', '=', 'product_id')

        ->get();
        // dd($posts);
        return view('admin/nguoidung/profile')->with(
        [
            'profile'=>$profile,
            'posts'=>$posts
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {

        $profile = DB::table('user')->find($id);

        // $profile = User::findOrFail($id);
        return view('pages/hoso')->with('profile',$profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update hồ sơ cá nhân theo id
        $user = User::find($id);

        if( $request->get('month') > 0 ){
            $month= $request->get('month');
        }else{
            $month = 1;
        }
        if( $request->get('date') > 0 ){
            $date= $request->get('date');
        }else{
            $date= 1;
        }
        if( $request->get('year') > 0 ){
            $year= $request->get('year');
        }else{
            $year= 1970;
        }

        $dateOfBirth =$date.'-'.$month.'-'.$year;
        $user->birthday = Carbon::parse($dateOfBirth);
        // dd($user->birthday);
        $user->full_name = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->website = $request->website;
        $user->facebook =$request->facebook;
        $user->gender = $request->input('gender');
        // Check nếu có ảnh để upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/avatar/', $imageName);
            $user->img= $imageName;
            }
            else{
            $user->img = "user.png";
            }
            // form sinh nhật

        $user -> save();
        $noti = array(
            'message' => 'Thay đổi thông tin thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noti);
    }

    public function changePassword(request $request ,$id)
    {
        $user = User::find($id);
        $currentpassword =$request->input('password');
        $hashedPassword = User::find($id)->password;
        $newpassword = Hash::make($request->input('newpassword'));
        if (Hash::check($currentpassword, $hashedPassword)) {
                    $user->password = $newpassword;
                    Toastr::success('Thay đổi thành công :)','Thông báo');
    }
    else{
        Toastr::error('Thay đổi thất bại ! Vui lòng thử lại','Thông báo');

    }
    $user -> save();
    return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_image(Request $request){
        $user = new User();
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/avatar/', $imageName);
            $user->img= $imageName;
            }
            else{
            $user->img = "user.png";
            }
            $user->save();
            return response()->json('Image uploaded successfully');

    }
    public function destroy($id)
    {
        //xoá tài khoản
        $user = User::find($id);
        $user->delete();
        // return redirect()->back();
        return redirect('/admin/index/profiles');
    }
    // khoá- mở khoá
    public function ChangeUserStatus(Request $request){
        $user = User::find($request->id);
        $user->status = $request->status;

        $user->save();


    }






    }

