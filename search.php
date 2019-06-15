<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">    
<title>Home | Welcome to Bing</title>
<link href="home.css" rel="stylesheet" type="text/css">
<link href="home.js" rel="script" type="text/javascript">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Numans" rel="stylesheet">
<!--Import materialize.css-->

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>   
     $(document).ready(function(){
    $('#new-arrivals').carousel();
  
  });
  function myFunction(){
  console.log(document.getElementById("dropdown"));
}
    
  </script>
</head>

<body>

  <div class="navbarx"><div class="bing_title"><a href="index.php"><img src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
	  <div class="shop"><a style="color:white;" href="cart.php">SHOP</a></div><div class="about">ABOUT</div><div class="contact">CONTACT</div></div>
  <div style="float: left;" class="bing-bot"><img src="images/popcorn_bot.gif" width="600" height="400" alt=""/></div>
  
  
  
 <div class="dropdownx">
  <button class="dropbtnx"><img src="images/usericon.png" class="user" width="26" height="28" alt=""/></button>
  <div class="dropdownx-content">
    <a href="login.php">Login</a>
    <a href="register.php">Sign Up</a>
    <a href="#">Profile</a>
  <a href="logout.php">Logout</a>
  </div>
   </div>

  


  
  
<div class="cart"><img src="images/cart.png" width="30" height="30" alt=""/></div>
  <div class="shopby"><div id="wrapper">
  <!-- <a href="#" class="my-super-cool-btn">
    <div class="dots-container">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <span>SHOP BY FRANCHISE</span>
  </a> -->
</div></div>
  <div class="shopbyc"><div id="wrapper2">
<!--   <a href="#" class="my-super-cool-btn">
    <div class="dots-container">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <span>SHOP BY CATEGORY</span>
  </a> -->
</div></div>
  <!-- <div class="spec"><div class="specfic">Got something specific in mind?</div> -->

  <div class="scrolll"><div class="arrow">
                <!-- <span></span>
                <span></span>
                <span></span> -->
  
</div></div></div>

<div style='display:none;'>
    <img src="ajax-loader.gif" />
</div>
  <form name = "form">
  <div style="position: absolute;top:52%;left:20%;" class="search-box">
  <input class="search-txt" name="name" id="fn" type="text" placeholder="SEARCH">
  <button style="background: none;border:none;width:25px;height:25px;"><a class="search-btn" href="#"><img class="search_img" src="images/search.png"></a></button>
</div>
  </form>
  <div id = "s-results">
    <!-- This is where our search results will be displayed -->
</div>
 
<div style='clear:both;'></div>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.4.2.min.js'></script>
<script type="text/javascript">
// jQuery code will be here

$(document).ready(function(){
    //load the current contents of search result
    //which is "Please enter a name!"
    $('#s-results').load('search_results.php').show();
 
 
    $('#search-btn').click(function(){
        showValues();
    });
 
    $(function() {
        $('form').bind('submit',function(){
            showValues();
            return false;
        });
    });
 
    function showValues() {
        //loader will be show until result from
        //search_results.php is shown
        $('#s-results').html('<p><img src="ajax-loader.gif" /></p>');
 
        //this will pass the form input
        $.post('search_results.php', { name: form.name.value },
 
        //then print the result
        function(result){
            $('#s-results').html(result).show();
        });
    }
 
});
</script>
  
  
  <!-- <div class="na">
  <div class="NEW">NEW </div>
  <div class="ARRIVALS">ARRIVALS</div>
 <div class="carousel" id="new-arrivals">
    <a class="carousel-item" href="#one!"><img src="images/Animations-Tintin&Snowy.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="images/Books&Novels-HarryPotter4.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="images/Comics-SuicideSquad.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="images/Books&Novels-ProfessorShanku.jpg"></a>
    <a class="carousel-item" href="#five!"><img src="images/Animations-ToHogwartsCastle.jpg"></a>
  </div></div> -->
  
</body>
</html>
