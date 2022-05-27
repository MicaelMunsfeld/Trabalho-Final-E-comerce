<?php

namespace App\Model;

use App\Model\ModelPadrao;

class ModelProduto extends ModelPadrao
{
    public $codigo;
    public $nome;
    public $preco;
    public $descricao;
    
    function getTable() {
        return 'projeto.tbproduto';
    }  

    function deleteProduto() {
        $iId = $this->codigo;

        return  parent::delete([
            'prodcodigo' => $iId
        ]);
    }

    function insertProduto() {

        return  parent::insert([
            'prodnome'      => $this->getBdValue($this ->nome),
            'prodpreco'     => $this->getBdValue($this ->preco),
            'proddescricao' => $this->getBdValue($this ->descricao)
        ]);
    }
}