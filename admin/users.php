<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
$users = User::find_all();
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <h1 class="page-header">
                            Users
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
                        <a href="add_user.php" class="btn btn-primary">Add new user</a>
                        <div class="col-md-12">
                            <table  class="table table-hover">
                               <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                    </tr>
                               </thead>
                               <tbody>
                               <?php foreach($users as $user):?>
                               
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><img src="<?php echo $user->imagen_path_and_placeholder();?>"  class="admin-photo-thumbnail" /></td>
                                        <td><?php echo $user->username; ?>
                                            <div class="pictures_link">
                                                <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                            </div>
                                        </td>
                                        <td><?php echo $user->password; ?></td>
                                        <td><?php echo $user->firs_name; ?></td>
                                        <td><?php echo $user->last_name; ?></td>
                                    </tr>
                               <?php endforeach;?>
                               </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>