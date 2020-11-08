<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PostHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Toastr;
use App\User;
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
        $users =User::get();
        return view('admin/nguoidung/quanlynguoidung',compact('users'));
    }

    // profile_user
    public function profileDetail($id){
        $profile = DB::table('user')->find($id);
       //history post trong trang admin
        $posts = PostHistory::where('user_id',$profile->id)
        ->join('product', 'product.id', '=', 'product_id')

        ->get();
        // dd($posts);
        return view('pages/hoso')->with(
        [
            'profile'=>$profile,
            'posts'=>$posts
        ]);

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
        // lịch sử bài đăng

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

        $user -> save();
        return redirect()->back();
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

