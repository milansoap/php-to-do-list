<!DOCTYPE html>
<html>



<head>
<title>REGISTER</title>

<script>
function fnRedirect() {
	window.location.replace = "http://localhost/to-do-list/public/php/db_conn";
}
</script>

<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>



<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">




<div class="d-flex align-items-center justify-content-center">

<form action="registerscript.php" method="POST">
  <div class="form-group">
    <label for="password">Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" name="name">
  </div>
  <div class="form-group">
    <label for="surname">Surname</label>
    <input type="surname" class="form-control" name="surname">
  </div>
  <div class="form-group">
    <label for="password">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>

  <?php if (isset($_GET['success'])) { ?>

<div class="alert alert-success " role="alert">

<p class="success">

<?php echo $_GET['success']?>

</p>
</div>

<?php  } ?>


  <button type="submit" class="btn btn-primary btn-block">Register</button>

  <small id="alreadyhaveannaccount" class="form-text text-muted">
  <a href="index.php">Login here!</a>
   </small>


  </form>
  



</div>



</div>






</body>
</html>