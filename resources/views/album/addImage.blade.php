
@extends('album.userLayout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger w-50 d-flex justify-content-center mt-3" style="margin-left: 25%;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container w-50 mt-4 ">
<br>
    <br>
            <h1 class="  h1 text-center mt-4">  Add image </h1>
            <div class="row" id="productForm">
            <div class="col-md-12 mt-4">
            <div class="product mt-5">
                <form method="post" action="{{url('/addImageHandel',$id)}}" enctype="multipart/form-data">
                    @csrf
        <div class="form-group text-right">
            <input  class="form-control" type="text" name="name" placeholder="image Name" value="{{old('name')}}" >
        </div>
     <input type="file" name="image" accept="image/*">
      <br>
        
        <button  id="addbtn" class="btn btn-outline-primary mt-2 align-right" type="submit">Add Image </button>
        </form>
    </div>
</div>
            </div>
        </div>
@endsection

