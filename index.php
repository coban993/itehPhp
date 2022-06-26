<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookER</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <!-- OWL CAROSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- OWL CAROSEL -->

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="containter-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=#>
                    <img src="images/logoBeli.png" class="image-logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <ul class="nav navbar-nav navbar-right">


                    <li><a class="active" href="#">Home</a></li>

                    <!-- ADMIN MENU -->
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == "1") {
                        echo "<li><a href='adminMenu.php'>Admin menu</a></li>";
                    }
                    ?>

                    <?php if (!isset($_SESSION['id'])) {
                        echo "<li><a href='register.php'>Register</a></li>
                        <li><a href='login.php'>Login</a></li>";
                    }
                    ?>


                    <?php if (isset($_SESSION['id'])) {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }
                    ?>

                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == "0") {
                        echo "<li><a href='books.php'>Books</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    <div id="home">
        <div class="landing-text">
            <h1>BookER</h1>
            <h3>Rent any title you want</h3>
        </div>
    </div>

    <div class="padding">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <img src="images/openBook.png">
                </div>

                <div class="col-sm-6 text-center">
                    <h2>About us</h2>
                    <p class="lead">At BookER, our mission is to make it easier for everyone to experience the world.
                        So we’re going beyond being the best place to book any kind of title to become the
                        ultimate knowldege platform. And the place to book it all – from room nights and day tours
                        to airport transfers and in-stay services.</p>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime laudantium blanditiis
                        sunt voluptates accusamus consectetur necessitatibus possimus modi labore ea laboriosam magni similique
                        eum nostrum velit eaque commodi nihil exercitationem, eligendi repudiandae. Voluptas repellat odit corporis
                        voluptatum iusto fugit nobis..</p>
                </div>
            </div>
        </div>
    </div>




    <div class="padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <img src="images/MPB.png" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <!-- OWL CAROSEL -->
                    <section id="banner-area">
                        <div class="owl-carousel owl-theme">

                            <div class="item">
                                <h2 class="titleName">Harry Potter and the Chamber of Secrets</h2>
                                <img src="images/Harry Potter and the Chamber of Secrets.jpg" alt="Banner1">
                            </div>

                            <div class="item">
                                <h2 class="titleName">Harry Potter and the Prisoner of Azkaban</h2>
                                <img src="images/Harry Potter and the Prisoner of Azkaban.jpg" alt="Banner1">
                            </div>

                            <div class="item">
                                <h2 class="titleName">She A History of Adventure</h2>
                                <img src="images/She A History of Adventure.jpg" alt="Banner1">
                            </div>

                            <div class="item">
                                <h2 class="titleName">The Da Vinci Code</h2>
                                <img src="images/The Da Vinci Code.jpg" alt="Banner1">
                            </div>

                            <div class="item">
                                <h2 class="titleName">The Lion, the Witch and the Wardrobe</h2>
                                <img src="images/The Lion, the Witch and the Wardrobe.jpg" alt="Banner1">
                            </div>
                        </div>
                    </section>
                    <!-- OWL CAROSEL -->
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <!-- ADD IMG OR SOME FORM -->
                </div>

            </div>
        </div>
    </div>

    <div id="fixed">
    </div>


    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-4">
                <h3>Connect</h3>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="script.js"></script>


</body>

</html>