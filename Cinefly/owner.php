<?php
session_start();
if ($_SESSION['role'] !== 'owner') {
    header('Location: home.php');
    exit();
}

$usersFile ='user.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

$error = '';
$successMessage = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        foreach ($users as $user) {
            if ($user['email'] === $_POST['user_email']) {
                $error = 'Email is already registered.';
                break;
            }
        }

        if (!$error) {
            $users[] = [
                'email' => $_POST['user_email'],
                'password' => password_hash($_POST['user_password'], PASSWORD_DEFAULT),
                'role' => $_POST['user_role']
            ];
            file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
            $successMessage = "User successfully created.";  
        }
    }

    elseif (isset($_POST['delete_user'])) {
        $deletedUser = $users[$_POST['delete_user']];
        unset($users[$_POST['delete_user']]);
        file_put_contents($usersFile, json_encode(array_values($users), JSON_PRETTY_PRINT));
        $successMessage = "User {$deletedUser['email']} successfully deleted."; 
    } elseif (isset($_POST['update_user'])) {
        $index = $_POST['update_user'];
        $users[$index]['email'] = $_POST['user_email'];

        if (!empty($_POST['user_password'])) {
            $users[$index]['password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        }
        
        $users[$index]['role'] = $_POST['user_role'];
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
        $successMessage = "User successfully updated."; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Panel - User CRUD</title>
    <link rel="stylesheet" href="login.css" />
    <style>
        body {
            background-color: #1c1c1c;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #f5f5f5;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #444;
            color: white;
        }

        td {
            background-color: #2d2d2d;
        }

        .form-container {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        input, select, button {
            padding: 10px;
            width: 250px;
            border: none;
            border-radius: 5px;
        }

        input, select {
            background-color: #333;
            color: white;
            margin-bottom: 10px;
        }

        button {
            background-color: red;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }

        .error {
            color: red;
            text-align: center;
            font-size: 14px;
        }

        .success {
            color: green;
            text-align: center;
            font-size: 14px;
        }

        /* Styling for header buttons */
        .header-btns {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .header-btns img {
            width: 100px;
            height: auto;
            cursor: pointer;
        }

        .logout-btn {
            background-color: red;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="header-btns">
        <!-- Icon to go to home.php -->
        <a href="home.php">
            <img class="logo" src="assets/cinefly.png" alt="Cinefly Logo" />
        </a>
        <!-- Logout button that redirects to home.php -->
        <a href="home.php" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <h2>Owner Panel - User CRUD</h2>

        <!-- Add User Form -->
        <div class="form-container">
            <h3>Add User</h3>
            <?php if ($error): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
            <?php if ($successMessage): ?>
                <p class="success"><?= $successMessage ?></p>
            <?php endif; ?>
            <form method="POST">
                <input type="email" name="user_email" placeholder="Email" required />
                <input type="password" name="user_password" placeholder="Password" required />
                <select name="user_role" required>
                    <option value="user">User</option>
                    <option value="owner">Owner</option>
                    <option value="guest">Guest</option>
                </select>
                <button type="submit" name="add_user">Add User</button>
            </form>
        </div>

        <!-- User List Table -->
        <h3>Users List</h3>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td><?= $user['email'] ?></td>
                        <td><?= ucfirst($user['role']) ?></td>
                        <td>
                            <!-- Update Form -->
                            <form method="POST" style="display:inline;">
                                <input type="email" name="user_email" value="<?= $user['email'] ?>" required />
                                <input type="password" name="user_password" placeholder="New Password" />
                                <select name="user_role" required>
                                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                    <option value="owner" <?= $user['role'] === 'owner' ? 'selected' : '' ?>>Owner</option>
                                    <option value="guest" <?= $user['role'] === 'guest' ? 'selected' : '' ?>>Guest</option>
                                </select>
                                <input type="hidden" name="update_user" value="<?= $index ?>" />
                                <button type="submit">Update</button>
                            </form>

                            <!-- Delete Button -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="delete_user" value="<?= $index ?>" />
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
