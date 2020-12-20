<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PostHistory;
use App\Models\Product;
use App\Models\Category;
use App\Models\TypeProduct;
use App\Models\ProductImg;
use App\Models\Favorited;
use Illuminate\Support\Facades\DB;
use App\User;
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
       ->orderby('product.type', 'asc')
        ->select(
            'product.title as product_title' ,
            'post_history.status as status',
            'post_history.id as post_id',
            'product.id as product_id',
            'product.type as product_type',
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
        $favor= Favorited:: where('product_extend_id',$id);
        $pro->delete();
        $favor->delete();
        
        return redirect('/admin/danh-sach-duyet-tin');
    }
    public function updatePost($id){
        $post = PostHistory::find($id);
        $post->update([
            'status' => 1
        ]);
       return redirect('/admin/danh-sach-duyet-tin');
    }
    public function cancelPost($id){
        //ví tiền của user
        $wallet = PostHistory::where('post_history.product_id',$id)
        ->leftJoin('user','post_history.user_id','user.id')
        ->value('user.wallet');
        //giá tiền đăng bài
        $price_post = Product::where('product.id',$id)
        ->value('product.price_post');
        $product = Product::where('product.id',$id)
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('user','post_history.user_id','user.id')
        ->update([
            'product.soft_delete' => 1,
            'product.datetime_end'=> date('Y-m-d H:i:s',strtotime('now')),
            'product.datetime_delete'=>date('Y-m-d H:i',strtotime('now'.' '.'+'.' '. 7 .' '.'days') ),
            'post_history.status' => 2,
            'user.wallet'         =>  doubleval($wallet + $price_post),
        ]);
        return  redirect()->back();
    }
}
