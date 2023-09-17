<?php
 require 'front/head.php'; 
 require 'helperFunction/function.php'; 
 ?>

<body>
    <div class="page-wrapper">
        <?php require 'front/navbar.php';         
        ?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                </ol>
            </nav>
            <?= success("success","message"); ?>
        <?= displayError2("error","name"); ?>
        <?= displayError2("error","email"); ?>
        <?= displayError2("error","message"); ?>
        <?= displayError2("error","subject"); ?>
        <?= displayError2("error","phone"); ?>
        <?= displayError1("request_error"); ?>

            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form  action="./handler/handelContact.php" method="POST">
                    <div class="form-items" >
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="subject">subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="message">message</label>
                            <textarea class="form-control" name="message" id="message" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>
    </div>

<?php require 'front/footer.php'; ?>
<?php require 'front/footerscript.php'; ?>
</body>

</html>