<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Liste des candidats</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/jquery.dataTables.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="fontawesome-free-6.4.0-web/js/solid.js"></script>
    <script defer src="fontawesome-free-6.4.0-web/js/fontawesome.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Gestion des electeurs</h3>
                <strong>GE</strong>
            </div>

            <ul class="list-unstyled components">
            	<li>
            		<a href="Candidat.php" class=" btn btn-info-outline">
                        <i class="fas fa-plus"></i>
                        Nouveau candidat
                    </a>
            	</li>
                <li class="active">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Election
                    </a>
                </li>



                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user"></i>
                        Electeurs
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Bureau de vote</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Election
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Bureau de vote</a>
                        </li>
                        <li>
                            <a href="#">Votes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><h2>Liste de tous les candidats</h2></a>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Vote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bureau de vote</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
		          <div class="row">	
			
                    <div class="col-9">
                    <form method ="POST">
        			<table id="list_candidat" class="display datatable table table-striped table-borderless" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du candidat</th>
                                <th>Parti politique</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                  include("Connexion.php");
                                  $query = "SELECT * FROM candidat";
                                  $result = $pdo->query($query);
                                    if($result == True){
                                          $msg = " ";
                                          }
                                      else{
                                          $msg = "Il y a un probleme avec les informations saisies";
                                        }
                                      echo $msg;
                                  $data = $result->fetchAll();
                                  
                                  for ($i=0;$i<count($data);$i++){
                                    $id=$data[$i]["idcandidat"];
                                    $nomcandidat=$data[$i]['nomcandidat'];
                                    $nomparti=$data[$i]['nomparti'];
                                    echo "<tr><td>C$id</td><td>$nomcandidat</td><td>$nomparti</td>";
                                    echo "<td>";
                                    echo "<a href='ListCandidat.php?idcandidat=$id' class='btn btn-warning'><p class='fas fa-pen'></p></a>";
                                    echo "<a href='SuppressionCandidat.php?idcandidat=$id' onclick='return confirm(\"Etes vous sur de vouloir ....?\");' class='btn btn-danger'><p class='fas fa-trash'></p></a>";
                                    echo "</tr>";
                                  }

                                ?>
                            </tbody>
                    </table>
        		    </form>
                    </div>
                    <?php
                        include("connexion.php");

                        $msg = '';
                        $nomcandidat = "";
                        $nomparti = "";

                        
                        if(isset($_GET['idcandidat'])){
                            $passed_id = $_GET['idcandidat'];
                            $selection = "SELECT * FROM candidat WHERE idcandidat = $passed_id";
                            $result = $pdo->query($selection);
                            $data = $result->fetchAll();
                            $nomcandidat=$data[0]['nomcandidat'];
                            $nomparti=$data[0]['nomparti'];
                            $id=$data[0]['idcandidat'];
                            
                        }

                        if(isset($_POST['modifiercandidat']))
                        {
                            if(isset($_POST['nomcandidat']) && $_POST['nomparti']){
                                $nomcandidat = $_POST['nomcandidat'];
                                $nomparti=$_POST['nomparti'];
                                $modification = '';
                                if($id!=''){
                                    $id = $_POST['idcandidat'];
                                    $modification = "UPDATE candidat SET nomcandidat = '$nomcandidat', nomparti='$nomparti' WHERE idcandidat = $id";
                                }
                                
                                $execute = $pdo->query($modification);

                                if($execute == true){

                                    //$msg = "Modification effectuee";
                                    $nomcandidat="";
                                    $nomparti="";

                                    echo "<script language=\"JavaScript\">
                                             document.location = \"ListCandidat.php\"
                                            </script>
                                            ";
                                }
                                else{
                                    $msg = "Echec de la modification";
                                }

                                    echo $msg;
                            }
                      }
                    ?>

                    <div class="col">
 
                        <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                          <div class="card-header">Modification</div>
                          <div class="card-body">
                            <form method="post" action="#">
                            <div class="container border border-top-dark">
                                <div class="form-row">
                                    <label class="mt-3 mb-3">Nom candidat</label>
                                    <input type="text" class="form-control mb-3" placeholder="Nom du candidat" name="nomcandidat" value="<?php if($nomcandidat) echo $nomcandidat?>" required pattern="[A-Za-z ]{3,30}"/>
                                </div>
                            </div>  

                            <div class="container border border-top-dark mt-5">
                                <div class="form-row">
                                    <label class="mt-3 mb-3">Parti politique</label>
                                    <input type="text" class="form-control mb-3" placeholder="Parti politique" name="nomparti" value="<?php if($nomparti) echo $nomparti; ?>" required />
                                </div>
                            </div>  
                            <div class="form-group mt-3">
                                 <div class="form-check">
                                   <input class="form-check-input" type="checkbox" value="" id="cgu" required>
                                   <label class="form-check-label" for="cgu">J'accepte les modifications apportées</label>
                                   <div class="invalid-feedback">Vous devez accepter les CGU pour continuer</div>
                                 </div>
                             </div>
                            <button class="btn btn-info mt-3 form-control" name="modifiercandidat">Valider</button>
                            <input type="hidden" name="idcandidat" value="<?php if (isset($_GET['idcandidat'])) echo $_GET['idcandidat'];?>">
                
                            </form>
                          </div>
                        </div>
                    </div>     
                </div>    
            </div>
            <!--<div class="line"></div>-->

            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="bootstrap/js/jquery-3.7.0.slim.min.js"></script>
    <script src="bootstrap/js/jquery-3.7.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
    <script src="bootstrap/js/datatables.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            $('#list_candidat').DataTable(); 
        });


    </script>


</body>

</html>