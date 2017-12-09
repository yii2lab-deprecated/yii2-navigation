<?php

namespace yii2lab\navigation\domain\entities;

use yii2lab\domain\BaseEntity;
use yii2module\lang\domain\helpers\LangHelper;

class BreadcrumbsEntity extends BaseEntity {
	
	protected $label;
	protected $url;
	protected $options;

	public function rules() {
		return [
			[['label'], 'required'],
			[['label', 'url'], 'trim'],
		];
	}
	
	public function setLabel($value) {
		$this->label = LangHelper::extract($value);
	}
	
}