@extends('frontpanel.layout')

@section('content')

<section id="contact" class="contact">
    <div data-aos="fade-up">
        
    </div>
 
    <div class="container" data-aos="fade-up">
        
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="display-4">Data Project</h1>
                <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Status</th>
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
                            <form action="{{route('data.destroy.project',$item->id)}}" method="POST">
 
                                <a href="{{route('edit.data.Project',$item->id)}}" class="btn btn-warning">Edit</a> 
                                <br>  <br>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                        </td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table> 
            </div>
        </div>
    </div>
  </section><!-- End Contact Section -->





@stop



