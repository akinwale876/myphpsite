<?php 

require  'connection.php';



$errors = array();



if($conn){
    
    
    if(isset($_POST['name'])){
        
        if(!empty($_POST['name'])){
            
            $name = ucfirst(trim($_POST['name']));
            
            
        }else{
            
            array_push($errors, 'your name is required, ');
        }
    }
    
    
    if(isset($_POST['email'])){
        
        if(!empty($_POST['email'])){
            
            $email = ucfirst(trim($_POST['email']));
            
            
        }else{
            
            array_push($errors, 'your email is required, ');
        }
    }
    
    if(isset($_POST['comment'])){
        
        if(!empty($_POST['comment'])){
            
            $comment = ucfirst(trim($_POST['comment']));
            
            
        }else{
            
            array_push($errors, 'comment  is required');
        }
    }
    
    
    
    
    
    
}





















//display errors


if(!empty($errors)){
    
    foreach($errors as $value){
        
        
        echo $value ;
    }
    
}else{
    
    $date = date_create();
    $comment_id = $_POST['comment_id'];
    
    $date = date_timestamp_get($date);
    
    
    if(!empty($_POST['website'])){
        
            $website = $_POST['website'];

    }else{
        
            $website = 'none';

        
    }
    
    
    
    
    $comm = "INSERT INTO `comment` (`comment_id`,`name`,`email`,`comment`,`website`,`date`) VALUES ('$comment_id','$name','$email','$comment','$website','$date')";
    
    
    if(mysqli_query($conn, $comm)){
        
        echo 'comment post successfully';
    }else{
        
                echo 'comment post failed';

    }
    
    
}


?>