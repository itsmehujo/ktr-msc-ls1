<?php
session_start();
if ($_SESSION['id']) {
  header('Location: ./index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="./styles/login.css">
</head>
<body style="margin: 0; font-family: sans-serif;">
<header id="header">
  <span>Signup / Login</span>
</header>
<main>

  <form action="./php/login.php" method="post">
    <span>Login</span>
    <label>
      Name
      <input type="text" name="name">
    </label>
    <label>
      Password
      <input type="password" name="password">
    </label>
    <button type="submit">Submit</button>
  </form>
  <form action="./php/signup.php" method="post">
    <span>Sign up</span>
    <label>
      Name
      <input type="text" name="name" required>
    </label>
    <label>
      Password
      <input type="password" name="password">
    </label>
    <label>
      Company Name
      <input type="text" name="company_name">
    </label>
    <label>
      Email
      <input type="email" name="email">
    </label>
    <button type="submit">Submit</button>
  </form>
</main>

</body>
</html>
