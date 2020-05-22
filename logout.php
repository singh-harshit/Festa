<?php
require 'var.php';
session_destroy();
header('Location: '.$http_referer);
?>