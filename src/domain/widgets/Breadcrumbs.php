<?php

namespace yii2lab\navigation\domain\widgets;

use Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs as YiiBreadcrumbs;
use yii2lab\helpers\yii\Html;

class Breadcrumbs extends YiiBreadcrumbs
{
	
    public $tag = 'ol';
    
    public function init() {
    	$collection = Yii::$app->navigation->breadcrumbs->all();
    	$this->links = !empty($collection) ? ArrayHelper::toArray($collection) : [];
	    $this->homeLink = [
		    'label' => Html::fa('home'),
		    'encode' => false,
		    'url' => ['/'],
	    ];
    }

}
