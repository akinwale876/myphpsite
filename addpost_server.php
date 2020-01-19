<?php

 session_start();
 


require 'connection.php';






$errors = array();


if($conn){


    echo '<span style="color:green;font-size:9px;">conneted</span>';
}

if(isset($_POST['title'])){


if(!empty($_POST['title'])){


if(strlen($_POST['title']) > 6){

$title = trim($_POST['title']);


}else{

    array_push($errors, '<span style="color:red;">title length must be greater than 6</span>');


}











}else{
    array_push($errors, '<span style="color:red;">title is blank</span>');


}





}
else{

    array_push($errors, 'title is required');
}





































if(isset($_POST['tag'])){


if(!empty($_POST['tag'])){


if(strlen($_POST['tag']) > 3){

$tag = $_POST['tag'];
 $tag=preg_replace("/[^a-zA-Z0-9\- ]/"," ", $tag);


}else{

    array_push($errors, '<span style="color:red;">tag length must be greater than 3</span>');


}











}else{
    array_push($errors, '<span style="color:red;">tag is blank</span>');


}





}
else{

    array_push($errors, 'tag is required');
}






























if(isset($_POST['description'])){

    if(!empty($_POST['description'])){


if(strlen($_POST['description']) > 10){


$description = $_POST['description'];


 $description=preg_replace("/[^a-zA-Z0-9\- ]/"," ", $description);


}else{

    array_push($errors, '<span style="color:red;">description length must be greater than 10</span>');


}









    }else{

            array_push($errors, '<span style="color:red;">description is blank</span>');

    }





}
else{

    array_push($errors, 'description is required');
}






if(isset($_POST['category'])){

    if($_POST['category'] != 'select'){
$category = $_POST['category'];


    }else{

            array_push($errors, '<span style="color:red;">please select category</span>');

    }





}
else{

    array_push($errors, 'category is required');
}
















if(isset($_POST['content'])){

    if(!empty($_POST['content'])){


if(strlen($_POST['content']) > 100){


$content = $_POST['content'];
$content = str_replace("\n", '<p>', $content);

$content = str_replace("===", '<li>', $content);


$content = str_replace("[[[", '<h4>', $content);
$content = str_replace("]]]", '</h4>', $content);
$content = str_replace("[[", '<h2>', $content);
$content = str_replace("]]", '</h2>', $content);

$content = str_replace("((", '<center><img width="68%" src="', $content);
$content = str_replace("))", '"></center>', $content);


}else{

    array_push($errors, '<span style="color:red;">content length must be greater than 100 characters</span>');


}















    }else{
    array_push($errors, '<span style="color:red;">content is blank</span>');


    }







}
else{

    array_push($errors, 'content is required');
}



if(isset($_FILES['file'])){

$file_name = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$file_tmp = $_FILES['file']['tmp_name'];


$extensions = array('jpg','png','jpeg');

$extract  = explode('.',$file_name);

$get_ext = end($extract);

if(!in_array($get_ext, $extensions)){


array_push($errors, '<span style="color:red;">extension not allowed</span>');
}
    


if($file_size > 2000000){


array_push($errors, '<span style="color:red;">file size must be 200000 bytes or less</span>');


}





}else{

    array_push($errors, '<span style="color:red;">please select file</span>');

}





$check_q = "SELECT title FROM posts WHERE title='$title'";

$qqq = mysqli_query($conn,$check_q);

if(mysqli_num_rows($qqq) > 0){

        array_push($errors, '<span style="color:red;">post already exist</span>');

}




if(empty($errors)){



if(move_uploaded_file($file_tmp, 'images/' . $file_name)){
    
$picture_url = 'http://mysmartgist.com.ng/images/' . $file_name;


 $url=preg_replace("/[^a-zA-Z0-9\- ]/"," ", $title);
$url =str_replace(' ','-',$url);
$url = str_replace('---','-', $url);
$url =str_replace(' ','-',$url);
$url = str_replace('---','-', $url);



 $cleanurl = str_replace('--','-', $url);

 $cleanurl = strtolower($cleanurl);


$title = $title;

$date = date_create();

 $date = date_timestamp_get($date);


 $day = date('d');

$month = date('m');


 $year = date('Y');




















 
 if(isset($_SESSION['access'])){
     
         
   $password = $_SESSION['access'];      
         
         
         
$sql = "SELECT * FROM author WHERE  password='$password' ";
    
    $queryv = mysqli_query($conn,$sql);
    
    
    
    if($queryv){
    
        
    $data = mysqli_fetch_array($queryv);
    
  $firstname = $data['first_name'];
    $lastname = $data['last_name'];
    $email = $data['email'];
    $active = $data['active'];
    $ip = $data['ip'];
        
    }
    


$author = $firstname . $lastname;
    
    
 }else{
     

$author = 'admin';
     
 }

























 $comment_id = substr(substr($cleanurl, 0,2) . uniqid(),0,10);





$query =mysqli_query($conn,"INSERT INTO `posts` (`title`, `description`, `content`, `author`, `year`, `month`, `day`, `picture_url`, `cleanurl`, `category`, `likes`,`views`,`tag`, `comment_id`, `date`) VALUES ('$title', '$description', '$content', '$author', '$year', '$month', '$day', '$picture_url', '$cleanurl', '$category', '0', '0','$tag', '$comment_id', '$date')");







if($query){

echo '<span style="color:green;">post added successfully</span>';


//$arr = array('message' => 'Testing Post for our new tutorial. Graph API.');

//$res = $fb->post('PAGE_ID/feed/', $arr, 'ACCESS_TOKEN');




}else{
echo '<span style="color:red;">post failed</span>';


}




}else{


   echo '<span style="color:red;">file upload fail</span>';
}






}else{




   foreach($errors as $key => $err){

echo $key .' ' .$err . '<br>';
   }





}




?>