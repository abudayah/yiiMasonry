Yii Masonry Style v1.0 beta [ Yii Extension ]
==========

Masonry Style with infinty scrolling extension for Yii framework.

Features
------
- infinity scrolling.
- Theme option.

Usage
------
- Extract files extensions to be like this path > protected/extensions/yiiMasonry/yiiMasonry.php
- Copy this code for your index page.

        $this->widget('zii.widgets.CListView', array(
        'id' => 'postsIndex',
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'itemsCssClass'=>'yiiMasonry-200', // Optional: Just theme, to use this theme you have to keep rowSelector => '.view', change this line if you have custom theme.
        'template' => '{items} {pager}',
        'pager' => array(
          'class' => 'ext.yiiMasonry.yiiMasonry', 
          'rowSelector'=>'.view', // row class
          'listViewId' => 'postsIndex', // Container id
        )
        ));
    
Ex: Websites used Yii Masonry Style
----
- http://ae.cineklik.com/collections/
- http://www.olgot.com/v/426

Need help ?
----
http://twitter.com/abudayah
