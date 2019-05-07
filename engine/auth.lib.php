<?php


function newUser()
{
    if (isset($_POST['reg'])) {
        $mail = escapeString(createConnection(), $_POST['mailuser']);
        if (is_userDB($mail)) {
            $hash = uniqid(rand(), true);
            $login = escapeString(createConnection(), $_POST['user']);
            $pass = escapeString(createConnection(), $_POST['passuser']);
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`hash`, `login`, `pass`, `mail`) VALUES ('$hash', '$login', '$passHash', '$mail')";
            execQuery($sql);
            $_SESSION['status'] = 'guest';
            auth($mail,$pass);
        } else {
            $_SESSION['logflag'] = "wrong";
            $_SESSION['mail'] = $mail;
        }

    }
}

/**
 * @param $mail
 * @return bool
 */
function is_userDB($mail)
{
    $sql = "select `mail` from `user` where `mail` = '$mail' limit 1";
    $check = getAssocResult($sql);
    if (!empty($check)) {
        return false;
    }
    return true;
}


/**
 * @return string
 */
function login()
{
    if (isset($_POST['log'])) {
        $mail = escapeString(createConnection(), $_POST['mail']);
        $pass = escapeString(createConnection(), $_POST['pass']);;

        if (!auth($mail, $pass)) {
            return $_SESSION['logflag'] = "error";
        } else {
            if ($_SESSION['mail'] == 'admin' && $_SESSION['user'] == 'admin') {
                $_SESSION['status'] = "admin";
                return $_SESSION['logflag'] = "logOK";

            } else {
                $_SESSION['status'] = 'guest';
                return $_SESSION['logflag'] = "logOK";
            }
        }
    }
}

/**
 * @param $mail
 * @param $pass
 * @return bool
 */
function auth($mail, $pass)
{
    $sql = "SELECT * FROM `user` WHERE `mail` = '{$mail}' limit 1";
    $result = singleAssocResult($sql);
    if (!empty($result)) {
        if (password_verify($pass, $result['pass'])) {
            $_SESSION['user'] = $result['login'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['mail'] = $result['mail'];
            return true;
        }
    }
    $_SESSION['status']='user';
    return false;
}

function exituser(){
    unset($_SESSION['collection']) ;
    unset($_SESSION['quonty']) ;
    unset($_SESSION['status']) ;
    unset($_SESSION['id']);
    unset($_SESSION['mail']);
    unset($_SESSION['logflag']);
    session_destroy();
}

