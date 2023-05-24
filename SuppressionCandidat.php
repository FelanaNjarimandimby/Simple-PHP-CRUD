<?php 
if (isset($_GET["idcandidat"])) {
	$id = $_GET["idcandidat"];
	echo $id;
	if (!empty($id) && is_numeric($id)) {
		include("connexion.php");
		$suppression = "DELETE FROM candidat WHERE idcandidat = $id";
		$result = $pdo->query($suppression);
		header("Location:ListCandidat.php");
	}
}
?>