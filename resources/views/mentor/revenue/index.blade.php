
@extends('mentor.layout')
@section('sub-judul','Daftar Order')
@section('content')

   
        {{-- <div class="btn-user-admin mb-3">
            <a href="{{ url('admin/mentor')  }}" class="btn btn-primary">Back</a>   
        </div>
         --}}
        <div class="row">
            <div class="col-lg-12">
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
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($kelas as $item)
                            <tr>
                                <td scope="row">1</td>
                                <td>{{$item->title}}</td>
                                {{-- <td>
                                    <a href="{{route('course.index')}}" class="btn btn-warning">Lihat Kelas</a> 
                                </td> --}}
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