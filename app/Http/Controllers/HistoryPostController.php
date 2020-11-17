<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostHistory;
use App\Models\Product;
use App\Models\Category;
use App\Models\TypeProduct;
use App\Models\ProductImg;
use Illuminate\Support\Facades\DB;


class HistoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news = PostHistory::leftJoin('product','post_history.product_id','product.id')
       ->orderby('post_history.status', 'asc')
        ->select(
            'product.title as product_title' ,
            'post_history.status as status',
            'post_history.id as post_id',
            'product.id as product_id',
        )
       
        ->paginate(10);
       
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
        $product = Product::where('product.id',$id)
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->leftJoin('ward','product.ward_id','ward.id')
        ->select(
            'product_extend.*',
            'product.*',
            'product_extend.id as productex_id',
            'province.name as province',
            'district.name as district',
            'ward.name as ward',
            'product_unit.name as unit'
        )
        ->first();
        $product_cate = TypeProduct::where('product_extend_id',$product->productex_id)
        ->leftJoin('product_cate','type_of_product.product_cate_id','product_cate.id')->get();

       $acreage = doubleval( $product->depth*$product->facades );
       $total   = intval($product->price)*$acreage;
       $product->update(['view'=> $product->view + 1 ]);
       $cate    = Category::where('id',$product->cate_id)->value('name');

       $image     = ProductImg::where('product_extend_id',$product->productex_id)->select('name')->get();
       $new = PostHistory:: where('product_id',$id)
       
       ->first();
      
       

        return view('/admin/tintuc/chitietduyettin',compact('product','acreage','total','product_cate','cate','image','new'));
    //return view('pages/article/article',compact('product','acreage','total','product_cate','cate','image'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        $post = PostHistory::where('product_id',$id)
        ->update(
            [
            "status" => 1
        ]); 
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
        $pro = Product::find($id);
        $pro->delete();
        return redirect('/admin/danh-sach-duyet-tin');
    }

    public function updatePost($id){
        $post = PostHistory::find($id);
        $post->update([
            'status' => 1
        ]);
       return redirect('/admin/danh-sach-duyet-tin');
    }
}
