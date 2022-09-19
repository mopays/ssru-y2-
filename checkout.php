<?php 
  require_once('assets/config/connect.php');
  session_start();
  if(!isset($_SESSION['user'])){
      header('location:index.php');
  }
  $id = $_SESSION['user'];
  if(isset($_POST['order'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $address = $_POST['address'];
    $placee_on = date('d-m-y');

    $cart_total = 0;
    $cart_products[] = '';
    
    $cart_query = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $cart_query->execute([$id]);
    if($cart_query->rowCount() > 0){
        while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
            $cart_products[] = $cart_item['pname'].'('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['pprice'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }
    $total_product = implode(',', $cart_products);
    $order_quert = $db->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
    $order_quert->execute([$name, $number, $email, $method, $address, $total_product, $cart_total]);

    if($cart_total == 0){
        $message[] = 'your cart is empty';
    }else if($order_quert->rowCount() > 0){
        $message[] = 'order placed already';
    }else{
        $insert_order = $db->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, place_on) VALUES(?,?,?,?,?,?,?,?,?)");
        $insert_order->execute([$id, $name, $number, $email, $method, $address, $total_product, $cart_total, $placee_on]);

        $delete_cart = $db->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart->execute([$id]);

        $message[] = 'order placed success';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>checkout</title>
</head>
<body>
    <?php  include_once('header.php'); ?>

        <section class="display-orders">
            <?php
                $cart_grand_total = 0;
                $select_cart_items = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $select_cart_items->execute([$id]);
                if($select_cart_items->rowCount() > 0){
                    while($fetch_cart_times = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
                        $cart_total_price = ($fetch_cart_times['pprice'] * $fetch_cart_times['quantity']);
                        $cart_grand_total += $cart_total_price;
        
            ?>
            <p><?php echo $fetch_cart_times['pname'] ?> <span>(<?php echo $fetch_cart_times['pprice']. '฿'. 'x' . $fetch_cart_times['quantity']?>)</span></p>
            <?php 
                        }
                    }else{
                        echo '<p class="empty"> your cart is emoty</p>';
                    }
            ?>
            <div class="grand-total">grand total : <span>฿ <?php echo $cart_grand_total?></span></div>
        </section>
        <section class="checkout-order">
            <form action="" method="post">
                <h3>place your order</h3>
                <div class="flex">
                    <div class="inputBox">
                        <span>your name :</span>
                        <input type="text" name="name" placeholder="enter your name" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>your number :</span>
                        <input type="number" name="number" placeholder="enter your number" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>your email :</span>
                        <input type="email" name="email" placeholder="enter your email" class="box" required>
                    </div>
                    <div class="inputBox">
                       <span>payment method : </span>
                       <select name="method"  class="box" required>
                           <option value="cash on delivery" default> cash on delivery</option>
                           <option value="credit card">credit card</option>
                           <option value="K+">K+</option>
                       </select>
                    </div>
                    <div class="inputBox">
                        <span>address line1 :</span>
                        <input type="text" name="address" placeholder="enter your address" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>country :</span>
                        <input type="text" name="country" placeholder="enter your country" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>pic code :</span>
                        <input type="number" name="pin_code" placeholder="enter your pin code" class="box" required>
                    </div>
                </div>
                <input type="submit" name="order" class="btn <?php echo($cart_grand_total > 0)? '':'disabled'; ?>" value="place order">
            </form>
        </section>

    <?php  include_once('footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>