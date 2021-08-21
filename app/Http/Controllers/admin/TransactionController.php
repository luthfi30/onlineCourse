<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MyCourse;
use App\Models\Certificate;
use App\User;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate();
       
        return view('admin.transaction.index',compact('order'));
    }

     
    public function certificate()
    {
        $data = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->orderBy('certificates.id', 'ASC')->paginate();
        return view('admin.certificate.index',compact('data'));
    }

    public function certificateEdit($id)
    {
        $course = DB::table('certificates')
        ->leftjoin('my_courses', 'certificates.mycourse_id', '=', 'my_courses.id')
        ->leftjoin('courses', 'my_courses.course_id', '=', 'courses.id')
        ->select('certificates.*', 'courses.title')
        ->where('certificates.id',$id)->orderBy('certificates.id', 'ASC')->get();
        
        $data =  Certificate::findorfail($id);
        
    
        return view('admin.certificate.edit', compact('data','course'));
    }

    public function certificateUpdate(Request $request, $id)
    {
                
        if($request->hasFile('image1')){

            $file = $request->file('image1');
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$nama_file);
            Certificate::find($id)->update([
                'image1'        => $nama_file,
                'username'      => $request->username,
                'email'         => $request->email,
                'mycourse_id'   => $request->mycourse_id,
                'link_project'  => $request->link_project,
                'description'   => $request->description,
                'status'        => $request->status
               
            ]);
            
        }else{
            Certificate::find($id)->update([
                'username'    => $request->username,
                'email'       => $request->email,
                'mycourse_id' => $request->mycourse_id,
                'link_project'=> $request->link_project,
                'description'   => $request->description,
                'status'        => $request->status
            ]);
            
        }
        
        return redirect('admin/certificate')->with('success','data certificate berhasil di tambahkan');
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
        $order = Order::findorfail($id);
        $mycourse = MyCourse::where('order_id', $order->id)->with('course')->get();
        
        return view('admin.transaction.show',compact('order','mycourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findorfail($id);
        $mycourse = MyCourse::where('order_id', $order->id)->with('course')->get();
      
        return view('admin.transaction.edit',compact('order','mycourse'));
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
        Order::find($id)->update([
            'user_id'       => $request->user_id,
            'price'         => $request->price,
            'kode'         => $request->kode,
            'status'     => $request->status
        ]);

        $mycourse =   MyCourse::where('order_id', $id)->update([
            'status' => $request->status
        ]);

       

        alert()->success('Pesanan Telah Masuk Keranjang', 'Success');
        return redirect('admin/transaction');
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
}
