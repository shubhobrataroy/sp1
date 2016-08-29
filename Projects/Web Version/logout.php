<?php
   session_start();

    if($_GET['logout']=='yes') {
        session_destroy();
        echo "<script>window.location='index.html'</script>";
    }
 

?>
