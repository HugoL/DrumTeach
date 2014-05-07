<?php
Yii::import('zii.widgets.CPortlet');
 
class UserMenu extends CPortlet
{
    public function init()
    {
        $this->title=CHtml::encode("Menú");
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('userMenu');
    }
}
?>