<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  

</head>
<body >
<section class="Home-page" id="Home-page" >
  <div class="container-fluid" id="blur">
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top "> 
    <div class="container-fluid">
      <a class="navbar-brand ms-2 " href="#"><img class ="logo-nav" src="image/jam_ticket-f.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto ">
         
          <li class="nav-item  mb me-5 ">
          <a class="nav-link active text-white fw-bolder" aria-current="page" href="#Home-page">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="#section-about">About US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="#Services-contener">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="#page_contact">Contact US</a>
          </li>
        </ul>
        @guest
        <a href="{{url('login')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin" >Login</a>
        <a href="{{url('signup')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin">Sign Up</a>
        @endguest

        @auth
        <a href="{{url('logoutuser')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin">
          logout {{auth()->user()->first_Name}}
        </a>
        @endauth
      </div>
      
    </div>
  </nav>
</div>   


@yield('contant')






  <!-- ############footer################ -->
  <div class="footer">
      <div class="Contant_Footer">
          <div class="Top_Footer">
              <div class="Image_Footer">
                  
              </div>

              <div class="Text_Footer">
                  <a href="#Home-page">home</a>
                  <a href="#page_contact">About US</a>
                  <a href="#Services-contener">Services</a>
                  <a href="#section-about">Contact Us</a>
              </div>

              <div class="Icon_Footer">
                  <a href=""><div class="icon"><i class="fa-brands fa-facebook"></i></div></a>
                  <a href=""></a><div class="icon"><a href=""><i class="fa-brands fa-twitter"></a></i></div></a>
                  <a href=""></a><div class="icon"><a href=""><i class="fa-brands fa-invision"></a></i></div></a>
              </div>
          </div>

          <div class="Bot_Footer">
              <p>All rights reserved. EasyTicket company © 2022</p>
              <p>Terms of Service Privacy Policy</p>
          </div>
      </div>
  </div>
</div>



  
  

  

  
    
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>