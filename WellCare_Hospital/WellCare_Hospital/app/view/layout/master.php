<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WellCare Hospital</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-purple-600 to-pink-600 text-gray-800">

<php include __DIR__ . '/header.php'; ?>

<php
if (!empty($view_file) && file_exists($view_file)) {
    include $view_file;
} else {
    echo "<div class='text-center py-20 text-gray-600 text-xl'>🚑 Page not found.</div>";
}
?>

<php include __DIR__ . '/footer.php'; ?>


</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WellCare Hospital</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-purple-600 to-pink-500 text-gray-800">

  <?php include __DIR__ . '/header.php'; ?>

  <main class="">
    <?php
      if (!empty($view_file) && file_exists($view_file)) {
          include $view_file;
      } else {
          echo "<div class='text-center py-20 text-white text-xl'>🚑 Page not found.</div>";
      }
    ?>
  </main>

  <?php include __DIR__ . '/footer.php'; ?>
  <script src="https://kit.fontawesome.com/YOUR_REAL_KIT_ID.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="/WellCare_Hospital_2/WellCare_Hospital/public/js/auth.js"></script>
  <script src="/WellCare_Hospital_2/WellCare_Hospital/public/js/appointment.js"></script>
</body>
</html>
