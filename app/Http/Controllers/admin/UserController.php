<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role','admin')->paginate(10);
        return view('admin.useradmin.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.useradmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
       ]);
       if ($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
       User::create([
        'name' => $request->name,
        'profession' => $request->profession,
        'avatar' => $request->avatar,
        'role'  => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
       ]);
    }else{
        User::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'role'  => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
    }

       return redirect()->back()->with('success','User Admin baru berhasil di tambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view('admin.useradmin.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.useradmin.edit',compact('user'));
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
      
     
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
            User::find($id)->update([
                'name' => $request->name,
                'profession' => $request->profession,
                'avatar' => $nama_file,
                'role'  => $request->role,
                'email' => $request->email
            ]);
                
        }else{
           User::find($id)->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'avatar' => $request->avatar,
            'role'  => $request->role,
            'email' => $request->email,
            
           ]);
        }
    
           return redirect()->back()->with('success','User Admin berhasil di Update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = User::destroy($id);
        return redirect()->back()->with('success','Data Password Berhasil Di Hapus');
    }

    public function password(){
          
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.useradmin.password',compact('user'));
    }

    public function ressetPassword(Request $request, $id){
        if($request->password == ''){
            return redirect()->back()->with('success','Data Tidak Di update');        

            }else{
               User::find($id)->update([
                'email' => $request->email,
                'password' => Hash::make($request['password']),
               ]);
            }
            return redirect()->back()->with('success','Data Password Berhasil Di Ubah');
    }
}
