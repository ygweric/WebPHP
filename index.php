<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<head>
    <meta http-equiv="refresh" <?php echo "content=\"0; url=".$actual_link."main\"" ?> /> 
</head>