<?php


function check_login($db) {
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
 
        var_dump($results);

        // $result = mysqli_query($db, $query);
        // if ($result && mysqli_num_rows($result) > 0) {
        //     $user_data = mysqli_fetch_assoc($result);
        //     return $user_data;
        // }
    

}
//redirect to login page
    header("Location: login.php");
    die;
}



// Function to pull the news from the database
// function pullUsername($db) {
//   try {
//     $query = "
//     SELECT news.heading, news.description, news.news_image, news.date, author.profile_image, category.category_name, author.full_name
//     FROM news
//     JOIN author ON news.author_id = author.author_id
//     JOIN category ON news.category_id = category.category_id
//     Order by RAND()
//     LIMIT 3
//     ";
//     $stmt = $db->prepare($query);
//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $results;
//   } catch (Exception $e) {
//     echo "Unable to connect - ";
//     echo $e->getMessage();
//   }
// }



?>