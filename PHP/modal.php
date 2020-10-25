
        
  <div class="container">
    <div class="modal fade" id="addmodal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">

                    <form action="http://localhost/biometria/cadastro.php" method="POST">

                        <div class="form-group">
                            <label class="col-form-label">Nome:</label>
                            <input type="text"   autocomplete="off" name="nome" id="nome"  class="form-control">
                            
                            <label class="col-form-label">ID:</label>        
                             <input type="text" name="id" id="id" autocomplete="off" placeholder="Aguardando o ID..." class="form-control"/>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" name="add" class="btn btn-success text-white" class="btn btn-primary">Salvar</button>
                            
                            <button type="submit" name="reset" class="btn  btn-warning text-white" class="btn btn-primary">Reset</button>

                            <button type="button" class="btn btn-danger text-white" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>   

<div class="container">
    <div class="modal fade" id="detailmodal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalhes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">

                        <label for="nome-detail">ID:</label>
                        <output name="id-detail" id="id-detail" class="form-control"></output>    
                        <label for="nome-detail">Nome:</label>
                        <output name="nome-detail" id="nome-detail" class="form-control"></output>
                        <label for="nome-detail">Data/Hora do Cadastro:</label>
                        <output name="data-detail" id="data-detail" class="form-control" ></output>
                        
                         
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger text-white" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                     </div>
                 
                </div>

            </div>

        </div>
    </div>

</div>



<div class="container">
    <div class="modal fade" id="editmodal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atualizar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">

                    <form action="http://localhost/biometria/atualizar.php" method="POST">

                        <input type="hidden" name="id-update" id="id-update">
                        <div class="form-group">

                            <label class="col-form-label">Nome:</label>
                            <input type="text" name="nome-update" id="nome-update" autocomplete="off" class="form-control">
                        </div>

                        <div class="modal-footer">

                            <button type="submit" name="update" class="btn btn-success text-white" class="btn btn-primary">Salvar</button>

                            <button type="button" class="btn btn-danger text-white" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
<div class="container">
    <div class="modal fade" id="deletemodal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remover</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>
                <div class="modal-body">

                    <form action="http://localhost/biometria/atualizar.php" method="POST">

                        <input type="hidden" name="id-delete" id="id-delete">
                        <div class="form-group">

                            <label class="col-form-label">Deseja realmente remover esse Usuario?</label>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" name="delete" class="btn btn-success text-white" class="btn btn-primary">Sim</button>

                            <button type="button" class="btn btn-danger text-white" class="btn btn-secondary" data-dismiss="modal">Não</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

<script>

        $(document).ready(function(){
                    function getData(){
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/biometria/dado.php',
                        cache:false,
                        success: function(html){
                            $('#id').val(html);
                        }
                    });
                }
                getData();
                setInterval(function () {
                    getData(); 
                }, 1000);  // it will refresh your data every 1 sec
        
            });
 </script>



<script >
    $(document).ready(function() {

        $('.addbtn').on('click', function() {

            $('#addmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {

                return $(this).text();

            }).get();

            console.log(data);

            $('#id-add').val(data[0]);
            $('#nome-add').val(data[1]);

        });

    });
</script>

<script >
    $(document).ready(function() {

        $('.detailbtn').on('click', function() {

            $('#detailmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {

                return $(this).text();

            }).get();

            console.log(data);

            $('#id-detail').val(data[0]);
            $('#nome-detail').val(data[1]);
            $('#data-detail').val(data[2]);

        });

    });
</script>


<script>
    $(document).ready(function() {

        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {

                return $(this).text();

            }).get();

            console.log(data);

            $('#id-update').val(data[0]);
            $('#nome-update').val(data[1]);

        });

    });
</script>
<script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {

                return $(this).text();

            }).get();

            console.log(data);

            $('#id-delete').val(data[0]);

        });

    });
</script>
  