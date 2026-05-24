<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Malzama System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="malzama_list.php">Malzama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="certification_list.php">Certification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="specialty_list.php">Specialty</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stage_list.php">Stage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stage_subject_list.php">Stage Subject</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="subject_list.php">Subject</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher_list.php">Teacher</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reklam.php">Reklam</a>
        </li>

        <?php if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['user_position'] == 4) { ?>
            <li class="nav-item">
                <a class="nav-link" href="admin_list.php">Admins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="archive.php">Archive</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment.php">Payment</a>
            </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="order_list.php">Order</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
