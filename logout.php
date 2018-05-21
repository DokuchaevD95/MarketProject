<?php
    unset($is_login);
    unset($user_id);
    unset($login);
    unset($password);
    setcookie ("login", "", time() - 3600);
    setcookie ("password", "", time() - 3600);

    // уничтожение куки с идентификатором сессии
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();

    header('Location: index.php');
    exit();
?>