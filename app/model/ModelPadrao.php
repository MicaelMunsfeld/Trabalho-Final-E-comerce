<?php

namespace App\Model;

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();

    function getAll()
    {
        $oConnection = Connection::get();

        $sSelect = 'SELECT * FROM ' . $this->getTable();

        $oResult = pg_query($oConnection, $sSelect);

        $aData = [];

        while ($aResultado = pg_fetch_assoc($oResult)){
            $aData[] = $aResultado;
        }

        return $aData;
    }

    protected function insert($aValues)
    {
        $oConnection = Connection::get();

        $sSql = " INSERT INTO ".$this->getTable()." (".implode(',',array_keys($aValues)).") VALUES (".implode(',', array_values($aValues)).")";

        return pg_query($oConnection, $sSql);
    }

    protected function delete($aWhere)
    {
        $oConnection = Connection::get();

        $sSql = '
        DELETE FROM '.$this->getTable().' WHERE 1 = 1
        ';

        foreach($aWhere as $sNomeColuna => $sValor){
            $sSql .= ' AND ' . $sNomeColuna.' = '.$sValor;
        }

        return pg_query($oConnection, $sSql);

    }

    protected function update($aValues, $aWhere)
    {
        // Implementar
    }

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }
}
