@extends('register.loginlayout')
@section('content')
@if($mess != null)
<div class="d-flex justify-content-center">
<div class="alert alert-danger w-50  text-center" role="alert">
  {{$mess}}
</div>
</div>
@endif
<div class="container w-50 mt-5 ">
           
            <div class="row " id="productForm">
            <div class="col-md-12 my-5 ml-5">
            <div class="product my-5 ml-5">
<form action="{{url('/loginHandel')}}" method="post">
@csrf
<div class="form-group mt-5  w-50">
<div class="form-group ">
  <div class="fontuser">
    <label for="exampleInputEmail1">Email   </label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" >
    <i class="fas fa-user"></i>
    </div>
  </div>
</div>
<div class="form-group mt-5 w-50">
  <div class="form-group ">
    <div class="fontpassword">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    <i class="fas fa-unlock"></i>
  </div>
  </div>
<button class="btn btn-outline-primary" type="submit">login</button>
</form>
</div>
</div>
</div>
</div>

@endsection