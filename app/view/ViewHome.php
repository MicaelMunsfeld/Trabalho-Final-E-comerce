<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao
{

	static function getHtmlTabelaProduto (array $a){

		$sHtml =  '<div class="container">
				   <div class="row">';
		foreach ($a as $x) {
		$sHtml .= '
			
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">' . $x["prodnome"] . '</h5>
						<p class="card-text">' . $x["proddescricao"] . '</p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><strong>Preço: </strong>' . $x["prodpreco"] . '</li>
					    <li class="list-group-item"><strong>Código: </strong>' . $x["prodcodigo"] . '</li>
					</ul>
				</div>
			</div>

			';
		}
		$sHtml .= '</div></div>';
		return $sHtml;
	}
}

?>


<style type="text/css">

	.card-body {
		min-height: 160px;
		padding: 0rem 1rem !important;
	}
	.card {
		padding: 20px;
		border: 1px solid rgb(33 37 41) !important;
		margin: 15px;
	}

	.list-group-item {
		border-bottom: 1px solid rgb(0 0 0 / 100%) !important;
	}
</style>