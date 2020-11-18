<?php

namespace App\Http\Controllers;
use DB;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Str;
use Toastr;
use Schema;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        // show all database
        $news_cate = NewsCategory::all();
        return view('admin.tintuc.danhmuctintuc',compact('news_cate'));
    }
    public function deleteall(){
        Toastr::success('Xoá hết thành công','Thông báo');
        Schema::disableForeignKeyConstraints();
        DB::table('news_category')->truncate();
        Schema::enableForeignKeyConstraints();
        return redirect()->back();


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
        // dd($request);
        $news_cate = new NewsCategory();
        // $news_cate->id = $request->id;
        $news_cate->id = $request->id;
        $news_cate->category_name=$request->category_name;
        $news_cate->slug = Str::slug($request->category_name);
        $news_cate->status = "1";
        $news_cate->save();
        return response()->json(
            [

                'status'=>$news_cate->status,
                'id'=>$news_cate->id,
                'category_name'=>$news_cate->category_name,
                'slug'=>$news_cate->slug,
                'created_at'=>$news_cate->created_at
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $newsCategory = new NewsCategory();
        $newsCategory = NewsCategory::find($id);
        $newsCategory->delete();
        return response()->json(['success'=>'Xoá thành công']);
    }
}
