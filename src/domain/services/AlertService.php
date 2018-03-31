<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\navigation\domain\interfaces\services\AlertInterface;
use yii2lab\domain\services\ActiveBaseService;
use yii2lab\navigation\domain\entities\AlertEntity;
use yii2lab\navigation\domain\widgets\Alert;

/**
 * Class AlertService
 *
 * @package yii2lab\navigation\domain\services
 * @property \yii2lab\navigation\domain\interfaces\repositories\AlertInterface $repository
 */
class AlertService extends ActiveBaseService implements AlertInterface {
	
	public function create($content, $type = Alert::TYPE_SUCCESS, $delay = AlertEntity::DELAY_DEFAULT) {
		$entity = $this->repository->forgeEntity([
			'type' => $type,
			'content' => $content,
			'delay' => $delay,
		]);
		$this->repository->insert($entity);
	}
	
}
