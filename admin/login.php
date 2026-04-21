<?php
session_start();
require_once '../include/db.php';

if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Portfolio</title>
    <link rel="stylesheet" href="../wp-content/themes/gridx/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/admin-style.css">
    <style>
        body {
            background-color: #0f0f0f;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }
        .login-box {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            border: 1px solid #333;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .form-control {
            background: #252525;
            border: 1px solid #333;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
        }
        .form-control:focus {
            background: #2a2a2a;
            border-color: #555;
            color: #fff;
            box-shadow: none;
        }
        .btn-primary {
            background: #fff;
            color: #000;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #ccc;
            color: #000;
        }
        .error-msg {
            color: #ff4d4d;
            text-align: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>ADMIN LOGIN</h2>
    <?php if ($error): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">LOGIN</button>
    </form>
</div>

</body>
</html>
