<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\domain\services\ActiveBaseService;
use yii2lab\navigation\domain\entities\AlertEntity;
use yii2lab\navigation\domain\repositories\session\AlertRepository;
use yii2lab\navigation\domain\widgets\Alert;

/**
 * Class AlertService
 *
 * @package yii2lab\navigation\domain\services
 * @property AlertRepository $repository
 */
class AlertService extends ActiveBaseService {
	
	public function create($content, $type = Alert::TYPE_SUCCESS, $delay = AlertEntity::DELAY_DEFAULT) {
		/** @var AlertEntity $entity */
		$entity = $this->repository->forgeEntity([
			'type' => $type,
			'content' => $content,
			'delay' => $delay,
		]);
		$this->repository->create($entity);
	}
	
	public function fetch() {
		return $this->repository->fetch();
	}
	
}
