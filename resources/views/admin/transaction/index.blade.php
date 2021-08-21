
@extends('admin.layout')
@section('sub-judul','Transaction Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

       
        <p style="text-align:right"></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan </th>
                    <th>Nama Pemesan </th>
                    <th>Harga</th>
                    <th>Kode Unik</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($order as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->created_at->format('d M Y')}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>@currency($item->price)</td>
                    <td>@currency($item->kode)</td>
                    <td><strong>@currency($item->price+$item->kode)</strong> </td>
                    <td>
                        @if($item->status == 'success')
                       <h6><span class="badge badge-success">{{$item->status}}</span></h6> 
                        @else
                        <h6><span class="badge badge-danger">{{$item->status}}</span></h6>
                        @endif
                    
                    </td>
                    <td>
                        <a href="{{route('transaction.show', $item->id)}}" class="btn btn-primary btn-md">Detail</a> |
                     <a href="{{route('transaction.edit', $item->id)}}" class="btn btn-warning btn-md">Edit</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="col-sm-12 justify">
            {{$order->links()}}
        </div>
    



@stop