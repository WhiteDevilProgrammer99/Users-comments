<?php
$comments = json_decode(file_get_contents("comments.json"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment System</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, textarea { padding: 10px; width: 100%; }
        button { background: red; color: white; padding: 10px; border: none; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { background: #f4f4f4; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>
    <h2>Get in Touch</h2>
    <form method="POST" action="save_comment.php">
        <label>Full Name</label>
        <input type="text" name="name" required>

        <label>WhatsApp Number</label>
        <input type="text" name="whatsapp" required>

        <label>Comment</label>
        <textarea name="comment" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <h3>All Comments (Admin Only)</h3>
    <ul>
        <?php foreach ($comments as $comment): ?>
            <li><strong><?php echo htmlspecialchars($comment['name']); ?></strong>: <?php echo htmlspecialchars($comment['comment']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
