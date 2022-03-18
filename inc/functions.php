<?php
//Function to pull the news from the database
function pullUsername($db) {
  try {
    $query = "
    SELECT news.heading, news.description, news.news_image, news.date, author.profile_image, category.category_name, author.full_name
    FROM news
    JOIN author ON news.author_id = author.author_id
    JOIN category ON news.category_id = category.category_id
    Order by RAND()
    LIMIT 3
    ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (Exception $e) {
    echo "Unable to connect - ";
    echo $e->getMessage();
  }
}

?>