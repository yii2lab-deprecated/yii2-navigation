<?php

namespace yii2lab\navigation\domain\repositories\memory;

use yii2lab\navigation\domain\entities\BreadcrumbsEntity;
use Yii;
use yii2lab\domain\repositories\BaseRepository;

class BreadcrumbsRepository extends BaseRepository {

	public $removeLastUrl = false;

	public function create(BreadcrumbsEntity $entity) {
		$entity->validate();
		Yii::$app->view->params['breadcrumbs'][] = $entity->toArray();
	}
	
	public function all() {
		if(empty(Yii::$app->view->params['breadcrumbs'])) {
			return [];
		}
		$collection = Yii::$app->view->params['breadcrumbs'];
		$collection = $this->correctData($collection);
		$collection = $this->removeLastUrl($collection);
		return $this->forgeEntity($collection);
	}
	
	private function correctData($collection) {
		foreach($collection as &$item) {
			if(!is_array($item)) {
				$itemTmp['label'] = $item;
				$item = $itemTmp;
			}
		}
		return $collection;
	}

	private function removeLastUrl($collection) {
		if($this->removeLastUrl) {
			$collection = array_values($collection);
			$lastIndex = count($collection) - 1;
			$collection[$lastIndex]['url'] = null;
		}
		return $collection;
	}

}
