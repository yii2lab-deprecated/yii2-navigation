<?php

namespace yii2lab\navigation\domain\entities;

use yii2lab\domain\BaseEntity;
use yii2module\lang\domain\helpers\LangHelper;

/**
 * @property string $type
 * @property boolean $closable
 * @property integer $delay
 * @property string $content
 * @property string $subject
 */
class AlertEntity extends BaseEntity {

	const DELAY_DEFAULT = 5000;

	protected $type;
	protected $subject;
	protected $content;
	protected $closable = true;
	protected $delay = self::DELAY_DEFAULT;
	
	public function setSubject($value) {
		$this->subject = LangHelper::extract($value);
	}
	
	public function setContent($value) {
		$this->content = LangHelper::extract($value);
	}
	
}
