<?php

$errors = [];
$registered_user = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate Name
    if (empty($name)) {
        $errors["name"] = "Name is required.";
    }

    // Validate Email
    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    // Validate Password
    if (empty($password)) {
        $errors["password"] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors["password"] = "Password must be at least 6 characters long.";
    }

    // Validate Confirm Password
    if (empty($confirm_password)) {
        $errors["confirm_password"] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors["confirm_password"] = "Passwords do not match.";
    }

    // If there are no errors, proceed to display the registered user's data
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // For simplicity, we'll just store the registered user's data in a variable.
        // In a real-world scenario, you'd save this data in a database.
        $registeredUser = [
            "name" => $name,
            "email" => $email,
            "password" => $hashedPassword,
        ];
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto w-50 mt-5">
        <h1 class="text-center">Form exercise interview</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Write your name.</small>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Write your email.</small>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Write your password.</small>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm your password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" aria-describedby="helpId" placeholder="" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <!-- Display Registered User Data -->
        <?php if ($registeredUser) : ?>
            <div class="mt-5">
                <h3>Registered User:</h3>
                <p>Name: <?php echo htmlspecialchars($registeredUser["name"]); ?></p>
                <p>Email: <?php echo htmlspecialchars($registeredUser["email"]); ?></p>
            </div>
        <?php endif; ?>

        <!-- Display Validation Errors -->
        <?php if (!empty($errors)) : ?>
            <div class="mt-5">
                <h3>Validation Errors:</h3>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>