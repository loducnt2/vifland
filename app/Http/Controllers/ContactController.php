<?php

namespace App\Http\Controllers;
use Toastr;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id','asc')->get();
        return view('/admin/contact/danhsachcontact',compact('contacts'));
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
    public function phanhoi(Request $request, $id ){
        $contacts = new Contact();
        $email = $request->input("email");
        // dd($email);
        $nguoinhan = $request->input("name");
        // ?dd($nguoinhan);
        $content = $request->input("content_send");

        Mail::send('email.contact-email',
                [
                'content' =>$content,
                'nguoinhan' =>$nguoinhan],
                function ($message) use($request,$email) {
                $subject = $request->input("subject");
                $message->from("vifland.fpt@gmail.com");
               $message->subject("Thư hồi đáp - ".$subject)->to($email);
            });
             // sau khi gửi thư , mail sẽ chuyển sang status = 1;
             $test=$contacts::find($id);
             $test->status = "1";
             $test->save();
            return redirect()->back();

        }

        // thư hồi âm
    public function store(Request $request)
    {
        $contact = new Contact([
            'name'=> $request->get("name") ,
            'email'=> $request->get("email") ,
            'phone'=> $request->get("phone") ,
            'address'=> $request->get("address") ,
            'title'=> $request->get("title") ,
            'content'=> $request->get("content") ,
        ]);
        $contact->save();
        Toastr::success('Gửi thành công','Thông báo');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
