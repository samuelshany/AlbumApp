@extends('album.userLayout')
@section('content')
<div class="container mt-5 h-50">
<div class="row w-100 ">
@foreach($album as $alb)
    <div class="col-md-6 mt-5">
        <div class="productt">
        <img src="{{asset($alb->imageCover)}}" class="imgg" >
        <div class="count rounded-circle text-center"><h4>{{$alb->imageCount}}</h4></div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="productData">
        <h2>{{$alb->Name}}</h2>
       
        
       <div class=" ">
       <div class=" d-flex align-items-center j">
       <form class=" mx-2 py-2 none  my-lg-0" action="{{url('/update',$alb->id)}}"method="post">
                @csrf
            <button  class="btn btn-warning ">update </button>
            </form>
      
        </div>
       <div class=" d-flex align-items-center j">
       <form class=" mx-2 py-2 none  my-lg-0" action="{{url('/addimage',$alb->id)}}"method="post">
                @csrf
            <button  class="btn btn-primary ">Add image</button>
            </form>
      
        </div>
    </div>
    <button type="button" class=" mx-2 btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete {{$alb->Name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete {{$alb->Name}}   album?
      </div>
      <div class="modal-footer">
      <form class=" mx-2  py-2 none  my-lg-0" action="{{url('/deleteAlbumWithPic',$alb->id)}}" method="post">
                @csrf
        <button type="submit" class="btn btn-danger" >delete with pic</button></form>
        <!-- First modal dialog -->
<div class="modal fade" id="modal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
    
    @foreach($album as $alb)
    @if($alb->imageCount > 0)
    <label class="mx-2" > Move Pic</label>
    <form action="{{url('/moveAllPic',$id)}}" method="POST">
@csrf
@if(Auth::user()->album_count ==1)
<h1>you have no other album</h1>
@endif
@if(Auth::user()->album_count > 1)

     
<select class="custom-select" name="albumId" id="inputGroupSelect01">

                        @foreach($albums as $album)
                
                        @if($alb->id != $album->id && $alb->user_id == Auth::user()->id)
                        @if($album->user_id == Auth::user()->id)
                            <option value="{{$album->id}}">{{$album->Name}}</option>
                            @endif
                            @endif
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">move and Delete album</button>
                        @endif
                        
</form>@endif
@if($alb->imageCount == 0)
<label class="mx-2"> have no image to move</label>
@endif
        @endforeach               
    </div>
  </div>
</div>
<!-- Second modal dialog -->

<!-- Open first dialog -->
<a class="btn btn-primary" data-bs-toggle="modal" href="#modal" role="button">move all Pic and delete Album</a>
      </div>
    </div>
  </div>
</div>
    @endforeach








</div>
</div>
</div>
</div>
<div class="container mt-5   ">
    <div class="row mt-5 " id="product">
         @foreach($images as $image)
    <div class="col-md-4 mt-5 " >
        <div class="productt  border "  >
          
        <img src="{{asset($image->src)}}" class="imgg " >    
        <h2>{{$image->name}}</h2>
       
     
       
            
       <div class=" d-flex align-items-center ">
       <form class=" mx-2 py-2 none  my-lg-0" action="{{url('/deleteImage',$image->id)}}"method="post">
                @csrf
            <button  class="btn btn-danger ">delete</button>
            </form>
      
        </div>
     
            </div>
       </div>
       @endforeach
    </div>
</div>
@endsection