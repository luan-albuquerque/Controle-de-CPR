<?php

namespace App\models;

class ClassConexao
{

    public function connectionFactoryMysql()
    {
        try {
            $con = new \PDO("mysql:host=" . HOST . ";dbname=" . DB . "", "" . USER . "", "" . PASS . "");

            return $con;
        } catch (\PDOException $e) {
            echo "<script>alert('ERRO NO BANCO')</script>";
            return "ERRO COM BANCO " . $e->getMesag();

        }
    }

}