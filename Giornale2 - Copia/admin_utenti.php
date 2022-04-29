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
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sa Diri / Admin-Utenti</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles1.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <div class="d-flex" id="wrapper">
        <div class="bg-danger" id="sidebar-wrapper">
            <div class="sidebar-heading py-5 bg-danger "></div>
            <div class="list-group list-group-flush d-flex flex-column" style="height:86%">
                <a class="list-group-item list-group-item-action p-3  my-1" href="admin_home.php">Home</a>
                <?php    
                        if(isset($_SESSION['logged']) && $_SESSION["grade"]==1){
                            print'<a class="list-group-item list-group-item-action p-3 my-1" href="admin_articoli.php">Gestione Articoli</a>
                                    <a class="list-group-item list-group-item-action p-3 my-1" href="admin_categorie.php">Gestione Categorie</a>
                                    <div style="flex-grow: 1;"></div>
                                    <a class="list-group-item list-group-item-action p-3 my-1" href="index.php">Esci</a>
                            ';
                        }else if(isset($_SESSION['logged']) && $_SESSION["grade"]>=2){
                            print'<a class="list-group-item list-group-item-action p-3 my-1" href="admin_articoli.php">Gestione Articoli</a>
                                    <a class="list-group-item list-group-item-action p-3 my-1 bg-dark text-light" href="admin_utenti.php">Gestione Utenti</a>
                                    <a class="list-group-item list-group-item-action p-3 my-1" href="admin_categorie.php">Gestione Categorie</a>
                                    <div style="flex-grow: 1;"></div>
                                    <a class="list-group-item list-group-item-action p-3 my-1" href="index.php">Esci</a>';
                        }
                    ?>
            </div>
        </div>
        <div id="page-content-wrapper" class="d-flex flex-column" style="height: 100vh;">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger" style="height: 8vh;">
                <div class="container-fluid">
                    <button class="btn btn-dark" id="sidebarToggle">Menu</button>
                </div>
                <p class="lead mb-0 text-light w-100">Benvenuto -
                    <?php    
                        if(isset($_SESSION['logged']) && $_SESSION["grade"]==1){
                            print"Editore";
                        }else if(isset($_SESSION['logged']) && $_SESSION["grade"]==2){
                            print"Admin";
                        }else if(isset($_SESSION['logged']) && $_SESSION["grade"]==3){
                            print"God";
                        }
                    ?>
                </p>
                <ul class="navbar-nav ms-auto">
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
                                    print"<li><a class=\"dropdown-item\" href=\"index.php\">Home</a></li>";
                                }

                                if(isset($_SESSION['logged'])){
                                    $N=$_SESSION["nick"];
                                    print"<li><a class=\"dropdown-item\" href=\"destroysessiona.php\"> Log out</a></li>";
                                }else{
                                    print"<li><a class=\"dropdown-item\" href=\"Login.php\"> Accedi/Registrati</a></li>";
                                }
                                
                            ?>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid " style="overflow: auto; height: 88vh;">
                <h1 class="mt-4">Pagina Utenti</h1>
                <div class="my-5"></div>
                <h2>Visualizza Utenti</h2>
                <h4 style="color:red;">Funzionalità non ancora implementata</h4>
                <table class="table table-striped">
                    <tr>
                        <th cope="col">ID</th>
                        <th cope="col">Nome</th>
                        <th cope="col">Cognome</th>
                        <th cope="col">Email</th>
                        <th cope="col">Grado</th>
                        <th cope="col">Modifica</th>
                    </tr>
                    <?php   
                            

                            include ("Config.php");
                            $query = "
                            SELECT ID_UTENTE,NOME,COGNOME,GRADO,EMAIL
                            FROM utenti
                            ORDER BY ID_UTENTE DESC
                            ";

                            $ris = mysqli_query($link,$query);
                            while($array=mysqli_fetch_array($ris)){

                            if ($ris)
                            {
                                print'
                                <tr>
                                <td>'.$array["ID_UTENTE"].'</td>
                                <td>'.$array["NOME"].'</td>
                                <td>'.$array["COGNOME"].'</td>
                                <td>'.$array["EMAIL"].'</td>
                                <td>'.$array["GRADO"].'</td>
                                <td><form action="modifica_utenti.php" method="post">
                                <input style="display: none;" name="ID" value="'.$array["ID_UTENTE"].'">
                                <button type="submit" class="btn btn-warning">!</button>
                                </form></td>
                                </tr>
                                ';


                                    
                            }else
                            {
                                    print "Errore nella query";
                                    
                            }  
                        }   
                        
                        ?>

                </table>
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