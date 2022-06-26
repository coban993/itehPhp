<?php

    include "adminMenuLogic.php";
    $model=new Model();
    $book_id=$_REQUEST['book_id'];
    $delete=$model->delete($book_id);

    if($delete){
        echo "<script>alert('deleted successfully');</script>";
        echo "<script>window.location.href='adminMenu.php';</script>";
    }




?>