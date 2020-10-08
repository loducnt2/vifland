<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\ProductExtend;
use App\Models\ProductUnit;
use App\Models\ProductCate;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\PostHistory;
use App\Models\FilterPrice;
use App\Models\TypeProduct;
use Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cate)
    {
        $product_cate = ProductCate::all(); 
        $wards        = Ward::orderBy('name','asc')->get(); 
        $districts    = District::orderBy('name','asc')->get();
        $provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $cate_1       = Category::where('slug',$cate)->first(); //Lấy id category thông qua slug
        $cate_2       = Category::where('parent_id',$cate_1->id)->get();//Lấy category con
        if($cate == "cho-thue-nha-dat"){
            $units   = ProductUnit::where('type',2)->orwhere('type',0)->get();//Lấy đơn vị theo category cha
        }elseif($cate == "mua-ban-nha-dat"){
            $units   = ProductUnit::where('type',1)->orwhere('type',0)->get();//Lấy đơn vị theo category cha
        }else{
            $units   = ProductUnit::all();
        }
        
        return view('/pages/article',compact('cate_2','units','provinces','districts','wards','product_cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        
        $unit = ProductUnit::where('id',$request->unit_id)->value('description');
        $price = doubleval($request->price)*intval($unit);
        $filter_price = FilterPrice::where('min','<=',$price)->where('max','>=',$price)->value('id');
        $product = new Product([
            'cate_id'        => $request->cate_id,
            'title'          => $request->title,
            'slug'           => Str::slug($request->title),
            'view'           => 1,
            'tags'           => $request->tags,
            'datetime_start' => date('Y-m-d H:i:s',strtotime($request->datetime_start)),
            'datetime_end'   => date('Y-m-d H:i:s',strtotime($request->datetime_end)),
            'content'        => $request->content,
            'name_contact'   => $request->name_contact,
            'phone_contact'     => $request->phone_contact,
            'address_contact'   => $request->address_contact,
            'company_name'   => $request->company_name,
            'email'          => $request->email,
            'website'        => $request->website,
            'facebook'       => $request->facebook,
            //'status'         => 0,
            'type'           => $request->type,
            'orders'         => NULL,
            'province_id'    => $request->province_id,
            'district_id'    => $request->district_id,
            'ward_id'        => $request->ward_id,
            'soft_delete'    => 0,
        ]);
        $product->save();
        
        $productex = new ProductExtend([
            'product_id'   => $product->id,
            'product_cate' => implode(',',$request->product_cate),
            'filter_price' => $filter_price,
            'address'      => $request->address_product,
            'facades'      => $request->facades,
            'depth'        => $request->depth,
            'floors'       => $request->floors,
            'bedroom'      => $request->bedroom,
            'price'        => $request->price,
            'unit_id'      => $request->unit_id,
            'legal'        => implode(',',$request->legal),
        ]);
        $productex->save();

        if ($request->hasFile('img')){
            $arrfile = [];
            $file = $request->file('img');
            foreach( $file as $img ){
                $filetype = $img->getClientOriginalExtension('image');
                $filename = date('Ymd',time()).'product'.$productex->id.Str::random(10).'.'.$filetype;
                $filesave = 'product'.'-'.$productex->id.Str::random(10).'.'.$filetype;

                $img->move(public_path('/assets/product/'),$filesave);
                /*move_uploaded_file($filesave,asset('/assets/product/'));*/
                $arrfile[]= $filename;
            }

            foreach( $arrfile as $imgpro ){

                $productimg = new ProductImg([
                    'product_extend_id' => $productex->id,
                    'name'              => $imgpro,
                    'orders'            => NULL,
                ]);
                $productimg->save();
            }

        }

        foreach($request->product_cate as $prodcate){
            $product_cate = new TypeProduct([
                'product_extend_id' => $productex->id,
                'product_cate_id'   => $prodcate,
            ]);
            $product_cate->save();
        }
        
            


        

        

        $post_history = new PostHistory([
            'user_id'        => auth()->user()->id,
            'product_id'     => $product->id,
            'status'         => 0,
            'datetime'       => date('Y-m-d H:i:s',strtotime('now')),
        ]);
        $post_history->save();
        return redirect()->route('user-article');

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
    public function update(Request $request, $id)
    {
        //
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

    public function getByCateSlug1(){
        $cate           = Category::where('slug','mua-ban-nha-dat')->first();
        $cate_id        = $cate->id;
        $cate_child     = Category::where('parent_id',$cate_id)->get();
        $product_extend = Product::where('cate_id',$cate_id)->get();

        return view('pages/danh-muc',compact('cate_child','product_extend'));
    }

    public function getByCateSlug2(){
        $cate           = Category::where('slug','cho-thue-nha-dat')->first();
        $cate_id        = $cate->id;
        $cate_child     = Category::where('parent_id',$cate_id)->get();
        $product_extend = Product::where('cate_id',$cate_id)->get();

        return view('pages/danh-muc',compact('cate_child','product_extend'));
    }

    public function getByCateSlug3(){
        $cate           = Category::where('slug','sang-nhuong-nha-dat')->first();
        $cate_id        = $cate->id;
        $cate_child     = Category::where('parent_id',$cate_id)->get();
        $product_extend = Product::where('cate_id',$cate_id)->get();

        return view('pages/danh-muc',compact('cate_child','product_extend'));
    }

    public function showByUser(){
        $user_id = auth()->user()->id;

        //các tin chờ xác nhận
        $product_wait1 = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',0)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->get();

        //Tin đã đăng
        $product_posted = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',1)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->get();

        //Tin chờ xác nhận
        $product_wait2 = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',2)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->get();


        //return $product_wait;

        return view('pages/product-manage-user',compact('product_wait1','product_posted','product_wait2'));
    }
}
