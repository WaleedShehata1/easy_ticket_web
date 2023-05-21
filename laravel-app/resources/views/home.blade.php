@extends('layouts.HeaderAndFooters')



@section('contant')

<!-- form metro -->
<div id='login-form'class='login-page' >
    <div class="main " >
      <div class="title-mine">
        <h1>Make you life<br>is easier with<br>
        easyTicket
      </h1>
      <h2>Simplify your payments with EasyTicket PayPay for your EasyTicket rides and food orders, send funds to your family, and so much more with Careem Pay.</h2>
      </div>
        
          <div class="social-icons">
          <a href="" ><img src="image/android-download.png" class="googleplay-img" ></a>
          <a href="" ><img src="image/appstore.png"  class="iphon-img"></a>
          </div>
    </div>
    @auth
    <div class="form-box">
        <div class='button-box'>
            <div id='btn'></div>
            <button type='button'onclick='BuyformBus()'class='toggle-btn'>
              <div><i class="fa-solid fa-bus-simple"></i></div>
              <div>Bus</div>
            </button>
            <button type='button'onclick='BuyformMetro()'class='toggle-btn'>
              <div><i class="fa-solid fa-train"></i></div>
              <div>Metro</div>
            </button>
        </div>
        <form id='BuyformBus' class='input-group-Bus'>
            <select class="input-field ">
              <option selected>Destination</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <select class="input-field ">
              <option selected>Loction</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <select class="input-field ">
              <option selected>How Many Ticktes</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>

            <button type='submit'class='submit-btn'>Buy Ticket Now</button>
        </form>
        <form id='BuyformMetro' class='input-group-Metro'>
            <select class="input-field ">
            <option selected>Starting station</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <select class="input-field ">
            <option selected>Fainal station</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <select class="input-field ">
            <option selected>How Many Ticktes</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
            <button type='submit'class='submit-btn'>Buy Ticket Now</button>
          </form>
    </div>
    @endauth
  </div>
</section>
<div class="section-about" id="section-about">
  <div class="container" id="sectionabout" >
    <div class="title">
      <h1>About US</h1>
    </div>
    <div class="content">
      <div class="article">
        <h3>
          Lorem ipsum dolor sit amet<br>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<br>
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <br>
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        
          </h3>
            <div class="button">
              <a href="Read More">Read More</a>
            </div>
      </div>
    </div>
    <div class="imags-section">
    <img src="image/metro.jpg" alt="" srcset="" class="img-metro">
      <img src="image/bus2.jpg" alt="" srcset="" class="img-bus">
    </div>

  </div>
</div>
<!-- SER -->
<div class="Services-contener" id="Services-contener">
  <div class="header">
      <h1>Services</h1>
  </div>
  <div class="contant">
      <div class="parent-col">
          <div class="col2">
              <div></div>
          </div>
          <div class="col1">
              <div class="col3"><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem quisquam molestias optio! Deserunt fuga maxime optio iure eum nisi quam porro excepturi sit earum ducimus voluptate, incidunt nobis aperiam at?</p></div>
          </div>
          <div class="col6">
              <div class="col3"><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem quisquam molestias optio! Deserunt fuga maxime optio iure eum nisi quam porro excepturi sit earum ducimus voluptate, incidunt nobis aperiam at?</p></div>
          </div>
          <div class="col4">
              <div></div>
          </div>
          <div class="col5">
              <div></div>
          </div>
          <div class="col1">
              <div class="col3"><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem quisquam molestias optio! Deserunt fuga maxime optio iure eum nisi quam porro excepturi sit earum ducimus voluptate, incidunt nobis aperiam at?</p></div>
          </div>
      </div>
  </div>
</div>
<!-- Contact -->
<div class="page_contact" id="page_contact">
  <div class="Header_ContactUs">
      <h1 class="Contact-US-titel">Contact US</h1>
  </div>
  <div class="contant-0">
      <form action="">
          <div class="Form_Contact-Us">
              <div class="Input_Form-00">
                  <div class="Top_Form-00">
                      <div class="Input_Half">
                          <label for="">Your email address <span>*</span> </label>
                          <input id="" type="text">

                          <label for="">Phone number <span>*</span></label>
                          <input id="" type="text">

                          <label for="">Service <span>*</span></label>
                          <input id="" type="text">
                      </div>
                      <div class="address">
                              <div>
                                  <p><i class="fa fa-location-dot"></i>XYZ Road, ABC BUILDING</p>
                              </div>
                              <p>5St. Ahmed, Cairo</p>
                              <div>
                                  <p><i class="fa-solid fa-phone-flip"></i>+20 11 1547 653</p>
                              </div>
                              <p>5St. Ahmed, Cairo</p>
                              <div>
                                  <p><i class="fa-regular fa-envelope"></i>easyticket@email.com</p>
                              </div>
                      </div>

                  </div>

                  <label for="">What can we help you with? <span>*</span></label>
                  <input type="text">

                  <label for="">Description <span>*</span></label>
                  <input class="des" type="text">
                  <label for="">Please enter the details of your request. A member of our support staff will respond as soon as possible.</label>

                  <label id="att" for="">Attachments</label>
                  <input type="text">
                  <input id="Submit_ContantUs" type="submit">
              </div>
          </div>
      </form>
  </div>
@stop