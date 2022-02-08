<?php
if (!$_SESSION['email'] || empty($_SESSION['email'])) {
  header('Location: ./home.php');
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="./js/dashboard.js" defer></script>
</head>
<body>
<header id="header">
  <span>ktr-msc-ls1</span>
</header>
<div id="dashboard">
  <form action="./php/addNewBusiness.php">
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
