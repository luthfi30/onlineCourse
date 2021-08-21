
@extends('mentor.layout')
@section('sub-judul','Course Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-Course mb-3">
            <a href="{{ route('mentor.create.course')  }}" class="btn btn-primary">Add Course</a>   
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
            @foreach ($data as $c)
            
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
                    <form action="{{ route('mentor.destroy.course',$c->id) }}" method="POST">
 
                    <a href="{{route('mentor.edit.course', $c->id)}}" class="btn btn-warning">Edit</a> |
                    
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
            {{$data->links()}}
        </div>
    




@stop