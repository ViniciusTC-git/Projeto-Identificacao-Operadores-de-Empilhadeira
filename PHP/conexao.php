<?php

date_default_timezone_set('America/Sao_Paulo');

        $hostname = "localhost";
        $user = "root";
        $password = "";
        $database = "banco";

        try 
        {
            $conexao = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
         
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Falha na conexao" . $e->getMessage();
        }

?>