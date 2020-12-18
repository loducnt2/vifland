<?php

namespace App\Http\Controllers;
// use Brian2694\Toastr\Toastr;
// use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Carbon;
use DB;
use Symfony\Component\Console\Input\Input;
use App\Models\Province;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\NewsLettersExport;
use App\Imports\NewsLettersImport;
use App\Mail\NewsLetter as MailNewsLetter;
use Newsletter;
use Str;
use hamidreza2005\laravelIp\Facades\Ip;
use Mail;
use App\Models\Product;
use App\Newsletters2;
use App\Models\News;
use App\User;
// use App\Models\Newsletters2;
// use Mailchimp;
class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $province = new Province();
        $id_city = $request->input("ID_City");
        $newsletter = Newsletters2::all();
        $products = DB::table('province')->where('id',$id_city)->pluck('id');
        return view('admin.thutintuc.quanlythutintuc',compact('newsletter','products'));
    }



    public function subscribe(Request $request){
                // user chọn nơi chốn
        $location = $request->input("location");

        // hàm id là id sau khi người dùng chọn thành phố sẽ get ra
            $id = Province::where('name',$location)->value('id');
            $newsletters = new Newsletters2();
        if ( !Newsletter::isSubscribed($request->input("email3") ) ) {
            // nếu người dùng đã nhập vào ô input field, ta lưu user vào trong database

            $newsletters->email = $request->input("email3");
            Newsletter::subscribeOrUpdate(filter_var($request->email, FILTER_VALIDATE_EMAIL));
            // lưu bảng id_city
            $newsletters->ID_City = $id;
            $newsletters->IP_Location = $location;
            $newsletters->save();
            Toastr::success('Đăng kí thành công ','Thông báo');
            return redirect()->back();
        }
        else{
            // dd("False");
            Newsletter::getLastError();
            Toastr::error('Email đã được đăng kí','Thông báo');
            return redirect()->back();
        }

    }
    public function export(){
        return Excel::download(new NewsLettersExport, 'NewsLetters.xlsx');

    }

    public function import(Request $request){
	if ($request->file('import_file')) {
       $test= \Excel::import(new NewsLettersImport, request()->file('import_file'));
        Toastr::success('Cập nhật file excel thành công!  :)','Thông báo');

        return redirect()->back()->with('success', 'Success!!!');

    }
    else{
        Toastr::error('Không có dữ liệu! Vui lòng kiểm tra lại !','Thông báo');

        return redirect()->back();
    }
}
    // mail_manager
    public function guithu(Request $request){

    // show các tin tức bất động sản theo vùng miền
        $products = Product::whereIn('title',$request->input("productFilter"))->get();
        $date =Carbon::now()->format('d-m-yy');
        // khu vực

        $contents = $request->input("contents");
        $mails = $request->input("email");
        $news = News::all();
        $user = User::where('email',$mails)->first();
        // hàm query để hiện thị thông tin người đăng kí
        $query = DB::table('user')->where('email',$mails)->first();
        if(!$query){
            // nếu user không có mặt trong database thì sẽ tên họ sẽ để rỗng"
            $nguoinhan = "";
        }
       else{
        $nguoinhan = $user->full_name;
       }
            Mail::send('email.newsletter-one', ['products'=>$products,
            'contents' => $contents,
            'date'=>$date,
            'news'=>$news,
            'nguoinhan' =>$nguoinhan],function ($message) use($request,$mails) {
            // $subject = $request->input("subject");
            $message->from("vifland.fpt@gmail.com");
            $message->to($mails);
            $date =Carbon::now()->format('d-m-yy');
            $location = $request->input("city");
            // dd($location);
           $message->subject("Tin bất động sản ngày ". $date ." Khu vực ".$location );

        });
        toastr::success('Gửi thư thành công','Hệ thống');
        return redirect()->back();
    }

    public function send_email(Request $request){
// gửi tất cả
        $mails = Newsletters2::pluck('email')->toArray();
        $nguoinhan = User::pluck('full_name');
        $result = implode(",",$nguoinhan->all());
        $contents = $request->input("contents");

        $news = News::all();
        Mail::send('email.newsletter',
        ['contents' => $contents,
        'news'=>$news,
        'result'=>$result
        ],function ($message) use($request,$mails) {
            $subject = $request->input("subject");
            $message->from("vifland.fpt@gmail.com");
            $message->to($mails)->subject($subject);

        });
        toastr::success('Gủi thư thành công','Hệ thống');
        return redirect()->back();
    }
    // unsubscribe user theo Username
    public function unsubscribe(Request $request, $email)
    {
        // $newsletter = new Newsletters2();
        $email = $request->email;
        // dd($email);

        Newsletter::unsubscribe($email);
        $newsletter = Newsletters2::where('email',$email)->first();
        $newsletter->delete();

    }
}

