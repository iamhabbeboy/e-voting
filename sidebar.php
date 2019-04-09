
<?php
if (!isset($_SESSION['staff'])) {
    header('location: index.php');
}
?>
<b> Welcome back, <?php print_r($_SESSION['staff']['fullname'])?> </b>
<div class="list-group">
    <a href="?rel=home&method=dashboard" class="list-group-item">Home</a>
    <a href="?rel=home&method=vote" class="list-group-item">Vote</a>
    <a href="index.php?rel=home&method=logout" class="list-group-item">Logout</a>
</div> 