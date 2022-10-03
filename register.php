<?php
include('header.php');

require_once("config/db.php");
if(isset($_POST['register'])){

  // filter data yang diinputkan
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // enkripsi password
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


  // menyiapkan query
  $sql = "INSERT INTO tbl_users (user_name, user_email, user_password) 
          VALUES (:username, :email, :password)";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
      ":username" => $username,
      ":password" => $password,
      ":email" => $email
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if($saved) header("Location: login.php");
}
?>

<div class="container w-50 p-3" style="margin-top: ;">
<form action="" method="POST">
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Username</label>
    <input type="text" name="username" placeholder="Username" id="form2Example1" class="form-control" />
  </div>
  
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Email Address</label>
    <input type="email" name="email" placeholder="Email"id="form2Example1" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example2">Password</label>
    <input type="password" name="password" placeholder="Password" id="form2Example2" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example2">Confirm Password</label>
    <input type="password" name="password2" placeholder="Confirm Password" id="form2Example2" class="form-control" />
  </div>


  <!-- Submit button -->
  <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-primary btn-block mb-4" name="register" value="Register" />
  </div>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Is a member? <a href="login.php" class="text-decoration-none">Login</a></p>
  </div>
</form>
</div>

<?php
include('footer.php');
?>
