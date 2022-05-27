<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProduto extends ViewPadrao
{

	static function getHtmlTabelaProduto (array $a){
		$sHtml =  '
			<table class="table">
			  <thead>
			    <tr>
			      <th class="text-center" scope="col">Código</th>
			      <th class="text-center" scope="col">Nome</th>
			      <th class="text-center" scope="col">Preço</th>
			      <th class="text-center" scope="col">Descrição</th>
			      <th class="text-center" scope="col">Ações</th>
			      <th class="text-center" scope="col"><a href="index.php?pg=insert">CADASTRAR</a></th>
			    </tr>
			  </thead>
			</tbody>
		';

		foreach ($a as $x) {
			$sHtml .= '
			<tr>
				<td class="text-center">' . $x["prodcodigo"] . '</td>
				<td class="text-center">' . $x["prodnome"] . '</td>
				<td class="text-center">' . $x["prodpreco"] . '</td>
				<td class="text-center">' . $x["proddescricao"] . '</td>
				<td class="text-center"><a href="index.php?pg=produto&act=delete&prodcodigo=' . $x["prodcodigo"] . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				<td></td>
			</tr>';	
		}

		$sHtml .= '</table>
		</tbody>';
		return $sHtml;
	}
}