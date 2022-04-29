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
    //prelevo le informazioni
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $pass1 = $_POST['pswd1'];
    $cognome = $_POST['cognome'];
    $nome =$_POST['nome'];
    //dichiaro la variabile errore
    $err=false;

    //creo le variabili di sessione degli errori e della email
    $_SESSION['E_email'] = "";
    $_SESSION['E_pass'] = "";
    $_SESSION['E_nome'] = "";
    $_SESSION['E_cognome'] = "";

    $_SESSION['email'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['cognome'] = "";

    //verifico se le informazioni rispettano delle caratteristiche
    if(empty($email)){
        $err=true;
        $_SESSION['E_email'] = "La email non può essere vuota";
    }

    if(empty($pass)){
        $err=true;
        $_SESSION['E_pass'] = "La password non può essere vuota";
    }else if(strlen($pass)<8){
        $err=true;
        $_SESSION['E_pass'] = "La password deve contenere almeno 8 caratteri";
    }else if($pass!=$pass1){
        $err=true;
        $_SESSION['E_pass'] = "Le password non coincidono";
    }

    if(empty($nome)){
        $err=true;
        $_SESSION['E_nome'] = "Il nome non può essere vuoto";
    }

    if(empty($cognome)){
        $err=true;
        $_SESSION['E_cognome'] = "Il cognome non può essere vuoto";
    }
    //verifico se ci sono errori o meno
    if(!$err){
        //assegno la criptografia alla password
        $passs = md5($pass);
        //includo il collegamento al db
        include ("Config.php");
        //prelevo la emeil uguale a quella prelevata
        $query = "
        SELECT *
        FROM utenti
        WHERE EMAIL = \"$email\";
        ";

        $ris = mysqli_query($link,$query);
        
        $conta=mysqli_num_rows($ris);
        //conto il risultato
        if ($conta==0)
        {
            //l'utente non esiste ,si puo procedere nell'inserire i dati nel db
            $query = "
            INSERT INTO utenti (EMAIL,PASS,NOME,COGNOME,GRADO)
            VALUES('$email','$passs','$nome','$cognome','0')
            ";
            $ris = mysqli_query($link,$query);


            $query="
            SELECT ID_UTENTE FROM utenti ORDER BY ID_UTENTE DESC LIMIT 1
            ";
            $ris = mysqli_query($link,$query);
            $array=mysqli_fetch_array($ris);
            

            $_SESSION['E_email'] = "";
            $_SESSION['E_pass'] = "";
            $_SESSION['email'] = "";

            $_SESSION['nick'] = $nome." ".$cognome;
            $_SESSION['logged']=1;
            $_SESSION['grade']=0;
            $_SESSION['id']=$array['ID_ARTICOLO'];
            
            header("Location:index.php");
        }
        else
        {
            //se il risultato è sbagliato
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $nome;
            $_SESSION['cognome'] = $cognome;
            $_SESSION['E_email'] = "La email è gia registrata";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }  
    }else{
        //se sono presenti errori
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['cognome'] = $cognome;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }    
  
?>
