<header class="header">
        <sections class="flex">
            <a href="home.php" class="logo">ร้าน<span>ข้าวต้มหัวปลาสามเสน</span></a>
            <nav class="navber">
                <a href="home.php">home</a>
                <a href="order.php">orders</a>
                <a href="contact.php">contact us</a>
            </nav>
            <?php 
                $count_cart_items = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $count_cart_items ->execute([$id]);
               
            ?>
            <div class="icons">
                <a href="cart.php"><div class="fa-solid fa-cart-shopping">(<?php echo $count_cart_items->rowcount()?>)</div></a>
                
               
                <div class="fas fa-user" id="user-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
            <div class="profile">
              
                <p></p>
                

                <a href="logout.php" class="delete-btn" onclick="return confirm('logout form websute?');">logout</a>
            </div>
        </sections>
    </header>