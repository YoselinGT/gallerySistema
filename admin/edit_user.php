<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}

if(empty($_GET['id'])){
    redirect("users.php");
}else{
    $user = User::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if($user){
            $user->username=$_POST['username'];
            $user->password=$_POST['password'];
            $user->firs_name=$_POST['firs_name'];
            $user->last_name=$_POST['last_name'];
            
            if(empty($_FILES['user_image'])){
                $user->save();
                $session->message("The user has been updated");
            }else{
                $user->set_file($_FILES['user_image']);
                $user->save_user_and_image();
                $user->save();
                $session->message("The user has been updated");
                redirect("edit_user.php?id={$user->id}");
                
            }

            
        }
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
                        </h1>
                        <p class="bg-success"><?php echo $message ?></p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> users
                            </li>
                        </ol>

                        <div class="col-md-6 user_image_box">
                            <a data-toggle="modal" data-target="#photo-library" href="#">
                            <img src="<?php echo $user->imagen_path_and_placeholder(); ?>" alt="" class="admin-photo-thumbnail">
                            </a>
                        </div>

                        
                        <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" name="user_image">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="firs_name">First name</label>
                                <input type="text" name="firs_name" class="form-control" value="<?php echo $user->firs_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                            </div>
                            <div class="form group">
                                    <a class="btn btn-danger" id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg pull-right">
                            </div>  
                            </form> 
                        </div>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
  <?php include("includes/photo-modal.php"); ?>
  <?php include("includes/footer.php"); ?>