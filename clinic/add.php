<?php
require('./helperFunction/function.php');
 require('./front/head.php');
 require('./front/navbar.php');
 ?>
<div class="text-center">
    <h2 class="text-success">doctor add</h2>
</div>
<div class="text-center">
    <?= displayError2('error', 'email') ?>
    <?= displayError2('error', 'name') ?>
    <?= displayError2('error', 'bio') ?>
    <?= displayError2('error', 'major') ?>
    <?= displayError1('request_error') ?>
    <?= success('success', 'doctor') ?>
</div>

<div class="container w-25 border m-auto mt-2">
    <form action="./handler/addDoctor.php" method="POST" class="form-group" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name"  class="form-control" id="exampleFormControlInput1" placeholder="Enter Name">
            
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email">
            
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">bio</label>
            <textarea placeholder="enter bio"  class="form-control" name="bio" id="" cols="30" rows="10"></textarea>
            
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">major</label>
            <input type="text" name="major" class="form-control" id="exampleFormControlInput1" placeholder="Enter major">
            
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">insert image</label>
            <input type="file" name="doctor-image" class="form-control" id="exampleFormControlTextarea1"
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