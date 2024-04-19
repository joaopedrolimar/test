<?php

include_once "conexao.php";

$sql = "SELECT * FROM events ORDER BY id DESC";

$result = $conexao-> query($sql);

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

        .table-bg{
            background:rgb(0, 0, 0,0.3);
            border-radius: 15px 15px 0px 0px;
        }

    </style>

</head>

<body>
    <a href="/test/index.php">voltar pro calendario </a>

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


    <div class="m-5 table-bg ">
            <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">color</th>
                <th scope="col">start</th>
                <th scope="col">end</th>
                <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    
                    echo "<td>".$user_data['title']."</td>";
                    
                    echo "<td>".$user_data['color']."</td>";
                    echo "<td>".$user_data['start']."</td>";
                    echo "<td>".$user_data['end']."</td>";
                    echo 
                    "<td>
                        <a class = 'btn btn-primary' href = 'editMissions.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/>
                        </svg>
                        </a>
                    </td>";
                    echo "<tr>";
                }


            ?>
           
        </tbody>
        </table>
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
