<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>

    <form action='loggedPage.php' method="post">
        <div class="form-inner">
            <h2>Login</h2>
                <div className="error">Details do not match!</div>
            <div className="form-group">
                <label for="email">Email:</label>
                <input type="email" name='email' id='email'>
            </div>
            <div className="form-group">
                <label for="password">Password:</label>
                <input type="password" name='password' id='password'>
            </div>
            <input type="submit" value="Login" />
        </div>
    </form>


 
<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>


