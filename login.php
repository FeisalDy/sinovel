<?php
include('header.php');
require_once("config/db.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM tbl_users WHERE user_name = :username OR user_email = :email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password  
        if(password_verify($password, $user['user_password'])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: index.php");
        }else{
        }
    }
}

?>

<div class="container w-50 p-3" style="margin-top: 10%;">
<form action="" method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="username">Email Address / Username</label>
    <input type="text" name="username" placeholder="Email / Username" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="password">Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control" />
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col d-flex flex-row-reverse">
      <!-- Simple link -->
      <a href="#!" class="text-decoration-none">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <div class="d-flex justify-content-end">
  <input type="submit" class="btn btn-primary btn-block mb-4" name="login" value="Login" />
  </div>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="register.php" class="text-decoration-none">Register</a></p>
  </div>
</form>
</div>

<?php
include('footer.php');
?>
