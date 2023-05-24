<?php
	include("Connexion.php");
				
	$nomcandidat = "";
	$nomparti = "";
	if(isset($_POST['inserercandidat']))
	{
			$nomcandidat = $_POST['nomcandidat'];
			$nomparti = $_POST['nomparti'];
			if (!empty($nomcandidat) && preg_match("/[A-Za-z]{3,30}/", $nomcandidat)) 
			{
				$insert = "INSERT INTO candidat (idcandidat, nomcandidat, nomparti) VALUES (NULL,'$nomcandidat','$nomparti')";
				$result = $pdo->query($insert);
				if ($result == True) {
				echo "Ajout du nouveau candidat avec succes";
				}
				header("Location:ListCandidat.php");
				
				
			}
		
	}


?>


<html lang="en">
	<head>
		<title>Candidat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
	</head>

	<body>
	
		<div class="card text-center">
    		<div class="card-header">A propos du candidat</div>
    			<div class="card-body">
        		<h3 class="mt-3 mb-5">Ajout de candidat</h3>
        			<div class="container border border-top-dark-5 mt-5">

					<form method="post" action="#">
						<div class="container border border-top-dark mt-5">
							<div class="form-row">
								<label class="mt-3 mb-3">Nom candidat</label>
								<input type="text" class="form-control mb-3" placeholder="Nom du candidat ..." name="nomcandidat" value="<?php echo $nomcandidat?>" required pattern="[A-Za-z ]{3,30}"/>
							</div>
						</div>	

						<div class="container border border-top-dark mt-5">
							<div class="form-row">
								<label class="mt-3 mb-3">Nom du parti politique</label>
								<input type="text" class="form-control mb-3" placeholder="Nom du parti politique ..." name="nomparti" value="<?php echo $nomparti?>" required />
							</div>
						</div>	
						<div class="form-group mt-3">
		                     <div class="form-check">
		                       <input class="form-check-input" type="checkbox" value="" id="cgu" required>
		                       <label class="form-check-label" for="cgu">Je valide les informations saisies</label>
		                       <div class="invalid-feedback">Vous devez accepter les CGU pour continuer</div>
		                     </div>
		                 </div>
						<button name="inserercandidat" class="btn btn-primary mt-3">Enregistrer</button>
						<a href="ListCandidat.php" class="btn btn-light mt-3">Annuler</a>
					</form>

					</div>
				</div>
    		<div class="card-footer text-muted m-3">Par Felana: 2023</div>
		</div>
		
	</body>

</html>  