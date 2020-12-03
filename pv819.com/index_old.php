<!doctype html>
<html lang="en">
<?php include "_head.php"; ?>

<body class="bg-light">
    <div class="container">

    <div class="row">
       <?php include_once "connection_database.php"; ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT Name, Email, Image FROM tbl_users';
            foreach ($dbh->query($sql) as $row) {
                echo "<tr>";
                echo '<td><img src="'.$row["Image"].'" width="50"/></td>';
                echo '<td>'.$row["Email"].'</td>';
                echo '<td>'.$row["Name"].'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

    </div>


        <?php include "_footer.php"; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/form-validation.js"></script>
</body>

</html>