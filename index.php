<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">

  
    <title>Document</title>
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


        <section class="category">
            <h1 class="heading">shop by category</h1>
            <div class="swiper category-slider">
                <div class="swiper-wrapper">

                    <a href="category.php?category=laptop" class="swiper-slide slide" >
                        <i class="fa-solid fa-glass-water fa-2xl"></i>
                        <h3>น้ำดื่ม</h3>
                    </a>
                    <a href="category.php?category=tv" class="swiper-slide slide">
                    <i class="fa-solid fa-glass-water fa-2xl"></i>
                        <h3>ยำ</h3>
                    </a>
                    <a href="category.php?category=camera" class="swiper-slide slide">
                    <i class="fa-duotone fa-bowl-rice fa-2xl"></i>
                        <h3>ข้าวต้ม</h3>
                    </a>
                    <a href="category.php?category=mouse" class="swiper-slide slide">
                    <i class="fa-solid fa-pot-food"></i>
                        <h3>เกาเหลา</h3>
                    </a>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>


       
       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
      <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
      <script src="assets/script/script.js"></script>
     <script>

        var swiper = new Swiper(".category-slider", {
            loop:true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable:true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                650: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
        });
     </script>
</body>
</html>