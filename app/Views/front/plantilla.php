<!--ACTUALIZACION-->
  <?php
$tituloVar = "titulo";
$$tituloVar = "¡BIENVENIDOS";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $$tituloVar; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
<h1><?php echo $$tituloVar; ?></h1>
<br><br>
    <div class="slider">


        <div class="list">

            <div class="item">
                <img src="assets/img/donas.jpg" alt="">

                <div class="content">
                    <div class="title">SWEET VIBE'S</div>
                    <div class="type">¡CONOCE NUESTRAS DONAS!</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                        consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sequi, aut.
                    </div>
                    <div class="button">
                        <button>SEE MORE</button>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="assets/img/chocos.jpg" alt="">

                <div class="content">
                    <div class="title">SWEET VIBE'S</div>
                    <div class="type">¡NUESTRO CHOCOLATE!</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                        consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sequi, aut.
                    </div>
                    <div class="button">
                        <button>SEE MORE</button>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="assets/img/sandia.jpg" alt="">

                <div class="content">
                    <div class="title">SWEET VIBE'S</div>
                    <div class="type">¡GOMITAS!</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                        consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sequi, aut.
                    </div>
                    <div class="button">
                        <button>SEE MORE</button>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="assets/img/dubai.webp" alt="">

                <div class="content">
                    <div class="title">SWEET VIBE'S</div>
                    <div class="type">¡TENDENCIAS!</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                        consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sequi, aut.
                    </div>
                    <div class="button">
                        <button>SEE MORE</button>
                    </div>
                </div>
            </div>

        </div>


        <div class="thumbnail">

            <div class="item">
                <img src="assets/img/donas.jpg" alt="">
            </div>
            <div class="item">
                <img src="assets/img/chocos.jpg" alt="">
            </div>
            <div class="item">
                <img src="assets/img/sandia.jpg" alt="">
            </div>
            <div class="item">
                <img src="assets/img/dubai.webp" alt="">
            </div>

        </div>


        <div class="nextPrevArrows">
            <button class="prev">
                < </button>
                    <button class="next"> > </button>
        </div>


    </div>


    <script src="assets/js/app.js"></script>
</body>

</html>


