
@extends('admin.layout')
@section('sub-judul','Transaction Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

       
        <p style="text-align:right"></p>
        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        @if($item->status == 'success')
                       <h6><span class="badge badge-success">{{$item->status}}</span></h6> 
                        @else
                        <h6><span class="badge badge-danger">{{$item->status}}</span></h6>
                        @endif
                    
                    </td>
                    <td>{{$item->link_project}}</td>
                    
                <td>
                    <img width="150px" src="{{ url('/data_file/'.$item->image1) }}">
                </td>
                
                <td>
                     <a href="{{route('certificate.edit',$item->id)}}" class="btn btn-warning">Edit</a> 
                </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table> 
        
        <div class="col-sm-12 justify">
            {{$data->links()}}
        </div>
    



@stop