<?php

namespace yii2lab\navigation\domain\entities;

use yii2lab\domain\BaseEntity;

/**
 * @property string $type
 * @property boolean $closable
 * @property boolean $autoHide
 */
class AlertEntity extends BaseEntity {

	const DELAY_DEFAULT = 5000;

	protected $type;
	protected $closable = true;
	protected $delay = self::DELAY_DEFAULT;
	protected $address;
	protected $subject;
	protected $content;
	
}
