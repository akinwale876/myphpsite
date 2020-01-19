<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<title>Register With us - NaijaRamz</title>

    
<?php

include 'head.php';

?>



</head>
<body>

       <?php
                include 'header.php';    ?>


                       <center><h1>Register With Us</h1></center>

           <div class="wrapper">

                            <p>already have account <a href="http://naijaramz.com/login">Login</a></p>
<div class="main">
    <center>
    <div class="im">
                                    <form name="form" action="/" method="get" onsubmit="return false">

<div class="input-container">
  
<input type="text"  id="firstname" placeholder="First Name">


<span class="input-error-report"></span>

</div>

<div class="input-container">
  


<input type="text" id="lastname" placeholder="Last Name">
<span class="input-error-report"></span>

</div>







<div class="input-container">
  
<input type="text"  id="email" placeholder="Email">


<span class="input-error-report"></span>

</div>




<div class="input-container">
  
<input type="password"  id="password" placeholder="Create a Password">


<span class="input-error-report"></span>

</div>




<div class="input-container">
  
<input type="password"  id="confirm" placeholder="Confirm Password">


<span class="input-error-report"></span>

</div>




<br>
<input type="submit"  name="submit" onclick="register()" id="butto" value="Submit!" >

</form>
</div>



</center>
</div>

<div class="sidebar">
    
    <div class="hide">
    
<p id="status"></p>
               
<p id="loaded"></p>
               
<progress id="progressbar" value="" max="100"></progress>

    </div>
    
</div>

           
           
           </div>


<style>
    
    .main{
        
        background:rgb(250,250,250);
        box-shadow:none;
    }
    
    
    body{
        background:rgb(250,250,250);
    }
    
    ol{
        
        list-style:none;
        margin:7px;
    }
    
    
    .im{
        
        
        width:250px;
        background:white;
    }
    
    input{
        
        border:none;
        border-bottom:2px solid rgb(30,80,33);
    }
    input:hover{
        
        border:none;
        border-bottom:2px solid rgb(30,280,33);
    }
    
    
    .hide{
        
        
        display:none;
    }
    
</style>





<style>
    
    

    
    
    
    
</style>





<?php


include 'footer.php';

?>



<script src="reg.js"></script>





<script>
    
    
    

setTimeout(function(){
    
    
    
    
    $('#butto').click(function(){
        
        
    $('.hide').slideDown(200)
    
    
    })
    
    
    
    
    
    
},2000)


</script>
</body>
</html>