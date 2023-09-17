<?php
require 'front/head.php';
require 'front/navbar.php';
require('./helperFunction/conAndQueryFunction.php');
?>

<?php
// echo ";klmd56lk";
// die;
// session_start();
dataBaseConnection::connect();
// var_dump($_GET['table_id']);
$docData = dataBaseConnection::getData("doctors", "*", "id=" . $_GET['table_id']);
// var_dump($docData);
?>
<form action="./handler/handleUpdate.php?id=<?=$_GET['table_id']?>" method="GET">

    <div class="container mt-5 text-center">
        <div class="row">
            <div style="border: 3px solid black;" class="col-12 text-center">
                <div class="col-12 my-5">

                    <h1>UPDATE</h1>
                </div>
                <div class="col-12 my-5">

                    <h2>
                        <?php
                        // if (isset($_SESSION['error'])) {
                        
                        //     echo $_SESSION['error'];
                        //     unset($_SESSION['error']);
                        // }
                        // var_dump($docData[0]['bio']);
                        ?>
                    </h2>
                </div>
                <div class="col-12 my-5">

                    <input type="text" name="name" class="col-8 form-control " value="<?= $docData[0]['name'] ?>"
                        placeholder="name">
                </div>
                <div class="col-12 my-5">
                    <input type="email" name="email" class="col-8 form-control " placeholder="email"
                        value="<?= $docData[0]['email'] ?>">
                    </div>
                    <input type="hidden" name="id"
                        value="<?=$_GET['table_id']?>">
                <div class="col-12 my-5">
                    <textarea name="bio" id="" class="col-8 form-control " cols="30" rows="7"
                        placeholder="bio"><?= $docData[0]['bio'] ?></textarea>
                </div>

                <div class="col-12 my-5">
                    <!-- <a href="./handler/handleUpdate.php?id=<?=$_GET['table_id']?>" type="submit">submit</a> -->
                    <input class="btn btn-success" type="submit">
                </div>
            </div>
        </div>
    </div>



</form>
<?php
require 'front/footer.php';
require 'front/footerscript.php'; ?>