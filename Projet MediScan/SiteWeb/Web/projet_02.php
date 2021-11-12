<!DOCTYPE html>
<html>
<head>
<meta charest='utf-8'/>
<link rel="stylesheet"  href="projet_02.css" >

</head>

<body>

<header id="titre_header">

    <h1> Carnet de Santé </h1>

</header>


</header>

<nav id="ma_nav">
    <ul>
	<li id="nav_societe">Notre société</li>
      <li id="nav_générateur"><a href="phpqrcode\index.php">Générateur</a> </li>
      <li id="nav_carnet">Fiche médicale</li>
      <li id="nav_inscription">Inscription</li>
      <li id="nav_connexion">Connexion</li>
    </ul>
</nav>

<aside>

</aside>

<section>
	<div id="societe">
    <h1 id="titre_societe">Qui sommes-nous?</h1>
		<div>
   		<h1><p> 
		   MediScan est une société dans le domaine de la santé. Notre site web héberge gratuitement les données confidentiels de vos patients dans des fiches médicales numériques, accessible par vous et les professionnels de la santé de manière sécurisé. 
		  <br>Modifiable, il vous permet  de mettre à jour les informations de vos patients à chaque consultation.  </br>
  		</p></h1>

		</div>
	</div>

	<div id="générateur">
    <h1> </h1>
    <?php


    echo "<h1>Generateur De QR Code Pour Fiche médicale</h1><hr/>";

    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) {

        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');

        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    } else {

        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    }

    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';

    //config form
    echo '<form action="index.php" method="post">
        Lien de votre carnet de santé:&nbsp;<input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'" />&nbsp;

        Taille de votree QR code:&nbsp;<select name="size">';

    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';

    echo '</select>&nbsp;
        <input type="submit" value="GENERATE"></form><hr/>';

    // benchmark

?>
	</div>

  <div id="carnet_de_santé">
    <h1>Consultez votre carnet de santé</h1>
  </div>

 
 <div id="inscription">
 <br><h1 id="titre_formulaire">Formulaire d'inscription</h1>

 <br><h2>Inscrivez-vous</h2>

 <form action="BDD.php" method="POST" id="form">
	 <div>
		 <br><label for="nom_famille">Nom :</label>
		 <br>
		 <input type="text" name="nom_utilisateur" id="nom_famille" required="required"/>
	 </div>
	 <div>
		 <br><label for="prenom">Prénom :</label>
		 <br>
		 <input type="text" name="prenom_utilisateur" id="prenom" required="required"/>
	 </div>
	 <div>
		 <br><label for="adresse_mail">Adresse Mail :</label>
		 <br>
		 <input type="email" name="adresse_mail" id="adresse_mail" required="required"/>
	 </div>
	 <div>
		 <br><label for="birthday">Date de Naissance :</label>
		 <br>
		 <input type="date" name="date_naissance" id="birthday" required="required"/>
	 </div>
	 <div>
		 <br>
		 <label for="specialisation">Spécialisation :</label>
		 <br><select name="spécialisation">
			 <option>Choisir</option>
			 <option>allergologie</option>
			  <option>L’anesthésiologie </option> 
			 <option>L’andrologie</option>
			 <option>cardiologie</option>
			 <option>chirurgie cardiaque</option>
			 <option>chirurgie esthétique, plastique et reconstructive</option>
			 <option>chirurgie générale</option>
			 <option>chirurgie maxillo-faciale</option>
			 <option>chirurgie pédiatrique</option>
			 <option>chirurgie thoracique</option>
			 <option>chirurgie vasculaire</option>
			 <option>neurochirurgie</option>
			 <option>dermatologie</option>
			 <option>endocrinologie</option>
			 <option>gastro-entérologie</option>
			 <option>gériatrie</option>
			 <option>gynécologie</option>
			 <option>hématologie</option>
			 <option>hépatologie</option>
			 <option>immunologie</option>
			 <option>infectiologie</option>
			 <option>médecine aiguë</option>
			 <option>médecine du travail</option>
			 <option>médecine générale</option>
			 <option>médecine interne</option>
			 <option>médecine nucléaire</option>
			 <option>médecine palliative</option>
			 <option>médecine physique</option>
			 <option>médecine préventive</option>
			 <option>néonatologie</option>
			 <option>néphrologie</option>
			 <option>odontologie</option>
			 <option>oncologie</option>
			 <option>obstétrique</option>
			 <option>ophtalmologie</option>
			 <option>ophtalmologie</option>
			 <option>orthopédie</option>
			 <option>Oto-rhino-laryngologie</option>
			 <option>pédiatrie</option>
			 <option>pneumologie</option>
			 <option>psychiatrie</option>
			  <option>radiologie</option>
			 <option>radiothérapie</option>
			 <option>rhumatologie</option>
			 <option>urologie</option>
		 </select> 
		 
	  </div>
	 <div>
		 <br><label for="pseudo_inscription">Pseudo :</label>
		 <br>
		 <input type="text" name="login_utilisateur" id="pseudo_inscription" required="required"/>
	 </div>
	 <div>
		 <br><label for="mdp1">Mot de passe :</label>
		 <br>
		 <input type="password" id="mdp1" name="mdp_utilisateur" required/>
	 </div>
	 <div>
		 <br><label for="mdp_2">Ressaisir le mot de passe :</label>
		 <br>
		 <input type="password" name="mot_de_passe" id="mdp_2" required="required"/>
	 </div>
	 <div>
		 <br><br>
		 <input type="submit" name="inscription" value="M'inscrire" id="boutoninscrire" required="required"/>
	 </div>
 </form>

</div>


<div id="connexion">
   <br><h1 id="titre_formulaire">Formulaire de connexion</h1>

   <br><h2>Identifiez-vous !</h2>

   <form action="login.php" method="POST">
	   <div>
		   <br><label for="name">Pseudo :</label>
		   <br>
		   <input type="text" id="name" name="pseudo_utilisateur"/>
	   </div>
	   <div>
		   <br><label for="MDP">Mot de passe :</label>
		   <br>
		   <input type="password" name="mot_de_passe" id="MDP"/>
	   </div>
	   <div>
		   <br><br><input type="submit" name="connexion" value="valider" id="boutonvalider"/>
	   </div>
   </form>
</div>
</section>

<footer>
</footer>

<script src="projet_02.js"></script>

</body>

</html>