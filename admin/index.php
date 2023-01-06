<?php session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM loginsystem.admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['adminid']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
// echo $adminusername;
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin_login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">

</head>

<body>
    <section class="vh-100">
       
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
               
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 form-div ">
                    <form METHOD= "post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
                                placeholder="enter user name" />
                            <label class="form-label" for="form3Example3">USERNAME</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <!-- <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div> -->
                            <a href="password-recovery.php" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" name="login"  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                    class="link-danger">Register</a></p> -->
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

</body>

</html>