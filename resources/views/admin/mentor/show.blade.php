
@extends('admin.layout')
@section('sub-judul','Detail Mentor')
@section('content')

   
        <div class="btn-user-admin mb-3">
            <a href="{{ url('admin/mentor')  }}" class="btn btn-primary">Back</a>   
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-4">
                <div class="card card-default" profile-data-height="">
                    <div class="card-header">
                        <h2>Profile</h2>
                    </div>
        
                    <div class="card-body text-center">
                         @if($user->avatar == '' )
                        <img class="img-thumbnail d-flex mx-auto" src="{{ url('/data_file/no-image.jpg') }}">
                         @else
                         <img class="img-thumbnail " width="150px" src="{{ url('/data_file/'.$user->avatar) }}">
                         @endif
                        <h4 class="py-2 text-dark">{{$user->name}}</h4>
                            <i class="mdi mdi-email mr-1"></i>
                            <span>{{$user->email}}</span>
                            <i class="mdi mdi-professional-hexagon mr-1"></i>
                            <span>{{$user->profession}}</span>
                            <i class="mdi mdi-account-supervisor-circle mr-1"></i>
                            <span>{{$user->role}}</span>
                            
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-default" profile-data-height="">
                    <div class="card-header">
                        <h2>Kelas</h2>
                    </div>
                <div class="card-body">
                    <p class="mb-5">Dafta Kelas</p>
                            
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($kelas as $item)
                            <tr>
                                <td scope="row">1</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="{{route('course.index')}}" class="btn btn-warning">Lihat Kelas</a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

       
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default" profile-data-height="">
                        <div class="card-header">
                            <h2>Revenue</h2>
                        </div>
                    <div class="card-body">
                        <p class="mb-5">Detail Revenue</p>
                                
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">harga Kelas</th>
                                    <th scope="col">Jumlah Terjual</th>
                                    <th scope="col">Pendapatan</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($revenue as $item)
                                <tr>
                                    <td scope="row">1</td>
                                    <td>{{$item->title}}</td>
                                    <td>@currency($item->item_price)</td>
                                    <td>{{$item->total_terjual}}</td>
                                    <td><b>@currency($item->pendapatan)</b></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>




@stop