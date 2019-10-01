/* slide bar */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("tutup").style.display = "block";
    document.getElementById("buka").style.display = "none";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("buka").style.display = "block" ;
    document.getElementById("tutup").style.display = "none";
    
  }

/* ------------- navbar -------------*/
$(document).on("scroll", function() 
{
	if($(document).scrollTop()>500) {
		$("nav").removeClass("large").addClass("small");
	} else {
		$("nav").removeClass("small").addClass("large");
	}
});


/* --------------scroll -----------*/

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
        document.getElementById("myBtn2").style.display = "none";
    } else {
        document.getElementById("myBtn").style.display = "none";
        document.getElementById("myBtn2").style.display = "block";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
}

// When the user clicks on the button, scroll to the top of the document
function topFunction2() {      
        $("html, body").animate({ scrollTop: 600 }, 600); 
        return false; 
        }
       


 /* --------------popup-----------*/
       
$(document).ready(function() {
  var active = Cookies.get('active'); //baca cookie nama active
  if (active == 'yes') 
  {  $('#pop').modal('hide');  return false;  } 
  else 
  {    $('#pop').modal('show');  }
  
  // simpan cookie //  Cookies.set('nama', 'nilai', { expires: hari_kadaluarsa }); 
  $(".modal-check").change(function() 
  {    Cookies.set('active', 'yes', { expires: 1 });   });
  
  //waktu hide modal
  setTimeout(function(){    $('#pop').modal('hide');   }, 10000);
  
  });
        
 /* --------------conter popup-----------*/

  
var count = document.getElementById('countdown');
timeoutfn = function(){   count.innerHTML = parseInt(count.innerHTML) - 1;  setTimeout(timeoutfn, 1000);  };
setTimeout(timeoutfn, 1000);