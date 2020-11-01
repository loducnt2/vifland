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
use App\Models\Favorited;
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

        return view('/pages/article/article-form',compact('cate_2','units','provinces','districts','wards','product_cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->input('img');

        $unit = ProductUnit::where('id',$request->unit_id)->value('description');
        $price = doubleval($request->price)*intval($unit);
        $filter_price = FilterPrice::where('min','<=',$price)->where('max','>=',$price)->value('id');
        $product = new Product([
            'cate_id'        => $request->cate_id,
            'title'          => $request->title,
            'slug'           => NULL,
            'view'           => 1,
            'tags'           => $request->tags,
            'datetime_start' => date('Y-m-d',strtotime($request->datetime_start)),
            'datetime_end'   => date('Y-m-d',strtotime($request->datetime_start.' '.'+'.' '. $request->songaydangbai.' '.'days') ),
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
        $productup = Product::find($product->id)->update([
            'slug' => Str::slug($request->title)
            .'-'.date('Ymd',strtotime($request->datetime_start)).str_pad($product->id,5,rand(10000,99999),STR_PAD_LEFT)
        ]);

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
            'legal'        => $request->legal,
        ]);
        $productex->save();

        if ($request->hasFile('img')){
            $arrfile = [];
            $file = $request->file('img');
            foreach( $file as $img ){
                $filetype = $img->getClientOriginalExtension('image');
                $filename = date('Ymd',time()).'product'.$productex->id.Str::random(10).'.'.$filetype;
                //$filesave = 'product'.'-'.$productex->id.Str::random(10).'.'.$filetype;

                $img->move(public_path('/assets/product/'), $filename);
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
        return redirect()->route('user-article',auth()->user()->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)
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

        //Lịch sử xem sản phẩm
        if(auth()->check()){
           $histories = Favorited::where('user_id',auth()->user()->id)->where('product_extend_id',$product->product_id)->get();
           if( count($histories) == 0 ){
               $history = Favorited::create([
                   'user_id'       => auth()->user()->id,
                   'product_extend_id' => $product->product_id,
                   'type'       => 1,
               ]);
           }
        }

        //return $roduct_cate;
        return view('pages/article/article',compact('product','acreage','total','product_cate','cate','image'));
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

        $wards        = Ward::orderBy('name','asc')->get();
        $districts    = District::orderBy('name','asc')->get();
        $provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $title          = 'Mua Bán Nhà Đất';

        $product_by_cate = Category::where('parent_id',1)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        return view('pages/category',compact('cate_child','product_extend','title','product_by_cate','ward','district','provinces'));
    }

    public function getByCateSlug2(){
        $cate           = Category::where('slug','cho-thue-nha-dat')->first();
        $cate_id        = $cate->id;
        $cate_child     = Category::where('parent_id',$cate_id)->get();
        $product_extend = Product::where('cate_id',$cate_id)->get();
        $title          = 'Cho Thuê Nhà Đất';

        $wards        = Ward::orderBy('name','asc')->get();
        $districts    = District::orderBy('name','asc')->get();
        $provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();

        $product_by_cate = Category::where('parent_id',2)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        return view('pages/category',compact('cate_child','product_extend','title','product_by_cate','ward','district','provinces'));
    }

    public function getByCateSlug3(){
        $cate           = Category::where('slug','sang-nhuong-nha-dat')->first();
        $cate_id        = $cate->id;
        $cate_child     = Category::where('parent_id',$cate_id)->get();
        $product_extend = Product::where('cate_id',$cate_id)->get();
        $title          = 'Sang Nhượng Nhà Đất';

        $wards        = Ward::orderBy('name','asc')->get();
        $districts    = District::orderBy('name','asc')->get();
        $provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();

        $product_by_cate = Category::where('parent_id',3)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        return view('pages/category',compact('cate_child','product_extend','title','product_by_cate','ward','district','provinces'));
    }

    public function getByUser(){
        $user_id = auth()->user()->id;

        //các tin chờ xác nhận
        $product_wait1 = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',0)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->orderBy('datetime_start','desc')
        ->get();

        //Tin đã đăng
        $product_posted = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',1)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->orderBy('datetime_start','desc')
        ->get();

        //Tin chờ xác nhận
        $product_wait2 = PostHistory::where('user_id',$user_id)
        ->where('post_history.status',2)
        ->join('product','post_history.product_id','product.id')
        ->join('product_extend','post_history.product_id','product_extend.product_id')
        ->join('product_unit','product_extend.unit_id','product_unit.id')
        ->orderBy('datetime_start','desc')
        ->get();


        //return $product_posted;

        return view('pages/article/article-manage-user',compact('product_wait1','product_posted','product_wait2'));
    }

    public function productUserHistory(){
        $products = Favorited::where('favorited.type',1)
        ->where('user_id',auth()->user()->id)
        ->leftJoin('product','favorited.product_extend_id','product.id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->where('product.datetime_end','>',date('Y-m-d H:i:s',strtotime('now')))
        ->select(
            'product.*',
            'product.id as product_id',
            'product_unit.name as unit',
            'product.title as title',
            'product_extend.price as price',
            'product_extend.facades as facades',
            'product_extend.depth as depth'
        )
        ->get();

        return view('pages/history',compact('products'));
    }

    public function productUserFavorite(){
        $products = Favorited::where('favorited.type',2)
        ->where('user_id',auth()->user()->id)
        ->leftJoin('product','favorited.product_extend_id','product.id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->where('product.datetime_end','>',date('Y-m-d H:i:s',strtotime('now')))
        ->select(
            'product.*',
            'product.id as product_id',
            'product_unit.name as unit',
            'product.title as title',
            'product_extend.price as price',
            'product_extend.facades as facades',
            'product_extend.depth as depth'
        )
        ->get();
        return view('pages/favourites',compact('products'));
    }

}
