<?php

namespace yii2lab\navigation\domain\interfaces\services;

use yii2lab\domain\interfaces\services\CrudInterface;
use yii2lab\navigation\domain\entities\AlertEntity;
use yii2lab\navigation\domain\widgets\Alert;

interface AlertInterface extends CrudInterface {
	
	public function create($content, $type = Alert::TYPE_SUCCESS, $delay = AlertEntity::DELAY_DEFAULT);
	
}