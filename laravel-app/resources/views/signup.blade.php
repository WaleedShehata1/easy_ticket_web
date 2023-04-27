@extends("layout.HeaderAndFooter")


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
        <button type="button" class="btn btn-primary btn-sm me-5 bg-white text-dark fw-bolder btn-outline-danger" id="signlogin" >Login / Sign Up</button>
      </div>
    </div>
  </nav>
</div>   
<div class="tab-form " id="popup-tab-form">
  <div class="tab-header">  
      <div >Sign Up</div>
  </div>
    <div class="tab-body" >
        <form class="sign-in active">
          <div class="form_input2 ">
            <label for="First_Name">First Name</label>
            <input type="text" name="First_Name" id="First_Name" required>
          </div>
          <div class="form_input2 ">
            <label for="Last_Name">Last Name</label>
            <input type="text" name="Last_Name" id="Last_Name" required>
          </div>
          <div class="form_input ">
            <label for="National_ID" >National ID</label>
              <input type="text" name="National_ID" id="National_ID" required>
          </div>
          <div class="form_input2">
            <label for="date_birth" >date of birth</label>
              <input type="text" name="date_birth" id="date_birth" required>
          </div>
          <div class="form_input2">
              <label for="profession" >profession</label>
              <input type="text" name="profession" id="profession" required>
          </div>
          <div class="form_input2">
            <label for="Health_status" >Health_status</label>
              <input type="text" name="Health_status" id="Health_status" class="National_IDx" required>
              
          </div>
          <div class="form_input2">
              <label for="gender" >gender</label>
              <input type="text" name="gender" id="gender" required>
          </div>
          <div class="form_input">
            <label for="phone" >phone</label>
            <input type="phone" name="phone" id="phone" required>
          </div>
          <div class="form_input">
            <label for="Email" >Email</label>
              <input type="email" name="Email" id="Email" required>
          </div>
          <div class="form_input">
            <label for="password" >Password</label>
            <input type="password" name="password" id="password" required>
            
          </div>
          <div class="form_input"><label for="confirm_password">confirm_password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
          
          </div>
          <div class="form_input">
            <button type="submit" class="sign_up_btn "> sign in</button>
          </div>
          
          </form> 
        </div>
        <a href="/index.html" class="close-btn" id="close-btn" target="_blank">&times;</a> 
  
</div>

@stop