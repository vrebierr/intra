<?php

namespace Site\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SiteMessageBundle extends Bundle
{
	public function getParent()
	{
		return ("FOSMessageBundle");
	}
}
