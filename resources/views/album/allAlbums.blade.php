@extends('album.userLayout')
@section('content')



<div class="container  mt-5  ">
    <div class="row mt-5" id="product">
         @foreach($albums as $album)
    <div class="col-md-4 mt-5 " >
        <div class="productt  border "  >
          
        <img src="{{asset($album->imageCover)}}" class="imgg " >    
        <h2>{{$album->Name}}</h2>
       
       <div class="count rounded-circle text-center"><h4>{{$album->imageCount}}</h4></div>
            
       <div class=" ">
       <form class=" mx-2 py-2 none  my-lg-0" action="{{url('/openAlbum',$album->id)}}" method="post">
                @csrf
            <button  class="btn btn-primary ">open</button>
            </form>
      
        </div>
       
  <!-- Button trigger modal -->

        
            </div>
       </div>
       @endforeach
    </div>
</div>
@endsection
