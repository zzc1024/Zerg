<?php

namespace app\admin\controller;

use app\admin\controller\BaseController;

class Privilege extends BaseController
{
	function index()
	{
		return $this->fetch();
	}
}