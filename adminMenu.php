<?php
session_start();

if(!$_SESSION['id'] || ($_SESSION['id'] && $_SESSION['is_admin']==0)){
    header("Location: index.php");
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

    <!--  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!--  -->

    <link rel="stylesheet" href="adminMenuStyle.css">

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


                    <li><a class="active" href="index.php">Home</a></li>

                    <!-- ADMIN MENU -->
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


    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" id="addBookForm">
                    <!-- submit book -->
                    <?php

                    include_once "adminMenuLogic.php";
                    $model = new Model();
                    $insert = $model->insert();

                    ?>

                    <form class="col-12" method="POST" action="">

                        <div class="form-group">
                            <h1>SUBMIT BOOK</h1>
                        </div>

                        <div class="form-group">
                            <input type="text" name="bookname" class="form-control" placeholder="BookName">
                        </div>

                        <div class="form-group">
                            <input type="text" name="writer" class="form-control" placeholder="Writer">
                        </div>

                        <div class="form-group">
                            <input type="text" name="genre" class="form-control" placeholder="Genre">
                        </div>

                        <div class="form-group">
                            <input type="text" name="edition" class="form-control" placeholder="Edition">
                        </div>

                        <button type="submit" class="btn" name="submit"><i class="fas fa-book"></i>Add book</button>

                    </form>
                    <!-- submit book -->
                </div>

                <div class="col-sm-6" id="table">
                    <!-- books database -->

                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class=>BOOKS DATABASE</h1>
                            <hr class="dbt">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>BookName</th>
                                        <th>Writer</th>
                                        <th>Genre</th>
                                        <th>Edition</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once "adminMenuLogic.php";
                                    $model=new Model();
                                    $rows=$model->fetch();
                                    $i=1;
                                    if(!empty($rows)){
                                        foreach($rows as $row){   
                                        //echo $row['book_id'];                               
                                    ?>
                                    <tr>                                  
                                        <td><?php echo $row['book_id']; ?></td>
                                        <td><?php echo $row['book_name']; ?></td>
                                        <td><?php echo $row['writer']; ?></td>
                                        <td><?php echo $row['genre']; ?></td>
                                        <td><?php echo $row['edition']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['surname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td>
                                            <a href="read.php?book_id=<?php echo $row['book_id']; ?>" class="badge" id="read">Read</a>

                                            <a href="delete.php?book_id=<?php echo $row['book_id']; ?>" class="badge" id="delete">Delete</a>

                                            <a href="edit.php?book_id=<?php echo $row['book_id']; ?>" class="badge" id="edit">Edit</a>
                                        </td>
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="script.js"></script>


</body>

</html>