<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/style/style.css">
    <title>Smart Tech</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light  sticky-top" style="background-color: #97CBD6">
            <a class="navbar-brand" href="/home"> <img class="logo" src="/images/logo.png" height="40"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <?php if (!$user->isLoggedin()) : ?>
                        <li class="nav-item">
                            <a class="btn ml-2 btn-info" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn ml-2 btn-info" href="/register">Register</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Community</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="/blog">Blogs</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="btn ml-2 btn-info" href="/logout">Log out</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <div class="messages col-md-8 mx-auto text-center">
            <?php echo $session::flash('message'); ?>
        </div>