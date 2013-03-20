<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['loggedin'])) {
    include("signin.php");
} elseif (isset($_SESSION['loggedin'])) {
    header('Location: http://huynq.net/code/wallpapers/assmin/get.html');
}
?>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == "huynq" && $pass == "abc123") {
        $_SESSION['loggedin'] = $user . $pass;
        header('Location: http://huynq.net/code/wallpapers/assmin/get.html');
    } else {
        header('Location: http://huynq.net/code/wallpapers/assmin/');
    }
}
?>