
$(document).ready(function(){
    $.ajax({ type: 'POST',  url : window.location.origin + '/statistik',  data: {  '_token': $('input[name=_token]').val(), },
    success: function (data) {	}, error: function(data) {   } });

/*
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
    {    }
    else
    {  window.location.href = "";  }
*/
});