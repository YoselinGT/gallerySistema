<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
$message="";
if(isset($_FILES['file'])){
$photo = new Photo();
$photo->title = $_POST['title'];
$photo->set_file($_FILES['file']);
if($photo->save()){
    $message="Photo uploaded Succesfully";
}else{
    $message = join("<br>",$photo->errors);
}
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Upload
                            </li>
                        </ol>
                        <div class="row">
                        <div class="col-md-6">
                        <?php echo $message;?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" id="">
                            </div>
                            <input type="submit" name="submit" class="form-control" value="Enviar">
                        </form>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="upload.php" class="dropzone"></form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>