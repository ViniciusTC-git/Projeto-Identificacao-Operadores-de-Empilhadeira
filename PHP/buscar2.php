<html>

<head>

    <title>Cadastros</title>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
</head>

<script>

</script>
<body>
  
      <?php include('html/menu.html'); ?>


 <div class="container-fluid">
  <div class="row">
             <div class="container-fluid bg-dark">
                <form action='buscar2.php' METHOD='POST' class="form-inline">
                <button type='button' class='btn btn-success addbtn  my-2 mr-sm-2 text-white'><i  class='fas fa-user-plus' style="font-size: 1.45em;"></i></button>
                    <input class="form-control mr-sm-2"  type='text' name ='busca'  autocomplete="off"  placeholder="Buscar...">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
                </div>
            <?php	
                include('conexao.php');
                
                    
                if(isset($_POST['busca-cadastro']))  
                {
                    
                    $busca=$_POST['busca-cadastro'];
                    $stmt = $conexao->prepare("SELECT *FROM registro WHERE Nome = '$busca'");
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) 
                    {

                        echo "<div class='table-responsive'>  
                                <table class='table table-hover table-bordered ' id='table-container' >                                 
                                <thead class='bg-success text-white' ><tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Nome</th>
                                <th scope='col'>Detalhes/Atualizar/Remover</th>
                                </tr></thead>";
                                
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                        {
                            echo "<tbody><tr>";
                            echo "<td width ='5%'>".$row["ID"]."</td>";
                            echo "<td >".$row["Nome"]."</td>";
                            echo "<td style='display:none;' >".$row["Data"]."</td>";
                            echo "<td width='5%' ><button type='button'class='btn btn-primary detailbtn text-white'><i class='fas fa-address-card' style='font-size: 1.45em;'></i></button>";
                            echo " <button type='button'class='btn btn-warning editbtn text-white'><i class='fas fa-user-edit' style='font-size: 1.45em;'></i></button>";
                            echo " <button type='submit' name='delete'class='btn btn-danger deletebtn text-white' class='btn btn-info btn-sm '><i class='fas fa-trash' style='font-size: 1.45em;'></i></button></td>";
                            include('modal.php');

                        }
                        echo "</tr></tbody></table></div>";

                    } 
                    else
                    {
                            echo "<h5 class='text-center'>Usuario sem cadastro</h5>";
                                    
                    }
                }

                if(isset($_POST['busca-registro']))  
                {
                    
                    $busca=$_POST['busca-registro'];
                    $stmt = $conexao->prepare("SELECT *FROM registros WHERE Nome = '$busca'");
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) 
                    {

                        echo "<div class='table-responsive'>  
                                <table class='table table-hover table-bordered ' id='table-container' >                                 
                                <thead class='bg-success text-white' ><tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Nome</th>
                                <th scope='col'>IDEmpilhadeira</th>
                                <th scope='col'>Data</th>
                                <th scope='col'>Estado</th>
                                </tr></thead>";

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                {
                                    echo  "<tbody><tr>
                                      <td width='5%' >".$row["ID"]."</td>
                                     <td >".$row["Nome"]."</td>
                                     <td width='5%'>".$row["IDempilhadeira"]."</td>
                                     <td>".$row["Data"]."</td>";
                     
                                    if($row["Estado"] == 1)
                                    {
                                         echo "<td width='5%'><img src='imagem/iconverde.png'width='50' height='50'></td>";  
                                    }
                                    else
                                    {
                                       echo "<td width='5%'><img src='imagem/iconvermelho.png'width='50' height='50'></td>"; 
                                    }
                     
                                }
                                echo "</tr></tbody></table>";

                    } 
                    else
                    {
                            echo "<h5 class='text-center'>Usuario sem registro</h5>";
                                    
                    }
                    
                }


                $conexao=NULL;
        
        ?>

        </div>
        </div>
        
</body>


</html>