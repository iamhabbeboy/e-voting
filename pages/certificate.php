<?php require 'header.php'; ?>

<div class="container">
    <div style="margin-left:20px;">
        <h3>Profile</h3>
        <hr>
    </div>


    <div class="col-md-3">

        <?php require 'sidebar.php'; ?>
    </div>
    <div class="col-md-8">

        <h4>Certificate </h4>
        <div class="col-md-6">
            <form method="post" action="index.php?rel=certificate&method=create" >
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required>

                    <label for="">School/Institution </label>
                    <input type="text" class="form-control" name="school" required>

                    <label for="">Grade </label>
                    <input type="text" class="form-control" name="grade">

                    <div style="float:left;">
                        <label for="">From</label><br>
                        <input type="date" placeholder="From" style="width: 150px" name="date_from">
                    </div>
                    <div style="float:right;">
                        <label for="">To</label><br>
                        <input type="date" placeholder="To" style="width:150px;" name="date_to">
                    </div>
                    <div style="clear:both"></div>
                </div>
                <button class="btn btn-primary" type="submit">Add <i class="fa fa-plus-circle"></i></button>
            </form>
            <br>
        </div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-5">
            <?php if (count($data['certificate']) > 0):  ?>

            <ul class="list-group">
                <?php foreach($data['certificate'] as $certificate): ?>
                <li class="list-group-item">
                    <h5><?php echo $certificate['title'] ?></h5>
                    <p><b><?php echo $certificate['school'] ?> </b></p>
                    <small><?php echo str_replace('=', ' - ', $certificate['date']) ?></small>
                </li>
                <?php endforeach ?>
            </ul>
            <?php endif ?>
        </div>


    </div>

</div>
<?php require 'footer.php'; ?> 