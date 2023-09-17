<?php
require('./front/head.php');
require('./front/navbar.php');
require('./helperFunction/conAndQueryFunction.php');
require('./helperFunction/function.php');
dataBaseConnection::connect();
$doctors = dataBaseConnection::getData("doctors", "name,email,major_id,image,id,bio");
?>
<?= success2('success') ?>
<form action="" method="GET">
    <table class="table-bordered container ">
        <thead class="p-5 text-center">
            <th class="p-3">id</th>
            <th class="p-3">name</th>
            <th class="p-3"> email</th>
            <th class="p-3">image</th>
            <th class="p-3">bio</th>
            <th class="p-3">delete</th>
            <th class="p-3">Update</th>
            </thead>
        <tbody>
            <?php foreach ($doctors as $doctor):
                ?>
                <tr>

                    <th class="p-3">
                        <?= $doctor['id'] ?>
                </th>
                <th class="p-3">
                    <?= $doctor['name'] ?>
                </th>
                <th class="p-3">
                    <?= $doctor['email'] ?>
                </th>
                <th class="p-3">
                    <img width="100" src="./doctorImage/<?= $doctor['image'] ?>" alt="">
                </th>
                <th class="p-3">
                    <?= $doctor['bio'] ?>
                </th>
                
                <th class="p-3 text-center"">
                <a href=" ./handler/delete.php?table_id=<?= $doctor['id'] ?>" class="btn btn-danger text-center"> delete</a>
                </th>
                <th class="p-3 text-center"">
            <a href="./Update.php?table_id=<?= $doctor['id'] ?>" class="btn btn-warning text-center"> Update</a>
                </th>
            </tr>
                <?php endforeach; ?>

        </tbody>
    </table>


</form>
<?php

require('./front/footer.php');

require('./front/footerscript.php');

?>