<?php

class RealizeModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * getBaseRealizeAll
     */
    public function getBaseRealizeAll()
    {
        $sql = "SELECT base_realize.iItemRealize, base_realize.iCgcUnidade, sr.Nome_SR, base_realize.nObjetivoAcumulado, base_realize.nRealizadoAcumulado, base_realize.fPercAtingido
        FROM base_realize INNER JOIN sr ON base_realize.iCgcUnidade = sr.Codigo_SR";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * getBaseRealize
     */
    public function getBaseRealize($itemRealize)
    {
        $sql = "SELECT base_realize.iItemRealize, base_realize.iCgcUnidade, sr.Nome_SR, base_realize.nObjetivoAcumulado, base_realize.nRealizadoAcumulado, base_realize.fPercAtingido
        FROM base_realize INNER JOIN sr ON base_realize.iCgcUnidade = sr.Codigo_SR WHERE base_realize.iItemRealize = :itemRealize";
        $query = $this->db->prepare($sql);
        $query->execute(array(':itemRealize' => $itemRealize));
        return $query->fetchAll();
    }

    /**
     * getParâmetros
     */
    public function getParametros($itemRealize)
    {
        $sql = "SELECT NomeItemRealize FROM parametros WHERE iItemRealize = :itemRealize";
        $query = $this->db->prepare($sql);
        $query->execute(array(':itemRealize' => $itemRealize));
        return $this->query->fetchAll();
    }

}
