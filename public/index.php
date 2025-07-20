<?php
session_start();


if(!isset($_SESSION['zalogowany'])) {


    if(isset($_COOKIE['logintoken'])) {
        // echo $_COOKIE['logintoken'];
        // $_SESSION['zalogowany'] = true;
        // $_SESSION['login'] = 'admin';
    } else {

        // header('Location: /login.php');

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rainbow.css">

    <style>
        #wyloguj{
            display:block;
        }

        .nav-item{
            margin:5px!important;
        }

    </style>
</head>
<body>

<div id="app">
<?php  include 'navbar.php' ?>
    
    <div  class="todo-container" id="app">

<todo></todo>

</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    

<?php include('../components/todo.php') ?>

<script src="script.js"></script>

</body>
</html>