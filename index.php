<?php
$message = "Hello CI/CD World! kierrrrrrrrrrr"
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Cool PHP Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #2c3e50;
        }
        h1 {
            background: linear-gradient(90deg, #3498db, #9b59b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 3em;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1><?php echo $message; ?></h1>
</body>
</html>
