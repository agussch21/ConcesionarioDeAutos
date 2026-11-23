<?php

session_start();
session_destroy();                   
header('Location: login.php?salio=1');
exit;
