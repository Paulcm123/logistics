<?php

include '../shared/session.php';

session_unset();
session_destroy();

header('Location: ../');
exit;

?>
