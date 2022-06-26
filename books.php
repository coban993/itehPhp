<?php
session_start();
include_once "adminMenuLogic.php";

if(!$_SESSION['id']){
    header("Location: index.php");
}


$model = new Model();
$current_userID = $_SESSION['id'];


if (isset($_POST['pick'])) {
    $book_id = $_POST['book_id'];
    $data['book_id'] = $book_id;
    $data['user_id'] = $current_userID;
    $update = $model->update2($data);

    if ($update) {
        echo "<script>alert('book choosen');</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
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
    <link rel="stylesheet" href="booksStyle.css">

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


                    <li><a class="active" href="index.php">Back</a></li>

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
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->



    <div id="home">
        <div class="landing-text">
            <div class="row">
                <h1>Pick your book</h1>
            </div>
            <hr class="dbt">
            <div class="col-md-8 col-md-offset-2 col-sm-12" id="table">
                <!-- books database -->
                <h3>AVAILABLE BOOKS</h3>

                <div class="row">
                    <div class="col-md-4 col-md-offset-2 col-sm-12" id="table">
                        <button id="sort-btn" class="btn btn-primary">Sort By Title</button>
                    </div>

                    <div class="col-md-4 col-md-offset-2 col-sm-12" id="table">
                        <input type="text" id="search-box" class="form-control" placeholder="Search">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr class="trtr">
                                    <th>BookName</th>
                                    <th>Writer</th>
                                    <th>Genre</th>
                                    <th>Edition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php

                                $rows = $model->fetch();

                                if (!empty($rows)) {
                                    foreach ($rows as $row) {

                                ?>
                                        <tr>
                                            <!-- ako je ime prazno, to jest userID -->
                                            <?php if ($row['user_id'] == 0) { ?>
                                                <td><?php echo $row['book_name']; ?></td>
                                                <td><?php echo $row['writer']; ?></td>
                                                <td><?php echo $row['genre']; ?></td>
                                                <td><?php echo $row['edition']; ?></td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <button type="submit" class="btn" name="pick"><i class="fas"></i>Pick</button>

                                                        <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                                                    </form>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- books database -->
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="ajax.js"></script>

</body>

</html>