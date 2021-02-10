<?php

namespace App\models;

use App\models\ClassConexao;

class ClassModelFornecedor extends ClassConexao
{

    private $db;

    protected function cadastrarFornecedor($RS, $NF, $CNPJ, $EMAIL, $TEL, $CGL, $SERV)
    {
        $this->db = $this->connectionFactoryMysql()
            ->prepare("INSERT INTO FORNECEDORES VALUES(null,:CNPJ,:RS,:NF,:EMAIL,:TEL,:CGL,:SERV);");
        $this->db->bindParam(":RS", $RS, \PDO::PARAM_STR);
        $this->db->bindParam(":NF", $NF, \PDO::PARAM_STR);
        $this->db->bindParam(":CNPJ", $CNPJ, \PDO::PARAM_INT);
        $this->db->bindParam(":EMAIL", $EMAIL, \PDO::PARAM_STR);
        $this->db->bindParam(":TEL", $TEL, \PDO::PARAM_INT);
        $this->db->bindParam(":CGL", $CGL, \PDO::PARAM_INT);
        $this->db->bindParam(":SERV", $SERV, \PDO::PARAM_INT);

        $this->db->execute();

        echo "<script>alert('Dados Cadatrados com sucesso')</script>";
    }

    protected function listarFornecedor()
    {

        $BFetch = $this->db = $this->connectionFactoryMysql()
            ->prepare("select * from fornecedores inner join servicos on serv_cod=forn_cod_serv");
        $BFetch->execute();

        $I = 0;
        while ($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)) {
            $ArrayList[$I] = ['RS' => $Fetch['forn_rs'],
                'COD' => $Fetch['forn_cod'],
                'CNPJ' => $Fetch['forn_cnpj'],
                'N_F' => $Fetch['forn_nome_fantasia'],
                'EMAIL' => $Fetch['forn_email'],
                'CONTATO' => $Fetch['forn_contato'],
                'CGL' => $Fetch['forn_cod_globus'],
                'SERV' => $Fetch['serv_desc']
            ];
            $I++;
        }
        return $ArrayList;

    }

}