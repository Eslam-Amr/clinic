<?php
require 'front/head.php';
require 'helperFunction/conAndQueryFunction.php';
require 'helperFunction/function.php';
dataBaseConnection::connect();
$bookingData = dataBaseConnection::getData("booking");
?>
<body>
    <div class="page-wrapper">
        <?php require 'front/navbar.php'; ?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">history</li>
                </ol>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">major</th>
                        <th scope="col">location</th>
                        <th scope="col">status</th>
                        <th scope="col">Update status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookingData as $booking):
                        $doctorData = dataBaseConnection::getData("doctors", "*", "id=" . $booking['doctor_id'])[0];
                        $majorData = dataBaseConnection::getData("majors", "*", "id=" . $doctorData['major_id'])[0];
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $booking['id'] ?>
                            </th>
                            <td>
                                <?= $booking['date'] ?>
                            </td>
                            <td class="d-flex align-items-center gap-2"><img src="./majorImage/<?= $majorData['image'] ?>"
                                    alt="" width="25" height="25" class="rounded-circle">
                                <a href="./doctors/doctor.php?id=<?= $booking['doctor_id'] ?>"><?= $doctorData['name'] ?></a>
                            </td>
                            <td>
                                <?= $majorData['title'] ?>
                            </td>
                            <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                            <td>
                                <?= $booking['status'] ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="./pending.php?booking_id=<?=$booking['id']?>">pending </a>
                                <a class="btn btn-warning" href="./loding.php?booking_id=<?=$booking['id']?>">loading </a>
                                <a class="btn btn-warning" href="./completed.php?booking_id=<?=$booking['id']?>">completed</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'front/footer.php'; ?>
    <?php require 'front/footerscript.php'; ?>
</body>

</html>