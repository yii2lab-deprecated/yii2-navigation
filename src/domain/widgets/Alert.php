<?php

namespace yii2lab\navigation\domain\widgets;

use Yii;
use kartik\widgets\Alert as kartikAlert;
use yii\base\Widget;

class Alert extends Widget
{
	
	/**
	 * information alert
	 */
	const TYPE_INFO = 'alert-info';
	/**
	 * danger/error alert
	 */
	const TYPE_DANGER = 'alert-danger';
	/**
	 * success alert
	 */
	const TYPE_SUCCESS = 'alert-success';
	/**
	 * warning alert
	 */
	const TYPE_WARNING = 'alert-warning';
	/**
	 * primary alert
	 */
	const TYPE_PRIMARY = 'bg-primary';
	/**
	 * default alert
	 */
	const TYPE_DEFAULT = 'well';
	/**
	 * custom alert
	 */
	const TYPE_CUSTOM = 'alert-custom';
	
	public $collection = [];
	
	/**
	 * Runs the widget
	 */
	public function run()
	{
		$collection = $this->getCollection();
		echo $this->generateHtml($collection);
	}
	
	private function getCollection() {
		$collection = $this->collection;
		if(empty($collection)) {
			$collection = Yii::$domain->navigation->alert->all();
		}
		if(empty($collection)) {
			$collection = [];
		}
		return $collection;
	}
	
	private function generateHtml($collection) {
		$html = '';
		foreach($collection as $entity) {
			$html .= kartikAlert::widget([
				'type' => $entity->type,
				'body' => $entity->content,
				'title' => $entity->subject,
				'delay' => $entity->delay,
			]);
		}
		return $html;
	}
}
