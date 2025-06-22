<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  if ($user === 'nanda123' && $pass === 'admin123') {
    $_SESSION['admin'] = true;
    header("Location: index.php?page=dashboard-admin");
    exit;
  } else {
    $error = "Login gagal! Username atau password salah.";
  }
}
?>
<form method="POST" class="centered">
  <h2>Login Admin</h2>
  <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
  <input type="text" name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit" class="enter-button">Login</button>
</form>