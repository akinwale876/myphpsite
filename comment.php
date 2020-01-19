

<br>

<hr>

<?php


$comment_sql = "SELECT * FROM comment WHERE comment_id='$comment_id'";

$comment_query = mysqli_query($conn,$comment_sql);

if(mysqli_num_rows($comment_query) > 0){
    
    echo '<h2 name="comment">Comments</h2>';

    
}else{
    echo '<h2 style="text-align:center;" name="comment"> No Comment Yet</h2>';

}



while($comment_data = mysqli_fetch_array($comment_query)){
    
    
$comment_name = $comment_data['name'];

$comment_email = $comment_data['email'];

$comment_comment = $comment_data['comment'];

$comment_date =  date(' l m:ha d-M-Y',$comment_data['date']);


echo '<div class="post" style="position:relative;"><img style="border:none;" class="img" src="http://www.smartgist.com.ng/icons/avatar.jpg"><div class="post-title">
<h4>'.$comment_name.' Says </h4><span>on </sapn>
<small style="color:rgb(100,100,100);"><em><span style="color:rgb(150,140,100);"><b style="color:rgb(100,100,100);"><small><i class="fas fa-clock">'.$comment_date.'</i></span></em></small>
<br>
<br>

'.$comment_comment.'
<br>

</small></b>
</div>


</div><br>';
    
    
    
}








?>




<hr>


<br>


<h2><img src="http://smartgist.com.ng/icons/basic2-004_comment_chat-512.png" height="80px">Leave a Comment</h2>

<form id="commentForm" action="" method="post" onsubmit="return false">
    
         <div class="input-container" style="width:90%;">
             
                                <input type="hidden"  id="commentId" value="<?php echo $comment_id;?>" />

             
                   <input type="text" name="name" id="name" placeholder="Name" />
         </div>
         
         <div class="input-container">
                   <input type="text" name="email"  id="email" placeholder="Email" />
         </div>
         
         <br>
             
             <textarea id="comment" rows="6" style="width:90%;"  name="comment" placeholder="Place Comment"></textarea>
             
         <br>
         
         
         
    
         
         <div class="input-container" style="width:90%;">
                   <input type="text" name="website" id="website" placeholder="Your Website" />
         </div>
    
    
      
         <br>
         
        
         <div class="input-container" style="width:90%;">
                   <input type="submit" name="submit" id="submit" onclick="comm()" value="Post Comment!" />
         </div>
</form>




<script>
    
    
    $('#submit').click(function(){
        
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();
        var website = $('#website').val();
        var commentId = $('#commentId').val();

        
        
        $.post("http://naijaramz.com/comment_server.php", {
    name: name,
    email: email,
    comment: comment, 
    website: website,
    comment_id: commentId
  }
  
  ,function(data){
        
        
        alert(data);
        
        
        
     
        
    });
    
    
    
    
    })
</script>


