<?php

namespace yii2lab\navigation\domain\services;

use yii2lab\domain\services\ActiveBaseService;
use yii2lab\navigation\domain\interfaces\services\BreadcrumbsInterface;

/**
 * Class BreadcrumbsService
 *
 * @package yii2lab\navigation\domain\services
 * @property \yii2lab\navigation\domain\interfaces\repositories\BreadcrumbsInterface $repository
 */
class BreadcrumbsService extends ActiveBaseService implements BreadcrumbsInterface {

	public function create($title, $url = null, $options = null) {
		$entity = $this->domain->factory->entity->create('breadcrumbs', [
			'label' => $title,
			'url' => $url,
			'options' => $options,
		]);
		$this->repository->insert($entity);
	}
	
}
