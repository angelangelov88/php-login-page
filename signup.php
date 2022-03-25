<?php 
    include("./inc/autoload.php");

    $Error = "";
    $name= "";
    $username = "";
    $tocken = get_random_string(60);
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(
            !preg_match("/^[a-z ,.'-]+$/i", $name) 
//Only containts alphanumeric, underscore and dot,
//Underscore and dot can't be at the end or start of a username
//Underscore and dot can't be next to each other
//Underscore or dot can't be used multiple times in a row 
//Minimum 5 characters and maximum 20
            || !preg_match("/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $username) 
//Minimum eight characters, at least one letter, one number and one special character:
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
        // $name = esc($name);
        // $username = esc($username);
        // $password = esc($password);

        // if(!empty($username) && !empty($password)) {
        //     //save to db

        //     // $query = "INSERT INTO users (username, password) VALUES ($username, $password)";
        //     // mysqli_query($db, $query);
        //     // header("Location: login.php");
        //     // die;
        try {
            $query = "INSERT INTO users (name, username, password) VALUES (:name, :username, :password)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
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
            <div className="form-group">
                <label for="name">Name:</label>
                <input type="text" name='name' id='name' value="<?php echo $name ?>" required>
            </div>
            <br>
            <div className="form-group">
                <label for="username">Username:</label>
                <input type="text" name='username' id='username' value="<?php echo $username ?>" required>
            </div>
            <br>
            <div className="form-group">
                <label for="password">Password:</label>
                <input type="password" name='password' id='password' required>
            </div>
            <br>
            <input type="submit" value="Signup">
            <br><br>
            <a href="login.php" class="btn">Click to Login</a>
        </div>
    </form>


<!-- FOOTER -->
<?php include "./inc/footer.php" ?>


<!-- Scripts -->
<?php include "./inc/scripts.php" ?>

</body>

