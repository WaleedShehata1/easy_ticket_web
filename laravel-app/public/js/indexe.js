let tab = document.querySelector(".change-password-form");
var forgotpassworduser = document.getElementById("forgot-password-user");
var popupchange = document.getElementById("popup-change-password");
var popupchangesave = document.getElementById("save-change-password")
var clsoebtn = document.getElementById("close-btn");
var clsoebtntwo = document.getElementById("close-btn-two");
var closebtnthree = document.getElementById("close-btn-three")
var editChangePassword = document.getElementById("edit-Change-Password");
var blur = document.getElementById('blur');
var savebtn= document.getElementById('save-btn');
var popupuserNameAccount= document.getElementById('popupuser-Name-Account');
var closebtnfour =document.getElementById('close-btn-four');
var popupEntercode =document.getElementById('popup-Enter-code');
var send =document.getElementById('send');
var sendcode =document.getElementById('send-code');
var popupnewpassword =document.getElementById('popup-new-password');
var closebtnfive =document.getElementById('close-btn-five');
var editticket = document.getElementById('edit-ticket');
var Notifications = document.getElementById('Notifications');
var Notificationpopup =document.getElementById('Notification-popup');
var Notificationpopup2 =document.getElementById('Notification-popup-2');
var closebtnsix = document.getElementById('close-btn-six');
var Notificationsbtn =document.getElementById('Notifications-btn');
var EditAccountBtn =document.getElementById('EditAccountBtn');
var Editaccountpage =document.getElementById('Edit-account-page');
var blurr = document.getElementById('blurr');
var savenewpassword = document.getElementById('save-new-password');
var closebtnlogout =document.getElementById('close-btn-logout');
var Logoutpopup = document.getElementById('Log-out-popup');
var Logoutbtn =document.getElementById('Log-out-btn');
var wallet = document.getElementById('wallet');
var walletpopup =document.getElementById('wallet-popup');
var Done =document.getElementById('Done');
var closebtnwallet=document.getElementById('close-btn-wallet');
var walletbtn =document.getElementById('wallet-btn');
var Donewalletpopup =document.getElementById('Done-wallet-popup');
var iconQr = document.getElementById('icon-Qr');
var iconQr2 = document.getElementById('icon-Qr2');

var Qrpopup = document.getElementById('Qr-popup');
var closeqr = document.getElementById('close-qr');
var myticketcontener = document.getElementById('myticket-contener');
var edittimeticket = document.getElementById('edit-time-ticket');
var edittimeticket0 = document.getElementById('edit-time-ticket0');
var closeedit= document.getElementById('close-edit');
var myticketbtn = document.getElementById('my-ticket-btn');
var creditcerdparent = document.getElementById('credit-cerd-parent');
var creditbtn = document.getElementById('credit-btn');



var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
                
            }
        }

// end


// popup log-out
    Logoutbtn.onclick=function(){
    Logoutpopup.style.display='block';
    blur.classList.add('activee');
    blurr.classList.add('activeet');
    Notifications.style.display ="none";
    }
    closebtnlogout.onclick=function(){
    Logoutpopup.style.display='none';
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
    }
//end log-out

//qr popup

    iconQr.onclick=function(){
    Qrpopup.style.display='block';
    myticketcontener.style.display='none'
    blur.classList.add('activee');
    blurr.classList.add('activeet');
    }
    iconQr2.onclick=function(){
        Qrpopup.style.display='block';
        myticketcontener.style.display='none'
        blur.classList.add('activee');
        blurr.classList.add('activeet');
        }

    closeqr.onclick=function(){
        Qrpopup.style.display='none';
        myticketcontener.style.display='block';
        blur.classList.remove('activee');
        blurr.classList.remove('activeet');
        }
// end

