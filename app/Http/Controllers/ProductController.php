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
        $price = $request->price.$unit;
        $filter_price = FilterPrice::where('min','<=',$price)->where('max','>=',$price)->get();
        $product = new Product([
            'cate_id'        => $request->cate_id,
            'title'          => $request->title,
            'slug'           => Str::slug($request->title),
            'view'           => NULL,
            'tags'           => $request->tags,
            'datetime_start' => $request->datetime_start,
            'datetime_end'   => $request->datetime_end,
            'content'        => $request->content,
            'name_contact'   => $request->name_contact,
            'phone_contact'     => $request->phone,
            'address_contact'   => $request->address_user,
            'company_name'   => $request->company_name,
            'email'          => $request->email,
            'website'        => $request->website,
            'facebook'       => $request->facebook,
            'status'         => 0,
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
            'product_cate' => json_encode($request->product_cate),
            'filter_price' => $filter_price,
            'address'      => $request->address_product,
            'facedes'      => $request->facedes,
            'depth'        => $request->depth,
            'acreage'      => $request->acreage,
            'floors'       => $request->floors,
            'bedroom'      => $request->bedroom,
            'price'        => $request->price,
            'unit_id'      => $request->unit_id,
            'legal'        => $request->legal,
        ]);
        $productex->save();

        $productimg = new ProductImg([
            'product_extend_id' => $productex->id,
            'name'              => $request->nameimg,
            'orders'            => NULL,
        ]);
        $productimg->save();

        

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
}
