<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('css/styl.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body >
<section class="Home-pag" id="Home-page" >
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
          <a class="nav-link active text-white fw-bolder" aria-current="page" href="{{url('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="{{url('home')}}">About US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="{{url('home')}}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-white fw-bolder" href="{{url('home')}}">Contact US</a>
          </li>
        </ul>
        
        @guest
        <a href="{{route('login')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin" >Login</a>
        <a href="{{route('register')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin">Sign Up</a>
        @endguest

        
        @auth

        <!-- <a href="{{route('logout')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin"> -->
          <!-- logout -->
          <a href="" class="user_name">{{auth()->user()->first_Name}}</a>
        </a>
        @endauth
      </div>
      
    </div>
  </nav>
</div> 


</head>
<body>
<div class="contener-payment" id="blur2">
  <h4 class="paymethod-bold">Payment method</h4>
  <input type="text"><br>
  <input type="text">
  <button class="add-btn1" id="add-btn1">+Add new</button> 

   <form action="" method="">
      <div class="card-add-new" id="card-add-new">
        <div class="card-new-row">
          <div>
            <label for="Card-Number" >Card Number</label>
            <input type="text" name="Card-Number" id="Card-Number"  placeholder="5678 - 5678 - 8765 - 8765">
          </div>
          <div>
            <label for="CVV" >CVV</label>
            <input type="password" name="CVV" id="CVV" placeholder="***" >
          </div></div>
     <div class="card-new-row">
      <div>
        <label for="Card-Holder" >Card Holder's Name</label>
        <input type="text" name="Card-Holder" id="Card-Holder"  placeholder="Jackie chan" >
      </div>
      <div>
        <label for="Expiry-Date" >Expiry Date</label>
        <input type="date"  name="Expiry-Date" id="Expiry-Date" class="Expiry-Date"  >
      </div></div>

      <div class="form_input">
        <button type="submit" class="add-button ">Add</button>
      </div>
      <div class="btn-group-card">
        <button type="submit" class="Done-button" > Done</button>
        <button type="button" class="Enter-PIN-Code" id="Enter-PIN-Code">Enter PIN Code</button>
      </div>
      <!-- wallet -->
    </div>
  <div class="wallet">
    <h5 class="wallet-title">wallet</h5>
  <div  class="wallet-group" >
    <input type="checkbox" name="redio-wallet"  id="redio-wallet" >
    <label for="redio-wallet" class="title-input-wallet"  id="redio-wallett" name="pay-wallet">wallet</label>
  </div>
  </div>
  <!-- total -->
  <label class="Total-amount">Total amount:10 EL</label>
  <button type="submit" class="btn-pay">Pay Ticket</button>
  </form>
</div>
<!-- end total -->

<div class="Enter-code-wallet-popup" id="Enter-code-wallet-popup">
  <form action="">
    <h2 class="title-wallet-popup">Enter the 4-digit code</h2>
 <div class="wallet-group-popup">
  <input type="text" name="codedigit">
  <button type="submit" class="send-code"  id="send-code">Send</button>
 </div>
</form>
<div class="close-btn-ten" id="close-btn-ten">&times;</div> 
</div>

<div class="Enter-password-wallet-popup" id="Enter-password-wallet-popup">
  <form action="">
    <h2 class="title-password-wallet-popup">Enter your Password</h2> 
 <div class="wallet-group-popup">
  <input type="text" name="password-wallet">
  <button type="submit" class="send-code"  id="send-password" name="password-wallet">Send</button>
 </div>
</form>
<div class="close-btn-11" id="close-btn-11">&times;</div> 
</div>

<div class="qr-code" id="blur3">
  <div class="overlay"></div>
</div>


 <div class="contant-ticket00" id="blur4">
  <form action="" method="">
   <div class="time-date-ticket00">
    <label for="" >Bus 12</label>
    <label for="">9:00 AM</label>
   </div>
   <div class="icon-loction00">
   <div class="information-ticket00"> 
    <a href="http://"><i class="fa-solid fa-location-arrow icon-00" id="icon"></i></a>
    <label for="">2415 Street</label>
    <label for="" class="top-title00">15-Dec-2022</label>
  </div>
  <div class="information-ticket00"> 
    <a href="http://"><i class="fa-solid fa-location-dot icon-00" id="icon"></i></a>
    <label for="">2415 Street</label>
    <label for="" class="top-title200">15-Dec-2022</label>
  </div>
</div>
  <div class="information-Button00">
    <button class="button-00">Buy Ticket</button>
    <label   class=" price-00" for="">price:  10</label>
  </div>

  <!--  -->
  <div class="wrapper">
    <span class="minus">-</span>
    <span class="num">01</span>
    <span class="plus">+</span>
  </div>

  </form>
 </div>
 <div class="Log-out-form " id="Log-out-popup">
  <div class="Log-out-body">
    <form  method="">
      <h2 class="title-Log-out">Do you want to <br> log out?</h2>
    
  <div class="button-save-password">
    <button id="Log-out-yas" type="submit" class="Log-out-yas" name="log-out-say-yas">Yas</button>
    <button id="Log-out-no" type="submit" class="Log-out-no" name="log-out-say-no">No</button>
  </div>
  </form>
  </div>
<div class="close-btn-logout" id="close-btn-logout">&times;</div> 
</div>



    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>
</html>