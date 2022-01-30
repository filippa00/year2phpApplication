<?php
session_start();
session_unset();
session_destroy();


header("location:../homeview/index.php?error=none");
