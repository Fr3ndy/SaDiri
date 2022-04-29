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
$x=$_SESSION['id'];

$ti = $_POST['titolo'];
$sti = $_POST['sottot'];
$des = $_POST['descrizione'];
$art = $_POST['articolo'];
$fonte=$_POST['fonte'];

$data_creazione=date("Y/m/d H:i:s");

print"$ti<br>$sti<br>$art,<br>$fonte<br>";


$cerca = array("'",'"');
$sostituisci = array("&#39;","&#34;");

$art= str_replace($cerca, $sostituisci, $art);
$ti= str_replace($cerca, $sostituisci, $ti);
$sti= str_replace($cerca, $sostituisci, $sti);
$fonte= str_replace($cerca, $sostituisci, $fonte);
$des= str_replace($cerca, $sostituisci, $des);


include ("config.php");

//inserisci in articoli
$query = "
INSERT INTO articoli(TITOLO,SOTTOTITOLO,DATA_CREAZIONE,TESTO,FONTE,VISIBILE,REVISIONATO,ID_UTENTE)
VALUES('$ti','$sti','$data_creazione','$art','$fonte','0','0','$x')
";
$ris = mysqli_query($link,$query);
        
if($ris){
    print"la queri dovrebbe andare<br>";
}else{
    print"non funge<br>";
}

//prendi l'ultimo articolo
$query="
SELECT ID_ARTICOLO FROM articoli ORDER BY ID_ARTICOLO DESC LIMIT 1
";
$ris = mysqli_query($link,$query);
$array=mysqli_fetch_array($ris);


$R=$array["ID_ARTICOLO"];


// ----

$file=$_FILES["img"];
$target_dir = "Immagini_articolo";
$f=$file["name"];

//$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

move_uploaded_file($file['tmp_name'], $target_dir.DIRECTORY_SEPARATOR."$R $f");



//inserisci l'immagine

$query = "
INSERT INTO immagini (NOME,DESCRIZIONE,ID_ARTICOLO)
VALUES('$R $f','$des','$R')
";
$ris = mysqli_query($link,$query);


// header( "refresh:2;url=index.html" );
print"Successo<br>";
print"$f<br>";
print"<button type=\"button\" onclick=\"javascript:location.href='admin_articoli.php'\" >Torna all'admin</button>"

?>