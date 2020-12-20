<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notis = Notification::orderBy('id', 'asc')->get();
        return view('/admin/thongbao/danhsachthongbao', compact('notis'));
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
        $noti = new Notification([
            'name'      => $request->get("name"),
            'language'  => $request->get("lang"),
            'status'    => $request->get("status"),
            'content'    => $request->get("noidung"),
            'due_date'    => $request->get("due_date"),

        ]);
        $noti->save();
        return redirect('/admin/danh-sach-thong-bao');
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
        $noti = Notification::find($id);
        return view('/admin/thongbao/chinhsuathongbao', compact('noti'));
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
        $noti = Notification::find($id);
        $noti->name      = $request->get('name');
        $noti->language  = $request->get('lang');
        $noti->status    = $request->get('status');
        $noti->content = $request->get('content');
        $noti->due_date = $request->get('due_date');
        $noti->save();
        return redirect('/admin/danh-sach-thong-bao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noti = Notification::find($id);
        $noti->delete();
        return redirect('/admin/danh-sach-thong-bao');
    }
}
