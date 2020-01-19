<?php

session_start();




if(!isset($_SESSION['access'])){
    
    header('location: http://'.$_SERVER["SERVER_NAME"].'/login');
}



?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<title>Add Post - Naija Ramz </title>

    
<?php

include 'head.php';

?>


<meta name="robots" content="noindex" />

</head>
<body>


                       <center><h1>Post to Naija Ramz  <small style="font-size:11px;"><i class="fa fa-book">Select Category</i></small>




<select name="Category" id="category">
  <option>select</option>

  <option>Articles</option>
  <option>Food</option>
  <option>Entertainment</option>
  <option>Smartphones</option>
  <option>Celebrity</option>
  <option>Technology</option>
  <option>Fashion</option>
<option>Sport</option>
  <option>Telecommunication</option>
  <option>Browsing Tip</option>
  <option>How To</option>
  <option>Travels</option>
  <option>Cities</option>
  <option>Nature</option>
<option>Lifestyle</option>

</select>
<a style="color:red;font-size:10px;" href="http://smartgist.com.ng/Music">check list</a></h1></center>

           <div class="wrapper">

                            
                            <form name="form" action="/add post" method="get" onsubmit="return false">

<div class="input-container">
  
<input type="text"  id="title" placeholder="Enter Title">


<span class="input-error-report"></span>

</div>
<div class="input-container">
  
<input type="text"  id="tag" placeholder="Enter Tag">


<span class="input-error-report"></span>

</div>

<div class="input-container">
  


<input type="text" id="description" placeholder="Description">
<span class="input-error-report"></span>

</div>



<br>





<center>  
<input type="file"  id="file">
</center>



<br>


<textarea rows="30" id="content" style="width:90%;padding:2px;box-shadow:0px 6px 6px 0px rgb(200,200,200);background:rgb(230,230,,230);" name="content" placeholder="Content...."></textarea>

<br>
<input type="submit"  name="submit" onclick="uploadFile()" id="ddd" value="Publish Post!">

</form>

           
           
           
           </div>









<?php


include 'footer.php';

?>



<div class="boot" id="boot" style="width:30%;height:200px;position:fixed;bottom:-30px;left:-30px;display:none;background:white;box-shadow:0px 8px 8px 0px rgb(200,200,200);">
    <h6 style="background:black;margin:0;padding:6px;"><progress id="progressbar" value="" max="100"></progress><span style="color:red;float:right;cursor:pointer;"
    onclick="$('.boot').animate({left:'-31px',top:'-28px'},'fast');$('.boot').slideUp('slow');
                              ">&times;</span></h6>

    <div style="padding:5px;">
        
<small id="status"></small>
               
<small id="loaded"></small>
               

           
        
    </div>
    
</div>




<script src="addpost.js"></script>


<style>
    
      .input-container{
          
             box-shadow:0px 2px 2px 0px rgb(240,240,240);
      }
    
</style>

   
           <script>
           
           
           
           function laterClose(){
               
               
               setTimeout(function(){
                      
                                                    $('.boot').animate({left:"-31px",top:"28px"},"fast");

                      $('#boot').fadeOut(100);
                   
               },9000)
           }
           
           
               
                     $('#ddd').click(function(){
                         
                         
                              $('.boot').slideDown('fast');
                              $('.boot').animate({left:"31%",top:"28%"},"fast");
                              
                              
                              
                              laterClose();
                         
                     });
                  
           </script>

</body>
</html>