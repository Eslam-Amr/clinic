<footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">


                    
                    <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']['role']=='admin'){ ?>
                        <a  class=" link text-white" href="./history.php">Home</a>
                        <a  class=" link text-white" href="./addMajor.php">add major</a>
                        <a  class=" link text-white" href="./add.php">add doctor</a>
                    <a  class="link text-white " href="./table.php">table</a>
                    <?php } else { ?>                    
                    <a href="./index.php" class="link text-white">Home</a>
                    <a href="./majors.php" class="link text-white">Majors</a>
                    <a href="./doctors/index.php?id=-1" class="link text-white">Doctors</a>
                    
                    <a href="./register.php" class="link text-white">Register</a>
                    <a href="./contact.php" class="link text-white">Contact</a>
                    
                    
                    
                    
                    <?php }?>
                    <?php if(!isset($_SESSION['auth'])){?>
                        <a href="./login.php" class="link text-white">Login</a>
                        <?php  } else{ ?>
                            <a href="./handler/logout.php" class="link text-white">Logout</a>
                            <?php }?>
                </div>
            </div>
        </div>
    </footer>
