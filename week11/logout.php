<?php

session_start();
session_unset();
session_destroy();
header("Location: booking_login.php");
