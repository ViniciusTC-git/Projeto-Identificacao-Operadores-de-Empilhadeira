<?php

     include('conexao.php');   
   
      
      /* $sql = "SELECT ID,Nome,Data FROM teste";
       $stmt = $conexao->prepare($sql);
       $stmt->execute();
       $data = array();
       
       if($stmt->rowCount() >0){
       
            while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            
                $data['ID'] = $row;
                $data['Nome'] = $row;
                $data['Data'] = $row;
                
                
            } 
         }
      

         print json_encode($data);  */ 
 
       $id = $_GET["id"];
     
       if($id != "")
       {
          $sql = "SELECT ID,Nome,Data FROM registro WHERE ID = '$id'";
          $stmt = $conexao->prepare($sql);
          $stmt->execute();
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
         // header('Content-Type: application/json');     
          print json_encode($data);
                  
          
             
       }


?>