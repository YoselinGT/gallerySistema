<?php include("includes/init.php"); 
if(!$session->is_signed_in()){
    redirect("login.php");
}
if(empty($_GET['id'])){
    redirect("users.php");
}

$user = User::find_by_id($_GET['id']);

if($user){
    $user->delete();
    $session->message("The user has been deleted");
    redirect("users.php");
}else{
    redirect("users.php");
}

?>
