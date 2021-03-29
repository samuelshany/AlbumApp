@extends('register.loginlayout')
@section('content')
<div class="container w-50 mt-5">
           
            <div class="row" id="productForm">
            <div class="col-md-12">
            <div class="product">
<form action="{{url('/signupHandel')}}" method="post">
@csrf
<div class="form-group">
    <label>Name</label>
<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>


<div class="form-group">
    <label>Password</label>
<input type="password" name="password" class="form-control">
</div>



<button class="btn btn-outline-primary" type="submit">signup</button>
</form>
</div>
</div>
</div>
</div>

@endsection