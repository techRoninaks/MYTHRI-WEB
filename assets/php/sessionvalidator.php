<?php
        // php for session checking
        session_start();
        if($_SESSION["check"] == "check")
        {
            echo  "check:".$_SESSION["username"] .":". $_SESSION["password"].":".$_SESSION["check"] .":".$_SESSION["type"] ;

        }
        else
            echo "`../home.html"
       
?> 