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


    if(!empty($username) && !empty($password)) {
        // $query = 'SELECT * FROM users WHERE username = '$username' LIMIT 1';
        // $result = mysqli_query($db, $query);
        // if($result) {
        //     if($result && mysqli_num_rows($result) > 0) {
        //         $user_data = mysqli_fetch_assoc($result);
        //         if($user_data['password'] === $password) {
        //             $_SESSION['id'] = $user_data['id'];
        //             header('Location: loggedPage.php');
        //             die;                    
        //         }
        //     }
        // }
        //read from db
            try {
                $query = 'SELECT * FROM users WHERE username = :username && password = :password LIMIT 1';
                $stmt = $db->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $check = $stmt->execute();
                // var_dump($stmt);
                if($check) {
                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                    if(is_array($data) && count($data) > 0) {
                        $data = $data[0];
                        $_SESSION['username'] = $data->username;
                        $_SESSION['id'] = $data->id;

                        header('Location: loggedPage.php');
                        die;                    
                    }
                }
                // $count = $stmt->rowCount();
                // $result = $stmt->fetchAll(PDO::FETCH_CLASS);
                // return $result;

                // var_dump($user_data);
                // if($result) {
                //     // if ($result && $stmt->rowCount() > 0) {
                //         if($count > 0) {
                //         $user_data = $stmt->fetchAll(PDO::FETCH_CLASS);
                //         if($user_data['password'] === $password) {
                //             $_SESSION['id'] = $user_data['id'];
                //             var_dump($user_data);
                //             echo 'Wrong';

                //             header('Location: loggedPage.php');
                //             die;                    
                //         }
                // }
                // }   
            } catch (Exception $e) {
              echo 'Unable to connect - ';
              echo $e->getMessage();
              return false;
            }
            $Error = 'Wrong username or password!';
    } else {
        echo 'Please enter some valid information!';
    }

    // echo $_SESSION['url_address'];
    // echo $_SESSION['username'];
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
            <div className='form-group'>
                <label for='username'>Username:</label>
                <input type='text' name='username' id='username'>
            </div>
            <br>
            <div className='form-group'>
                <label for='password'>Password:</label>
                <input type='password' name='password' id='password'>
            </div>
            <br>
            <input type='hidden' name='token' value="<?php echo $_SESSION['token']; ?>">
            <br>
            <input type='submit' value='Login'>
            <br><br>
            <a href='signup.php' class='btn'>Click to Signup</a>
        </div>
    </form>


 
<!-- FOOTER -->
<?php include './inc/footer.php' ?>


<!-- Scripts -->
<?php include './inc/scripts.php' ?>

</body>


