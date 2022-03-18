<?php 
session_start();

include("./inc/connection.php");
include("./inc/functions.php");

    $user_data = check_login($db);
    

?>
<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title="Main Page" ?>

<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>

<h2>This is the main page</h2>


 
<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>


