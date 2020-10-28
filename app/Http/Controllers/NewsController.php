<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','asc')->get();
        // $newsHidden = News::select('select * from news where id = 1')->get();
        return view('/admin/tintuc/danhsachtintuc',compact('news'));
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
        // insert tin tức
        $news = new News();
        // tags
        $news->tags= implode(',',$request->tags);
        $news->title=$request->input('title');
        $news->slug = $request->slug;
        $news->content = $request->input('content');
        // $news->datepost = Carbon::now();
        $news->datepost = $request->input('datepost');
        $news->status= "1";
        $news->save();
        $news->language ="vn";

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //get chi tiết bài đăng
        $news =  $news = DB::table('news')->where('slug',$slug)->first();

        // get list bài đăng
        $posts= DB::table('news')->get();
        //
        return view('pages/news-detail')->with(
            [
                'news'=>$news,
                'posts'=>$posts,
                'slug'=> $slug
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        return view('/admin/tintuc/quanlytintuc',compact('new'));
    }
    // get những tin trong db
    public function listnews(){
        // lấy mọi tin
        $news = News::all();
        // tin mới nhất theo create_at
        $latest = DB::table('news')->orderBy('created_at','desc')->get();
        return view('pages/news-list')->with(
            [
                'news'=>$news,
                'latest'=>$latest
            ]);
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $new = News::find($id);
        $new->status = 1;
        $new->save();
        return redirect('/admin/danh-sach-tin-tuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $new->delete();
        return redirect('/admin/danh-sach-tin-tuc');
    }
    }

