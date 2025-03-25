<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $comments = json_decode(file_get_contents("comments.json"), true);
    $comments[] = ["name" => $name, "comment" => $comment];

    file_put_contents("comments.json", json_encode($comments, JSON_PRETTY_PRINT));
    echo "<script>alert('Comment added successfully!'); window.location.href='index.php';</script>";
}
?>
