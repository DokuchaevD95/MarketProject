<?php
    unset($is_login);
    unset($user_id);
    unset($login);
    unset($password);
    setcookie ("login", "", time() - 3600);
    setcookie ("user_id", "", time() - 3600);
    setcookie ("password", "", time() - 3600);
    setcookie('check', $_POST['save_data']);
    // уничтожение куки с идентификатором сессии
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
    unset($_SESSION);

    header('Location: index.php');
    exit();
?>