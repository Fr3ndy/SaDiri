<!-- .
|+-----------------------------------------------------------------------------------------+|
|                                                                                           |
|                               ███████╗██████╗░██████╗░███╗░░██╗██████╗░██╗░░░██╗          |
|                               ██╔════╝██╔══██╗╚════██╗████╗░██║██╔══██╗╚██╗░██╔╝          |
|                               █████╗░░██████╔╝░█████╔╝██╔██╗██║██║░░██║░╚████╔╝░          |
|   █▀▀ █▀█ █▀▄ █▀▀   █▄▄ █▄█   ██╔══╝░░██╔══██╗░╚═══██╗██║╚████║██║░░██║░░╚██╔╝░░          |
|   █▄▄ █▄█ █▄▀ ██▄   █▄█ ░█░   ██║░░░░░██║░░██║██████╔╝██║░╚███║██████╔╝░░░██║░░░          |
|                               ╚═╝░░░░░╚═╝░░╚═╝╚═════╝░╚═╝░░╚══╝╚═════╝░░░░╚═╝░░░          |
|+-----------------------------------------------------------------------------------------+|
|   Code By Fr3ndy 04/2022                                                                  |
|   Big project SaDiri                                                                      |
|   javascript,Html,css(bootstrap 5.1)                                                      |
|                                                                                           |
|+-----------------------------------------------------------------------------------------+|
. -->

<?php session_start(); 
include ("config.php");?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sa Diri / Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bolder">Sa Diri</h1>
                <p class="lead mb-0">L'infomazione a portata di click</p>
            </div>
        </div>
    </header>
    <!-- -----------------------------------------------------NAV-BAR----------------------------------------------------------------------     -->
    <nav class="navbar navbar-expand-lg px-5 sticky-top bg-danger navbar-dark"
        style="box-shadow: 0px 0px 5px 0px #000000;">
        <div class="container-fluid">
            <span></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold;" href="index.php">Home </a> </li>
                    <li class="nav-item"><a class="nav-link" href="ultimaora.php"> Ultima ora</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorie</a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <div class="d-flex flex-row flex-wrap " style="min-width: 20em;">
                                <?php
                                    $query="
                                        SELECT ID_CATEGORIA
                                        FROM categorie
                                    ";
                                    $recordSet=mysqli_query($link,$query);
                                    while($record=mysqli_fetch_array($recordSet)){
                                            
                                        $id=$record[0];

                                        $query1="
                                        SELECT NOME, ID_CATEGORIA
                                        FROM categorie
                                        WHERE ID_CATEGORIA='$id';
                                        ";

                                        $ris1 = mysqli_query($link,$query1);
                                        $array1=mysqli_fetch_array($ris1);
                                        
                                        print'
                                        <form method="get" action="categorie.php" style="width: 33%;">
                                        <input style="display: none;" name="nomee" value="'.$array1["NOME"].'">
                                        <button type="submit" class="list-group-item list-group-item-action border-0 justify-content-center d-flex" name="id" value="'.$array1["ID_CATEGORIA"].'">
                                        '.$array1["NOME"].'</button>
                                        </form>';
                                    }
                                ?>
                            </div>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <div class="form-check form-switch nav-link">
                        <label class="form-check-label" for="lightSwitch">🌓</label>
                        <input class="form-check-input" type="checkbox" id="lightSwitch" />
                        </div>
                    </li>    
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Area personale </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php
                                if(isset($_SESSION['logged'])){
                                    $N=$_SESSION["nick"];
                                    print"<li class=\"dropdown-header\">$N</li>";
                                }else{
                                    print"<li class=\"dropdown-header\">Non registrato</li>";
                                }
                                
                                if(isset($_SESSION['logged']) && $_SESSION["grade"]>=1){
                                    print"<li><a class=\"dropdown-item\" href=\"admin_home.php\"> Admin</a></li>";
                                }

                                if(isset($_SESSION['logged'])){
                                    $N=$_SESSION["nick"];
                                    print"<li><a class=\"dropdown-item\" href=\"destroysession.php\"> Log out</a></li>";
                                }else{
                                    print"<li><a class=\"dropdown-item\" href=\"Login.php\"> Accedi/Registrati</a></li>";
                                }
                                
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="container my-1 p-5 d-flex justify-content-center mt-auto">
        <form action="Gestione_Login.php" method="post" class="border m-4 p-5 rounded-2 w-75">
            <h1 class="form-label">Login</h1>
            <div class="mb-3 mt-3 ">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php 
                    if(isset($_SESSION['email1'])){
                        $N=$_SESSION["email1"];
                        print"$N";
                        }
                  ?>">
                <label class="text-danger">
                    <?php
                        if(isset($_SESSION['E_email1'])){
                        $N=$_SESSION["E_email1"];
                        print"$N";
                        }
                    ?>

                </label>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                <label class="text-danger">
                    <?php
                        if(isset($_SESSION['E_pass1'])){
                        $N=$_SESSION["E_pass1"];
                        print"$N";
                        }
                    ?>

                </label>
            </div>
            <div class="mb-5">
                <a class="text-primary" href="#">Password dimenticata?</a>
            </div>
            <label>Non sei registrato?</label>
            <div class=" d-flex justify-content-between w-100">
                <button type="button" class="btn btn-secondary"
                    onclick="location.href='Register.php'">Registrati</button>
                <button type="submit" class="btn btn-primary">Log-In</button>
            </div>
        </form>
    </div>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <footer class="py-2 bg-dark mt-auto">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <b>SaDiri</b> Fr3ndy 04/2022 <b>Repository:</b> <a
                    href="https://github.com/Fr3ndy/SaDiri">https://github.com/Fr3ndy/SaDiri</a> </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/switch.js"></script>
</body>

</html>