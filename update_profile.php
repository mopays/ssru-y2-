<?php 
    require_once('assets/config/connect.php');
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

  
    <title>Update Profile</title>
</head>
<body>

    <?php include_once('header.php'); ?>

    <div class="position">
        <div class="test">
            <img class="image" src="assets/image/home.jpeg" alt="">
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d484.3659977823391!2d100.5067509!3d13.7832149!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29bdfded78095%3A0x21fce47dfa53e40b!2z4LiC4LmJ4Liy4Lin4LiV4LmJ4Lih4Lir4Lix4Lin4Lib4Lil4Liy4Liq4Liy4Lih4LmA4Liq4LiZ!5e0!3m2!1sth!2sth!4v1658402824918!5m2!1sth!2sth" width="670" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </div>




        <!-- update-profile -->
        <seciton class="update-profile">

            <h1 class="heading">Update profile</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <img src="assets/upload_image/<?php echo $fetch_profile['image']?>"> 
                <div class="flex">
                    <div class="inputBox">
                        <span>username :</span>
                        <input type="text" name="name" value=" "placeholder="update username" required class="box">
                        <span>user email :</span>
                        <input type="email" name="email" value="" placeholder="update user email" required class="box">
                        <span>update pic :</span>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png"   class="box">
                        <input type="hidden" name="old_image" value="<">
                    </div>
                    <div class="inputBox">
                        <input type="hidden" name="old_pass" value=">">

                        <span>old password :</span>
                        <input type="password" name="update_pass" placeholder="enter previous password"  class="box">
                        <span>new password :</span>
                        <input type="password" name="new_pass" placeholder="enter new password"  class="box">
                        <span>confirm password :</span>
                        <input type="password" name="confirm_pass" placeholder="confirm new password"  class="box">
                    </div>
                </div>
                <div class="flex-btn">
                    <input type="submit" class="btn" value="update profile" name="update_profile">
                    <a href="home.php" class="option-btn">go back</a>
                </div>
            </form>

    </seciton>

       



    <?php include_once('footer.php')?>
    
       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js"></script>
      
      <script src="assets/script/script.js"></script>

</body>
</html>