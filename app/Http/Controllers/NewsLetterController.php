<?php

namespace App\Http\Controllers;
// use Brian2694\Toastr\Toastr;
// use Illuminate\Http\Request;
use Toastr;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\NewsLettersExport;
use App\Imports\NewsLettersImport;
use App\Mail\NewsLetter as MailNewsLetter;
use Newsletter;
use Mail;
use App\Newsletters2;
use App\Models\News;

// use App\Models\Newsletters2;
// use Mailchimp;
class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = Newsletters2::all();
        return view('admin.thutintuc.quanlythutintuc',compact('newsletter'));
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
    public function subscribe(Request $request){
        $newsletters = new Newsletters2();

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe(filter_var($request->email, FILTER_VALIDATE_EMAIL));
            $newsletters->email = $request->email;

            $newsletters->save();
            Toastr::success('Đăng kí thành công ','Thông báo');
            // $user -> save();\
        }
        else{
            Newsletter::getLastError();
            Toastr::success('Đăng kí thất bại','Thông báo');
        }
        return redirect()->back();
    }
    public function export(){
        return Excel::download(new NewsLettersExport, 'NewsLetters.xlsx');

    }
    public function import(Request $request){


        // $request->file('import_file')->isValid(){
	if ($request->file('import_file')) {
        $import = \Excel::import(new NewsLettersImport, request()->file('import_file'));
        Toastr::success('Cập nhật file excel thành công!  :)','Thông báo');
        // dd('Có file');
        return redirect()->back()->with('success', 'Success!!!');

    }
    else{
        Toastr::error('Không thành công! Vui lòng làm lại !  :)','Thông báo');
        // dd('Có file');
        return redirect()->back()->with('success', 'Success!!!');
    }
    }
    // mail_manager

    public function send_email(Request $request){
        // thêm subject

        $mails = Newsletters2::pluck('email')->toArray();
        // get những tin tức mới nhất trong tuần

        $contents = $request->input("contents");
        $news = News::all();
        Mail::send('email.newsletter', ['contents' => $contents,'news'=>$news],function ($message) use($request,$mails) {

            $message->from("buinguyenhoangtho1997@gmail.com");
            $message->to($mails)->subject('Alt Support');

        });
        toastr::success('Gủi thư thành công','Hệ thống');
        return redirect()->back();
    }

}

