<?php
    require_once('assets/config/connect.php');
    session_start();

    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if(empty($username)){
            $error[] = 'please enter username';
        }else if(empty($password)){
            $error[] = 'please enter password';
        }else{
            $select = $db->prepare("SELECT * FROM `login` WHERE username = ? OR email = ? ");
            $select->execute([$username, $email]);
            $row =  $select->fetch(PDO::FETCH_ASSOC);

            if($username == $row['username'] OR $email == $row['email']){
                if($password ==  $row['password']){
                    $_SESSION['user'] = $row['id'];
                    header('refresh:1;home.php');
                    $loginMsg = 'ล็อกอินสำเร็จกำลังเข้าสู่ระบบ โปรดรอซักครู่';
                }else{
                    $error[] = 'รหัสผ่านไม่ถูกต้องโปรดลองอีกครั้ง';
                }
            }else{
                $error[] = 'username หรือ email ไม่ถูกต้องโปรดลองอีกครั้ง';
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

        <?php if(isset($loginMsg)){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $loginMsg ?>
            </div>
        <?php } ?>

        <section class="logins">
            <div class="right">
                <a href="register.php">back to register<i class="fa-solid fa-arrow-right"></i></a>
            </div>
           <div class="logo">
            <i class="fa-solid fa-fish"></i>
            <h1>ข้าวต้มหัวปลาสามเสน</h1>
            <p>เข้าสู่ระบบ</p>
           </div>
           <form action="" method="post">
            <div class="box">
                <label for="username">username or email</label>
                <input type="text" name="username" >
            </div>
            <div class="box">
                <label for="password">password</label>
                <input type="password" name="password" >
            </div>
            <div class="btm">
                <input class="btn" type="submit" name="login">login</input>
            </div>
        </form>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>