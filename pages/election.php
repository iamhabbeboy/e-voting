<?php require 'header.php'; ?>
<?php if (isset($_GET['status']) && $_GET['status'] == '1'): ?> 
<script>alert("Successfully added")</script>
<?php endif; ?>

<div class="container">
    <div style="margin-left:20px;">
        <h3>Promotional Exam</h3>
        <hr>
    </div>


    <div class="col-md-3">
        <?php require 'sidebar-admin.php'; ?>
    </div>
    <div class="col-md-8">
        <div class="col-md-12">

            <div class="col-md-7">

 
                <form method="post" action="index.php?rel=admin&method=type">
                    <h3> Add Election </h3>
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required>
                    <br />
                    <button class="btn-primary btn btn-lg"> Submit </button>
                    <br><br>
                </form>
            </div>
            <div class="col-md-5">
                <h3> Election Type </h3>
                <?php if (count($data['elections']) > 0): ?>
                    <ul class="list-group">
                    <?php foreach($data['elections'] as $election): ?>
                        <li class="list-group-item"><?php echo $election['title'] ?> </li>
                    <?php endforeach ?>
                        </ul>
                    <?php else: ?>
                    <h4> No record available </h4>
                <?php endif ?>
            </div>
        </div>

        <div class="col-md-5">

        </div>

    </div>

</div>
<?php require 'footer.php'; ?> 