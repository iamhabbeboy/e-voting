
<?php
if (!isset($_SESSION['admin'])) {
    header('location: index.php');
}
?>
<b> Welcome back, <?php print_r($_SESSION['admin'])?> </b>
<div class="list-group">
    <a href="?rel=admin&method=dashboard" class="list-group-item">Home</a>
    <a href="?rel=admin&method=elect" class="list-group-item">Add Election Type</a>
    <a href="?rel=admin&method=election" class="list-group-item">Election</a>
    <a href="?rel=admin&method=users" class="list-group-item">Users</a>
    <a href="index.php?rel=home&method=logout" class="list-group-item">Logout</a>
</div> 