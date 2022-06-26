<?php 

    require_once 'adminMenuLogic.php';
    $model = new Model();

    if($_POST['sortType']){
        
        $books = $model->sortBooksByTitle();
        echo json_encode($books);

    }