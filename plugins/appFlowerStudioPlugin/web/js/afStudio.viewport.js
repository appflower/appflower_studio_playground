afStudio.viewport = Ext.extend(Ext.Viewport, { 

	initComponent: function(){
		
		var northPanel = new Ext.Panel ({
			id: "north_panel",
			region: "north",
			height: 32,
			border: false,
			bodyStyle: "background-color:#dfe8f6;"
		});
						
		var centerPanel = new Ext.ux.Portal ({
			region: "center",
			title: "Dashboard",
			items: [
				{
				columnWidth: 1,
				style: "padding:10px 0 10px 10px;",
				items: [
				
				]
				}
			],
			style: "padding-right:5px;"
		});
		
		var config = {
			layout: "border",
			id: "viewport",
			items: [
			northPanel,
			new afStudio.westPanel(),
			centerPanel,
			new afStudio.southPanel()
			]
		};
		
		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));
		afStudio.viewport.superclass.initComponent.apply(this, arguments);	
	}
});