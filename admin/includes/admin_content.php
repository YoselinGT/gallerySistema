<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Blank page
            <small>Subheadeing</small>
            </h1>
            <?php
            
            $resutl_set = User::find_all_users();
            
            while($row = mysqli_fetch_array($resutl_set)){
                echo $row['username'] . "<br>";
            }

            $found_user = User::find_user_by_id(1);
            // print_r( $found_user);
            // die();
            $user = User::instantation($found_user);

            echo $user->id;

            ?>
            <ol class="breadcrumb">
                <li> 
                    <i class="fa fa-dashboard"></i><a href="index.php">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
</div>