<?php
    require_once('assets/config/connect.php');

    session_start();

    #if(isset($_SESSION['user_id'])){
       # $user_id = $_SESSION['user_id'];
    #}else{
        #$user_id = '';
        
    #}
    #if(isset($_POST['send'])){
       #$name = $_POST['name'];
       #$name = filter_var($name, FILTER_SANITIZE_STRING);
        #$email = $_POST['email'];
        #$email = filter_var($email, FILTER_SANITIZE_STRING);
        #$number = $_POST['number'];
        #$number = filter_var($number, FILTER_SANITIZE_STRING);
        #$msg = $_POST['msg'];
        #$msg = filter_var($msg, FILTER_SANITIZE_STRING);

        #$select_message = $db->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ? ");
        #$select_message->execute([$name, $email, $number, $msg]);

        #if($select_message->rowCount() > 0){
           # $message[] =  ' message already send';
        #}else{
            #$insert_msg = $db->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
            #$insert_msg->execute([$user_id, $name, $email, $number, $msg]);


            #$message[] = 'sent message successfully';
        #}
    #}


?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- cdn -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.css" />
   <link rel="stylesheet" href="assets/css/style.css">

    <title>contract</title>
</head>
<body>
<?php include_once('header.php') ?>

<div class="contact">
    <form action=""method="post">
        <h3>ติดต่อฉัน</h3>
        <input type="text" name="name" placeholder="enter your name" required class="box">
        <input type="email" name="email" placeholder="enter your email" required class="box">
        <input type="number" name="number" placeholder="enter your number" required onkeypress="if(this.value.length == 10 )return false ;" class="box">
        <textarea name="msg" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
        <input type="submit" name="send" value="send message"  class="btn">
    </form>
</div>
<?php include_once('footer.php') ?>


<script src="assets/script/script.js"></script>
</body>
</html>