<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;


use App\Models\News;
use App\Models\NewsCategory;
use Carbon\Carbon;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

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

    public function store(PostsRequest $request)
    {
        // insert tin tức
        $news = new News();
        // tags

        $news->title=$request->input('title');
        $news->slug = $request->slug;
        $news->content = $request->input('content');
        // $news->datepost = Carbon::now();


        // slug tên danh mục khi input vào cột category_slug của news
        $news->category_slug = Str::slug($request->input('category_news_slug'));
        // dd($news->category_slug);
        $news->id_category = $request->input('id_category');
        $news->datepost = $request->input('datepost');
        $news->status= "1";
        // $news->img= "bds_1.jpg";
        $news->language ="vn";
        // up ảnh
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('../public/assets/news', $imageName);
            $news->img= $imageName;
        }
        else{
            $news->img = "bds_1.jpg";
        }
        // $url = "/news/{{$news->slug}}";

        $news->save();
        return redirect("/tin-tuc/$news->slug");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCate()
    {
        // lấy tất cả các danh mục trong tin tức
        $news_cate = NewsCategory::all();


        return view('admin.tintuc.quanlytintuc',compact('news_cate'));
    }
    public function getNewsbyCate($slug)
    {
        $cate = NewsCategory::where('slug',$slug)->first();
        // lấy category_slug
        $posts = News::where('category_slug',$cate->slug)->paginate(3);
        // truyền category_slug và tìm post
        return view('pages/new-by-category')->with(
            [
                'posts'=>$posts,
                // 'cate'=> $cate
            ]);
    }
    public function show($slug)
    {
        //get chi tiết bài đăng
        $news = DB::table('news')->where('slug',$slug)->first();

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
    public function ShowDuyetTin($id)
    {

        $new = DB::table('news')->where('id',$id)->first();
        return view('/admin/tintuc/chitietduyettin',compact('new'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    //     $new = News::firstOrFail($id);
    //     return view('/admin/tintuc/quanlytintuc',compact('new'));
    // }
    // get những tin trong db
    public function listnews(){
            $news = News::paginate(3);
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
    public function update(Request $request,$id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = str::slug($request->title);
        $news->content = $request->content;
        $news->status = "1";
        $news->update();
        return response()->json(
            [

                // 'status'=>$newsCategory->status,
                'title'=>$news->title,
                'id'=>$news->id,
                'content'=>$news->content,
                'slug'=>$news->slug,

                // 'created_at'=>$news_cate->created_at
            ]
        );
        // return redirect('/admin/danh-sach-duyet-tin');
    }
    public function deleteall(){
        // xoá hết tin tức
        News::truncate();
        return redirect()->back();
    }
    public function Anduyettin(Request $request,$id)
    {
            $new = News::find($id);
            $new->status =  1;
            $new->save();
        return redirect('/admin/danh-sach-duyet-tin');
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

    }
    public function getpostsbytag($tags){
// news3 = get tất cả các tin theo tags

            $latest = DB::table('news')->orderBy('created_at','desc')->get();
            return view('pages/postsbytags')->with(
                [
                    // 'tags'=>$tags,

                    'latest'=>$latest,
                ]);
    }

    public function ChangeNewsStatus(Request $request){
        $user = News::find($request->id);
        $user->status = $request->status;
        $user->save();

    }

    // Tin get được từ các danh mục
}

// ẩn hiện bài viết
