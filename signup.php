<?php 
session_start();

    include("./inc/connection.php");
    include("./inc/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {
            //save to db
            // $query = "INSERT INTO users (username, password) VALUES ($username, $password)";

            // mysqli_query($db, $query);

            // header("Location: login.php");
            // die;

                try {
                  $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
              
                $stmt = $db->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);

                $stmt->execute();
                return true;
              
                } catch (Exception $e) {
                  echo "Unable to connect - ";
                  echo $e->getMessage();
                  return false;
                }
             
        } else {
            echo "Please enter some valid information!";
        }
    }

?>

<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title="Signup Page" ?>

<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>


<form method="post">
        <div class="form-inner">
            <h2>Login</h2>
                <div className="error">Details do not match!</div>
            <div className="form-group">
                <label for="username">Email:</label>
                <input type="text" name='username' id='username'>
            </div>
            <div className="form-group">
                <label for="password">Password:</label>
                <input type="password" name='password' id='password'>
            </div>
            <input type="submit" value="Signup">
            <br>
            <a href="login.php" class="btn">Login</a>
        </div>
    </form>


<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>

