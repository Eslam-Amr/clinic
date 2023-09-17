<?php
session_start();
require 'frontDoctor/head.php';
require '../helperFunction/conAndQueryFunction.php';
require '../helperFunction/function.php';
dataBaseConnection::connect();
if(!isset($_SESSION['page'])){
    $_SESSION['page']=0;
}
if(isset($_GET['id'])){
    if($_GET['id']==-1){
        $_SESSION['major_id']="*";
    }else{
        $_SESSION['major_id']=$_GET['id'];
    }
}
if(isset($_SESSION['major_id'])){
    if($_SESSION['major_id']=="*"){
        $doctorCount = dataBaseConnection::getData("doctors",'count(id)')[0]["count(id)"];
        $doctors = dataBaseConnection::getDataPagenation("doctors",$_SESSION["page"]);
    }
    else{
        $majorId = $_SESSION['major_id'];
        $doctorCount = dataBaseConnection::getData("doctors",'count(id)','major_id=' .$majorId)[0]["count(id)"];
        $major = dataBaseConnection::getData("majors","*","id=" . $_SESSION['major_id'])[0]["title"];
        $doctors = dataBaseConnection::getDataPagenation("doctors",$_SESSION["page"],"*","major_id=".$_SESSION['major_id']);
    }
}
else{
    
    $doctorCount = dataBaseConnection::getData("doctors",'count(id)')[0]["count(id)"];
    $doctors = dataBaseConnection::getDataPagenation("doctors",$_SESSION["page"]);

}
?>
<body>
    <div class="page-wrapper">
        <?php require 'frontDoctor/navbar.php'; ?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>
            <div class="doctors-grid">
                <?php foreach ($doctors as $doctor) { ?>
                    <?php if(isset($_SESSION['major_id'])){ 
                        if($_SESSION['major_id']=="*"){?>
                        <div class="card p-2" style="width: 18rem;">
                            <img src="../doctorImage/<?= $doctor['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">
                                    <?= $doctor['name'] ?>
                                </h4>
                                <h6 class="card-title fw-bold text-center"><?=dataBaseConnection::getData("majors","title", $doctor['major_id'] )[0]["title"]?></h6>
                                <a href="./doctor.php?id=<?=$doctor['id']?>" doctor.html" class="btn btn-outline-primary card-button">Book an
                                    appointment</a>
                            </div>
                        </div>
                        <?php }else {?>
                <?php if($majorId==$doctor['major_id']) { 
                    ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="../doctorImage/<?= $doctor['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center">
                                <?= $doctor['name'] ?>
                            </h4>
                            <h6 class="card-title fw-bold text-center"><?=$major?></h6>
                            <a href="./doctor.php?id=<?=$doctor['id']?>" doctor.html" class="btn btn-outline-primary card-button">Book an
                                appointment</a>
                        </div>
                    </div>
                    <?php }}} else{ 
                        ?>
                        <div class="card p-2" style="width: 18rem;">
                            <img src="../doctorImage/<?= $doctor['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">
                                    <?= $doctor['name'] ?>
                                </h4>
                                <h6 class="card-title fw-bold text-center"><?=dataBaseConnection::getData("majors","title", $doctor['major_id'] )[0]["title"]?></h6>
                                <a href="./doctor.php?id=<?=$doctor['id']?>" doctor.html" class="btn btn-outline-primary card-button">Book an
                                    appointment</a>
                            </div>
                        </div>

                        
                        
                        <?php } ?>
                        <?php } 
                        ?>
            </div>
            <?php $i=1; ?>
            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="./getPageNumber.php?page=<?=$i-1?>" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="./getPageNumber.php?page=0">1</a></li>
                    <?php for(;$i<=($doctorCount/8);$i++) :?>
                    <li class="page-item"><a class="page-link" href="./getPageNumber.php?page=<?=$i?>"><?=$i+1?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link page-next" href="./getPageNumber.php?page=<?=$i-1?>" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php require 'frontDoctor/footer.php'; ?>
    <?php require 'frontDoctor/footerScript.php'; ?>

</body>

</html>