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
        .enviar{
            height: 45px; 
            padding-left: 5px;
            padding-right: 5px; 	
            margin-bottom: 20px; 
            margin-top: 10px; 	
            text-transform: uppercase;
            background-color: black; 
            border-color: black; 
            border-style: solid; 
            border-radius: 10px;	
            width: 420px;   
            cursor: pointer;
            color: white;
        }


    </style>

</head>

<body>
    <a href="/test/index.php">voltar pro calendario </a>

    

    <h2>Criar Nova Missão</h2>
    
    <div class="box">

    <h2>Criar Nova Missão</h2>

        <form id="form" method="POST">
              
                    <div class="inputWrapp">
                    <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="inputUser" required>
                    </div>
                

                <p>color:</p>
                <select name="color" class="inputUser" id="color">
                    
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


   

    <div class="container ">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div>
                <h1>Tabela missões</h1>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">

            <div class="col-lg-12">

                <span class="listar_missions"></span>
                
            </div>

        </div>

    </div>


    <div class="modal fade" id="visualizarMissions" tabindex="-1" aria-labelledby="visualizarMissions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visualizarMissions">Detalhes da Missão </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">

                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><span id="idId"></span></dd>

                        <dt class="col-sm-3">Missão:</dt>
                        <dd class="col-sm-9"><span id="idTitle"></span></dd>

                        <dt class="col-sm-3">Cor:</dt>
                        <dd class="col-sm-9"><span id="idColor"></span></dd>
                        
                        <dt class="col-sm-3">Início:</dt>
                        <dd class="col-sm-9"><span id="idStart"></span></dd>

                        <dt class="col-sm-3">Término</dt>
                        <dd class="col-sm-9"><span id="idEnd"></span></dd>

                    </dl>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/bootstrap5/index.global.min.js"></script>

    <script>

        //java pra enviar formulario
        const form = document.querySelector('#form');
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const dadosDoForm = new FormData (form);
            
            dadosDoForm.append("add", 1);

            const dados = await fetch("cadastrar_evento.php", {
                method:"POST",
                body: dadosDoForm,
        
        });

        //java pra mostrar a tabela
       const resposta =  await dados.json();
       console.log(resposta);

        });

        const tbody = document.querySelector(".listar_missions");

        const listarMissions = async (pagina) => {
          const dadosMissions =  await fetch ("./tabelaMissions.php?pagina=" + pagina);
          const respostaMissions = await dadosMissions.text();
          tbody.innerHTML = respostaMissions;

        }

        listarMissions(1);

        //javaSc para visualizar pessoa da tabela
        
        const msgAlerta= document.getElementById("msgAlerta")
        async function visualizarUsuario(id){
            
            const dados = await fetch('visualizarMissions.php?id=' + id);
            const resposta = await dados.json();
            console.log(resposta);

            if(resposta['erro']){
                msgAlerta.innerHTML = resposta['msg']
            }else{
                const viswModal = new bootstrap.Modal(document.getElementById("visualizarMissions"));
                viswModal.show();

                
                document.getElementById("idId").innerHTML = resposta['dados'].id
                document.getElementById("idTitle").innerHTML = resposta['dados'].title
                document.getElementById("idColor").innerHTML = resposta['dados'].color
                document.getElementById("idStart").innerHTML = resposta['dados'].start
                document.getElementById("idEnd").innerHTML = resposta['dados'].end
            }
         }
 




        //java pra editar

        async function editUsuarioDados(id){
            const dados = await fetch
        }


    </script>

    
</body>

</html>
