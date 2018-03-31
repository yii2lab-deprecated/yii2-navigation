<?php

namespace yii2lab\navigation\domain\repositories\session;

use yii2lab\domain\repositories\ActiveSessionRepository;
use yii2lab\navigation\domain\interfaces\repositories\AlertInterface;

class AlertRepository extends ActiveSessionRepository implements AlertInterface {
	
	public $isFlash = true;
	
}