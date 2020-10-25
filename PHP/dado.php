<?php
     include('conexao.php');  
  

      
     if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        $sql = "UPDATE dado SET recebe = '$id' WHERE ID = '1';";
                                                   
        $stmt = $conexao->prepare($sql);
        $stmt->execute();    
        
      } 
      $sql = "SELECT *FROM dado";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();
                                                                 
      if($stmt->rowCount() > 0)
      {
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
          {     
            $dado = $row["recebe"];
            echo  $dado;
            
          }
                      
      } 
      

      if(isset($_POST['id2'])){

        $id2 = $_POST['id2'];

        $sql = "SELECT *FROM registros WHERE ID = '$id2' and STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE() and Estado is not null"; 
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
               if($row["Estado"] == 1){
                $sql = "UPDATE registros set Estado = 0  WHERE ID = '$id2' and STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE()"; 
                $stmt = $conexao->prepare($sql);
                $stmt->execute();
               }
               else
               {
                 $sql = "UPDATE registros set Estado = 1 WHERE ID = '$id2' and STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE()"; 
                 $stmt = $conexao->prepare($sql);
                  $stmt->execute(); 
               }
            }
    



           /* $sql = "SELECT *FROM registros WHERE ID = '$id2' and Entrada is NULL"; 
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCout()){

              $hora = date('H:i:s');
              $sql = "UPDATE registros set Entrada = '$hora' WHERE ID = '$id2' and STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE()"; 
              $stmt = $conexao->prepare($sql);
              $stmt->execute();

            }  
            else
            {
              $hora = date('H:i:s');
              $sql = "UPDATE registros set Saida = '$hora',Estado = 0 WHERE ID = '$id2' and STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE()"; 
              $stmt = $conexao->prepare($sql);
              $stmt->execute();
            }*/

        }
        else
        {

            $sql = "SELECT Nome FROM registro WHERE ID = '$id2'"; 
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
      
        
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
            {
              $nome = $row["Nome"];  
              $data = date('d/m/Y');
    
              $sql = "INSERT INTO registros(ID,Nome,IDempilhadeira,Data,Estado,Entrada,Saida) values('$id2','$nome',1,'$data',1,NULL,NULL)";
              $stmt = $conexao->prepare($sql);
              $stmt->execute();
            }


        }
    }

  


?>