<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PostHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\User;
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
    public function profileDetail($id){
        $profile = DB::table('user')->find($id);
        // $profile = User::find($id);
        // $profile = User::findOrFail($id);
        // lấy danh sách các post có cùng id trong posts
        $posts = PostHistory::where('user_id',$profile->id)->get();
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
        //
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
        $user -> save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // profile-detail


    }

