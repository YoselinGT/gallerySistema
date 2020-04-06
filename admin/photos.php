<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
$photos = Photo::find_all();

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Photos
                            </li>
                        </ol>
                        <div class="col-md-12">
                            <table  class="table table-hover">
                               <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>Filename</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>
                               </thead>
                               <tbody>
                               <?php foreach($photos as $photo):?>
                               
                                    <tr>
                                        <td><img src="<?php echo $photo->picture_path();?>"  class="admin-photo-thumbnail" />
                                            <div class="actions_link">
                                                <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                        <td>
                                        <?php
                                        $comments = Comment::find_the_comments($photo->id);
                                        echo "<a href='comment_photo.php?id=".$photo->id."'>".count($comments)."</a> ";
                                        ?>
                                       
                                        
                                        </td>
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