<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\domain\services\ActiveBaseService;
use yii2lab\navigation\domain\repositories\memory\BreadcrumbsRepository;

/**
 * Class BreadcrumbsService
 *
 * @package yii2lab\navigation\domain\services
 * @property BreadcrumbsRepository $repository
 */
class BreadcrumbsService extends ActiveBaseService {

	public function create($title, $url = null, $options = null) {
		$entity = $this->domain->factory->entity->create('breadcrumbs', [
			'label' => $title,
			'url' => $url,
			'options' => $options,
		]);
		$this->repository->insert($entity);
	}
	
	public function removeLastUrl($value = true) {
		return $this->repository->removeLastUrl = boolval($value);
	}
}
