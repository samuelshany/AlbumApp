
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css')}}/index.css">
        <link rel="stylesheet" href="{{asset('assets/css')}}/all.min.css">
        @yield('style')
        <title id="title">@yield('title')</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark" style="height:60px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Album</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <div class="d-flex w-100 justify-content-end">
    <form action="{{url('/signupForm')}}" class="mx-3 pt-3">
    <button class="btn btn-outline-success " type="submit">signUp</button></form>
    <form action="{{url('/loginForm')}}" class="pt-3" >
    <button class="btn btn-outline-success " type="submit">login</button></form>
  </div>
    </div>
  </div>
</nav>


      
    