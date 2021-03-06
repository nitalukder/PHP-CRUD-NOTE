<?php

require("config.php");

// App Details
$AppName = "sNote";
$AppTagL = "Smart Note Manager";

// Site Details
$SiteTitle = "sNote : CRUD Appliaction";
$SiteNotes = "All Saved Notes";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title><?php echo "$SiteTitle"; ?></title>
</head>

<body class="bg-dark">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo "$AppName"; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/phpmyadmin/db_structure.php?server=1&db=snote&table=snotelist">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search Note" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="text-center text-light mt-3">
        <?php echo "$AppName"; ?>
    </h1>
    <h3 class="text-center text-light mb-3">
        <?php echo "$AppTagL"; ?>
    </h3>

    <div class="container my-5">
        <form>
            <div class="mb-3">
                <!-- <label for="exampleFormControlInput1" class="form-label">Note Title</label> -->
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Note Title">
            </div>
            <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label> -->
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Note Details" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add New Note</button>
        </form>
    </div>

    <h3 class="text-center text-light mb-3">
        <?php echo "$SiteNotes"; ?>
    </h3>

    <div class="container my-5">
        <table class="table table-dark table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <!-- <th scope="col">Date Created</th> -->
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark Hello World</td>
                    <td>Easily make an element as wide or as tall (relative to its parent) with our width and height utilities. Skip to main content There's a newer version of Bootstrap 4!</td>
                    <!-- <td>@mdo</td> -->
                    <td class="text-center">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>