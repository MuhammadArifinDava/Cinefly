<?php
session_start();

$userFile = 'user.json';
$users = file_exists($userFile) ? json_decode(file_get_contents($userFile), true) : [];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$email || !$password) {
        $error = "Email dan password wajib diisi.";
    } else {
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $error = "Email sudah terdaftar.";
                break;
            }
        }

        if (!$error) {
            $users[] = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'user'
            ];

            file_put_contents($userFile, json_encode($users, JSON_PRETTY_PRINT));

            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'user';

            header("Location: home.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Netflix</title>
  <link rel="stylesheet" href="login.css" />
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
    }
    
    .brand__logo {
      width: 150px; 
      margin: 30px;
    }

    .hero__card {
      text-align: center;
      margin-top: 100px;
    }

    .hero__description {
      color:red;
    }

    .form__container {
      background: white;
      padding: 5px 10px;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      border-radius: 4px;
      width: 300px;
      margin: 10px auto;
    }

    .email__input {
      flex: 1;
      border: none;
      font-size: 16px;
      padding: 10px;
      outline: none;
    }

    .primary__button {
      background-color: red;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    .email__label {
      font-size: 12px;
      color: #999;
      margin-left: 5px;
    }

    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar__brand">
        <img src="assets/cinefly.png" alt="Netflix Logo" class="brand__logo" />
      </div>
    </nav>
  </header>

  <main>
    <section class="hero">
      <div class="hero__card">
        <p class="hero__description">To watch movies, you must register first.</p>
        <h1 class="hero__title">Create your Account</h1>
        <p class="hero__subtitle">It’s quick and easy!</p>

        <?php if (!empty($error)): ?>
          <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" class="email__form__container" autocomplete="off">
          <div class="form__container">
            <input type="email" name="email" class="email__input" placeholder="Email" required autocomplete="off">
          </div>
          <div class="form__container">
            <input type="password" name="password" class="email__input" placeholder="Password" required autocomplete="new-password">
          </div>
          <button type="submit" class="primary__button">Register</button>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
