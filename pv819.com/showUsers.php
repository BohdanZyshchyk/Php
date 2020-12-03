<a href="index.php">MAIN</a>
<?php
$file = file_get_contents("users.txt", true);
$users = explode("\n", $file);
$users_array = array();
foreach ($users as &$user) {
    $value = preg_split('/\s+/', $user);
    if (count($value) == 1)
    {
        continue;
    }
    $temp = array("user" => $value[0], "last name" => $value[1], "name" => $value[2]);
    array_push($users_array, $temp);
}

?>
<?php if (count($users_array) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($users_array))); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users_array as $row) : array_map('htmlentities', $row); ?>
                <tr>
                    
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>