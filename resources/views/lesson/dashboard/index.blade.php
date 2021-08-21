@extends('lesson.layout')

@section('content')

       
            
      
            @foreach ($data as $item)
            <div class="col-lg-12">
                <h3 class="mb-3"> {{$item->name}} </h3>
            </div>
            
            <div class="col-lg-12 ">
                <iframe width="100%" height="800" src="https://www.youtube.com/embed/{{$item->url_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
            @endforeach

           
			



@stop