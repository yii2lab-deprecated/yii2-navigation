<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\domain\data\Query;
use yii2lab\domain\interfaces\services\ReadAllInterface;
use yii2lab\domain\services\BaseService;
use yii2lab\navigation\domain\entities\AlertEntity;
use yii2lab\navigation\domain\repositories\session\AlertRepository;
use yii2lab\navigation\domain\widgets\Alert;

/**
 * Class AlertService
 *
 * @package yii2lab\navigation\domain\services
 * @property AlertRepository $repository
 */
class AlertService extends BaseService implements ReadAllInterface {
	
	public function create($content, $type = Alert::TYPE_SUCCESS, $delay = AlertEntity::DELAY_DEFAULT) {
		/** @var AlertEntity $entity */
		$entity = $this->repository->forgeEntity([
			'type' => $type,
			'content' => $content,
			'delay' => $delay,
		]);
		$this->repository->insert($entity);
	}
	
	public function count(Query $query = null) {
		return $this->repository->count($query);
	}
	
	/**
	 * @param Query|null $query
	 *
	 * @return AlertEntity[]
	 */
	public function all(Query $query = null) {
		return $this->repository->all($query);
	}
}
