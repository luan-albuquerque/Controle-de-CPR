<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\ClassModelServico;

class ControllerServico extends ClassModelServico
{
    protected $descricao, $cgl, $cod, $id;

    public function __construct()
    {
        $render = new ClassRender();
        $render->setTitle("Menu Serviços");
        $render->setDescription("Pagina de serviços");
        $render->setKeyWords("Menu de serviços");
        $render->setDir("servico");
        $render->renderLayout();
    }

    public function recVariaveis()
    {

        if (isset($_POST['id_serv'])) {
            $this->id = filter_input(INPUT_POST, 'id_serv', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['id_cod'])) {
            $this->cod = $_POST['id_cod'];
        }
        if (isset($_POST['desc'])) {
            $this->descricao = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['cgl'])) {
            $this->cgl = filter_input(INPUT_POST, 'cgl', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    #MEU CRUD
    #CADASTRA
    public function loadCadastrar()
    {
        $this->recVariaveis();
        $this->cadastrarServico($this->descricao, $this->cgl);
       echo "<script>window.location='".DIRPAGE."Servicos'; alert('Cadastrado com Sucesso')</script>";

    }
    #DELETAR SERVICO
    public function loadDeletar()
    {
        $this->recVariaveis();
        if ($this->cod != null) {
            foreach ($this->cod as $deletando) {
            $this->DeletarServico($deletando);
        }}
        echo "<script>window.location='".DIRPAGE."Servicos'; alert('Deletado com Sucesso')</script>";
    }
    #UPDATE DE SERVICO
    public function loadUpdateServico(){
      $this->recVariaveis();
      $this->UpdateServicos($this->id ,$this->descricao,$this->cgl);
        echo "<script>window.location='".DIRPAGE."Servicos';alert('Atualizado com Sucesso')</script>";

    }
    #PRENCHER O SELECT NOS FORMULARIOS DE DIFERENTES CONTROLERS
    public function loadSelectServico(){
        return $this->ListarServico();

    }
   #PUXA DADOS NO FORMULARIO (NESSE CASO MEU MODAL)
    public function Formulario_de_edicao($ID){
      $this->recVariaveis();
      $LISTAR_S=$this->ListarServico();
        $DESC =null;
        $CGL = null;
      foreach ($LISTAR_S as $DADOS){
          if($DADOS['COD'] == $ID){
          $DESC = $DADOS['DESC'];
          $CGL = $DADOS['CGL'];
          }
      }
      #NESSE SCRIPT ELE CHAMA O INPUT OCULTO,QUE ACIONADO CHAMA O MODAL DE ALTERAR.
      echo "
<script>window.onload = function() { document.getElementById('modalshow').click(); };</script>
<input type='hidden' id='modalshow' class='btn btn-primary'  data-toggle='modal' data-target='.modal-alterar'>
<!--MODAL DE ALTERAR-->
      <div class='modal fade modal-alterar' tabindex='-1' role='dialog' >
    <div class='modal-dialog' role='document'>
        <div class='modal-content' style='padding: 15px 15px'>
      <form action='".DIRPAGE."Servicos/loadUpdateServico' method='post'>
      <input type='hidden' name='id_serv' value='$ID'>
                <div class='form-row '>
                    <div class='col-md-8 mb-3'>
                        <h6>Descrição *</h6>
                        <input type='text' class='form-control' name='desc' id='id_desc' value='{$DESC}' required>

                    </div>

                    <div class='col-md-4 mb-2'>
                        <h6>Codigo do Globus *</h6>
                        <input type='text' class='form-control' name='cgl' id='id_cgl' value='{$CGL}' required>

                    </div>

                </div><!--FIM DO FORM ROW-->


                <div class='form-group'>

                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='' id='invalidCheck3' required>
                        <h6 class='form-check-label' for='invalidCheck3'>
                            Confirmo que as informações prestadas são verdadeiras
                        </h6>
                    </div>
                </div><!--FIM DO FORM GROUP-->

                <button class='btn btn-primary' type='submit'>Atualizar</button>


            </form>
            
            </div>
            </div>
      </div>
            ";


    }
   #LISTAR
    public function loadListar()
    {
        $result = $this->ListarServico();
        echo "
     
      <form name='FormDeletar' id='FormDeletar' action='" . DIRPAGE . "Servicos/loadDeletar' method='post'>
      <table class='table'>
      <thead class='thead-dark'>
      <tr>
      <th scope='col' class='p0'>Registro</th>
      <th scope='col' class='p0'>Descrição</th>
      <th scope='col' class='p0'>Globus</th>
      <th scope='col' class='p0'>Ação</th>
      </tr>
      </thead>
      <tb>";
        if (isset($result)) { //Se existir vai retornar o fereach.Mas, antes ele é verificado no ClassModelServico
            foreach ($result as $dados) {
                echo "
       <tr>
       <td class='pb'>13/12/2000</td>
       <td class='pb'>$dados[DESC]</td>
       <td class='pb'>$dados[CGL]</td>
       <td class='pb'>
       <input class='offCheckbox' type='checkbox' id='$dados[COD]' name='id_cod[]' value='$dados[COD]'>
       <label class='lix' id='l1' for='$dados[COD]'></label>
       
       <input  class='offCheckbox' type='checkbox' id='idedit' value='$dados[COD]'>
       <label  class='lap' for='idedit'  rel='/Servicos/Formulario_de_edicao/$dados[COD]' alt='Editar'></label>
    
  
       </td> 
       </tr>";
            }
        }
           echo "
      </tbody>
      </table>
      
      <input class=' btn btn-primary' type='submit' value='Deletar Itens Selecionados'>
      </form> 
      ";

    }


}