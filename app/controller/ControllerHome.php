<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;
use App\Model\ModelProduto;

class ControllerHome extends ControllerPadrao
{

    protected function processPage()
    {

        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();

        $sTitle = 'Home';

        $sContent = ViewHome::render([
            'homeContent' => '<h1 class="m-5">Todos os produtos disponíveis</h1>',
            'homeTabela' => ViewHome::getHtmlTabelaProduto($a)
        ]);

        $this->footerVars = [
            // Passar aqui os parametros do footer da página
            ''
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}