
    <html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css')}}/index.css">
        <link rel="stylesheet" href="{{asset('assets/css')}}/all.min.css">
        @yield('style')
        <title id="title">@yield('title')</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top " style=" height:60px;  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Album</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/addAlbum')}}">Add Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/allAlbums')}}">All Albums</a>
        </li>
        
      </ul>
      <div class="d-flex  ml-5 pt-3 justify-content-end" style="width: 80%;">
      <form class="d-flex" action="{{url('/logout')}}">
  
        <button class="btn btn-outline-success" type="submit">logout</button>
      </form>
      </div>
    </div>
  </div>
</nav>


      
    