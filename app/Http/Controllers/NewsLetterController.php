<?php

namespace App\Http\Controllers;
// use Brian2694\Toastr\Toastr;
// use Illuminate\Http\Request;
use Toastr;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\NewsLettersExport;
use App\Imports\NewsLettersImport;

use Newsletter;
use App\Newsletters2;

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
            $newsletters->email = $request->email;
            Newsletter::subscribe($request->email);
            // dd(true);
            $newsletters->save();
            Toastr::success('Đăng kí thành công :)','Thông báo');
            // $user -> save();\
        }
        else{
            Toastr::success('Đăng kí thất bài :(','Thông báo');
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
    // send campaign
    // public function send_email(Request $request){

    //     //List ID from .env
    //     $listId = env('MAILCHIMP_LIST_ID');

    //     //Mailchimp instantiation with Key
    //     $mailchimp = new \Mailchimp(env('MAILCHIMP_APIKEY'));

    //     //Thông tin thư gửi đến những khách hàng đã subscribe
    //     $campaign = $mailchimp->campaigns->create('regular', [
    //         'list_id' => $listId,

    //         'campaign_content' => $request->input('content'),
    //         'subject' => 'Laravel-quảng cáo',
    //         'from_email' => $request->input('from_email'),
    //         'from_name' => $request->input('from_name'),
    //         // 'content' => $request->input('content'),
    //         // 'template_id'=>''
    //         // 'content'=>'Học asdasds',
    //         // 'content' => $request->input('content'),
    //         'template_id'=>'407832',
    //         'subject'=>'Test',
    //         'to_name' => 'Bùi Nguyễn Hoàng Thọ',
    //     ],
    //      [
    //         'html' => $request->input('content'),
    //         'text' => strip_tags($request->input('content')),
    //     ]);
    //     $mailchimp->campaigns->send($campaign['id']);
    //     dd($campaign);
    //     return response()->json([
    //         'html'=> $request->input('content'),
    //     ]);
    // }
}

