<?php

function check_login($db) {
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        var_dump($result);

        if ($result && $result->rowCount() > 0) {
            $user_data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $user_data;
        }
        
        // $result = mysqli_query($db, $query);
        // if ($result && mysqli_num_rows($result) > 0) {
        //     $user_data = mysqli_fetch_assoc($result);
        //     return $user_data;
        // }
    

}
// redirect to login page
    header("Location: login.php");
    die;
}
?>