// edit time ticket
edittimeticket.onclick=function(){
    Notificationpopup2.style.display='block';
    myticketcontener.style.display='none'
    blur.classList.add('activee');
    blurr.classList.add('activeet');
    }
    edittimeticket0.onclick=function(){
        Notificationpopup2.style.display='block';
        myticketcontener.style.display='none'
        blur.classList.add('activee');
        blurr.classList.add('activeet');
        }
    closeedit.onclick=function(){
        Notificationpopup2.style.display='none';
        myticketcontener.style.display='block'
        blur.classList.remove('activee');
        blurr.classList.remove('activeet');
        }
    // end time ticke
    // myticketbtn
    myticketbtn.onclick=function(){
        myticketcontener.style.display='block';
        Notifications.style.display ="none";
        Editaccountpage.style.display ="none";
        wallet.style.display ="none";
        creditcerdparent.style.display="none";

        }
    //  end myticketbtn




editChangePassword.onclick=function(){
    popupchange.style.display ="block";
    blur.classList.add('activee');
    blurr.classList.add('activeet');
}
clsoebtn.onclick=function(){
    popupchange.style.display ="none";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
savebtn.onclick=function(){
    popupchangesave.style.display ="block";
    popupchange.style.display ="none";
    blur.classList.add('activee');
    blurr.classList.add('activeet');
  
}

clsoebtntwo.onclick=function(){
    popupchangesave.style.display ="none";
     blur.classList.remove('activee');
     blurr.classList.remove('activeet');
}

forgotpassworduser.onclick=function(){
    popupuserNameAccount.style.display ="block";
    popupchange.style.display ="none";
    blur.classList.add('activee');
    blurr.classList.add('activeet');
}

closebtnthree.onclick=function(){
    popupuserNameAccount.style.display ="none";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
// enter code

send.onclick=function(){
    popupEntercode.style.display ="block"
    popupuserNameAccount.style.display ="none";
    blur.classList.add('activee');
    blurr.classList.add('activeet');
}
closebtnfour.onclick=function(){
    popupEntercode.style.display ="none";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
sendcode.onclick=function(){

    popupEntercode.style.display ="none";
    popupnewpassword.style.display ="block";
    blur.classList.add('activee');
}
 savenewpassword.onclick =function(){
    popupnewpassword.style.display ="none";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
closebtnfive.onclick=function(){
    popupnewpassword.style.display ="none";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
// end enter code
// start Edit Account Page
EditAccountBtn.onclick=function(){
    Editaccountpage.style.display ="block";
    Notifications.style.display ="none";
    wallet.style.display ="none";
    myticketcontener.style.display='none';
    creditcerdparent.style.display="none";
  
}

// // start popup natifaction
editticket.onclick=function(){
    Notifications.style.display ="none";
    Notificationpopup.style.display ="block";
    wallet.style.display ="none";
    blur.classList.add('activee');
    blurr.classList.add('activeet');
    creditcerdparent.style.display="none";
   
}
closebtnsix.onclick=function(){
    Notifications.style.display ="block";
    Notificationpopup.style.display ="none";
    blurr.classList.remove('activeet');
    blur.classList.remove('activee');
}
Notificationsbtn.onclick=function(){
    Notifications.style.display ="block";
    Editaccountpage.style.display ="none";
    wallet.style.display ="none";
    myticketcontener.style.display='none'
    creditcerdparent.style.display="none";
}
// popup wallet
walletbtn.onclick=function(){
    wallet.style.display ="block";
    Notifications.style.display ="none";
    Editaccountpage.style.display ="none";
    myticketcontener.style.display='none';
    creditcerdparent.style.display="none";
    
}


Done.onclick=function(){
    walletpopup.style.display ="block";
    wallet.style.display ="none";
    blur.classList.add('activee');
    blurr.classList.add('activeet');

}
closebtnwallet.onclick=function(){
    walletpopup.style.display ="none";
    wallet.style.display ="block";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}
Donewalletpopup.onclick=function(){
    walletpopup.style.display ="none";
    wallet.style.display ="block";
    blur.classList.remove('activee');
    blurr.classList.remove('activeet');
}

creditbtn.onclick=function(){
    creditcerdparent.style.display="block";
    wallet.style.display ="none";
    Notifications.style.display ="none";
    Editaccountpage.style.display ="none";
    myticketcontener.style.display='none';
    
}









