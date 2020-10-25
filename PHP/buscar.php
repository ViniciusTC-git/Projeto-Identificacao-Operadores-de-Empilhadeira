
<?php	

       

 
      include('conexao.php');
      
      $saida = '';
        
      if(isset($_POST['busca-inicio']))  
      {
        
          $search=$_POST['busca-inicio'];
          $stmt = $conexao->prepare("SELECT *FROM registro WHERE Nome LIKE CONCAT('%',:search,'%')");
          $stmt->bindParam(":search",$search);
          
      }
      else
      {
         $stmt = $conexao->prepare("SELECT *FROM registro");
                      
      }
        
       $stmt->execute();
        
       if($stmt->rowCount() > 0){
                                     
             $saida="
           
             <table id='table-id'class='table table-hover table-bordered'>
             <thead class='bg-success text-white' ><tr>
             <th scope='col'>ID</th>
             <th scope='col'>Nome</th>

              <th scope='col'>Detalhes/Atualizar/Remover</th>
              </tr></thead><tbody>";
              
                 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                 {
                     $saida .= "<tr>
                     <td width='5%' >".$row['ID']."</td>
                     <td >".$row['Nome']."</td>
                     <td  style='display:none;'>".$row['Data']."</td>                          
                     <td width='5%' ><button type='button'class='btn btn-primary detailbtn text-white'><i class='fas fa-address-card' style='font-size: 1.45em;'></i></button>
                     <button type='button'class='btn btn-warning editbtn text-white'><i class='fas fa-user-edit' style='font-size: 1.45em;'></i></button>
                     <button type='submit' name='delete'class='btn btn-danger deletebtn text-white' class='btn btn-info btn-sm '><i class='fas fa-trash' style='font-size: 1.45em;'></i></button></td>
                     </tr>";
                     include('modal.php');
                     
                     
        
                 }
                 $saida .= "</tbody></table>";
                 echo $saida;
        }
        else
        {
            echo "<h5 class='text-center'>Usuario sem cadastro</h5>";
                      
        }
 

        
        
        
      /*  $saida='';
        	
	if(isset($_POST['query'])) 
	{    
                $search=$_POST['query'];

                $stmt = $conexao->prepare("SELECT *FROM teste WHERE Nome LIKE CONCAT('%',:search,'%')");
                $stmt->bindParam(":search",$search);
                $stmt->execute();
                
                if($stmt->rowCount() > 0){
                             
                     $saida="<div class='table-responsive'> 
                     <div class='col-md-14'>
                     <table id='table-id'class='table'>
                     <thead class='bg-success text-white' ><tr>
                     <th scope='col'>ID</th>
                     <th scope='col'>Nome</th>
                     <th scope='col'>ID Empilhadeira</th>
                     <th scope='col'>Data/Hora</th>
                      <th scope='col'>Detalhes/Atualizar/Remover</th>
                      </tr></thead><tbody>";
                      
                         while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                         {
                             $saida .= "<tr>
                             <td >".$row['ID']."</td>
                             <td >".$row['Nome']."</td>
                             <td >1</td>
                             <td >".$row['Data']."</td>                          
                             <td ><button type='button'class='btn btn-primary detailbtn text-white'>Detalhes</button>
                             <button type='button'class='btn btn-warning editbtn text-white'>Atualizar</button>
                             <button type='submit' name='delete'class='btn btn-danger deletebtn text-white' class='btn btn-info btn-sm '>Remover</button></td>
                             </tr>";
                             include('modal.php');
                             
                             
                
                         }
                         $saida .= "</tbody></table></div></div>";
                         echo $saida;
                }
                else
                {
                     echo "<h5 class='text-center'>Usuario sem cadastro</h5>";  
                }
               
  
			
	}
        else
        {
            $stmt = $conexao->prepare("SELECT *FROM teste");
            $stmt->execute();
        }
        
       */
         

                                
        

        
        
        
?>

        