<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - TalentHub</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h1>
    <p>You are logged in as an Administrator</p>

    <ul>
        <li><a href="#">Manage Users</a></li>
        <li><a href="#">Manage Roles</a></li>
        <li><a href="#">View Platform Statistics</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</body>
</html>
