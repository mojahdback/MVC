<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate Dashboard - TalentHub</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h1>
    <p>You are logged in as a Candidate</p>

    <ul>
        <li><a href="#">View Available Jobs</a></li>
        <li><a href="#">Apply for a Job</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</body>
</html>