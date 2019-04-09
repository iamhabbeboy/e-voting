<?php require 'header.php'; ?>

<div class="container">
    <div class="col-md-8">
        <h3>E-Voting Admin Portal</h3>
        <img src="../public/images/ballot.jpg" width="600" height="400">
    </div>
    <div class="col-md-4">
        <div id="signin" >
            <form method="post">
                <h4>Login <i class="fa fa-lock"></i></h4>
               
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="btn" style="width: 100%;">Submit <i class="fa fa-chevron-right"></i></button>
                </div>
                <?php if (isset($_POST['btn'])): ?>
                <?php 
                    $email = $_POST['email'];
                    $passwd = $_POST['password'];

                    if ($email == "admin" && $passwd == "admin") {
                        $_SESSION['admin'] = "admin";
                        header('location: index.php?rel=admin&method=dashboard');
                    }
                ?>
                <?php endif ?>
            </form>
        </div>
   
    </div>

</div>

<?php require 'footer.php'; ?> 