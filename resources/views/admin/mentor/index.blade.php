
@extends('admin.layout')
@section('sub-judul','Mentor Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-mentor mb-3">
            <a href="{{ route('mentor.create')  }}" class="btn btn-primary">Add mentor</a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>profile</th>
                <th>Email</th>
                <th>Profession</th>
                <th>Actions</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($mentor as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
                <td>
                    @if($c->avatar == '')
                    <img width="150px" src="{{ url('/data_file/no-image.jpg') }}">
                    @else
                     <img width="150px" src="{{ url('/data_file/'.$c->avatar) }}">
                    @endif
                </td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->profession }}</td>
               
                
                <td> 
                    <form action="{{ route('mentor.destroy',$c->id) }}" method="POST">
                        <a href="{{route('mentor.show', $c->id)}}" class="btn btn-primary btn-md">Detail</a> |
                    <a href="{{route('mentor.edit', $c->id)}}" class="btn btn-warning">Edit</a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Data Ini adalah Foreign Key Pada Data Course, Menghapus Data Ini Akan Menghapus Data Course Dengan Id Ini Secara Otomatis, Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$mentor->links()}}
        </div>
    




@stop