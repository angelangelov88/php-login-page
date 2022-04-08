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

    <div>
      <div class='welcome'>
        <h2>Welcome, 
          <span><?php echo htmlspecialchars($user_data->name); ?>!</span>
          <a href='logout.php' class="btn">Logout</a>
        </h2>
      </div>
   
      

        Your ID is: <?php echo htmlspecialchars($_SESSION['id']); ?><br>
        Your url_address is: <?php echo htmlspecialchars($_SESSION['url_address']); ?><br>
        Your username is: <?php echo htmlspecialchars($_SESSION['username']); ?><br>
        Your name is:<?php echo htmlspecialchars($user_data->name); ?><br>
        Date Created: <?php echo htmlspecialchars($user_data->dtstampcreate); ?><br>
       <?php echo htmlspecialchars($yourbrowser); ?><br>
        IP address: <?php echo htmlspecialchars($ip); ?><br>

        
      </div>
<!-- FOOTER -->
<?php include './inc/footer.php' ?>


<!-- Scripts -->
<?php include './inc/scripts.php' ?>

</body>


