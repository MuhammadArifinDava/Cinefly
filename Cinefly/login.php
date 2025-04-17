<?php
session_start();

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$email || !$password) {
        $error = "Email dan password wajib diisi.";
    } else {
        $file = 'user.json';
        $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $storedPassword = $user['password'];

                $isValid = (strlen($storedPassword) > 20 && password_verify($password, $storedPassword)) ||
                           ($storedPassword === $password); 

                if ($isValid) {
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $user['role'];
                    header('Location: home.php');
                    exit();
                }
            }
        }

        $error = 'Email atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Netflix</title>
    <link rel="icon" href="/assets/netflix.ico">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            background: no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://assets.nflxext.com/ffe/siteui/vlv3/9c5457b8-9ab0-4a04-9fc1-e608d5670f1a/710d74e0-7158-408e-8d9b-23c219dee5df/IN-en-20210719-popsignuptwoweeks-perspective_alpha_website_small.jpg');
            background-size: cover;
            background-position: center;
            opacity: 1; 
            z-index: -1;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 10px;
            width: 380px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            color: red;
        }

        input[name="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: red;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }

        .sign-up {
            color: red;
            text-decoration: none;
        }

        .sign-up:hover {
            color: darkred;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .signin__button {
            color: red; 
            text-decoration: none;
        }

        .signin__button:hover {
            color: darkred; 
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>CINEFLY</h1>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required
                value="<?= isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>">
            <br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Log In">
        </form>
        <p>New to Netflix? <a class="sign-up" href="register.php">Sign up now</a></p>
        <!-- Login as Guest link -->
        <a href="home.php?role=guest" class="signin__button" id="guestLoginLink">Login as Guest</a>

        <?php if (!empty($error)): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const role = urlParams.get('role');

    if (role === 'guest') {
        sessionStorage.setItem('userRole', 'guest');
        window.location.href = 'movie_details.php'; 
    }
});
</script>
</html>
