<script>
const data = JSON.parse(localStorage.getItem("pemilih"));
if (!data) window.location.href = "index.php?page=login-qr";
</script>
<div class="main-content">
  <h2>Selamat datang, <script>document.write(data.nama)</script> 👋</h2>
  <p>NIK: <script>document.write(data.nik)</script></p>
  <p>TPS: <script>document.write(data.tps)</script></p>
  <h3>Pilihan Kandidat</h3>
  <div class="candidate">
    <img src="assets/img/candidate.jpg" width="150">
    <p>Mauro Pires<br>Frelimo</p>
    <a href="index.php?page=confirm"><button class="vote-button">Vote Now</button></a>
  </div>
</div>