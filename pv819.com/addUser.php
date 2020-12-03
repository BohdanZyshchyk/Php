<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = "";
    $lastName = "";
    $username = "";
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["username"])) {
        $file = "users.txt";
        $firstname = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $username = $_POST["username"];
        if (strpos(file_get_contents($file), $firstname) == false)
        {
           echo "<h1>USER EXIST</h1>";
           return;
        }
        file_put_contents($file, "{$firstname} {$lastName} {$username}\n" , FILE_APPEND | LOCK_EX);
    }
}
?>
<!doctype html>
<html lang="en">
<?php include "_head.php"; ?>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <a href="index.php">MAIN</a>
            <?php include "_rightPanel.php"; ?>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>

        <?php include "_footer.php"; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/form-validation.js"></script>
</body>

</html>