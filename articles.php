<!DOCtype
 html>
<html>


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Articles - Naijaramz</title>



<meta property="og:locale" content="en_US" />
<meta property="og:type" content="object" />
<meta property="og:title" content="articles &raquo; naijaramz" />
<meta property="og:description" content="articles" />
<meta property="og:url" content="https://naijaramz.com/articles" />
<meta property="og:site_name" content="naijaramz" />

<?php

include "head.php";

?>


</head>


<body>

<?php

include "header.php";

?>

<div class="wrapper">

<h2>Category: Articles/How to</h2>

<div class="main">
    
    
    
<?php


require 'connection.php';





if(isset($_GET['page'])){
    

echo '<center><h2>Articles  - Page ' .$_GET['page'] . '</h2></center>';
  
}

$p = 0;


if(isset($_GET['page'])){
    
   $p =  $_GET['page'] * 11;
    
}




$list_post_query = mysqli_query($conn,"SELECT * FROM posts WHERE category='How to'ORDER BY id DESC LIMIT $p,11");


if(mysqli_num_rows($list_post_query) > 0){
echo '<h5 style="box-shadow:0px 6px 6px 0px rgb(100,100,100);background-color:white;color: black;padding: 8px;font-size:11px;"></span>Articles  <span style="text-indent: 10px;"></h5>
' ;


}




while($mov = mysqli_fetch_array($list_post_query)){

$list_title = $mov['title'];
$list_cleanurl = $mov['cleanurl'];
$list_image = $mov['picture_url'];
$list_description = $mov['description'];
$list_content = $mov['description'];

$list_category = $mov['category'];
$list_comments = $mov['comments'];
$list_comments_id = $mov['comment_id'];
$list_views = $mov['views'];

$list_date = date(' l  d / M / Y',$mov['date']);

$current_date = date_create();

$current_date = date_timestamp_get($current_date);


$count_date = $mov['date'];



$count_date =  ($current_date - $count_date);

$comment_post_query = mysqli_query($conn,"SELECT * FROM `comment` WHERE `comment_id` = '$list_comments_id'");


$num_post_query = mysqli_num_rows($comment_post_query);







  
  $days = floor($count_date / (60 * 60 * 24));
  $hours = floor(($count_date % (60 * 24)) / (1000 * 60 * 60));
 $minutes = floor(($count_date % ( 60)) / (1000 * 60));
 $seconds = floor(($count_date % (1000 * 60)) / 1000);
  
  

    
    $time = $minutes  . ' mins ';
    
$likes = $mov['likes'];
//

echo '<a style="text-decoration:none;color:black;" href="http://'. $_SERVER["SERVER_NAME"].'/'.$list_category.'/'.$list_cleanurl.'">

<div class="post" style="position:relative;">
<img alt="'.$list_title.'" class="img" src="'.$list_image. '">

<div class="post-title">
<h4 style="margin-bottom:8px;">'. ucfirst($list_title).'</h4>
<br>
<span class="hov" style="padding:3px;font-size:9px;>'.$list_category.'</span>


<b style="color:rgb(10,10,100);position:absolute;left:9px;bottom:10px;"><small><i class="fa fa-clock">'. $list_date .'</i>
</small><span style="margin-left:5px;color:red;font-size:10px;"><i class="fa fa-eye"></i>'.$list_views.' views</span></b><br><span class="content" id="one" style="color:rgb(140,140,140);font-family: Source Sans Pro,sans-serif 
;">
<span class="hov" style="padding:3px;font-size:9px;border:none;font-weight:bold;"><i class="fa fa-comment"></i>'.$num_post_query.'</span>
'. str_replace('h2','',str_replace('<h1>','',substr($list_content,0,120))) .'</span><span style="color:brown;font-weight:bold;margin-left:4px;font-size:9px;"></span>

</div>


    
</div></a><br>';

}





$pig_query = mysqli_query($conn,"SELECT * FROM posts WHERE category='Articles'");



$num = mysqli_num_rows($pig_query) / 11;


echo '<fieldset style="padding:0;border:1px solid rgb(200,200,200);"><legend>Pages</legend><center>';

  for($i = 2;$i < $num; $i++){
      
      if($i == $_GET['page']){
          
          continue;
      }
      
          echo '<a style="display:inline-block;border-radius:10px;margin:5px;background:rgb(222,222,222);padding:7px;font-weight:bold;" href="http://smartgist.com.ng/articles/page/'. $i.'">'.$i.'</a>';

      
  }


echo '</center></fieldset>';








if(isset($_GET['page'])){
    
echo '<h2>Home - ';

   echo 'Page ' . $_GET['page'];
    
}


echo '</h2>';



?>

</div>


<?php

include "sidebar.php";

?>

</div>


<?php

include "footer.php";

?>


</body>

</html>