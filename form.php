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

</head>

<body>
    <a href="/test/index.php">voltar pro calendario </a>

    <h2>Criar Nova Missão</h2>
    
    <div class="box">

        <form id="form" method="POST">
              
                    <div class="inputWrapp">
                        <input type="text" name="title" id="title" class="inputUser" required>
                        <label for="title">Title</label>
                    </div>
                

                <p>color:</p>
                <select name="color" class="form-control" id="color">
                        <option value="">Selecionar</option>
                        <option style="color:#1F438C;" value="#1F438C">azul</option>
                </select>
                
                    <div class="inputWrapp">
                        <label for="start"  >Start</label>
                        <input type="date" name="start" id="start" class="inputUser" required>
                    </div>
                

                    <div class="inputWrapp">
                        <label for="end">End</label>
                        <input type="date" name="end" id="end" class="inputUser" required>
                    </div>

                <button type="submit">enviar</button>
        </form>
    </div>


    <div class="lista">
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
                    echo "<td>".$user_data['id'];
                    
                    echo "<td>".$user_data['title'];
                    
                    echo "<td>".$user_data['color'];
                    echo "<td>".$user_data['start'];
                    echo "<td>".$user_data['end'];
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
