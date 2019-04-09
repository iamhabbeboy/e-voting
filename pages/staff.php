<?php require 'header.php'; ?>

<?php if (isset($_GET['status']) and $_GET['status'] == '1') : ?>
    <script>
        alert("Promoted successfully");
    </script>
<?php endif ?>
<div class="container">
    <div style="margin-left:20px;">
     <h3>Staff Information</h3>
     <hr>
    </div>

    
    <div class="col-md-3">

        <?php require 'sidebar-admin.php'; ?>
    </div>
    <div class="col-md-8"> 
        <?php
            $allvotes = allVotes()->fetchAll();
            if (count($allvotes) > 0) {
                foreach($allvotes as $allvote) {
                    echo '<b>'.$allvote['election_type'].'</b> '.$allvote['party'].'('.showVote($allvote['election_type'])->rowCount().'), ';
                }
            }
        ?>  
        <?php if (count($data['staffs']) > 0) : ?>
            <form method="post" action="index.php?rel=admin&method=promote" id="form"></form>
        <ul class="list-group">
            <?php foreach ($data['staffs'] as $staff) : ?>
                <li class="list-group-item">
                    <div style="float:left">
                        <?php echo $staff['fullname'] ?>
                        <br>
                        <small>Vote: 
                            <?php
                              $votes = withVotes($staff['id'])->fetchAll();
                              if (count($votes) > 0) {
                                foreach($votes as $vote) {
                                    echo $vote['election_type'].'('.$vote['party'].'),';
                                }
                              } else {
                                  echo 'N/A';
                              }
                            ?>
                    </small> <br/>
                        <small>Created At: <?php echo $staff['created_at']?></small>
                        </div>
                        
                        <div class="clearfix"></div>
                        </li>
                       
                        <?php
            endforeach ?>

        </ul>

        <?php endif ?>
           
    </div>
   
</div>
<?php require 'footer.php'; ?>