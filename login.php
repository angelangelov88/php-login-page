
<?php 

include('./inc/autoload.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_SESSION['token']) 
    && isset($_POST['token']) 
    && $_SESSION['token'] == $_POST['token']) {
    //something was posted
    $Error = '';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    if(!empty($username) && !empty($password)) {
        //read from db
            try {
                $query = 'SELECT * FROM users WHERE username = :username LIMIT 1';
                // $query = 'SELECT * FROM users WHERE username = :username && password = :password LIMIT 1';
                $stmt = $db->prepare($query);
                $stmt->bindParam(':username', $username);
                // $stmt->bindParam(':password', $hash);
                $check = $stmt->execute();
                // var_dump($stmt);
                if($check) {
                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                    if(is_array($data) && count($data) > 0) {
                        $data = $data[0];
//This line checks the hashed password and if correct returns true and continues with the code
                        if(password_verify($password, $hashed_password)) {
                            $_SESSION['username'] = $data->username;
                            $_SESSION['id'] = $data->id;
                            $_SESSION['url_address'] = $data->url_address;
    
                            // echo $_SESSION['url_address'];
                            // echo $_SESSION['username'];
    
                            header('Location: loggedPage.php');
                            die;                    
                        }
                    }
                }
            } catch (Exception $e) {
              echo 'Unable to connect - ';
              echo $e->getMessage();
              return false;
            }
            $Error = 'Wrong username or password!';
    } else {
        $Error = 'Please enter some valid information!';
    }

    
}

$_SESSION['token'] = get_random_string(60);


?>

<!-- Add this variable here to make sure that the title reflect the page -->
<?php $title='Login Page' ?>

<!-- HTML head -->
<?php include './inc/head.php' ?>

<body>
<?php include './inc/header.php' ?>

    <form method='post'>
        <div class='form-inner'>
            <h2>Login</h2>
                <!-- <div className='error'>Details do not match!</div> -->
                <div class='error'><?php 
                if(isset($Error) && $Error != '') {
                    echo "$Error";
                } 
                ?></div>
            <div class='form-group'>
                <label for='username'>Username:</label>
                <input type='text' name='username' id='username'>
            </div>
            <br>
            <div class='form-group'>
                <label for='password'>Password:</label>
                <input type='password' name='password' class='password'>
                <i class="far fa-eye" id="togglePassword"></i>

            </div>
            <br>
            <input type='hidden' name='token' value="<?php echo $_SESSION['token']; ?>">
            <br>
            <input type='submit' value='Login'>
            <br><br>
            <p class="gray-text">Not registered? <a href='signup.php' class='green-text'>Create an account</a></p>
            
        </div>
    </form>


 
<!-- FOOTER -->
<?php include './inc/footer.php' ?>


<!-- Scripts -->
<?php include './inc/scripts.php' ?>

</body>


