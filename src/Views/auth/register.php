<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - TalentHub</title>
</head>
<body>
    <h1>Create a New Account</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/register" method="POST">
        <label for="name">Full Name:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="candidate">Candidate</option>
            <option value="recruiter">Recruiter</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="/login">Login here</a></p>
</body>
</html>
