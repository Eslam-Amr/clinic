<?php
require 'front/head.php';
require 'helperFunction/conAndQueryFunction.php';
dataBaseConnection::connect();
$majorCount = dataBaseConnection::getData("majors", 'count(id)')[0]["count(id)"];
?>

<body>
    <div class="page-wrapper">
        <?php require 'front/navbar.php';
        if (!isset($_SESSION['major_page'])) {
            $_SESSION['major_page'] = 0;
        }
        ?>

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">majors</li>
                </ol>
            </nav>
            <div class="majors-grid">
                <?php
                foreach (dataBaseConnection::getDataPagenation("majors", $_SESSION["major_page"]) as $major) {
                    ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="./majorImage/<?= $major['image'] ?>" class="card-img-top rounded-circle card-image-circle"
                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center">
                                <?= $major['title'] ?>
                            </h4>
                            <a href="./doctors/index.php?id=<?= $major['id'] ?>"
                                class="btn btn-outline-primary card-button">Browse Doctors</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $i = 1; ?>

            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="./getMajorPageNumber.php?major_page=<?= $i - 1 ?>"
                            aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="./getMajorPageNumber.php?major_page=0">1</a></li>
                    <?php for (; $i <= ($majorCount / 8); $i++): ?>
                        <li class="page-item"><a class="page-link"
                                href="./getMajorPageNumber.php?major_page=<?= $i ?>"><?= $i + 1 ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link page-next" href="./getMajorPageNumber.php?major_page=<?= $i - 1 ?>"
                            aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php require 'front/footer.php'; ?>
    <?php require 'front/footerscript.php'; ?>
</body>

</html>