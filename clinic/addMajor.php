<?php
require('./helperFunction/function.php');
require('./front/head.php');
require('./front/navbar.php');
?>
<div class="text-center">
    <h2 class="text-success">major add</h2>
</div>
<div class="text-center">
    <?= displayError2('error', 'major') ?>
    <?= displayError1('request_error') ?>
    <?= success('success', 'major') ?>
</div>

<div class="container w-25 border m-auto mt-2">
    <form action="./handler/handleAddMajor.php" method="POST" class="form-group" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">major title</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter major title">
            
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">insert image</label>
            <input type="file" name="major-image" class="form-control" id="exampleFormControlTextarea1"
            >
            
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="add">
        </div>
    </form>
</div>
<?php
        require('./front/footer.php');
        require('./front/footerscript.php');
?>