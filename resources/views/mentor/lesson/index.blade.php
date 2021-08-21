
@extends('mentor.layout')
@section('sub-judul','Lesson Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-lesson mb-3">
            <a href="{{ route('mentor.create.lesson')  }}" class="btn btn-primary">Add lesson</a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Video Url</th>
                <th>Chapter</th>
                <th>Action</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($lesson as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
                <td>{{$c->chapter->name}}</td>
                <td><iframe width="260" height="115" src="https://www.youtube.com/embed/{{$c->url_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                <td> 
                    <form action="{{ route('mentor.destroy.lesson',$c->id) }}" method="POST">
 
                    <a href="{{route('mentor.edit.lesson', $c->id)}}" class="btn btn-warning">Edit</a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Data Ini adalah Foreign Key Pada Data Lesson, Menghapus Data Ini Akan Menghapus Data Lesson Dengan Id Ini Secara otomatis, Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$lesson->links()}}
        </div>
    



@stop