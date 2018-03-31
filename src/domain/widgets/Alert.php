<?php

namespace yii2lab\navigation\domain\widgets;

use Yii;
use kartik\widgets\Alert as kartikAlert;

/**
 * Extends the \yii\bootstrap\Alert widget with additional styling and auto fade out options.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class Alert extends kartikAlert
{
	/**
	 * @var bool auto fill data
	 */
	public $autoFill = true;
	
	/**
	 * Init widget
	 */
	public function init()
	{
		if(Yii::$app->getResponse()->getStatusCode() != 302) {
			if($this->autoFill) {
				$entity = Yii::$domain->navigation->alert->fetch();
				if($entity) {
					$this->type = $entity->type;
					$this->body = $entity->content;
					$this->title = $entity->subject;
					$this->delay = $entity->delay;
				}
			}
			if(!empty($this->body)) {
				parent::init();
			}
		}
	}

	/**
	 * Runs the widget
	 */
	public function run()
	{
		if(!empty($this->body)) {
			parent::run();
		}
	}
	
}
