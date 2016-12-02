$(document).ready(function() {

/*  // only small screens
  if($(window).width() <= 600){
    // show menu on swipe to right
    $(document).on('swiperight', function(e) {
      e.preventDefault();
      $('#leftMenu').animate({
        left: '0'
      });
    });
    // hide menu on swipe to left
    $(document).on('swipeleft',function(e){
      e.preventDefault();
      $('#leftMenu').animate({
        left: '-100%'
      });
    });
  } */
    
$("#login").click(function(){
        $("#loginform").slideToggle(400);
    });

//      LIKES FUNCTION

$("#search").click(function(){
        $("#searchbar").slideToggle(400);
    });
    

$(document).on('click', '.follow', function(){ 

if($(this).attr('title') == 'Follow'){
   $that = $(this);
   $.post('action_follow.php', {id:$(this).attr('id'), action:'follow'},function(){
    $that.children('img').attr('src','images/unfollow.png');
    $that.attr('title','Unfollow');
   });

}else{
   if($(this).attr('title') == 'Unfollow'){ 
    
    $that = $(this);
    $.post('action_follow.php', {id:$(this).attr('id'), action:'unfollow'},function(){
    $that.attr('title','Follow');
    $that.children('img').attr('src','images/follow.png');
    });

   }}
    
 });
});

$(document).on('click', '.like', function(){
    
$likes = parseInt($(this).attr('value'));

  if($(this).attr('title') == 'Like'){
   $that = $(this);
    $likes = $likes +1;
   $.post('action.php', {pid:$(this).attr('id'), action:'like'},function(){
    $that.children('img').attr('src','images/liked2.png');
    $that.attr('title','Unlike');
    $that.attr('value',$likes);
   });

    $('.likes').html($likes); 
  }else{
   if($(this).attr('title') == 'Unlike'){     
    if($likes>0){
          $likes = $likes - 1;       
      }

    $that = $(this);
    $.post('action.php', {pid:$(this).attr('id'), action:'unlike'},function(){
     $that.children('img').attr('src','images/liked.png');
     $that.attr('title','Like');
    $that.attr('value',$likes);

    });

  $('.likes').html($likes); 
   }
  }
    
 });
    
   
(function(){
function deleteconf(){
    var dbutton1 = document.createElement("button");
    var dbutton2 = document.createElement("button");
    var dp = document.createElement("p");
    var dtext1 = document.createTextNode("Delete");
    var dtext2 = document.createTextNode("Don't delete");
    var dtext3 = document.createTextNode("Are you sure?");  
    dp.appendChild(dtext3);
    dbutton1.appendChild(dtext1);
    dbutton2.appendChild(dtext2);
    
    var buttonbox = document.getElementById("deletebox");
    buttonbox.appendChild(dp);
    buttonbox.appendChild(dbutton1);
    buttonbox.appendChild(dbutton2);
    
    dbutton2.addEventListener('click',function(){
        while (buttonbox.lastChild){
            buttonbox.removeChild(buttonbox.lastChild);
        }
    });
}
    



// POST POPUP

function createPopup(e){
var $id = parseInt($(this).attr('value'));
var popup = document.createElement("div");
popup.className= 'popup';
var main = document.querySelector("main");
    
var closepopup = function(){
    main.removeChild(popup);
};

    
//  FETCH POSTINFO
fetch('post.php?id='+$id).then(function(response){
    return response.json();    
}).then(function(j){ 
    
    var output='<article><h3>'+j.UploadName+'</h3><br>'+j.Description;
    popup.innerHTML=output;
// document.querySelector("ul").innerHTML = output;
    
}).catch(function(err){
});
    
//document.querySelector('closebutton').addEventListener('click',closepopup);
main.appendChild(popup);

/*    
var deletebutton = document.getElementById("delete");
deletebutton.addEventListener('click',deleteconf);
}
*/
}
    
var postlink = document.querySelectorAll('.feedPost');
var j;
for(j=0;j<postlink.length;j++){
    postlink[j].addEventListener('click',createPopup);

}
    


})();