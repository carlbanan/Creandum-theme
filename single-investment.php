<?php if($_GET['async'] != '1'){ 


   /* DIRECT URL REQUEST */

    DEFINE("SINGLEPOST",1);

    $_template_file =  get_template_directory()."/archive-investment.php";
    load_template( $_template_file);


}
else{


    /* ASYNC REQUEST */


    $_template_file =  get_template_directory()."/single-investment-content.php";
    load_template( $_template_file);


} 
?>