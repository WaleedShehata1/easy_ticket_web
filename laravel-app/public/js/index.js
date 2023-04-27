// let tab = document.querySelector(".tab-form00");
// let tabHeader = tab.querySelector(".tab-header");
// let tabHeaderElements = tab.querySelectorAll(".tab-header > div");
// let tabBody = tab.querySelector(".tab-body00 ");
// let tabBodyElements = tab.querySelectorAll(".tab-body00 > form");
var popup = document.getElementById("popup-tab-form");
var clsoebtn = document.getElementById("close-btn");
var signlogin = document.getElementById("signlogin");
var blur = document.getElementById('blur');
var savenewpassword =document.getElementById('save-new-password')
// allpopup
var forgotpassword1 = document.getElementById('forgot-password-1');
 var searchnationalnumbe = document.getElementById('search-national-numbe');
 var closesearchnational = document.getElementById('close-search-national');
 var searchbtn =document.getElementById('search-btn');
 var popupuserNameAccount1 =document.getElementById('popupuser-Name-Account-1');
 var close2 =document.getElementById('close-2');
 var popupEntercode2=document.getElementById('popup-Enter-code-2');
 var  send2 =document.getElementById('send-2');
 var close3 =document.getElementById('close-3');
 var send3 =document.getElementById('send-3');
 var popupnewpassword4= document.getElementById('popup-new-password-4');
 var close4 =document.getElementById('close-4');
 

 
 
 

// start home form
var x=document.getElementById('BuyformBus');
var y=document.getElementById('BuyformMetro');
var z=document.getElementById('btn');
function BuyformMetro()
{
    x.style.left='-400px';
    y.style.left='71px';
    z.style.left='50%';
    
}
function BuyformBus()
{
    x.style.left='71px';
    y.style.left='450px';
    z.style.left='0px';
}
// var modal = document.getElementById('login-form');
//         window.onclick = function(event) 
//         {
//             if (event.target == modal) 
//             {
//                 modal.style.display = "none";
                
//             }
//         }

// end

signlogin.onclick=function(){
    popup.style.display ="block";
    blur.classList.add('activee');
    modal.classList.add('activee');
}

window.onclick=function(event){
    if(event.target == popup){
        popup.style.display ="block";
    }
}

// allpopup
//popup1
forgotpassword1.onclick=function(){
    searchnationalnumbe.style.display ="block";
    blur.classList.add('activee');
    popup.classList.add('activee');
    modal.classList.add('activee');
}
closesearchnational.onclick=function(){
    searchnationalnumbe.style.display ="none";
    popup.classList.remove('activee');
}
// end popup1
// popup2
searchbtn.onclick=function(){
    popupuserNameAccount1.style.display ="block";
    searchnationalnumbe.style.display ="none";
    blur.classList.add('activee');
    popup.classList.add('activee');
    modal.classList.add('activee');
}
close2.onclick=function(){
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    popup.classList.remove('activee');
}
// popup3
send2.onclick=function(){
    popupEntercode2.style.display ="block";
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    blur.classList.add('activee');
    popup.classList.add('activee');
    modal.classList.add('activee'); 
}
close3.onclick=function(){
    popupEntercode2.style.display ="none";
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    popup.classList.remove('activee');
}

//popup4

send3.onclick=function(){
    popupnewpassword4.style.display="block";
    popupEntercode2.style.display ="none";
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    blur.classList.add('activee');
    modal.classList.add('activee');
    popup.classList.remove('activee');
}
close4.onclick=function(){
    popupnewpassword4.style.display="none"
    popupEntercode2.style.display ="none";
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    popup.classList.remove('activee');
   
}
savenewpassword.onclick=function(){
    popupnewpassword4.style.display="none"
    popupEntercode2.style.display ="none";
    popupuserNameAccount1.style.display ="none";
    searchnationalnumbe.style.display ="none";
    blur.classList.remove('activee');
    popup.classList.remove('activee');
    modal.classList.remove('activee');
   
}









