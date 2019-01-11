<?php 
session_start(); 
session_destroy();
header('Location: /projetoc/?action=home');
exit(); 
?> 