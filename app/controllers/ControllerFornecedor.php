<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Models\ClassModelFornecedor;

class ControllerFornecedor extends ClassModelFornecedor
{
    //Variaveis para recber do form
    protected $DT_RG, $RS, $NF, $CNPJ, $EMAIL, $TEL, $CGL, $SERV;

    //Construir Interface
    public function __construct()
    {
        $render = new ClassRender();
        $render->setTitle("Cadastrar Fornecedor");
        $render->setDescription("Pagina de cadastro de fornecedor");
        $render->setKeyWords("Cadastro de fornecedores");
        $render->setDir("fornecedor");
        $render->renderLayout();
    }

    //Receber Valores do Formulario e Armazenar na Variavel
    public function recVariaveis()
    {

        if (isset($_POST['id_razao_social'])) {
            $this->RS = filter_input(INPUT_POST, "id_razao_social", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['id_cnpj'])) {
            $this->CNPJ = filter_input(INPUT_POST, "id_cnpj", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['id_nome_fantasia'])) {
            $this->NF = filter_input(INPUT_POST, "id_nome_fantasia", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['id_email'])) {
            $this->EMAIL = filter_input(INPUT_POST, "id_email", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['id_contato'])) {
            $this->TEL = filter_input(INPUT_POST, "id_contato", FILTER_SANITIZE_SPECIAL_CHARS);
        }


        if (isset($_POST['id_cgl'])) {
            $this->CGL = filter_input(INPUT_POST, "id_cgl", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['id_serv'])) {
            $this->SERV = filter_input(INPUT_POST, "id_serv", FILTER_SANITIZE_SPECIAL_CHARS);
        }


    }

    public function loadCadastrar()
    {
        $this->recVariaveis();
        $this->cadastrarFornecedor($this->RS, $this->NF, $this->CNPJ, $this->EMAIL, $this->TEL, $this->CGL, 1);

    }

    public function loadListar()
    {
        $result = $this->listarFornecedor();
        echo "
  <table class='table'>
   <thead class='thead-dark'>
     <tr>
       <th scope='col' class='p0'>Globus</th>
       <th scope='col' class='p0'>Registro</th>
       <th scope='col' class='p0'>Razao Social</th>
       <th scope='col' class='p0'>CNPJ</th>
       <th scope='col' class='p0'>Email</th>
       <th scope='col' class='p0'>Contato</th>
       <th scope='col' class='p0'>Serviço</th>
       <th scope='col' class='p0'>UF</th>
       <th scope='col' class='p0'>Cidade</th> 
 
       <th scope='col' class='p0'>Ação</th>
     </tr>
   </thead>
   <tbody>";
        foreach ($result as $dados) {
            echo "<tr>
       <td scope='row' class='pb'>000000</td>
         <td class='pb'>13/12/2000</td>
       <td class='pb'>$dados[RS]</td>
       <td class='pb'>$dados[CNPJ]</td>
       <td class='pb'>$dados[EMAIL]</td> 
       <td class='pb'>$dados[CONTATO]</td>
       <td class='pb'>$dados[SERV]</td>
       <td class='pb'>AM</td>
       <td class='pb'>Manaus</td>
    
       <td class='pb'>
       <input type='checkbox' class='offCheckbox' id='$dados[COD]'>
       <label class='lix' for='$dados[COD]'></label>
        <input type='checkbox' class='offCheckbox' id='teste2'>
       <label class='lap' for='teste2'></label>
       
</td>
     </tr>";
        }
        echo "
 
   </tbody>
 </table>";


    }
}