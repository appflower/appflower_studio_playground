Ext.BLANK_IMAGE_URL = '/appFlowerPlugin/extjs-3/resources/images/default/s.gif';
Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
Ext.ns('afStudio');

// application: afStudio
var afStudio = function () { 

	return {
		init: function () { 
		    Ext.QuickTips.init();
		    Ext.apply(Ext.QuickTips.getQuickTip(), {
			    trackMouse: true
			});
			Ext.form.Field.prototype.msgTarget = 'side';
			
			this.tb=new afStudio.toolbar();
			this.tb.init();
			this.vp=new afStudio.viewport();
		}
	}
}();

Ext.onReady(afStudio.init, afStudio);