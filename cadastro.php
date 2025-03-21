<?php
  //ENVIA PRA VARIAVEIS OS DADOS OBTIDOS NO POST 
  $pg = @$_REQUEST['pg'];
  $user = @$_REQUEST['user'];
  $pass = @$_REQUEST['pass'];
  $adm = @$_REQUEST['adm'];
  $submit = @$_REQUEST['submit'];
  $solicita = 'desativada';

  $conn = new PDO ("mysql:dbname=dbmat;host=localhost", "root", "@160l0nc3t");

  if($submit){

    if($user == "" || $pass == ""){
      echo "<script:alert('Por favor, preencha todos os campos!');</script>";
    }
    else{
      $stmt = $conn->prepare("INSERT INTO usuario (pg, usuario, senha, adm, status) VALUES (:PG, :LOGIN, :PASSWORD, :ADM, :SOLICITA )");

      $stmt -> bindParam(":PG", $pg);
      $stmt -> bindParam(":LOGIN", $user);
      $stmt -> bindParam(":PASSWORD", $pass);
      $stmt -> bindParam(":ADM", $adm);
      $stmt -> bindParam(":SOLICITA", $solicita); 

      $stmt->execute();

      header('Location:/index.php');
    }
  }
?>
    
<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
      <title>Cadastro</title>

      <style>
        footer {
            background-color: #111827; /* Fundo escuro para o rodapé */
            color: #fff; /* Cor do texto no rodapé */
            padding: 20px;
            text-align: center;
        }
      </style>
  </head>

  <body class="Dark:bg-gray-800">
  <section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <!--LOGO-->
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-auto h-50 mr-2" src="/img/colog.png" alt="logo">   
      </a>
      <!--TITULO-->
      <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Banco de Dados de Op Log Zulu
      </h1>
      <br>
      <!--FORM DE CADASTRO-->
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <!--TITULO-->
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Cadastrar-se
              </h1>
              <!--POSTO/GRADUAÇÃO-->
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <!--ENVIA PRA "PG"-->
                      <label for="pg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posto/Graduação</label>
                      <select name="pg" id="pg" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                      <!--OPÇÕES-->
                      <option value="">Selecione seu posto/gradução</option>
                      <option value="GENERAL DE EXÉRCITO">GENERAL DE EXÉRCITO</option> 
                      <option value="GENERAL DE DIVISÃO">GENERAL DE DIVISÃO</option> 
                      <option value="GENERAL DE BRIGADA">GENERAL DE BRIGADA</option> 
                      <option value="CORONEL">CORONEL</option>  
                      <option value="TENENTE-CORONEL">TENENTE-CORONEL</option>
                      <option value="MAJOR">MAJOR</option>
                      <option value="CAPITÃO">CAPITÃO</option>
                      <option value="1°TENENTE">1°TENENTE</option>
                      <option value="2°TENENTE">2°TENENTE</option>
                      <option value="ASPIRANTE">ASPIRANTE</option>
                      <option value="SUB TENENTE">SUB TENENTE</option>
                      <option value="1°SARGENTO">1°SARGENTO</option>
                      <option value="2°SARGENTO">2°SARGENTO</option>
                      <option value="3°SARGENTO">3°SARGENTO</option>
                      <option value="CABO">CABO</option>
                      <option value="SOLDADO">SOLDADO</option>
                      </select>
                  </div>
                  <!--NOME USUÁRIO-->
                  <div>
                      <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome de usuario</label>
                      <input name= "user" required placeholder="Digite o usuário" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  </div>
                  <!--SENHA-->
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                      <input type="password" name= "pass" required placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  </div>
                  <!--SOLICITAR ADM-->
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <!--CHECKBOX ADM-->
                          <div class="flex items-center h-5">
                            <input id="adm" name="adm" aria-describedby="adm" type="checkbox" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          </div>
                          <!--TEXTO DA CHECK BOX-->
                          <div class="ml-3 text-sm">
                            <label for="adm" class="text-gray-500 dark:text-gray-300">Solicitar conta de Administrador ou Gerente ?</label>
                          </div>
                      </div> 
                  </div>
                  
                  <!--BOTÃO DE ENVIO-->
                  <input type="submit" name="submit" value="SOLICITAR ACESSO" class="w-full text-white bg-indigo-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"/>
                  <!--JÁ TEM CONTA? ( DIRECIONA PRA TELA DE LOGIN )-->
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Já tem uma conta? <a href="index.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Entrar</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
  </section> 
  <footer>
      <p>&copy; 2025 Exército brasileiro. Divisão de Operações Logisticas</p>
    </footer>

</html>

