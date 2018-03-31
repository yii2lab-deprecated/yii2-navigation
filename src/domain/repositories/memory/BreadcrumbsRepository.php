<?php

namespace yii2lab\navigation\domain\repositories\memory;

use yii2lab\domain\repositories\ActiveArrayRepository;

class BreadcrumbsRepository extends ActiveArrayRepository {
	
	public $removeLastUrl = false;
	
	private function correctData($collection) {
		foreach($collection as &$item) {
			if(!is_array($item)) {
				$itemTmp['label'] = $item;
				$item = $itemTmp;
			}
		}
		return $collection;
	}
	
	protected function getCollection() {
		$collection = parent::getCollection();
		$collection = $this->correctData($collection);
		return $collection;
	}
	
}
