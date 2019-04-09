<?php require 'header.php'; ?>

<?php if (isset($_GET['status']) && $_GET['status'] == '1'): ?>
    <script>alert('Added Successfully !'); </script>
<?php endif ?>

<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
    <script>alert('Party Already Added !'); </script>
<?php endif ?>
<div class="container">
    <div style="margin-left:20px;">
        <h3>Political Party</h3>
        <hr>
    </div>


    <div class="col-md-3">
        <?php require 'sidebar-admin.php'; ?>
    </div>
    <div class="col-md-8">
        <div class="col-md-12">

            <div class="col-md-7">
                <form method="post" action="index.php?rel=admin&method=party">
                    <h3> Add Party </h3>
                    <label>Party Name </label>
                    <input type="text" class="form-control" name="party" required>
                
                    <label for="">Election Type </label>
                    <select class="form-control" name="election_type">
                        <?php if ( count($data['type']) > 0): ?>
                            <?php foreach ($data['type'] as $type): ?>
                                <option value="<?php echo $type['title']?>"><?php echo $type['title']?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <label for="">Candidate Name</label>
                    <input type="text" name="candidate" class="form-control" name="name" required>
                    <br />
                    <button class="btn-primary btn btn-lg"> Submit </button>
                    <br><br>
                </form>
            </div>
            <div class="col-md-5">
                <h3>Recent Added </h3>
                <?php if (count($data['party']) > 0 ): ?>
                    <ul class="list-group">
                    <?php foreach ($data['party'] as $party): ?>
                        <li class="list-group-item">
                            <?php echo $party['party'] ?> 
                            <br/>
                            <b><small><?php echo $party['election_type']?>: <?php echo $party['candidate']?></small></b><br/>
                            <small>Created At: <?php echo $party['created_at']?> </small>
                        </li>
                    <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </div>  
        </div>

        <div class="col-md-5">

        </div>

    </div>

</div>
<?php require 'footer.php'; ?> 