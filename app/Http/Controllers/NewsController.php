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
        $news->slug = $request->input('slug');
        $news->content = $request->input('content');

        $news->datepost = $request->input('datepost');
        $news->status= "1";
        $news->save();
        return redirect()->back();
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
        $news = DB::table('news')->find($id);

        return view('pages/news-detail')->with(
            [
                'news'=>$news,
                // 'posts'=>$posts
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

