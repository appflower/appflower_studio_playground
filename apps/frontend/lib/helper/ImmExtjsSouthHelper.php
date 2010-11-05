<?php
$grid1=new ImmExtjsGrid(array('autoHeight'=>true,'clearGrouping'=>false,'pager'=>false));
/**
 * columns
 */
$grid1->addColumn(array('name'=>'id','label'=>'No.','id'=>true,'groupField'=>false/*,'width'=>20*/,'sortable'=>true,'sort'=>'DESC','qtip'=>false));
$grid1->addColumn(array('name'=>'table_id','label'=>'Table id','groupField'=>false/*,'width'=>20*/,'sortable'=>true));
$grid1->addColumn(array('name'=>'table_n','label'=>'Table name'/*,'width'=>20*/,'sortable'=>true));
$grid1->addColumn(array('name'=>'module','label'=>'Module'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
$grid1->addColumn(array('name'=>'changes','label'=>'Changes'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
$grid1->addColumn(array('name'=>'user_commit_msg','label'=>'User Msg'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
$grid1->addColumn(array('name'=>'user_id','label'=>'User'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
$grid1->addColumn(array('name'=>'ip','label'=>'IP'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
$grid1->addColumn(array('name'=>'updated_at','label'=>'Updated At'/*,'width'=>20*/,'sortable'=>true,'qtip'=>true));
/**
 * proxy
 * 
 * REMEMBER:
 * stateId attribute must be unique for each view, because with this id Extjs keeps in a cookie the state of start & limit attributes for listjson, see ticket #574; if stateId attribute is not defined, then the state is not kept !
 */
$grid1->setProxy(array('url'=>'/appFlower/listjsonAuditLog','limit'=>3));
$grid1->end();

/**
 * add the grid to the south panel
 */
ImmExtjsLayout::getInstance()->addItem('south',$grid1);
new ImmExtjsLinkButton('south',array('label'=>'Audit Log','url'=>'/audit/list'));
?>