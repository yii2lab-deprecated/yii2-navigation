<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\navigation\domain\entities\BreadcrumbsEntity;
use yii2lab\domain\services\BaseService;
use yii2lab\navigation\domain\repositories\memory\BreadcrumbsRepository;

/**
 * Class BreadcrumbsService
 *
 * @package yii2lab\navigation\domain\services
 * @property BreadcrumbsRepository $repository
 */
class BreadcrumbsService extends BaseService {

	public function create($title, $url = null, $options = null) {
		/** @var BreadcrumbsEntity $entity */
		$entity = $this->domain->factory->entity->create(BreadcrumbsEntity::class, [
			'label' => $title,
			'url' => $url,
			'options' => $options,
		]);
		$this->repository->create($entity);
	}
	
	public function all() {
		return $this->repository->all();
	}

	public function removeLastUrl($value = true) {
		return $this->repository->removeLastUrl = boolval($value);
	}
}
