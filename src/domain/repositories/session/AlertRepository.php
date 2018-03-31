<?php

namespace yii2lab\navigation\domain\repositories\session;

use yii2lab\helpers\ReflectionHelper;
use yii2lab\domain\repositories\BaseRepository;
use Yii;
use yii2lab\navigation\domain\entities\AlertEntity;
use yii2lab\navigation\domain\widgets\Alert;
use yii2lab\navigation\domain\interfaces\repositories\AlertInterface;

class AlertRepository extends BaseRepository implements AlertInterface {
	
	public function create(AlertEntity $entity) {
		$message = serialize($entity->toArray());
		Yii::$app->session->setFlash($entity->type, $message);
	}
	
	public function fetch() {
		$typeList = ReflectionHelper::getConstantsValuesByPrefix(Alert::class, 'type');
		foreach($typeList as $type) {
			if ($this->has($type)) {
				$entity = $this->fetchByType($type);
				return $this->forgeEntity($entity);
			}
		}
		return null;
	}
	
	private function has($type) {
		return Yii::$app->session->hasFlash($type);
	}
	
	private function fetchByType($type) {
		$message = Yii::$app->session->getFlash($type);
		$data = unserialize($message);
		return $this->forgeEntity($data);
	}

}