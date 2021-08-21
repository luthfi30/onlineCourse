@extends('frontpanel.layout')

@section('content')


<section id="why-us" class="why-us">
</section><!-- End Why Us Section -->

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">           
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            
            <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-highlighted alert-success" role="alert">
                    {{ Session('success') }}
                </div>
            @endif
                <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i>Order History</h3>
                    @if(!empty($order))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->created_at->toDateString()}}</td>
                                <td>{{$item->status}}</td>
                                @if($item->price == 0)
                                <td>@currency($item->price)</td>
                                @else
                                <td>@currency($item->price+$item->kode)</td>
                                @endif
                              
                                    <td>
                                        <a href="{{route('history.detail', $item->id)}}" class="btn btn-success btn-md">
                                            <i class="fa fa-info" ></i> Detail</a>
                                    </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

@stop