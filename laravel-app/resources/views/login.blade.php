@extends('layout.HeaderAndFooter')

@section('contant')
<section class="Home-page" id="Home-page" >
  <div class="container-fluid d-none" id="blur">
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
        <button type="button" class="btn btn-primary btn-sm me-5 bg-white text-dark fw-bolder btn-outline-danger" id="signlogin" >Login / Sign Up</button>
      </div>
      
    </div>
  </nav>
</div>   
<div class="tab-form00 " id="popup-tab-form">
  <div class="tab-header">  
    <div class="">Log in</div>
  </div>
    <div class="tab-body00" >
      <form class="log-in active">
        <div class="form_input" id="fast">
            <label for="National_ID" >National ID</label>
            <input type="text" name="National_ID" id="National_ID" required>
          </div>
          <div class="form_input">
            <label for="password" >Password</label>
            <input type="password" name="password" id="password" required>
          </div>
          <div class="remember">
            <a href="#" class="text" id="forgot-password-1">Forgot your password</a>
          </div>
          <div class="form_input2">
            <button type="submit" class="sign_up_btn "> sign in</button>
          </div>
        </form>
        </div>
        <a href="{{url('home')}}" class="close-btn" id="close-btn">&times;</a> 
  
</div>
<!-- popoup1 -->
<div class="search-national-numbe" id="search-national-numbe">
  <form action="">
    <h2 class="search-national-title">Enter<br> the national number to search for your account.</h2>
 <div class="search-national-group">
  <input type="text" name="search-national">
  <button type="button" class="search-btn"  id="search-btn">Send</button>
 </div>
</form>
<div class="close-search-national" id="close-search-national">&times;</div> 
</div>

<!-- popoup2 -->
<div class="contaner-user-Account" id="popupuser-Name-Account-1">
  <img src="/image/logo.jpeg" class="logo-ticket">
  <div class="parent">
      <div class="text1">
          <h1>User Name Account</h1><br>
      </div>
      <div class="text2">
          <h2>How would you like to get a password reset code?</h2>
      </div>

      <div class="san">
          <form class="form1"  method="">
              <input type="radio" id="html" name="chosse_way" value="HTML" >
              <div class="label1">
                  <label for="html">Send the code to the phone number +*********14</label><br>
              </div>
              <input type="radio" id="css" name="chosse_way" value="CSS" class="chosse_way">
              <div class="label1">
                  <label for="css">Send the code to the e-mail w************9@gmail.com</label><br>
              </div>
              <button type="button" class="button1"  id="send-2">Send</button>
          </form>
      </div>
      
      <div class="close-btn-three" id="close-2">&times;</div> 
  </div>
</div>
<!-- popoup3 -->
 <div class="Enter-code" id="popup-Enter-code-2">
  <form action="">
    <h2 class="title-code">Enter the 4-digit code</h2>
 <div class="enter-code-group">
  <input type="text" name="codedigit">
  <button type="button" class="send-code"  id="send-3">Send</button>
 </div>
</form>
<div class="close-btn-four" id="close-3">&times;</div> 
</div> 
<!-- popup4 -->
<div class="new-password-form" id="popup-new-password-4">
  <div class="new-password-body">
    <form  method="">
      <h2 class="title-new-password">Change Password</h2>
   <div class="input-new-password">
    <label for="new-password">New password</label>
    <input type="password" name="new-Password" id="new-password">
   </div>
   <div class="input-new-password">
    <label for="Confirm-Password-new">Confirm Password</label>
    <input type="password" name="Confirm-Password-new" id="Confirm-Password-new">
   </div>
   
    <button type="submit"  id="save-new-password" class="save-new-password" >Send</button>
  </form>
  </div>
<div class="close-btn-five" id="close-4">&times;</div> 
</div>

@stop
