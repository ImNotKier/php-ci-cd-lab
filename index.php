<?php
session_start();

// Initialize messages array if not set
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [
        ['id' => 1, 'content' => "Hello CI/CD World!"]
    ];
}

// Handle Create
if (isset($_POST['create']) && !empty($_POST['content'])) {
    $newId = end($_SESSION['messages'])['id'] + 1 ?? 1;
    $_SESSION['messages'][] = ['id' => $newId, 'content' => $_POST['content']];
}

// Handle Update
if (isset($_POST['update']) && !empty($_POST['content'])) {
    foreach ($_SESSION['messages'] as &$msg) {
        if ($msg['id'] == $_POST['id']) {
            $msg['content'] = $_POST['content'];
            break;
        }
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $_SESSION['messages'] = array_filter($_SESSION['messages'], function($msg) {
        return $msg['id'] != $_GET['delete'];
    });
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cool PHP CRUD</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f0f0; }
        h1 { color: #34495e; }
        input, button { padding: 8px; margin: 5px; }
        table { border-collapse: collapse; margin-top: 20px; width: 60%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        a { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <h1>🚀 Cool PHP CRUD (No Database!)</h1>

    <h2>Add a Message</h2>
    <form method="POST">
        <input type="text" name="content" placeholder="Your message here" required>
        <button type="submit" name="create">Create</button>
    </form>

    <h2>Messages</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['messages'] as $msg): ?>
        <tr>
            <td><?= $msg['id'] ?></td>
            <td><?= htmlspecialchars($msg['content']) ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                    <input type="text" name="content" placeholder="Edit message" required>
                    <button type="submit" name="update">Update</button>
                </form>
                <a href="?delete=<?= $msg['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
