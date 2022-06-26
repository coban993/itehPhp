<?php 

    require_once 'adminMenuLogic.php';
    $model = new Model();

    if(isset($_POST['search'])){        
        $books = $model->searchBooks($_POST['search']);
        echo json_encode($books);
    }