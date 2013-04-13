<?php

class yiiMasonry extends CLinkPager {

    public $listViewId;
    public $rowSelector = '.row';
    public $itemsSelector = '.items';
    public $nextSelector = '.next:not(.hidden) a';
    public $pagerSelector = '.pager';
    private $baseUrl;
    public $options = array();

    public function init() {

        parent::init();

        $assets = dirname(__FILE__) . '/assets';
        $this->baseUrl = Yii::app()->assetManager->publish($assets);

        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerCSSFile($this->baseUrl . '/css/jquery.ias.css');
        $cs->registerScriptFile($this->baseUrl . '/js/jquery-ias.js', CClientScript::POS_END);
        $cs->registerScriptFile($this->baseUrl . '/js/jquery.masonry.min.js', CClientScript::POS_END);

        return;
    }

    public function run() {
		
		$js = "jQuery.ias({
		    loading: {
				finished: undefined,
			},
			});";
		
		$options = CMap::mergeArray($this->options, array(
						'container' => '#' . $this->listViewId . ' ' . $this->itemsSelector,
						'item' => $this->rowSelector,
						'pagination' => '#' . $this->listViewId . ' ' . $this->pagerSelector,
						'next' => '#' . $this->listViewId . ' ' . $this->nextSelector,
						'loader' => "",
					));
        $js = "jQuery.ias({\n";
		foreach ( $options as $k => $v ) {
			$js .= $k . ":'" . $v . "',\n";
		}
		$js .= "
			onLoadItems: function(items) {
				// hide new items while they are loading
				var newElems = $(items).show().css({ opacity: 0 });
				// ensure that images load before adding to masonry layout
				newElems.imagesLoaded(function(){
				  // show elems now they're ready
				  newElems.animate({ opacity: 1 });
				  $('{$this->itemsSelector}').masonry( 'appended', newElems, true );
				});
				return true;
			}\n";
        $js .= "});";


        $cs = Yii::app()->clientScript;
        $cs->registerScript('infscrl', $js, CClientScript::POS_READY);


        $buttons = $this->createPageButtons();

        echo $this->header; // if any

        echo CHtml::tag('ul', $this->htmlOptions, implode("\n", $buttons));

        echo $this->footer;  // if any
    }

}