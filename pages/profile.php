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

    <h4>Update your profile </h4>
        <div class="col-md-6">
        <form>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" readonly style="color: #666" class="form-control" name="email" value="<?php echo $_SESSION['staff']['email']?>">
      
                <label for="">Phone Number</label>
                <input type="text" class="form-control" name="phone">
         
                <label for="">Address</label>
                <textarea name="address" class="form-control"></textarea>
   
                <label for="">State</label>
                <input type="text" class="form-control" name="state">
            </div>
            <button class="btn btn-primary">Update profile</button>
        </form>
        <br>
        </div>
        

    </div>
   
</div>
<?php require 'footer.php'; ?>