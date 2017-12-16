<?php

namespace yii2lab\navigation\domain;

use yii2lab\domain\enums\Driver;

class Domain extends \yii2lab\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
				'breadcrumbs' => Driver::MEMORY,
			],
			'services' => [
				'breadcrumbs',
			],
		];
	}
	
}