-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mag 02, 2022 alle 20:10
-- Versione del server: 8.0.27
-- Versione PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giornale2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

DROP TABLE IF EXISTS `articoli`;
CREATE TABLE IF NOT EXISTS `articoli` (
  `ID_ARTICOLO` int NOT NULL AUTO_INCREMENT,
  `TITOLO` text,
  `SOTTOTITOLO` text,
  `TESTO` text,
  `DATA_CREAZIONE` date DEFAULT NULL,
  `DATA_MODIFICA` date DEFAULT NULL,
  `FONTE` text,
  `VISIBILE` int DEFAULT NULL,
  `REVISIONATO` int DEFAULT NULL,
  `ID_UTENTE` int DEFAULT NULL,
  PRIMARY KEY (`ID_ARTICOLO`),
  KEY `ID_UTENTE` (`ID_UTENTE`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`ID_ARTICOLO`, `TITOLO`, `SOTTOTITOLO`, `TESTO`, `DATA_CREAZIONE`, `DATA_MODIFICA`, `FONTE`, `VISIBILE`, `REVISIONATO`, `ID_UTENTE`) VALUES
(1, '&#34;Non mi dimetto&#34;. Il filorusso Petrocelli s&#39;incolla alla poltrona', 'Il senatore, cacciato da Conte dal M5s per il suo tweet filorusso, non intende lasciare la poltrona di presidente della commissione Esteri di Palazzo Madama', '&#34;La rimozione forzata dalla mia carica sarebbe un segnale tremendo per la democrazia parlamentare di questo paese&#34;. Vito Petrocelli, sentito dall&#39;Agi, commenta così la possibilità di dover lasciare la poltrona di presidente della Commissione Esteri del Senato.\r\n\r\nDomani, infatti, la giunta per il regolamento di Palazzo Madama si dovrebbe riunire domani alle 16 per valutare la richiesta dei senatori di maggioranza della Commissione di estrometterlo dalla presidenza. Petrocelli, ormai noto per le sue posizioni filo-Putin, critica nuovamente &#34;questo governo interventista&#34; e sottolinea come alcuni &#34;sondaggi inequivocabili&#34; dimostrino che &#34;la stragrande maggioranza degli italiani non voglia l&#39;invio delle armi all&#39;Ucraina&#34;. Ma non solo. Gli italiani non vogliono neppure &#34;considerare la Russia come un nemico&#34; e tantomeno desiderano &#34;una guerra apocalittica&#34;. Petrocelli, dunque, ribadisce: &#34;Non mi dimetto perchè sento di rappresentare la nostra Costituzione, la volontà della maggioranza degli italiani che non hanno più partiti che la rappresentino in Parlamento e perchè onorerò fino all&#39;ultimo giorno gli impegni per la pace e il dialogo internazionale&#34;. Impegni che l&#39;ormai ex grillino dice di aver preso con gli elettori sin dal 2018, quando è stato eletto tra le fila del M5S. Petrocelli non solo si incolla alla sedia, ma promette di fare di tutto, in qualità di presidente della Commissione affari esteri, affinché &#34;il governo venga a riferire in Parlamento su quali armi sta inviando in Ucraina e su che tipo di impegno militare ha già intrapreso il nostro paese&#34;.\r\n\r\n<h4>Una soluzione al rebus Petrocelli</h4>\r\nPetrocelli, infine, non si pente assolutamente per il tweet scritto in occasione della festa della Liberazione, parola che lui ha scritto con la Z maiuscola, con un chiaro richiamo alla zeta delle truppe russe che stanno invadendo l&#39;Ucraina. &#34;Ho profondo rispetto del 25 aprile, una data che ha segnato tutta la mia esperienza politica fin da giovane&#34;, chiarisce inizialmente. E, poi, parte con l&#39;affondo: &#34;Vederla trasformata in una operazione di marketing bellico con bandiere Nato e slogan dei neo-nazisti ucraini rappresenta una vergogna incancellabile per chi lo ha permesso&#34;. Petrocelli spiega di voler continuare a festeggiare il 25 aprile&#34;come il giorno della liberazione dal nazi-fascismo, non come il suo sdoganamento&#34;. Il suo tweet era, dunque, solo &#34;una provocazione&#34; che serviva a &#34;sollevare la questione con forza&#34; e a mettere in guardia da chi sta permettendo tale sdoganamento &#34;in Italia e nel resto dell&#39;Europa&#34; con &#34;effetti devastanti che peseranno per molti anni a venire&#34;. Petrocelli critica l&#39;Europa per il suo immobilismo e soprattutto l&#39;Italia per aver preso &#34;le stesse posizioni del governo di estrema destra polacco piuttosto che quelle più moderate di Francia e Germania&#34;. Petrocelli rivendica il suo voto contrario all&#39;invio di armi a Kiev che ci ha reso un Paese &#34;belligerante contro la Russia&#34; e seguire &#34; la strategia folle&#34; di chi vede la Russia come &#34;un bersaglio militare&#34; ci sta portando &#34;alla belligeranza piena&#34;. Secondo l&#39;ex grillino, l&#39;Europa deve sedersi al tavolo delle trattative per &#34;difendere la sovranità e indipendenza dell&#39;Ucraina&#34; e &#34;bloccare l&#39;escalation apocalittica che gli Stati Uniti hanno cercato e imposto&#34;. Petrocelli teme lo scoppio imminente della terza guerra mondiale e, perciò, chiede all&#39;Europa di smettere di armare l&#39;Ucraina, ma spendersi per &#34;fermare questa follia&#34;. Da presidente delle commissione Esteri ha preso contatti con i suoi omolghi rurchi, russi e ucraini per organizzare &#34;un incontro che metta al centro la ripresa delle trattative&#34; e creare &#34;quei ponti di pace che oggi sembrano tabù&#34;. &#34;Paradossalmente, parlare di pace oggi in Italia è diventato eversivo e pericoloso&#34;, chiosa Petrocelli.', '2022-05-02', '2022-05-02', 'Giornale.it', 1, 1, 1),
(2, 'Conte incalza: &#34;Pretendo che Draghi riferisca in Parlamento&#34;', 'Il leader del M5S Giuseppe Conte non indietreggia e pretende che il premier Mario Draghi si faccia portavoce di iniziative volte a evitare l&#39;escalation militare', 'Draghi deve chiarire”. Giuseppe Conte tira dritto e chiede che l&#39;Italia non faccia da “comparsa” nella risoluzione del conflitto tra Russia e Ucraina.\r\n\r\n&#34;Pretendo che il presidente Draghi vada nei consessi internazionali a rivendicare questa posizione”, dice Conte, intervistato a Metropolis, su Repubblica.it, parlando“a nome dei cittadini che rappresento e del M5S&#34;. Il leader dei Cinquestelle non ammette alternative: il premier deve riferire al Parlameno sull&#39;evoluzione della guerra. “Questa è la differenza tra una democrazia e un sistema autarchico”, incalza Conte, sempre più convinto che Mario Draghi debba chiarire quale sia l&#39;indirizzo politico e gli sforzi diplomatici che intende portare avanti. E, forte del fatto che secondo vari sondaggi gli italiani sono contro la guerra, ritiene giusto rappresentare “una sensibilità che riguardi le forze che sono in maggioranza e quella dell&#39;opinione pubblica”.&#34;Come si può pensare a un&#39;escalation militare con un paese che ha seimila testate nucleari?&#34;, si domanda Conte ricordando che il nostro Paese può svolgere un ruolo importante da mediatore e, pertanto, Draghi si deve fare portatore di iniziative volte a “evitare una escalation”. A tal proposito, interpellato sull&#39;intervista che il ministro degli Esteri russo ha rilasciato a Mediaset, sentenzia: &#34;Le parole di Lavrov sono inaccettabili”.\r\n\r\n<h4>Il Pd avvisa Conte: &#34;In politica estera niente balbuzie&#34;</h4>\r\nConte si dice “molto dispiaciuto” dagli attacchi e dalle “frasi ingiuriose” pronunciate da “alcuni settori del Pd”. “Paradossalmente non sono stato insultato dal fronte del centrodestra e sono stato insultato dal Pd&#34;, fa notare l&#39; ex &#39;avvocato del popolo&#39;, ancora desideroso di lavorare con i dem, ma “nel rispetto reciproco”. Conte smentisce di voler spostare il M5S a sinistra del Pd, ma di voler superare il partito di Enrico Letta “in buonsenso”. Un buonsenso “che non è né di destra e né di sinistra&#34;. Per il 2023 Conte si aspetta che il Movimento torni a esprimere “una grande forza propulsiva per il rinnovamento del quadro politico&#34; e imputa alle vicende statutarie la scarsa presenza dei pentastellati sulla scena politica “ma – sottolinea - non ci siamo mai distratti&#34;. Conte, per quanto riguarda il fronte interno, rivela di avere dei rapporti quotidiani sia con Beppe Grillo sia con Luigi Di Maio, mentre nota come le differenze tra lui, Renzi e Calenda abbiano già “ristretto” il cosiddetto “campo largo del centrosinistra”. Il leader del M5S auspica, poi, una riforma della legge elettorale in senso proporzionale, si dice pronto a incatenarsi davanti al Parlamento pur di ottenere il salario minino e, infine, rivolge un appello al centrodestra per portare a casa la riforma dello ius scholae. Infine, arriva la bocciatura della proposta del sindaco Roberto Gualtieri di aprire un inceneritore a Roma.&#34;Il Pd deve capire che noi siamo per la transizione ecologica vera&#34;, dice ponendo un nuovo tema di frattura con i democratici.', '2022-05-02', '2022-05-02', '<a href=&#34;https://www.ilgiornale.it/news/politica/conte-incalza-pretendo-che-draghi-riferisca-parlamento-2030933.html&#34; target=&#34;_blank&#34; > IlGiornale.it </a>', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CATEGORIA` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) DEFAULT NULL,
  `IMPORTANZA` int DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA`),
  UNIQUE KEY `NOME` (`NOME`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIA`, `NOME`, `IMPORTANZA`) VALUES
(1, 'Politica', 10),
(2, 'Sport', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie_articoli`
--

DROP TABLE IF EXISTS `categorie_articoli`;
CREATE TABLE IF NOT EXISTS `categorie_articoli` (
  `ID_ASSOCIAZIONE` int NOT NULL AUTO_INCREMENT,
  `ID_ARTICOLO` int DEFAULT NULL,
  `ID_CATEGORIA` int DEFAULT NULL,
  PRIMARY KEY (`ID_ASSOCIAZIONE`),
  KEY `ID_ARTICOLO` (`ID_ARTICOLO`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `categorie_articoli`
--

INSERT INTO `categorie_articoli` (`ID_ASSOCIAZIONE`, `ID_ARTICOLO`, `ID_CATEGORIA`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

DROP TABLE IF EXISTS `immagini`;
CREATE TABLE IF NOT EXISTS `immagini` (
  `ID_IMMAGINE` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) DEFAULT NULL,
  `DESCRIZIONE` varchar(220) DEFAULT NULL,
  `ID_ARTICOLO` int DEFAULT NULL,
  PRIMARY KEY (`ID_IMMAGINE`),
  UNIQUE KEY `NOME` (`NOME`),
  KEY `ID_ARTICOLO` (`ID_ARTICOLO`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`ID_IMMAGINE`, `NOME`, `DESCRIZIONE`, `ID_ARTICOLO`) VALUES
(1, '1 1650947707-ilgiornale2-20220426063429790.png', 'Descrizilne palalala', 1),
(2, '2 1651228229-ilgiornale2-20220429123003236.png', 'Conte', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE IF NOT EXISTS `utenti` (
  `ID_UTENTE` int NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(64) DEFAULT NULL,
  `PASS` varchar(32) DEFAULT NULL,
  `NOME` varchar(31) DEFAULT NULL,
  `COGNOME` varchar(32) DEFAULT NULL,
  `ALIAS` varchar(32) DEFAULT NULL,
  `GRADO` int DEFAULT NULL,
  PRIMARY KEY (`ID_UTENTE`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `ALIAS` (`ALIAS`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID_UTENTE`, `EMAIL`, `PASS`, `NOME`, `COGNOME`, `ALIAS`, `GRADO`) VALUES
(1, 'admin@admin.admin', '93d9398ce7e599f9088c4d90fbc3560e', 'Andrea', 'Spina', NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
