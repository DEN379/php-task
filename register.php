<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register new User</h1>
    <form action="auth.php" method="post">
        <P>Email: <input type="email" name="email"></P>
        <P>Username: <input type="text" name="username"></P>
        <P>Password: <input type="password" name="password"></P>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>