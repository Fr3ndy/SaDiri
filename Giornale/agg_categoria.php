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

<?php
    session_start();

    $nome = $_POST['nome_c'];
    $imp = $_POST['import'];
    $err=false;
    $_SESSION['E_categoria'] = "";

    if(empty($nome)){
        $err=true;
        $_SESSION['E_categoria'] = "Il nome non può essere vuoto";
    }

    if(!$err){
        include ("Config.php");
        $query = "
        SELECT NOME
        FROM categorie
        WHERE NOME = \"$nome\";
        ";

        $ris = mysqli_query($link,$query);
        $conta=mysqli_num_rows($ris);
        if ($conta==0)
        {
            $query = "
            INSERT INTO categorie (NOME,IMPORTANZA)
            VALUES('$nome','$imp')
            ";
            $ris = mysqli_query($link,$query);
            
            $_SESSION['E_categoria'] = "Successo";
            
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        else
        {
            $_SESSION['E_categoria'] = "Categoria già presente nel db";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }  
    }else{    
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }    
  
?>