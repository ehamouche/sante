<?php
/****** Connexion au serveur de BdD *******/
function ConnectDB() {
	$id = new PDO('mysql:host=localhost;dbname=MW08_KWN;charset=utf8', 'akouwounou', 'kouwounou');
	return $id;
}
//***Exécuter la requete préparée***/
function executerRequete($id,$req,$tableauDeDonnees){
	$res=preparerRequete($id,$req);
	$res=executerRequetePrepare($res,$tableauDeDonnees);
	return extraireDonneesRequetePrepare($res);

}
//***Preparer une requête à être envoyer***/
function preparerRequete($id,$req){
	$res=$id->prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	return $res;
}
//***Exécute la requête préparée***/
function executerRequetePrepare($res,$tableauDeDonnees){
	$res->execute($tableauDeDonnees);
  return $res;
}
//***Recuperer la reponse sous forme d'un tableau associatif***/
function extraireDonneesRequetePrepare($res){
	  return $res->fetchAll(PDO::FETCH_ASSOC);
}
//***Recuperer le dernier ID (clé primaire) inséré dans une table dans le BDD***/
function recupererLeDernierIdInserer($id){
	  return $id->lastInsertId();
}
//***Liberer la mémoire***/
function fermerCursor($res){
	$res->closeCursor();
}
//***Exécuter une requete http via un code php***/
function executerRequeteCurl($donnees,$method){
  $url='http://172.20.15.209/MW08_KWN/rest.php/';
  $url.=$donnees;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL,$url );
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

  $tabListMission=curl_exec($curl);curl_error($curl);
	curl_close($curl);
  $ListMissionJSON=json_decode($tabListMission,true);

  return $ListMissionJSON;
}


?>
