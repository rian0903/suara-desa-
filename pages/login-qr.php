<div class="centered">
  <h2>Login Pemilih (Scan QR Code)</h2>
  <div id="reader" style="width: 300px; margin: 0 auto;"></div>
</div>

<!-- Panggil library Html5Qrcode -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
  const qrScanner = new Html5Qrcode("reader");

  qrScanner.start(
    { facingMode: "environment" },
    {
      fps: 10,
      qrbox: { width: 250, height: 250 }
    },
    qrCodeMessage => {
      try {
        const data = JSON.parse(qrCodeMessage);
        localStorage.setItem("pemilih", JSON.stringify(data));
        window.location.href = "index.php?page=dashboard";
      } catch (err) {
        alert("QR Code tidak valid!");
      }
    },
    errorMessage => {
      // bisa log ke console kalau mau debug
    }
  ).catch(err => {
    alert("Tidak dapat membuka kamera: " + err);
  });
</script>
