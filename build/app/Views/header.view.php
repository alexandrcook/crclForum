<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Forum</title>
</head>
<body>
<header>
    <ul>
        <li><a href="/">Forum (Main)</a></li>
        <li><a href="/login">login</a></li>
        <li><a href="/logout">LOGOUT</a></li>
    </ul>
    <?php if(isset($_SESSION['flash_msg']))echo $_SESSION['flash_msg']; unset($_SESSION['flash_msg']);?>
</header>