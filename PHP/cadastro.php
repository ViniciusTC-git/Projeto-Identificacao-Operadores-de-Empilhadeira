<?php
   
      include('conexao.php');

      if(isset($_POST["reset"])){
      
                  $sql = "UPDATE dado SET recebe = NULL WHERE ID = '1' ";                                                                             
                  $stmt = $conexao->prepare($sql);
                  $stmt->execute();
                  echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";  
      }
               
      if(isset($_POST["add"]))
      {
            $sql = "UPDATE dado SET recebe = NULL WHERE ID = '1';";                                                                             
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
                  
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            
            if($id != ""){
                  
                        
                  $sql = "SELECT ID FROM registro WHERE ID = '$id'";
                  $stmt = $conexao->prepare($sql);
                  $stmt->execute();
                        
                        if($stmt->rowCount() > 0)
                        {
                              echo "<script> alert('Erro Usuario ja cadastrado'); </script>";

                        
                              echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";   
                        }
                        else
                        {
                        $data = date('d/m/Y H:i:s');
                  
                        $sql = "INSERT INTO registro(ID,Nome,Data) VALUES('$id','$nome','$data')";
                                                      
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute();
                        
                        if($stmt->rowCount() > 0)
                        {
                              echo "<script> alert('Cadastro concluido'); </script>";
                              echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";    
                        }
                        else
                        {
                        echo "<script> alert('Erro ao cadastrar'); </script>";                        	
                        echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";    
                        }
                        
                        }  
                        

                  }
                  else
                  {
                        echo "<script> alert('Aguardando dado'); </script>";                        	
                        echo "<script> window.location = 'http://localhost/biometria/inicio.php' </script>";   
                  }

            }
            
        


?>