<?php session_start();
include_once('includes/config.php');
// Code for login 
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $dec_password = $password;
    $useremail = $_POST['uemail'];
    $ret = mysqli_query($con, "SELECT id,fname FROM loginsystem.users WHERE email='$useremail' and password='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {

        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['fname'];
        header("location:welcome.php");

    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>user_login</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div id="bg"></div>
  <form method="post">
    <div class="form-field">
      <input type="email" name="uemail"  placeholder="name@example.com" required />
    </div>

    <div class="form-field">
      <input type="password" name="password" placeholder="Password" required />
    </div>

    <div class="form-field">
      <button class="btn"  name ="login" type="submit">Log in</button>
    </div>
    <div class="reg">
      <p>don't have an account <a href="signup.php">register here</a></p>
    </div>
  </form>
  <!-- partial -->

</body>

</html>