<?php
require 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
if (!isset($_SESSION['admin'])) { header("Location: login-admin.php"); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = ['id'=>uniqid(),'nama'=>$_POST['nama'],'nik'=>$_POST['nik'],'tps'=>$_POST['tps']];
  $json = json_encode($data);
  $filename = "qr/{$data['id']}.png";
  $options = new QROptions(['outputType' => QRCode::OUTPUT_IMAGE_PNG]);
  (new QRCode($options))->render($json, $filename);
  $db = file_exists('database/voters.json') ? json_decode(file_get_contents('database/voters.json'), true) : [];
  $db[] = $data;
  file_put_contents('database/voters.json', json_encode($db, JSON_PRETTY_PRINT));
}
?>
<form method="POST" class="centered">
  <h2>Register Pemilih</h2>
  <input name="nama" placeholder="Nama" required><br>
  <input name="nik" placeholder="NIK" required><br>
  <input name="tps" placeholder="TPS" required><br>
  <button class="enter-button" type="submit">Generate QR</button>
</form>
<?php if (!empty($filename)): ?>
<div class="centered">
  <h3>QR Code untuk <?= htmlspecialchars($data['nama']) ?></h3>
  <img src="<?= $filename ?>" width="200"><br>
  <a href="<?= $filename ?>" download><button class="enter-button">Download</button></a>
  <button onclick="window.print()">Cetak</button>
</div>
<div style="text-align: right; margin-bottom: 20px; padding-right: 20px;">
  <a href="logout.php">
    <button style="background-color: #e53935; color: #fff; padding: 10px 16px; border: none; border-radius: 6px; cursor: pointer;">
      Logout
    </button>
  </a>
</div>
<?php endif; ?>