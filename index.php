<?php
session_start();
if (!$_SESSION['name'] || empty($_SESSION['name'])) {
  header('Location: ./home.php');
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="./js/dashboard.js" defer></script>
  <link rel="stylesheet" href="./styles/idnex.css">
</head>
<body style="margin: 0; font-family: sans-serif;">
<header id="header">
  <span>ktr-msc-ls1</span>
  <a href="./php/logout.php">Logout</a>
</header>
<div id="dashboard">
  <form action="./php/addNewBusiness.php" method="post">
    <span>Add new business</span>
    <label>
      Name
      <input type="text" name="name">
    </label>
    <label>
      Company Name
      <input type="text" name="company_name">
    </label>
    <label>
      E-mail
      <input type="email" name="email" required>
    </label>
    <label>
      Phone
      <input type="tel" name="phone">
    </label>
    <button type="submit">Submit</button>

  </form>
  <div id="businesses_list"></div>

</div>
</body>
</html>
