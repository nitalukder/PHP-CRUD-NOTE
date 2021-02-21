<?php
// Include config file
require_once "config.php";

// App Details
$AppName = "sNote";
$AppTagL = "Smart Note Manager";

// Site Details
$SitenoteTitle = "sNote : CRUD Appliaction";
$SiteNotes = "All Saved Notes";

// Define variables and initialize with empty values
$slno = $notetitle = $notedesc = $dcreated = $dmodified = "";
$slno_err = $notetitle_err = $notedesc_err = $dcreated_err = $dmodified_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate notetitle
    $input_notetitle = trim($_POST["notetitle"]);
    if (empty($input_notetitle)) {
        $notetitle_err = "Please enter a notetitle.";
    } elseif (!filter_var($input_notetitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $notetitle_err = "Please enter a valid notetitle.";
    } else {
        $notetitle = $input_notetitle;
    }

    // Validate notedesc
    $input_notedesc = trim($_POST["notedesc"]);
    if (empty($input_notedesc)) {
        $notedesc_err = "Please enter an notedesc.";
    } else {
        $notedesc = $input_notedesc;
    }

    // // Validate salary
    // $input_salary = trim($_POST["salary"]);
    // if (empty($input_salary)) {
    //     $salary_err = "Please enter the salary amount.";
    // } elseif (!ctype_digit($input_salary)) {
    //     $salary_err = "Please enter a positive integer value.";
    // } else {
    //     $salary = $input_salary;
    // }

    // Check input errors before inserting in database
    if (empty($notetitle_err) && empty($notedesc_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO snotelist (notetitle, notedesc) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_notetitle, $param_notedesc);

            // Set parameters
            $param_notetitle = $notetitle;
            $param_notedesc = $notedesc;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <notetitle><?php echo "$SitenoteTitle"; ?></notetitle>
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
                <!-- <label for="exampleFormControlInput1" class="form-label">Note noteTitle</label> -->
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Note noteTitle">
            </div>
            <div class="mb-3">
                <!-- <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label> -->
                <textarea class="form-control <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>" id="exampleFormControlTextarea1" placeholder="Note Details" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add New Note</button>
        </form>
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