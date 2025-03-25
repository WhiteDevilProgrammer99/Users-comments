<?php
$comments = json_decode(file_get_contents("comments.json"), true);
$is_admin = isset($_GET['admin']); // Check if 'admin' parameter exists
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Comment System</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: url('https://source.unsplash.com/random/1600x900/?technology,dark') no-repeat center center fixed;
            background-size: cover;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
        }
        .container { 
            background: rgba(255, 255, 255, 0.9); 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, textarea { padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc; }
        button { background: red; color: white; padding: 10px; border: none; cursor: pointer; border-radius: 5px; }
        ul { list-style: none; padding: 0; margin-top: 20px; text-align: left; }
        li { background: #f4f4f4; padding: 10px; margin: 5px 0; border-radius: 5px; }
        .hidden { display: none; } /* Hide comments from regular users */
    </style>
</head>
<body>
    <div class="container">
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

        <?php if ($is_admin): ?> 
            <h3>All Comments (Admin Only)</h3>
            <ul>
                <?php foreach ($comments as $comment): ?>
                    <li><strong><?php echo htmlspecialchars($comment['name']); ?></strong>: <?php echo htmlspecialchars($comment['comment']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
