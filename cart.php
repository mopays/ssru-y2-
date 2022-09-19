 <?php 

    require_once('assets/config/connect.php');
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }
    
    $id = $_SESSION['user'];

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_cart_item = $db->prepare("DELETE FROM `cart` WHERE pid = ?");
        $delete_cart_item->execute([$delete_id]);
        header('location:cart.php');
    }
    if(isset($_GET['delete_all'])){
        $delete_cart_item = $db->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart_item->execute([$id]);
        header('locaiton:caart.php');
    }
    if(isset($_POST['update_p_qty'])){
        $cart_id  = $_POST['cart_id'];
        $p_qty = $_POST['p_qty'];
        $update_p_qty = $db->prepare("UPDATE `cart` SET quantity = ? WHERE pid = ?");
        $update_p_qty->execute([$p_qty, $cart_id]);
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

  
    <title>Cart</title>
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




        <!-- cart -->
        <section class="shopping">
        <h1 class="heading">product added</h1>

        <div class="box-container">
         
            <?php
                $gran_total = 0;
                $select_cart = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $select_cart->execute([$id]);
                
                while($row = $select_cart->fetch(PDO::FETCH_ASSOC)){
                    if($select_cart->rowCount() > 0){
                
               
            ?>
            <form action=""  method="post" class="box">
                <a href="cart.php?delete=<?php echo $row['pid']?>" name="delete" class="fas fa-times" onclick="return confirm('do you srue you want to delete')"></a>
                <img src="assets/image/menu/<?php echo $row['imag']?>" alt="">
                <div class="name"><?php echo $row['pname']?></div>
                <div class="price"><?php echo $row['pprice']?> ฿ </div>
                <input type="hidden" name="cart_id" value="<?php echo $row['pid'] ?>">
               <div class="flex-btn">
                    <input type="number" min="1" value="<?php echo $row['quantity'] ?>" class="p_qty" name="p_qty">
                    <input style="margin-top:0;" type="submit" value="update" name="update_p_qty" class="option-btn">
               </div>
                <div class="sub-total">sub total : <span><?php echo  $sub_total = ($row['pprice'] * $row['quantity'])?> ฿</span></div>
            </form>
    
            <?php 
            $gran_total += $sub_total;     
                }else{
                    echo "<p style='text-align:center;color:red;font-size:4rem;'>no product add</p>";
                }
            }
         ?>
           
         
        </div>

        <div class="cart-total">
                <p>gran total : <span><?php echo $gran_total ?> ฿</span></p>
                <a href="home.php" class="option-btn">continue shopping</a>
                <a href="cart.php?delete_all" class="delete-btn <?php echo ($gran_total > 1)? '': 'disabled'; ?>" >Delete all</a>
                <a href="checkout.php" class="btn <?php echo ($gran_total > 1)? '': 'disabled'; ?>">proceed to checkout</a>
        </div>
     
     </section>

    




       



    <?php include_once('footer.php')?>
    
       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js"></script>
      
      <script src="assets/script/script.js"></script>

</body>
</html>