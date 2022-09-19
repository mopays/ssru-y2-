<?php
    require_once('assets/config/connect.php');
    
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $haspassword = md5($cpassword);
        
        if(empty($username)){
            $error[] = 'please enter username';
        }else if(empty($email)){
            $error[] = 'please enter email';
        }else if(empty($password)){
            $error[] = 'please enter password';
        }else if(empty($cpassword)){
            $error[] = 'please confirm password';
        }else{
            $select = $db->prepare("SELECT username,email FROM `login` WHERE username = ? OR email = ?  ");
            $select->execute([$username,$email]);
            $row = $select->fetch(PDO::FETCH_ASSOC);
            if($email != $row['email']){
                if($username != $row['username']){
                    if($password == $cpassword){
                        if($password >= 6 AND $cpassword >= 6){
                            $insert = $db->prepare("INSERT INTO `login` (`username`, `email`, `password`) VALUES ( ?, ?, ?)");
                            $insert->execute([$username, $email, $haspassword]);
                            $insertMsg[] = 'สมัครเส็จสิ้น';
                            header('refresh:1;index.php');   
                        }else{
                            $error[] = 'รหัสผ่าน
                            ต้องมี มากกว่า 6ตัว';
                        }
                    }else{
                        $error[] = 'รหัสผ่านไม่ตรงกัน ลองใหม่อีกครั้ง';
                    }
                }else{
                    $error[] = 'ชื่อผู้ใช้ถูกใช้ไปเเล้วกรุณาลองชื่ออื่น';
                }
            }else{
                $error[] = 'emailนี้ถูกใช้ไปเเล้วกรุณาป้อนemailอื่น';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ข้าวต้มหัวปลาสามเสน</title>
</head>
<body>
        <?php if(isset($error)){
            foreach($error as $error){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php }} ?>

        <?php if(isset($insertMsg)){
            foreach($insertMsg as $insertMsg){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $insertMsg ?>
            </div>
        <?php }} ?>

                      
        <section class="logins" style="height: 800px;margin-top: 50px;">
            <div class="left">
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i>back to login</a>
            </div>
           <div class="logo">
            <i class="fa-solid fa-fish"></i>
            <h1>ข้าวต้มหัวปลาสามเสน</h1>
            <p>สมัครสมาชิก</p>
           </div>
           <form action="" method="post">
            <div class="box">
                <label for="username">username</label>
                <input type="text" name="username" >
            </div>
            <div class="box">
                <label for="email">email</label>
                <input type="email" name="email" >
            </div>
            <div class="box">
                <label for="password">password</label>
                <input type="password" name="password" >
            </div>
            <div class="box">
                <label for="password">confirm password</label>
                <input type="password" name="cpassword" >
            </div>
         
           <div class="btm">
            <input type="submit" class="btn" name="register">register</input>
              </form>
           
           </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>