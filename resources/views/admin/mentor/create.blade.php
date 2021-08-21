@extends('admin.layout')
@section('sub-judul','Form Create mentor')
@section('content')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-highlighted alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="alert alert-highlighted alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <form action="{{ route('mentor.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Name</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name" >
            </div>
    
            <div class="col-md-6 mb-3">
                <label for="validationServer02">Profile</label>
                <input type="file" class="form-control" id="validationServer02" placeholder="" name="profile" >
            </div>
            <div class="col-md-9 mt-4">
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Email</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="email" >
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Profession</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="profession" >
            </div>
        <input type="submit" class="btn btn-primary">
    </form>
    


    
@endsection