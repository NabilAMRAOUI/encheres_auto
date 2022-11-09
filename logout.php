<?php
require __DIR__."/classes/session.php";
session_destroy();
unset($_SESSION);
header('Location: index.php');