<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{asset('css/stylee.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <section class="Home-page">
     <div class="container-fluid" id="blur">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top "> 
      <div class="container-fluid">
        <a class="navbar-brand ms-2 " href="#"><img class ="logo-nav" src="/image/logo.jpeg" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto ">
            <li class="nav-item  mb me-5 ">
              <a class="nav-link active text-white fw-bolder" aria-current="page" id="Log-out-btn" href="{{url('home')}}">Log out</a>
              </li>
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

        <a href="{{route('logout')}}" type="button" class="btn btn-primary btn-light me-5 bg-white text-dark fw-bolder" id="signlogin">
          logout
          <a href="" class="user_name">{{auth()->user()->first_Name}}</a>
        </a>
        @endauth

      </div>
    </nav>
  </div>  
  <!--start edit  -->
  <div class="edit" id="blurr">
     <div class="topnav" >
      <a  href="#myticketcontener" id="my-ticket-btn">My Ticket</a>
      <a href="#Notifications" id="Notifications-btn">Notification</a>
      <a href="#contact" id="credit-btn">Credit Card</a>
      <a href="#wallet" id="wallet-btn">Wallet</a>
      <a  class="active"  href="#Edit-account-page" id="EditAccountBtn">Edit account</a>
    </div> 
        <div class="Edit-account-page" id="Edit-account-page">
            <form class="Edit-account-form" method="post" action="{{url('/profileUpdate')}}">
              @csrf

              <div class="Edit-account-input2 ">
              <input type="hidden" name="id" id="profession" class="input444" value='{{auth()->user()->id}}' >
                <p type="text" name="First_Name" id="First_Name"  >{{auth()->user()->first_Name}}</p>
              </div>

              <div class="Edit-account-input2">
                <p type="text" name="Last_Name" id="Last_Name" required placeholder="Last Name">{{auth()->user()->last_Name}} </p>
              </div>

              <div class="Edit-account-input ">
                  <p type="text" name="National_ID" id="National_ID">{{auth()->user()->national_ID}}</p>
              </div>

              <div class="Edit-account-input2">
                  <p type="text" name="date_birth" id="date_birth" >{{auth()->user()->date_of_birth}}</p>
              </div>

              <div class="Edit-account-input2 ">
                  <input type="text" name="profession" id="profession" required placeholder="{{auth()->user()->profession}}" class="input444" >
                  @error('profession')<p style="width: auto; color: red;"><b>{{$message}}</b>@enderror
              </div>

              <div class="Edit-account-input2 ">
                  <input type="text" name="health_status" id="Health_status" class="National_IDx  input444" required placeholder="{{auth()->user()->health_status}}" >
                  @error('health_status')<p style="width: auto; color: red;"><b>{{$message}}</b>@enderror
              </div>
              
              <div class="Edit-account-input2 ">
                  <p type="text" name="gender" id="gender">{{auth()->user()->gender}}</p>
              </div>

              <div class="Edit-account-input">
                <input type="phone" name="phone" id="phone" required placeholder="{{auth()->user()->phone}}" class="input444" >
                @error('phone')<p style="width: auto; color: red;"><b>{{$message}}</b>@enderror
              </div>

              <div class="Edit-account-input">
                  <input type="email" name="email" id="Email" required  placeholder="{{auth()->user()->email}}" class="input444">
                  @error('email')<p style="width: auto; color: red;"><b>{{$message}}</b>@enderror
              </div>

              <div class="Edit-account-input">
                <button type="button" class="edit-Change-Password " id="edit-Change-Password">Change Password</button>
                <button type="submit" class="edit-Save-Change " id="edit-Save-Change">Save Change</button>
              </div>
            </form>
        </div>  
  </div>
   <!-- start Notification -->
   <div class="Notification" id="Notifications">
    <form action="" method="" class="form-Notification">
      <input for="" placeholder="27/2" class="input40"></input>
      <input for="" placeholder="7:30pm" class="input40"></input>
     <label for="">

     @forelse ($user->notifications as $notification )
     <p> {{$notification->data['name']}} </p>
     @empty
       
     @endforelse

     </label>
     <button id="edit-ticket" type="button" class="edit-ticket" name="edit-ticket">هل تريد تعديل التذكره</button> 
     </form>
      </div>
  <!-- popup Notification -->
    <div class="Notification-popup" id="Notification-popup">
    <form action="" method="" class="form-Notification-popup">
      <h2 class="title-notification">Ticket modification</h2>
    <div class="group-natification-input">
      <label for="cars">-:معاد الباص</label>
      <select id="cars" name="carlist" form="carform">
      <option value="volvo">12:2</option>
      <option value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option value="audi">Audi</option>
      </select>
    </div>
    <div class="group-natification-input">
      <label for="line-bus">-:خط السير</label>
      <input type="line-bus" name="line-bus" id="line-bus">
    </div>
    <div class="group-natification-input">
      <label for="num-bus">-:رقم الباص</label>
      <input type="num-bus" name="num-bus" id="num-bus">
    </div>
    <button id="save-edit-ticket" type="submit" class="save-edit-ticket" name=" save-edit-ticket">حفظ التعديل</button> 
    </form>
  <div class="close-btn-six" id="close-btn-six">&times;</div> 
    </div>
    <!-- edite time -->
    <div class="Notification-popup" id="Notification-popup-2">
      <form action="" method="" class="form-Notification-popup">
        <h2 class="title-notification">Ticket modification</h2>
      <div class="group-natification-input">
        <label for="cars">-:معاد الباص</label>
        <select id="cars" name="carlist" form="carform">
        <option value="volvo">12:2</option>
        <option value="saab">Saab</option>
        <option value="opel">Opel</option>
        <option value="audi">Audi</option>
        </select>
      </div>
      <div class="group-natification-input">
        <label for="line-bus">-:خط السير</label>
        <input type="line-bus" name="line-bus" id="line-bus">
      </div>
      <div class="group-natification-input">
        <label for="num-bus">-:رقم الباص</label>
        <input type="num-bus" name="num-bus" id="num-bus">
      </div>
      <button id="save-edit-ticket" type="submit" class="save-edit-ticket" name=" save-edit-ticket">حفظ التعديل</button> 
      </form>
    <div class="close-btn-six" id="close-edit">&times;</div> 
      </div>
  <!-- end Notification -->  
  <div class="change-password-form " id="popup-change-password">
      <div class="change-password-body">
        <form  method="">
          <h2 class="title-change">Change Password</h2>
       <div class="input-Change-password">
        
        <label for="Old-password">Old password</label>
        <input type="password" name="Old-password" id="Old-password">
       </div>
       <div class="input-Change-password">
        <label for="New-password">New password</label>
        <input type="password" name="New-password" id="New-password">
       </div>
       <div class="input-Change-password">
        <label for="Confirm-Password">Confirm Password</label>
        <input type="password" name="Confirm-Password" id="Confirm-Password">
       </div>
        <button id="save-btn" type="button" class="save" name="save-password">Save</button> 
        <div class="remember-user">
          <a href="#" id="forgot-password-user" class="text">Forgot your password</a>
        </div>
      </form>
      </div>
    <div class="close-btn" id="close-btn">&times;</div> 
    
  </div>
  <!-- start wallet -->
  <div class="wallet" id="wallet">
    <div class="label_1">
        <p class="p_0">Fund</p>
        <p class="p_9">E.G 70</p>
    </div>
    <div class="label_2">
        <h5 class="h_990">تفاصيل الشحن</h5>
        <form action="">
            <label class="la" for="">Chosse Payment Method</label>
            <select id="Payment_Method" name="">
                <option value="volvo">adfgfdsgdsfhdfghxsdfgzd</option>
                <option value="volvo">adfgfdsgdsfhdfghxsdfgzd</option>
                <option value="volvo">adfgfdsgdsfhdfghxsdfgzd</option>
            </select>
            <label class="lab" for="fname">Enter amount</label>
            <input class="inp" type="text" id="fname" name="fname" value="">
            <button class="but" type="button" value="Done" id="Done">Done</button>
        </form>
    </div>
</div>
<!-- start popoup wallet -->
<div class="wallet-popup" id="wallet-popup">
  <form action="">
    <h2 class="title-wallet-popup">Enter your Password</h2>
 <div class="enter-wallet-group-popup">
  <input type="text" name="password-walllet">
  <button type="submit" class="Done-wallet-popup"  id="Done-wallet-popup">Done</button>
 </div>
</form>
<div class="close-btn-wallet" id="close-btn-wallet">&times;</div> 
</div>

<!-- end popup wallet -->
  <!-- end wallet -->

  <div class="save-password-form " id="save-change-password">
    <div class="save-password-body">
      <form  method="">
        <h2 class="title-save">Save Change ?</h2>
    <div class="button-save-password">
      <button id="save-yas" type="submit" class="save-yas" name="save-yas">Yas</button>
      <button id="save-no" type="submit" class="save-no" name="save-no">No</button>
    </div>
    </form>
    </div>
  <div class="close-btn-two" id="close-btn-two">&times;</div> 
  </div>
  <!-- hesham -->
  <div class="contaner-user-Account" id="popupuser-Name-Account">
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
              <input type="radio" id="html" name="chosse_way" value="HTML" class="chosse_way0">
              <div class="label1">
                  <label for="html">Send the code to the phone number +*********14</label><br>
              </div>
              <input type="radio" id="css" name="chosse_way" value="CSS" class="chosse_way">
              <div class="label1">
                  <label for="css">Send the code to the e-mail w************9@gmail.com</label><br>
              </div>
              <button type="button" class="button1"  id="send">Send</button>
          </form>
      </div>
      
      <div class="close-btn-three" id="close-btn-three">&times;</div> 
  </div>
</div>
<!-- end hesham -->
<!-- start entercode -->
<div class="Enter-code" id="popup-Enter-code">
  <form action="">
    <h2 class="title-code">Enter the 4-digit code</h2>
 <div class="enter-code-group">
  <input type="text" name="codedigit">
  <button type="button" class="send-code"  id="send-code">Send</button>
 </div>
</form>
<div class="close-btn-four" id="close-btn-four">&times;</div> 
</div>
<!-- end enter code -->
<!-- start new password -->
<div class="new-password-form" id="popup-new-password">
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
    <button id="save-new-password" type="submit" class="save-new-password">Save</button> 
  </form>
  </div>
<div class="close-btn-five" id="close-btn-five">&times;</div> 
</div>
<!-- popup log out -->
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
<!-- end popup log out -->
<!--my ticket-->

  <div class="myticket-contener"  id="myticket-contener">
    <div class="myticket-contant">
      <div class="contant-ticket" id="blur4">
        <form action="" method="get">
         <div class="time-date-ticket">
          <p>number<br> of stations</p>
          <label for="">Ticket 2</label>
         </div>
         
         <div class="information-ticket"> 
         <label for="">7</label>
        </div>
      
        <div class="information-Button">
          <button class="button-1">Metro</button>
          <label  for="">price: 10</label>
        </div>
        </form>
        <div class="icon-my-ticket">
          <a href=""><i class="fa-solid fa-trash-can"></i></a>
          <a id="edit-time-ticket0"><i class="fa-solid fa-pencil"></i></a>
          <a  id="icon-Qr"><i class="fa-solid fa-qrcode" ></i></a>
        </div>
      </div>
    </div>
    <!-- tow  -->
   <div class="myticket-contant-two">
    <div class="contant-ticket-metro" >
      <form action="" method="get">
       <div class="time-date-ticket-metro">
        <label for="" >Bus 12</label>
        <label for="">9:00 AM</label>
       </div>
       <div class="icfst">
        <a href="http://"><i class="fa-solid fa-location-arrow "></i></a>
        <a href="http://"><i class="fa-solid fa-location-dot "></i></a>
      </div>
       
       <div class="information-ticket-metro-1"> 
        <label for="">2415 Street</label>
        <label for="" class="top-title-2">15-Dec-2022</label>
        <label for="">2415 Street</label>
        <label for="" class="top-title0">15-Dec-2022</label>
      </div>
      <div class="information-Button-metro">
        <button class="button-2">Bus</button>
        <label   class=" price-2" for="">price:  10</label>
      </div>
      <div class="icon-my-ticket-two">
        <a href="http://"><i class="fa-solid fa-trash-can"></i></a>
        <a id="edit-time-ticket"><i class="fa-solid fa-pencil"></i></a>
        <a id="icon-Qr2"><i class="fa-solid fa-qrcode"></i></a>
      </div>
      </form>

     </div>
   </div>
   <!-- popup qr-my ticket -->
   
    </div>
    <div class="Qr-popup" id="Qr-popup">
      <div class="overlay-2"></div>
      <div class="close-qr" id="close-qr">&times;</div> 
    </div>
  
<!-- end my ticket -->
<!-- start credit cerd -->
<div class="credit-cerd-parent" id="credit-cerd-parent">

    <div class="edit_visa">
   <div class="prosly">

       <p class="i207">
           **** **** **** 8304
       </p>
       <p class="i208">
           Visa
       </p>
       <p class="i209">
           <i id="icone90" class="fa-brands fa-cc-visa"></i>
       </p>
       <a class="button_del_visa"><i class="fa-solid fa-trash-can"></i></a>
   </div>
   </div>
     <form action="" method="">
        <div class="card-add-new" id="card-add-new">
          <div class="card-new-row">
            <div>
              <label for="Card-Number" >Card Number</label>
              <input type="text" name="Card-Number" id="Card-Number"  placeholder="5678 - 5678 - 8765 - 8765" class="input44" >
            </div>
            <div >
              <label for="CVV" >CVV</label>
              <input type="password" name="CVV" id="CVV" placeholder="***" class="cvv-input" class="input44">
            </div></div>
       <div class="card-new-row">
        <div>
          <label for="Card-Holder"  >Card Holder's Name</label>
          <input type="text" name="Card-Holder" id="Card-Holder"  placeholder="Jackie chan" class="input44" >
        </div>
        <div>
          <label for="Expiry-Date" >Expiry Date</label>
          <input type="date"  name="Expiry-Date" id="Expiry-Date" class="Expiry-Date" class="input44" >
        </div></div>
  
        <div class="form_input">
          <button type="submit" class="add-button ">Add</button>
        </div>
        <div class="btn-group-card">
          <button type="submit" class="Done-button" > Done</button>
          <button type="button" class="Enter-PIN-Code" id="Enter-PIN-Code">Enter PIN Code</button>
        </div>
      
      </div>
    </form>
  


</div>




<!-- end credit cerd -->


 <!-- end edit -->




  
  </section>






</body>





    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/indexe.js')}}"></script>
</body>
</html>