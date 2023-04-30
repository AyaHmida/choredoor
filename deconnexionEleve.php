<?php  
    Session_start();
    Session_unset();//supprime les varibale de session
    Session_destroy();
    header('location:index.php');//redirection vers la page profile.
    


?>