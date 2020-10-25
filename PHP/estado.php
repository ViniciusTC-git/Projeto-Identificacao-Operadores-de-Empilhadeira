

<?php

      include('conexao.php');
   

      $saida = '';


      $sql = "SELECT ID,Nome,IDempilhadeira,Data,Estado,Entrada,Saida FROM registros WHERE STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE() ORDER BY ID";

      $stmt = $conexao->prepare($sql);

      $stmt->execute();

       if ($stmt->rowCount() > 0) 
       {

          $saida =  "
                  <table class='table table-hover table-bordered' id='table-container'>                
                  <thead class='bg-success text-white' ><tr>
                  <th scope='col'>ID</th>
                  <th scope='col'>Nome</th>
                  <th scope='col'>IDEmpilhadeira</th>
                  <th scope='col'>Data</th>
                  <th scope='col'>Estado</th>
        
                  </tr></thead>";
                   
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
           {
               $saida.= "<tbody><tr>
                 <td width='5%' >".$row["ID"]."</td>
                <td >".$row["Nome"]."</td>
                <td width='5%'>".$row["IDempilhadeira"]."</td>
                <td>".$row["Data"]."</td>";

               if($row["Estado"] == 1)
               {
                    $saida.= "<td width='5%'><img src='imagem/iconverde.png'width='50' height='50'></td>";  
               }
               else
               {
                  $saida.= "<td width='5%'><img src='imagem/iconvermelho.png'width='50' height='50'></td>"; 
               }

           }
           $saida.= "</tr></tbody></table>";

           echo $saida;
        }

/*





        $saida = '';
        $sql = "SELECT *FROM registros WHERE STR_TO_DATE(Data,'%d/%m/%Y') = CURDATE()"; 
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                if($row["Estado"] == 1)
                {
                   $saida .= "<img src='imagem/iconverde.png'width='50' height='50'>";
                }
                else
                {
                   $saida .= "<img src='imagem/iconvermelho.png'width='50' height='50'>";
                }
            }
            
 
        }
        echo $saida;
*/
