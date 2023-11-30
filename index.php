<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Time Pad Encryption</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">One Time Pad Encryption (OTP)</h1>

    <?php
    // Proses Form
    include 'encryption_functions.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $inputString = $_POST["inputString"];
      $key = $_POST["key"];

      // Panggil fungsi enkripsi
      $encryptedText = encryptOTP($inputString, $key);

      echo "<div class='alert alert-success'>";
      echo "<h2 class='mb-3'>Hasil Enkripsi:</h2>";
      echo "<p><strong>Plain Text:</strong> " . $inputString . "</p>";
      echo "<p><strong>Key:</strong> " . $key . "</p>";
      echo "<p><strong>Encrypted Text:</strong> " . $encryptedText . "</p>";
      echo "</div>";
    }
    ?>

    <!-- Formulir untuk Input -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="inputString">Masukkan Teks:</label>
        <input type="text" class="form-control" name="inputString" required>
      </div>
      <div class="form-group">
        <label for="key">Masukkan Kunci:</label>
        <input type="text" class="form-control" name="key" required>
      </div>
      <button type="submit" class="btn btn-primary">Enkripsi</button>
    </form>
  </div>
</body>
</html>