<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>

    <div class="App">
        <div className="welcome">
          <h2>Welcome, <span>YOU!</span></h2>
          <button>Logout</button>
        </div>
        Welcome <?php echo $_POST["email"]; 
          var_dump($_POST['email']);
        ?><br>
        Your email address is: <?php echo $_POST["email"]; ?>

      
    </div>
<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>


