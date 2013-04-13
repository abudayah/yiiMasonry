Yii Masonry Style v1.0beta [Extinction]
==========

Yii Masonry Style with infinty scrolling extinction.


Usage
------

Just copy this code for your index page.

    $this->widget('zii.widgets.CListView', array(
    'id' => 'postsIndex',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'summaryText'=>'',
    'template' => '{items} {pager}',
    'pager' => array(
      'class' => 'ext.yiiMasonry.yiiMasonry', 
      'rowSelector'=>'.view', // row class
      'listViewId' => 'postsIndex', // Container id
      'header' => '',
    )
    ));
    
Demo
----
- http://ae.cineklik.com/collections/
