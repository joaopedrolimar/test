<?php

if(isset($_POST['submit'])){

include_once "conexao.php";

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM events WHERE id=$id";

$result = $conexao->query($sqlSelect);

if($result->num_rows > 0){


    while($user_data = mysqli_fetch_assoc($result)){

        $title = $user_data['title'];
        $color =  $user_data['color'];
        $start =  $user_data['start'];
        $end =  $user_data['end'];

        print_r($title);
    }

    }else{
       echo 'erro';
    }

}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecionar com PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>

        .box{
            margin: 50px 0px 50px 0px;
            width: 460px; 
            height: auto;
            margin: 80px auto;
            border-radius: 10px;  
            padding-top: 30px;
            padding-bottom: 20px;  
            background-color: green; 
            padding-left: 30px;
        }

        .inputUser{
            background-color: #fbfbfb; 
            width: 408px; 
            height: 40px; 
            border-radius: 5px;  
            border-style: solid; 
            border-width: 1px; 
            border-color: #ab4493; 
            margin-top: 10px;  
            padding-left: 10px;
            margin-bottom: 20px; 
        }
        button{
            height: 45px; 
            padding-left: 5px;
            padding-right: 5px; 	
            margin-bottom: 20px; 
            margin-top: 10px; 	
            text-transform: uppercase;
            background-color: #ab4493; 
            border-color: #ab4493; 
            border-style: solid; 
            border-radius: 10px;	
            width: 420px;   
            cursor: pointer;
        }


    </style>

</head>

<body>
    <a href="/test/form.php">volta </a>

    <h2>Criar Nova Missão</h2>
    
    <div class="box">

        <form id="form" method="POST">
              
                    <div class="inputWrapp">
                    <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="inputUser" required>
                    </div>
                

                <p>color:</p>
                <select name="color" class="inputUser" id="color">
                        <option value="">Selecionar</option>
                        <option value="#1F438C">azul</option>
                </select>
                
                    <div class="inputWrapp">
                        <label for="start"  >Start</label>
                        <input type="date" name="start" id="start" class="inputUser" required>
                    </div>
                
                    

                    <div class="inputWrapp">
                        <label for="end">End</label>
                        <input type="date" name="end" id="end" class="inputUser" required>
                    </div>

                <button type="submit"  class="enviar">enviar</button>
        </form>
    </div>




    <script>
        const form = document.querySelector('#form');
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const dadosDoForm = new FormData (form);
            
            dadosDoForm.append("add", 1);

            const dados = await fetch("cadastrar_evento.php", {
                method:"POST",
                body: dadosDoForm,
        
        });

       const resposta =  await dados.json();
       console.log(resposta);

        });
    </script>

    
</body>

</html>
