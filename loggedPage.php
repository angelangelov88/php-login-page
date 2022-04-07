<?php 


include('./inc/autoload.php');

  $user_data = check_login($db);

  $username = "";
  if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
  }

?>
<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title='Logged Page' ?>

<!-- HTML head -->
<?php include './inc/head.php' ?>

<body>
<?php include './inc/header.php' ?>

    <div class='App'>
        <div className='welcome'>
          <h2>Welcome, <span><?php echo htmlspecialchars($user_data->name); ?>!</span></h2>
          
          <a href='logout.php'>Logout</a>
        </div>
   
        <!-- Welcome 
        <?php echo htmlspecialchars($_SESSION['username']); ?>
        <?php echo htmlspecialchars($user_data->name); ?>
        <br> -->

        Your ID is: <?php echo htmlspecialchars($_SESSION['id']); ?><br>
        Your username is: <?php echo htmlspecialchars($_SESSION['username']); ?><br>

    </div>
<!-- FOOTER -->
<?php include './inc/footer.php' ?>


<!-- Scripts -->
<?php include './inc/scripts.php' ?>

</body>


