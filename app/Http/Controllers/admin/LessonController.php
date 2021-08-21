<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Chapter;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = Lesson::paginate(10);
        return view('admin.lesson.index',compact('lesson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapter = Chapter::get(['id','name']);
        return view('admin.lesson.create',compact('chapter'));
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
            'name'       => 'required',
            'url_video'  => 'required',
            'chapter_id' => 'required'
        ]);

        Lesson::create([
            'name'       => $request->name,
            'url_video'  => $request->url_video,
            'chapter_id' => $request->chapter_id
        ]);

        return redirect()->back()->with('success','Data Lesson Baru Berhasil di Tambahkan');
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
        $lesson = Lesson::find($id);
        $chapter = Chapter::get(['id','name']);
        return view('admin.lesson.edit',compact('lesson','chapter'));
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
        $this->validate($request,[
            'name'       => 'required',
            'url_video'  => 'required',
            'chapter_id' => 'required'
        ]);

        Lesson::find($id)->update([
            'name'       => $request->name,
            'url_video'  => $request->url_video,
            'chapter_id' => $request->chapter_id
        ]);

        return redirect()->back()->with('success','Data Lesson Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::destroy($id);
        return redirect()->back()->with('success','Data Lesson Baru Berhasil di Delete');
    }
}
