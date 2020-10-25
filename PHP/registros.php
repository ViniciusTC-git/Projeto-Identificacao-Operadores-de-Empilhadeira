<html>
<head>

    <title>Registros</title>
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
  
      <?php include('html/menu.html');
            include('modal.php'); ?>
     
 <div class="container-fluid">
  <div class="row">
                <div class="container-fluid bg-dark">
                <form action='buscar2.php' METHOD='POST' class="form-inline">
                <button type='button' class='btn btn-success addbtn  my-2 mr-sm-2 text-white'><i  class='fas fa-user-plus' style="font-size: 1.45em;"></i></button>
                    <input class="form-control mr-sm-2"  type='text' id='busca-registro' autocomplete="off"  placeholder="Buscar...">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
                </div>
                     <div class='table-responsive'>
                        <table class='table table-hover table-bordered' id='estado'>  
                        </table>
                     </div> 
           
  </div>
 </div>
 
 <script>

$(document).ready(function(){
            function getData(){
            $.ajax({
                type: 'POST',
                url: 'estado.php',
                cache:false,
                success: function(response){
                    $('#estado').html(response);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
</script>

</body>

</html>
