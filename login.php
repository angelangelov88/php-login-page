<?php 

ini_set('display_errors',1);

session_start();


include("./inc/connection.php");
include("./inc/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)) {
        //read from db
        // $query = "INSERT INTO users (username, password) VALUES ($username, $password)";

        // mysqli_query($db, $query);

        // header("Location: login.php");
        // die;

            try {
                $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            
                $stmt = $db->prepare($query);
                // $stmt->bindParam(":username", $username);
                // $stmt->bindParam(":password", $password);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_CLASS);
                return $result;

                    if ($result && $stmt->rowCount() > 0) {
                        $user_data = $stmt->fetchAll(PDO::FETCH_CLASS);
                        if($user_data['password'] === $password) {
                            $_SESSION['id'] = $user_data['id'];

                            header("Location: loggedPage.php");
                            die;                    
                        }
                }
            } catch (Exception $e) {
              echo "Unable to connect - ";
              echo $e->getMessage();
              return false;
            }
            echo "Wrong username or password!";
    } else {
        echo "Please enter some valid information!";
    }
}


?>

<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title="Login Page" ?>

<!-- HTML head -->
<?php include "./inc/head.php" ?>

<body>
<?php include "./inc/header.php" ?>

    <form method="post">
        <div class="form-inner">
            <h2>Login</h2>
                <!-- <div className="error">Details do not match!</div> -->
            <div className="form-group">
                <label for="username">Username:</label>
                <input type="text" name='username' id='username'>
            </div>
            <br>
            <div className="form-group">
                <label for="password">Password:</label>
                <input type="password" name='password' id='password'>
            </div>
            <br>
            <input type="submit" value="Login">
            <br><br>
            <a href="signup.php" class="btn">Click to Signup</a>
        </div>
    </form>


 
<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>


