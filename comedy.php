<!DOCtype
 html>
<html>


<head>
<title>Comedy - Smart Gist  Latest Comedy Video - Smart Gist</title>


<?php

include $_SERVER['DOCUMENT_ROOT'] . "/head.php";

?>


<meta name="description" content="Smart gist download latest comedy videos" />
<link rel="canonical" href="https://www.smartgist.com.ng/Comedy" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="object" />
<meta property="og:title" content="Comedy - Download Latest Comedy videos" />
<meta property="og:description" content="download latest comedy videos" />
<meta property="og:url" content="http://www.smartgist.com.ng/Comedy" />

</head>


<body>

<?php

include $_SERVER['DOCUMENT_ROOT'] . "/header.php";

?>

<div class="wrapper">
<h2>Category: Comedy</h2>


<div class="main">
<?php


require $_SERVER['DOCUMENT_ROOT'] . '/connection.php';


$list_post_query = mysqli_query($conn,"SELECT * FROM movies WHERE category='Comedy' ORDER BY id DESC LIMIT 11 ");


if(mysqli_num_rows($list_post_query) > 0){
echo '<h4 style="background:black;padding:7px;"><span style="background:black;color:white;dispaly:inline-block;border-radius:9px 0 0;padding:3px;">Latest Comedy</span></h4>' ;


}




while($mov = mysqli_fetch_array($list_post_query)){

$list_title = $mov['full_title'];
$list_cleanurl = $mov['cleanurl'];
$list_image = $mov['picture_url'];
$list_discription = $mov['short_story'];
$list_date = date('l m:ha d-M-Y',$mov['date']);


echo '<a style="text-decoration:none;color:black;" href="http://'. $_SERVER["SERVER_NAME"].'/video/'.$list_cleanurl.'"><div class="post" style="position:relative;"><img alt="'. preg_replace("/[^:a-zA-Z0-9\-|]/",' ',$list_title).'" class="img" src="'.$list_image. '"><div class="post-title">
<h4 style="margin-bottom:8px;">DOWNLOAD: '.preg_replace("/[^:a-zA-Z0-9\-|]/",' ',$list_title).'</h4>
<small style="color:rgb(100,100,100);"><em><span style="color:rgb(140,140,100);font-size:13px;">'. substr($list_discription,0,190).'</span></em> <span style="color:brown;font-weight:bold;margin-left:4px;font-size:9px;">Read More...</span></small>
<br>
<span class="hov" style="position:absolute;top:0;left:0;padding:3px;font-size:9px;border:1px solid black;font-weight:bold;">'.$list_category.'</span>
<span class="hov" style="position:absolute;top:0;right:0;padding:3px;font-size:9px;border:none;font-weight:bold;background:red;"><i class="fa fa-comment"></i></span>
<br>
<b style="color:rgb(10,10,10);"><small><i class="fa fa-clock">'. $list_date .'</i>
</small></b>
</div>


<a style="position:absolute;bottom:10px;right:64px;font-size:9px;display:inline-block;background:#3b5998;color:white;padding:4px;box-shadow:0px 6px 6px 0 rgb(200,200,200);line-height:5px;text-decoration:none;" target="blank" href="https://www.facebook.com/sharer/sharer.php?u=http://smartgist.com.ng/' . $list_cleanurl.'">
    <img src="http://smartgist.com.ng/icons/iconfinder_social_media_applications_1-facebook_4102573.png" height="20px" style="border-radius:50%;"  />
    share
    </a>
        
<a style="position:absolute;bottom:10px;right:6px;font-size:9px;display:inline-block;background:#00acee;color:white;padding:4px;box-shadow:0px 6px 6px 0 rgb(200,200,200);line-height:5px;text-decoration:none;" target="blank" href="https://twitter.com/intent/tweet?text='.$list_title.'&url=http://smartgist.com.ng/' . $list_cleanurl.'">
    
    <img  src="http://smartgist.com.ng/icons/iconfinder_social_media_applications_6-twitter_4102580.png 
" style="border-radius:50%;" height="20px" />
share
</a>
    
    
</div></a><br>';

}



?>

</div>


















<?php

include $_SERVER['DOCUMENT_ROOT'] . "/sidebar.php";

?>

</div>


<?php

include $_SERVER['DOCUMENT_ROOT'] . "/footer.php";

?>


</body>

</html>