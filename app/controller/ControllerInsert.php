<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewInsert;
use App\Db\Connection;
use App\Model\ModelProduto;

class ControllerInsert extends ControllerPadrao
{
    function processPage(){

        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();


        $sTitle = 'Cadastro de Produtos';

        $sContent = ViewInsert::render([
            'ViewInsertContent' => "<h1>$sTitle</h1>"
        ]); 

        $this->footerVars = [
            // Passar aqui os parametros do footer da página
            'footerContent' => ''
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}