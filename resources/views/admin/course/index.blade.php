
@extends('admin.layout')
@section('sub-judul','Course Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-Course mb-3">
            <a href="{{ route('course.create')  }}" class="btn btn-primary">Add Course</a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>Mentor</th>
                <th>Category</th>
                <th>Level</th>
                <th>Type</th>
                <th>Status</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($course as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->title }}</td>
                <td>{{ $c->thumbnail }}</td>
                <td>{{ $c->mentor->name }}</td>
                <td>{{ $c->category->name }}</td>
                <td>{{$c->level}}</td>
                <td>{{$c->type}}</td>
                <td>{{ $c->status }}</td>
                <td>@currency($c->price) </td>
                <td>{{ substr ($c->description,0, 20) }}</td>
                
                <td> 
                    <form action="{{ route('course.destroy',$c->id) }}" method="POST">
                    {{-- <a href="{{route('course.show', $c->id)}}" class="btn btn-primary">Detail</a> |     --}}
                    <a href="{{route('course.edit', $c->id)}}" class="btn btn-warning">Edit</a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$course->links()}}
        </div>
    




@stop