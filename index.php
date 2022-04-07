<?php 

    include('./inc/autoload.php');
    $user_data = check_login($db);

    $username = "";
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }

?>
<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title='Main Page' ?>

<!-- HTML head -->
<?php include './inc/head.php' ?>

<body>
<?php include './inc/header.php' ?>

<h2>This is the main page</h2>

<?php if($username = "") : ?>
<a href='login.php'>Login</a>
<?php endif; ?>

<a href="loggedPage.php">My Account</a>
<!-- FOOTER -->
<?php include './inc/footer.php' ?>


<!-- Scripts -->
<?php include './inc/scripts.php' ?>

</body>


