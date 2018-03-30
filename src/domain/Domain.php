<?php

namespace yii2lab\navigation\domain;

use yii2lab\domain\enums\Driver;

/**
 * Class Domain
 *
 * @package yii2lab\navigation\domain
 *
 * @property \yii2lab\navigation\domain\services\BreadcrumbsService $breadcrumbs
 * @property \yii2lab\navigation\domain\services\AlertService $alert
 */
class Domain extends \yii2lab\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
				'breadcrumbs' => Driver::MEMORY,
				'alert' => Driver::SESSION,
			],
			'services' => [
				'breadcrumbs',
				'alert',
			],
		];
	}
	
}