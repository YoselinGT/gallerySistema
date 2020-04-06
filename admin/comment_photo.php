<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}

if(empty($_GET['id'])){
    redirect("photos.php");
}
$comments = Comment::find_the_comments($_GET['id']);
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            <small>Subheading</small>
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> comments
                            </li>
                        </ol>
                        <div class="col-md-12">
                            <table  class="table table-hover">
                               <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                               </thead>
                               <tbody>
                               <?php foreach($comments as $comment):?>
                               
                                    <tr>
                                        <td><?php echo $comment->id; ?></td>
                                        <td><?php echo $comment->author; ?>
                                            <div class="pictures_link">
                                                <a href="delete_comment_photo.php?id=<?php echo $comment->id; ?>">Delete</a>
                                            </div>
                                        </td>
                                        <td><?php echo $comment->body; ?></td>
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