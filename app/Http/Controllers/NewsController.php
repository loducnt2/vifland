<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\News;
use App\Models\NewsCategory;
use Carbon\Carbon;
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
    public function duyettin()
    {
        $news = News::orderBy('id','asc')
        -> where('status',0)
        ->get();

        return view('/admin/tintuc/danhsachduyettin',compact('news'));
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

        $news->title=$request->input('title');
        $news->slug = $request->slug;
        $news->content = $request->input('content');
        // $news->datepost = Carbon::now();
        $news->tags= implode(',',$request->tags);
        // slug tên danh mục khi input vào cột category_slug của news
        $news->category_slug = Str::slug($request->input('category_news_slug'));
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
        // chuyển về trang đã tạo
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

        $news_cate = NewsCategory::all();
        $news = News::paginate(3);
        // tin mới nhất theo create_at
        $latest = DB::table('news')->orderBy('created_at','desc')->get();
        return view('pages/news-list')->with(
            [
                // 'news_cate'=>$news_cate,
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
    public function update()
    {
         //$new = News::find($id);
        // $new->status = 1;
        // $new->save();
        return redirect('/admin/danh-sach-duyet-tin');
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
        return redirect('/admin/danh-sach-tin-tuc');
    }
    public function getpostsbytag($tags){
// news3 = get tất cả các tin theo tags
        $news3 = DB::table('news')->where(
            'tags','like','%'.$tags.'%')->paginate(3);
            // $tags= DB::table('news')->where(
            //     'tags','like','%'.$tags.'%')->first();
            $latest = DB::table('news')->orderBy('created_at','desc')->get();
            // $tags = DB::table('news')->where('tags',$tags)->get();
            return view('pages/postsbytags')->with(
                [
                    // 'tags'=>$tags,
                    'news3'=>$news3,
                    'latest'=>$latest,
                ]);
    }
    // Tin get được từ các danh mục
}

