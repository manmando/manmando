<?
// commento di test 201611

require_once('check_shell_call.php');
// commento di test 20161020
$sub_menu[0] = array (
// commento di test ancora
	'area' => -1,
	'testo' =>  _('Pagina di default'),
	'classe' => '',
	'classe_inattiva' => '',
	'link' => '',
	'include_page' => 'stats.php',
	'testo_banner' =>  _('Statistiche generali'),
	'attivo' => 1,
	'req_priv' => 9
);
if ($_SESSION['utente']['sicurezza'] == 2)
	$sub_menu[0]['testo_banner'] =  _('Benvenuto nell\'Area Operativa');


//---------------------------------### AREA CRM ###-----------------------------//

$sub_menu[26] = array (
	'area' => 1,
	'testo' =>  _('Preferiti'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&preferiti_c=1',
	'include_page' => 'elenco.php',
	'testo_banner' => _('Contatti classificati tra i "preferiti" dell\'operatore ').$_SESSION['utente']['iduser'],
	'attivo' => 1,	
	'req_priv' => PVL_ANAGRAFRICA
);

$sub_menu[1] = array (
	'area' => 1,
	'testo' =>  _('I miei contatti'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&ope_c=1&ope_s='.$_SESSION['utente']['iduser'],
	'include_page' => 'elenco.php',
	'testo_banner' => _('Contatti associati all\'operatore ').$_SESSION['utente']['iduser'],
	'attivo' => 1,	
	'req_priv' => PVL_ANAGRAFRICA
);

$sub_menu[2] = array (
	'area' => 1,
	'testo' =>  _('Tutti i contatti'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'',
	'include_page' => 'elenco.php',
	'testo_banner' => _('Elenco contatti visibili dall\'operatore ').$_SESSION['utente']['iduser'],
	'attivo' => 1,	
	'req_priv' => PVL_ANAGRAFRICA | PVL_TUTTI_CLIENTI
);

    //pesco le ricerche salvate per costruire il menu a SX
    //workaround per evitare collisioni con altri id
    require_once 'functions/contacts/search.php';
    $ricerche = getRicercheSalvate($_SESSION['utente']['id_ope']);
    foreach ($ricerche as $id => $ricerca){
        $i = 100+$id;
        $sub_menu[$i] = array(
            'area' => 1,
            'testo' => $ricerca['name'],
            'classe' => 'sottomenu',
            'classe_inattiva' => 'sottomenu_inattivo',
            'link' => $questo_doc.'&amp;query='.$id,
            'include_page' => 'elenco.php',
            'testo_banner' => 'Ricerca salvata:'.$ricerca['name'],
            'attivo' => 1,
            'req_priv' => PVL_ANAGRAFRICA
        );
        $i++;
    }



	


$sub_menu[4] = array (
	'area' => 1,
	'testo' =>  _('Ricerca contatti'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&cerca=1',
	'include_page' => 'nuova_ricerca.php',
	'testo_banner' => _('Ricerca tra tutte le anagrafiche visibili da ').$_SESSION['utente']['iduser'],
	'attivo' => 1,
	'req_priv' => PVL_ANAGRAFRICA
);

if (!is_null($_SESSION['last_query_data']['fields'])){
    $sub_menu[6] = array ( 
            'area' => 1,
            'testo' =>  _('Ultima ricerca'),
            'classe' => 'sottomenu',
            'classe_inattiva' => 'sottomenu_inattivo',	
            'link' => $questo_doc.'&newquery=1',
            'include_page' => 'elenco.php',
            'testo_banner' => _('Riutilizza l\'ultima ricerca salvata'),
            'attivo' => 1,
            'req_priv' => PVL_ANAGRAFRICA
    );
}

$sub_menu[3] = array (
	'area' => 1,
	'testo' =>  _('Nuovo contatto'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&nuovo=1',
	'include_page' => 'scheda.php',
	'testo_banner' => _('Inserisci l\'anagrafica di un nuovo contatto'),
	'attivo' => 1,
	'req_priv' => PVL_ANAGRAFRICA
);

$sub_menu[29] = array (
	'area' => 1,
	'testo' =>  _('Elenchi'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc,
	'include_page' => 'elenchi.php',
	'testo_banner' => _('Contatti scaricati o stampati dagli operatori '),
	'attivo' => 1,
	'req_priv' => PVL_ANAGRAFRICA
);

$sub_menu[30] = array (
	'area' => 1,
	'testo' =>  _('Bozze'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc,
	'include_page' => 'bozze.php',
	'testo_banner' => _('Bozze delle mail non inviate'),
	'attivo' => 1,
	'req_priv' => PVL_ANAGRAFRICA
);

//---------------------------------### AREA COMUNICAZIONI ###-----------------------------//
$sub_menu[8] = array (
	'area' => 2,
	'testo' =>  _('Nuova'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&new=1',
	'include_page' => './nuova_comunicazione.php',
	'testo_banner' => _('Nuova comunicazione mirata'),
	'attivo' => 1,
	'req_priv' => PVL_COMUNICAZIONI
);

$sub_menu[7] = array (
	'area' => 2,
	'testo' =>  _('Archivio'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'',
	'include_page' => './promozioni/archivio.php',
	'testo_banner' => _('Storico comunicazioni mirate'),
	'attivo' => 1,
	'req_priv' => PVL_COMUNICAZIONI
);

$sub_menu[9] = array (
	'area' => 6,
	'testo' =>  _('Ricorrenze'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&eve=1',
	'include_page' => './promozioni/gestione_eventi.php',
	'testo_banner' =>  _('Gestione Ricorrenze'),
	'attivo' => 1,
	'req_priv' => PVL_COMUNICAZIONI
);

/*	opzione attiva solo per Aslico
if ($_GASTONE['host'] == 'a2152') {*/
if ($_GASTONE['host'] == 'a1978') {
	$sub_menu[31] = array(
		'area' => 6,
		'testo' => _('Spettacoli'),
		'classe' => 'sottomenu',
		'classe_inattiva' => 'sottomenu_inattivo',
		'link' => $questo_doc . '&eve=2',
		'include_page' => '../custom_app/a2152/gestione_spettacoli_teatrali.php',
		'testo_banner' => _('Gestione Spettacoli Teatrali'),
		'attivo' => 1,
		'req_priv' => PVL_COMUNICAZIONI
	);
}

//---------------------------------### AREA NEWS ###-----------------------------//
$sub_menu[10] = array (
	'area' => 4,
	'testo' =>  _('Archivio'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $uri.'&page=articolo',
	'include_page' => 'newsletter/admin.php',
	'testo_banner' => _('Storico e gestione Newsletter'),
	'attivo' => 1,
	'req_priv' => PVL_NEWSLETTER
);

$sub_menu[11] = array (
	'area' => 4,
	'testo' => _('Nuova'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $uri.'&page=make_nl',
	'include_page' => 'newsletter/admin.php',
	'testo_banner' => _('Nuova Newsletter'),
	'attivo' => 1,
	'req_priv' => PVL_NEWSLETTER
);

$sub_menu[12] = array (
	'area' => 4,
	'testo' =>  _('Configura'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&page=man_priv',
	'include_page' => 'newsletter/admin.php',
	'testo_banner' => _('Configurazione generale Newsletter'),
	'attivo' => 1,
	'req_priv' => PVL_NEWSLETTER
);

//                                  #########################SONDAGGI####################

$sub_menu[13] = array (
	'area' => 5,
	'testo' =>  _('Archivio'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'',
	'include_page' => 'sondaggi/archivio.php',
	'testo_banner' => _('Storico e gestione sondaggi'),
	'attivo' => 1,
	'req_priv' => PVL_SONDAGGI
);

$sub_menu[14] = array (
	'area' => 5,
	'testo' =>  _('Nuovo'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&cestino=1',
	'include_page' => 'sondaggi/crea.php',
	'testo_banner' =>  _('Crea un nuovo sondaggio'),
	'attivo' => 1,
	'req_priv' => PVL_SONDAGGI
);


//---------------------------------### AREA AMMINISTRAZIONE ###-----------------------------//

    $sub_menu[15] = array (
            'area' => 8,
            'testo' =>  _('Elenco operatori'),
            'classe' => 'sottomenu',
            'classe_inattiva' => 'sottomenu_inattivo',
            'link' => $questo_doc.'&admin=1',
            'include_page' => './scheda_ope/main.php',
            'testo_banner' => _('Gestione Operatori del CRM'),
            'attivo' => 1,
            'req_priv' => PVL_AMMINISTRAZIONE
    );
    $sub_menu[16] = array (
            'area' => 8,
            'testo' =>  _('Nuovo operatore'),
            'classe' => 'sottomenu',
            'classe_inattiva' => 'sottomenu_inattivo',
            'link' => $questo_doc.'&admin=1&user=-1',
            'include_page' => './scheda_ope/main.php',
            'testo_banner' =>  _('Nuovo Operatore Gastone CRM'),
            'attivo' => 1,
            'req_priv' => PVL_AMMINISTRAZIONE
    );

//---------------------------------### AREA ANALYZER ###-----------------------------//

$sub_menu[17] = array (
	'area' => 9,
	'testo' =>  _('Generale'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'',
	'include_page' => './analyzer/cruscotto_generale.php',
	'testo_banner' =>  _('In colore rosso lo stato delle attivit&agrave; del ').date($data2),
	'attivo' => 1,
	'req_priv' => PVL_ANALYZER
);

//---------------------------------### AREA CESTINO ###-----------------------------//
//Cestino Clienti
$sub_menu[18] = array (
	'area' => 10,
	'testo' => $cest_clienti. _(' Anagrafiche'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&cestino=1',
	'include_page' => 'elenco.php',
	'testo_banner' =>  _('Schede anagrafiche cestinate'),
	'attivo' => 1,
	'req_priv' => PVL_ANAGRAFRICA
);

//Cestino Newsletter sub_menu[21]
$sub_menu[19] = array (
	'area' => 10,
	'testo' => $cest_articoli. _(' Articoli NL'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&nl=1&page=cestino',
	'include_page' => 'newsletter/admin.php',
	'testo_banner' =>  _('Articoli delle Newsletter cestinati'),
	'attivo' => 1,
	'req_priv' => PVL_NEWSLETTER
);

//Cestino Operatori
$sub_menu[20] = array (
	'area' => 10,
	'testo' => $cest_ope. _(' Operatori'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&cestino=1',
	'include_page' => './scheda_ope/main.php',
	'testo_banner' =>  _('Schede Operatori Cestinate'),
	'attivo' => 1,
	'req_priv' => PVL_AMMINISTRAZIONE
);


//---------------------------------### AREA OGGI ###-----------------------------//

$sub_menu[21] = array (
	'area' => 0,
	'testo' =>  _('Note relazionali'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&o=1',
	'include_page' => './oggi.php',
	'testo_banner' => _('Contatti con attivit&agrave; aperte ad oggi'),
	'attivo' => 1,
	'req_priv' => PVL_OUTLOOK
);

$sub_menu[22] = array (
	'area' => 0,
	'testo' =>  _('Fili diretti'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&o=2',
	'include_page' => './oggi.php',
	'testo_banner' => _('Contatti con fili diretti aperti ad oggi'),
	'attivo' => 1,
	'req_priv' => 0
);

$sub_menu[23] = array (
	'area' => 0,
	'testo' =>  _('Messaggi programmati'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&o=3',
	'include_page' => './oggi.php',
	'testo_banner' => _('Contatti con messaggi programmati per oggi'),
	'attivo' => 1,
	'req_priv' => 0
);

$sub_menu[24] = array (
	'area' => 0,
	'testo' =>  _('Raccomandate A/R Consegnate'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&o=4',
	'include_page' => './oggi.php',
	'testo_banner' => _('Ricevute di ritorno di raccomandate pervenute oggi'),
	'attivo' => 1,
	'req_priv' => 0
);

$sub_menu[28] = array (
	'area' => 0,
	'testo' =>  _('Compleanni'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&o=5',
	'include_page' => './oggi.php',
	'testo_banner' => _('Contatti che festeggiano il compleanno oggi'),
	'attivo' => 1,
	'req_priv' => 0
);

//---------------------------------### AREA STORAGE ###-----------------------------//
$sub_menu[25] = array (
	'area' => 7,
	'testo' =>  _('Dettagli disco'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'',
	'include_page' => './disco.php',
	'testo_banner' => _('Dettaglio disco virtuale'),
	'attivo' => 1,
	'req_priv' => 0
);

$sub_menu[27] = array (
	'area' => 3,
	'testo' =>  _('Elenco mail'),
	'classe' => 'sottomenu',
	'classe_inattiva' => 'sottomenu_inattivo',
	'link' => $questo_doc.'&what=inbox',
	'include_page' => './webmail/webmail.php',
	'testo_banner' => _('Gestione Email in ingresso'),
	'attivo' => 1,
	'req_priv' => 0
);
?>
