<?php 
session_start();

  $_SESSION;

?>
<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title="Logged Page" ?>

<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>

    <div class="App">
        <div className="welcome">
          <h2>Welcome, <span>YOU!</span></h2>
          
          <a href="logout.php">Logout</a>
          
        </div>
        Welcome <?php echo $_POST["username"]; ?><br>
        Your email address is: <?php echo $_POST["username"]; ?>

        New username: <?php echo $user_data['username']; ?>
      
    </div>
<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>


