<?php

namespace App\Models;

use App\models\ClassConexao;

class ClassModelServico extends ClassConexao
{
    private $db;

    protected function cadastrarServico($servdesc, $servcgl)
    {
        $this->db = $this->connectionFactoryMysql()
            ->prepare("INSERT INTO SERVICOS VALUES(null,:servdesc,:servcgl)");
        $this->db->bindParam(":servdesc", $servdesc, \PDO::PARAM_STR);
        $this->db->bindParam(":servcgl", $servcgl, \PDO::PARAM_INT);
        $this->db->execute();

    }

    protected function DeletarServico($ID)
    {
        if (isset($ID)) {
            $this->db = $this->connectionFactoryMysql()
                ->prepare("DELETE FROM SERVICOS WHERE serv_cod=:ID");
            $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
            $this->db->execute();

        } }

        protected function UpdateServicos($COD,$DESC,$CGL){
        $this->db=$this->connectionFactoryMysql()
            ->prepare("UPDATE SERVICOS SET serv_desc=:DESCR,serv_cod_globus=:CGL WHERE serv_cod=:COD;");
           $this->db->bindParam(":COD",$COD,\PDO::PARAM_INT);
            $this->db->bindParam(":DESCR",$DESC,\PDO::PARAM_STR);
           $this->db->bindParam(":CGL",$CGL,\PDO::PARAM_INT);
           $this->db->execute();
        }

    protected function ListarServico()
    {

        $BFetch = $this->db = $this->connectionFactoryMysql()
            ->prepare("SELECT * FROM SERVICOS group by serv_cod");
        $BFetch->execute();

        $I = 0;
        while ($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)) {
            $ArrayList[$I] = ['COD' => $Fetch['serv_cod'],
                'DESC' => $Fetch['serv_desc'],
                'CGL' => $Fetch['serv_cod_globus']
            ];
            $I++;
        }
        if (isset($ArrayList)) {//Se existir,RETORNARA A VARIAVEL
            return $ArrayList;
        }
    }

}