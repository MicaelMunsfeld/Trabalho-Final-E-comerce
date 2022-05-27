<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewFooter extends ViewPadrao
{
	static function render(array $aVars = [])
	{
		if (! isset($aVars["footerContent"])){
			$aVars["footerContent"] = '';
		}
		return parent::render($aVars);
	}
}