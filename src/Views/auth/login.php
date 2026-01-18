<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Login - TalentHub</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/login" method="POST">
        <label for="email">Email : </label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">password : </label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit"> Enter </button>
    </form>

    <p>You don't have accont <a href="/register">sign up </a></p>
</body>
</html>
