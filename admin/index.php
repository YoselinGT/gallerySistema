<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>

        <div id="page-wrapper">

            <!-- <div class="container-fluid"> -->

                <!-- Page Heading -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div> -->
                <!-- /.row -->

            <!-- </div> -->
            <!-- /.container-fluid -->
            <?php include("includes/admin_content.php"); ?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>