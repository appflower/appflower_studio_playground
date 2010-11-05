<script type="text/javascript" src="/appFlowerPlugin/extjs-3/adapter/ext/ext-base-debug.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/ext-all-debug.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/js/custom/widgetJS.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/js/custom/BorderLayoutOverride.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/js/custom/gridUtil.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/overrides/Override.Ext.data.SortTypes.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/overrides/Override.Ext.form.Field.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/overrides/Override.Fixes.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/plugins/Ext.ux.Notification.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/layout/AccordionLayoutSetActiveItem.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/portal/Ext.ux.MaximizeTool.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/form/Ext.ux.form.Combo.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/form/Ext.ux.plugins.HelpText.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/plugins/Ext.ux.plugins.RealtimeWidgetUpdate.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid/Ext.ux.GridColorView.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid/Ext.ux.GroupingColorView.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid/Ext.ux.Grid.GroupingStoreOverride.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid/RowExpander.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/js/custom/cheatJS.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/rowactionsImm/js/Ext.ux.GridRowActions.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/form/lovcombo-1.0/js/Ext.ux.form.LovCombo.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/treegrid/Ext.ux.CheckboxSelectionModel.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/menu/EditableItem.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/menu/ComboMenu.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/menu/RangeMenu.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/GridFilters.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/DrillFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/RePositionFilters.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/SaveSearchState.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/FilterInfo.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/Filter.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/BooleanFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/ComboFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/DateFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/ListFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/NumericFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid-filtering/ux/grid/filter/StringFilter.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/portal/Portal.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/portal/PortalColumn.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/portal/Portlet.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/portal/sample-grid.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/js/custom/portalsJS.js"></script>
<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/form/Ext.ux.ClassicFormPanel.js"></script>

<script type="text/javascript" src="/appFlowerPlugin/extjs-3/examples/grid/Ext.ux.grid.RowEditor.js"></script>

<script type="text/javascript">
var afStudioConsoleCommands='<?php echo afStudioConsole::getCommands(false); ?>';
</script>

<script type="text/javascript" src="/appFlowerStudioPlugin/js/afStudio.js"></script>
<?php 
$appFlowerStudioPluginJsPath=sfConfig::get('sf_root_dir').'/plugins/appFlowerStudioPlugin/web/js/';

$afStudioJsExtensions=sfFinder::type('file')->name('afStudio.*.js')->in($appFlowerStudioPluginJsPath);
foreach ($afStudioJsExtensions as $afStudioJsExtension)
{
?>
<script type="text/javascript" src="/appFlowerStudioPlugin/js/<?php echo basename($afStudioJsExtension); ?>"></script>
<?php }?>

<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/resources/css/ext-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/resources/css/xtheme-blue.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/css/my-extjs.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/rowactionsImm/css/Ext.ux.GridRowActions.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/rowactionsImm/css/icons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/form/lovcombo-1.0/css/Ext.ux.form.LovCombo.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/grid-filtering/resources/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/portal/portal.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />

<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerPlugin/extjs-3/examples/grid/Ext.ux.grid.RowEditor.css" />

<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerStudioPlugin/css/afStudio.css" />
<?php 
$appFlowerStudioPluginCssPath=sfConfig::get('sf_root_dir').'/plugins/appFlowerStudioPlugin/web/css/';

$afStudioCssExtensions=sfFinder::type('file')->name('afStudio.*.css')->in($appFlowerStudioPluginCssPath);
foreach ($afStudioCssExtensions as $afStudioCssExtension)
{
?>
<link rel="stylesheet" type="text/css" media="screen" href="/appFlowerStudioPlugin/css/<?php echo basename($afStudioCssExtension); ?>" />
<?php }?>