<?php

namespace yii2lab\navigation\domain\repositories\session;

use yii2lab\domain\traits\ArrayModifyTrait;
use yii2lab\domain\traits\ArrayReadTrait;
use yii2lab\domain\repositories\BaseRepository;
use Yii;
use yii2lab\navigation\domain\interfaces\repositories\AlertInterface;

// todo: сделать из него базовый репозиторий для сессий

class AlertRepository extends BaseRepository implements AlertInterface {
	
	use ArrayReadTrait;
	use ArrayModifyTrait;
	
	const TYPE_IN_SESSION = 'alertCollection';
	
	protected function setCollection(Array $collection) {
		$data = serialize($collection);
		Yii::$app->session->setFlash(self::TYPE_IN_SESSION, $data);
	}
	
	protected function getCollection() {
		$data = Yii::$app->session->getFlash(self::TYPE_IN_SESSION);
		$collection = unserialize($data);
		if(!is_array($collection)) {
			return [];
		}
		return $collection;
	}
	
}