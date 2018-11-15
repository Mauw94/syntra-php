<?php
include "conn.php";
include "head.php";

$sql = "SELECT * FROM personen";
$result = mysqli_query($con, $sql);
if (!empty($result)) {
    ?>
    <div class="container">
        <table id="persontable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Birtdate</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <h2>Personlist</h2>
        <tbody>
        <?php
        while ($output = mysqli_fetch_assoc($result)) {
            //print_r($output);
            echo '<tr>';
            echo '<td>' . $output['name'].'</td>';
            echo '<td>' . $output['adress'].'</td>';
            echo '<td>' . $output['phone'].'</td>';
            echo '<td>' . $output['email'].'</td>';
            echo '<td>' . $output['birth'].'</td>';
            echo '<td>' . $output['username'].'</td>';
            ?>
            <td>
            <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $output['id']?>">
            <input type="submit" value="edit" class="btn btn-default">
            </form>
            </td>
            <td>
            <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $output['id']?>">
            <input type="submit" value="?" class="btn btn-danger">
            </form>
            </td>
            <?php
            echo '</tr>';
        }
        ?>
        </tbody>
        </table>
        <a href="index.php"><button class="btn btn-default">Back</button></a>
    </div>
    <?php
}
?>