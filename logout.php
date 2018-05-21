<?php
    unset($is_login);
    unset($user_id);
    unset($login);
    unset($password);
    setcookie ("login", "", time() - 3600);
    setcookie ("password", "", time() - 3600);
    header('Location: index.php');
    exit();
?>