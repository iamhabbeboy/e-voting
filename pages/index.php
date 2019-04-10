<?php require 'header.php'; ?>

<?php if (isset($_GET['error']) && $_GET['error'] == '2') :?>
 <script>alert('Invalid information supplied !') </script>
<?php endif ?>
<div class="container">
    <div class="col-md-8">
        <h3>E-Voting</h3>
       <img src="../public/images/ballot.jpg" width="600" height="400">
    </div>
    <div class="col-md-4">
        <div id="signin" style="display:none">
            <form method="post" action="index.php?rel=home&method=login">
                <h4>Login <i class="fa fa-lock"></i></h4>

                <div class="form-group">
                    <label for="">Matric No</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="width: 100%;">Submit <i class="fa fa-chevron-right"></i></button>
                </div>
                <a href="javascript:void(0)" onclick="togglePane()">Sign Up</a>
            </form>
        </div>
        <div id="signup">
            <form method="post" action="?rel=form&method=create">
                <h4>Sign Up <i class="fa fa-lock"></i></h4>
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" name="fullname" required>
                    <label for="">Matric No.</label>
                    <input type="text" class="form-control" name="email" required>
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phone" required>
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" required>
                    <!-- <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="passwd"> -->
                    <br/>
                    <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                    <br/> <a href="javascript:void(0)" onclick="togglePane()">Login </a>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    function togglePane() {
        const signup = document.querySelector('#signup');
        const signin = document.querySelector('#signin');

        if (signup.style.display == 'block') {
            signup.style.display = 'none'
            signin.style.display = 'block';
        } else {
            signup.style.display = 'block'
            signin.style.display = 'none';
        }
    }
</script>
<?php require 'footer.php'; ?> 