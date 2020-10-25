<html>
<head>
    <meta charset="utf-8">  

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<?php	

        include('conexao.php');
	
        
 
	
	if (isset($_POST["update"])) 
	{    
                $id = $_POST["id-update"];
		$nome = $_POST["nome-update"];
		
                $stmt = $conexao->prepare("UPDATE registro set Nome = '$nome' WHERE ID ='$id'");
		$stmt->execute();
                
                if($stmt->execute()){
                
                        echo "<script> alert('Dado Atualizado'); </script>";

                        	
                        echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";
		
                        $id = null;
                        
                }
                else
                {
                       echo "<script> alert('Falha ao atualizar'); </script>";
                }
			
	}
        if(isset($_POST["delete"]))
        {
                
                $id = $_POST["id-delete"];
                
                $stmt = $conexao->prepare("DELETE FROM registro WHERE ID ='$id'");
		$stmt->execute();
                
                if($stmt->execute()){  
                
                        echo "<script> alert('Dado removido'); </script>";
        	
                        echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";
                        
                        $id = null;
                }
                else
                {
                         echo "<script> alert('Falha ao remover'); </script>";
                         echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";
                }
       }
       

?>
</html>
