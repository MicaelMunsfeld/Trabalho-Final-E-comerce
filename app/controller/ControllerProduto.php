<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewProduto;
use App\Db\Connection;
use App\Model\ModelProduto;

class ControllerProduto extends ControllerPadrao
{
    function processPage(){

        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();


        $sTitle = 'Produtos';

        $sContent = ViewProduto::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewProduto::getHtmlTabelaProduto($a)
        ]); 

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processDelete(){
        $iIdProduto = $_GET['prodcodigo'] ??= '';
        
        $oModelProduto = new ModelProduto;
        $oModelProduto->codigo = $iIdProduto;
        
        if($oModelProduto->deleteProduto()){
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Seu produto excluido foi excluido com sucesso!
                </div>
                '
            ];
        }else{   
            $this->footerVars = [
                '<div class="alert alert-success" role="alert">
                Ops... Algo de errado aconteceu ao deletar, tente novamente!
                </div>'
            ];
        }
        
        return $this->processPage();
    }

    function processInsert(){
        $fPrecoProduto    = $_POST['prodpreco'];
        $sDescricaoProduto = $_POST['proddescricao'];
        $sNomeProduto      = $_POST['prodnome'];
        
        $oModelProduto      = new ModelProduto;
        $oControllerProduto = new ControllerProduto;
        
        $oModelProduto -> preco = $fPrecoProduto;
        $oModelProduto -> descricao = $sDescricaoProduto;
        $oModelProduto -> nome = $sNomeProduto;

        if($oModelProduto->insertProduto()){
             $oControllerProduto->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Seu produto cadastrado com sucesso!
                </div>
                '
            ];
        }else{   
             $oControllerProduto ->footerVars = [
                '<div class="alert alert-success" role="alert">
                Ops... Algo de errado aconteceu ao cadastrar, tente novamente!
                </div>'
            ];
        }

        return $oControllerProduto ->processPage();
    }
}