<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recruiter Dashboard - TalentHub</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h1>
    <p>You are logged in as a Recruiter</p>

    <ul>
        <li><a href="#">Post a New Job</a></li>
        <li><a href="#">View Applicants</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</body>
</html>
