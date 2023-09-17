<?php

session_start();
require 'frontDoctor/head.php';
require '../helperFunction/conAndQueryFunction.php';
require '../helperFunction/function.php';
$id = $_GET['id'];
dataBaseConnection::connect();
$docData = dataBaseConnection::getData("doctors", "*", "id=" . $id);
?>

<body>
  <div class="page-wrapper">
    <?php require 'frontDoctor/navbar.php'; ?>
    <div class="container">
      <?= displayError2("error", "email"); ?>
      <?= displayError2("error", "phone"); ?>
      <?= displayError2("error", "name"); ?>
      <?= success("success", "booked"); ?>
      <?= displayError1("error_login"); ?>
      <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="../index.php">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="./index.php">doctors</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <?= $docData[0]['name'] ?>
          </li>
        </ol>
      </nav>
      <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
          <img src="../doctorImage/<?= $docData[0]['image'] ?>" alt="doctor" class="img-fluid rounded-circle"
            height="150" width="150" />
          <div class="details-info d-flex flex-column gap-3">
            <h4 class="card-title fw-bold">
              <?= $docData[0]['name'] ?>
            </h4>
            <h6 class="card-title fw-bold">
              <?= $docData[0]['bio'] ?>
            </h6>
          </div>
        </div>
        <hr />
        <form action="../handler/handelBooking.php" class="form" method="POST">
          <div class="form-items">
            <div class="mb-3">
              <label class="form-label required-label" for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" required />
            </div>
            <div class="mb-3">
              <label class="form-label required-label" for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" required />
            </div>
            <div class="mb-3">
              <label class="form-label required-label" for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" required />
            </div>
            <input type="hidden" name="doctor_id" value="<?= $docData[0]['id'] ?>" />
          </div>
          <button type="submit" class="btn btn-primary">
            Confirm Booking
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    const stars = document.querySelectorAll(".star");

    stars.forEach((star, index) => {
      star.addEventListener("click", () => {
        const isActive = star.classList.contains("active");
        if (isActive) {
          star.classList.remove("active");
        } else {
          star.classList.add("active");
        }
        for (let i = 0; i < index; i++) {
          stars[i].classList.add("active");
        }
        for (let i = index + 1; i < stars.length; i++) {
          stars[i].classList.remove("active");
        }
      });
    });
  </script>
  <?php require 'frontDoctor/footer.php'; ?>
  <?php require 'frontDoctor/footerScript.php'; ?>

</body>

</html>