<?php
    require_once('assets/config/connect.php');
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }
    $id = $_SESSION['user'];
 if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['msg'];
    

    if(empty($name)){
        $error[] = 'please enter your name';
    }else if(empty($email)){
        $error[] = 'please enter your email';
    }else if(empty($number)){
        $error[] = 'please enter your number';
    }else if(empty($message)){
        $error[] = 'please enter your message';
    }else{
        $insert_msg = $db->prepare("INSERT INTO message (user_id,name,email,number,message) VALUES(?,?,?,?,?)");
        $insert_msg->execute([$id,$name,$email,$number,$message]);
        $insert_success = 'insert success';
    }
   
 }


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
    <?php if(isset($error)){
        foreach($error as $error){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php }} ?>

    <?php if(isset($insert_success)){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $insert_success ?>
        </div>
    <?php } ?>

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