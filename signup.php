<?php 
    include("./inc/autoload.php");

    $Error = "";
    $name= "";
    $username = "";
    $tocken = get_random_string(60);
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $url_address = get_random_string(60);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);


        if(
            !preg_match("/^[a-z ,.'-]+$/i", $name) 
//Only containts alphanumeric, underscore and dot,
//Underscore and dot can't be at the end or start of a username
//Underscore and dot can't be next to each other
//Underscore or dot can't be used multiple times in a row 
//Minimum 5 characters and maximum 20
            || !preg_match("/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $username) 
//Minimum eight characters, at least one capital letter, one lowercase letter, one number and one special character:
            || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
            $Error = 'Are you sure you got your details correctly?';
        } 

        //check if email exists
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":username", $username);
        $check = $stmt->execute();
        // var_dump($stmt);
        if($check) {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0) {
                $Error = 'Someone is already using this username';
            }
        }

        if ($Error == "") {
        try {
            $query = "INSERT INTO users (url_address, name, username, password) VALUES (:url_address, :name, :username, :password)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":url_address", $url_address);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hash);
            $stmt->execute();

            header("Location: login.php");
            die;              
        } catch (Exception $e) {
                echo "Unable to connect - ";
                echo $e->getMessage();
                return false;
            }
        // } else {
        //     echo "Please enter some valid information!";
        // 
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
        <h2>Signup</h2>
        <div class="error"><?php
            if(isset($Error) && $Error != "") {
                echo "$Error";
            }
        ?></div>
            <!-- <div className="error">Details do not match!</div> -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name='name' id='name' value="<?php echo $name ?>" required>
            <span>Please make sure you do not have any special characters in the name field</span>
        </div>
        <br>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name='username' id='username' value="<?php echo $username ?>" required autocomplete="username">
            <span>Username can contain a letter, a number, an underscore or a dot and have a minimum of 5 and maximum of 20 characters</span>

        </div>
        <br>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name='password' class='password' required autocomplete="new-password">
            <span>Password must be minimum 8 characters with at least one capital letter, one lowercase letter, one number and one special character (@$!%*#?&)</span>
            <i class="far fa-eye fa-eye-signup" id="togglePassword"></i>

        </div>
        <br>
        <input type="submit" value="Signup">
        <br><br>
        <p class="gray-text">Already registered? <a href='login.php' class='green-text'>Sign in</a></p>
    </div>
</form>


<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>
<script src="./js/togglePasswordIcon.js"></script>
</body>

