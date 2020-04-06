$(document).ready(function(){

    var user_href;
    var user_href_splittled;
    var user_id;
    var image_src;
    var image_src_splittled;
    var image_name;
    var photo_id;

    $(".modal_thumbnails").click(function(){
        $("#set_user_image").prop('disabled',false);

        user_href=$("#user-id").prop("href");
        user_href_splittled=user_href.split("=");
        user_id=user_href_splittled[user_href_splittled.length-1];

        image_src = $(this).prop("src");
        image_src_splittled=image_src.split("/");
        image_name=image_src_splittled[image_src_splittled.length-1];

        photo_id = $(this).attr("data");

        $.ajax({
            url:"includes/ajax_code.php",
            data:{photo_id:photo_id},
            type:"POST",
            success: function(data){
                if(!data.error){

                    $("#modal_sidebar").html(data);

                }
            }
        });

    });

    $("#set_user_image").click(function(){
        $.ajax({
            url:"includes/ajax_code.php",
            data:{image_name: image_name, user_id:user_id},
            type:"POST",
            success: function(data){
                if(!data.error){

                    $(".user_image_box a img").prop('src',data);

                }
            }
        });
    });



    /******Edit sidebar*********/
    $(".photo-info-box").click(function(){
       $(".inside").slideToggle("fast");
       $("#toggle").toggleClass("glyphicon glyphicon-menu-up glyphicon glyphicon-menu-down");
    });


    /*******Delete function*************/


    $(".delete_link").click(function(){
        confirm("Are you sure you want to delete this item?");
    })

});