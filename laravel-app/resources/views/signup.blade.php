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
        <!-- <button type="button" class="btn btn-primary btn-sm me-5 bg-white text-dark fw-bolder btn-outline-danger" id="signlogin" >Login / Sign Up</button> -->
      </div>
    </div>
  </nav>
</div>   
<div class="tab-form " id="popup-tab-form">
  <div class="tab-header">  
      <div >Sign Up</div>
  </div>
    <div class="tab-body" >

        <form class="sign-in active" action="{{route('creatuser')}}" method="POST">
        @csrf
        <!-- @method('POST') -->


          <div class="form_input2 ">
            <label for="First_Name">First Name</label>
            @error('first_Name')<span>{{$message}}</span>@enderror
            <input type="text" name="first_Name" id="First_Name" required>
          </div>


          <div class="form_input2 ">
            <label for="Last_Name">Last Name</label>
            @error('last_Name')<span>{{$message}}</span>@enderror
            <input type="text" name="last_Name" id="Last_Name" required>
          </div>


          <div class="form_input ">
            <label for="National_ID" >National ID</label>
            @error('national_ID')<span>{{$message}}</span>@enderror
              <input type="text" name="national_ID" id="National_ID" required>
          </div>


          <div class="form_input2">
            <label for="date_birth" >date of birth</label>
            @error('date_of_birth')<span>{{$message}}</span>@enderror
              <input type="text" name="date_of_birth" id="date_birth" required>
          </div>


          <!-- <div class="form_input2">
              <label for="profession" >profession</label>
              <input type="text" name="profession" id="profession" required>
          </div> -->


          <div class="form_input2">
            <label for="Health_status" >Health_status</label>
            @error('health_status')<span>{{$message}}</span>@enderror
              <input type="text" name="health_status" id="Health_status" class="National_IDx" required>
          </div>


          <div class="form_input2">
              <label for="gender" >gender</label>
              @error('gender')<span>{{$message}}</span>@enderror
              <input type="text" name="gender" id="gender" required>
          </div>


          <div class="form_input">
            <label for="phone" >phone</label>
            @error('phone')<span>{{$message}}</span>@enderror
            <input type="phone" name="phone" id="phone" required>
          </div>

          
          <div class="form_input">
            <label for="Email" >Email</label>
            @error('email')<span>{{$message}}</span>@enderror
              <input type="email" name="email" id="Email" required>
          </div>


          <div class="form_input">
            <label for="password" >Password</label>
            @error('password')<span>{{$message}}</span>@enderror
            <input type="password" name="password" id="password" required>
            

          </div>
          <div class="form_input"><label for="confirm_password">confirm_password </label>
          @error('password')<span>{{$message}}</span>@enderror
            <input type="password" name="password_confirmation" id="confirm_password" required>
          </div>

          <div class="form_input">
            <button type="submit" class="sign_up_btn "> sign up</button>
          </div>
          </form> 
        </div>
        <a href="/index.html" class="close-btn" id="close-btn" target="_blank">&times;</a> 
  
</div>

@stop