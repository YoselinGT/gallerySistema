<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
$user = new User();
    if(isset($_POST['save'])){
        if($user){
            $user->username=$_POST['username'];
            $user->password=$_POST['password'];
            $user->firs_name=$_POST['firs_name'];
            $user->last_name=$_POST['last_name'];
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $session->message("The user has been added");
            redirect("add_user.php");
        }
    }





?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            users
                            <small>Subheading</small>
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> users
                            </li>
                        </ol>

                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="user_image">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="firs_name">First name</label>
                                <input type="text" name="firs_name" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" id="" class="form-control">
                            </div>
                            <input type="submit" value="Save" name="save">
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>