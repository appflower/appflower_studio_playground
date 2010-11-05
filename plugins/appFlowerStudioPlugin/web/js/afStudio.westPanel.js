afStudio.westPanel = Ext.extend(Ext.Panel, { 

	initComponent: function(){
		
		var config = {
			id: "west_panel",
			region: "west",
			title: "Navigation",
			width: 220,
			minWidth: 220,
			autoHeight: false,
			autoScroll: true,
			split: true,
			layoutConfig: { animate: true },
			collapsible: true,
			layout: "accordion",
			listeners: {"beforerender": function(){this.activeItem = this.findById("models")}},
			items: [
				new afStudio.models.treePanel({id:'models'})
			    ,{
					id: "profile",
					title: "My Profile",
					autoHeight: true,
					border: false,
					iconCls: "user",
					html: "\t\r\n\t<div id=\"westpanel_link\"><div style=\"background-color:#f8f8f8; padding:3px; border:1px solid #ddd;font-size:11px;\"><b>Welcome, Administrator<\/b><br>\r\n\tUsername: admin<br>\r\n\tLast Login: 2010-03-25 06:09:51<br>\r\n\t<a href=\"\/user\/myprofile\">[Edit My Profile]<\/a>\r\n\t<\/div>\r\n\t<div style=\"background-color:#f8f8f8; padding:3px; margin-top:10px; border:1px solid #ddd;font-size:11px;\"><b>Widget help is enabled <img src=\"\/images\/famfamfam\/accept.png\" width=10><\/b> <a href=\"\/user\/widget\/disable\"> [Disable]<\/a><\/b><\/div><\/div>",
					listeners: { expand: function (panel) { panel.body.dom.parentNode.style.padding='5px'; } }
				}
			]
		};
				
		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));
		afStudio.westPanel.superclass.initComponent.apply(this, arguments);	
	}
});