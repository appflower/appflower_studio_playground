afStudio.southPanel = Ext.extend(Ext.Panel, { 

	initComponent: function(){
		var southPanel=this;
		var console_cmd_label=new Ext.form.Label({text: 'Enter command: '});
		var console_cmd_field=new Ext.form.TextField({
			id: 'console_cmd'
			,width: 300
			,style:'margin-left:5px;'
			,enableKeyEvents:true
			,listeners:{
				keyup: function (field,e)
				{
					var fieldValue=field.getValue();
										
					var k = e?e.getKey():Ext.EventObject.getKey();
        			if(k == Ext.EventObject.ENTER){
        				
        				southPanel.body.mask('Loading, please Wait...', 'x-mask-loading');
	        				
	        			field.setValue('');
        				
        				if(fieldValue!='clear')
        				{	        				
							var options = {
								 url:southPanel.consoleUrl
								,method:southPanel.method
								,params:{
									command:fieldValue
								},
								success: function(response, opts) {
							      var response = Ext.decode(response.responseText);
							     					
							      afStudio.vp.layout.west.items[0].root.reload();
							      	     
							      southPanel.body.unmask();
							      
							      southPanel.body.dom.innerHTML+=response.console;
							      southPanel.body.scroll( "bottom", 1000000, true );
							    }
							};
							Ext.Ajax.request(options);
        				}
        				else if(fieldValue=='clear')
	        			{
	        				southPanel.body.dom.innerHTML='';
							southPanel.body.scroll( "bottom", 1000000, true );
	        			}
        			}
				}
			}
		});
		var console_cmd_display=new Ext.form.DisplayField({value: '<span style="margin-left:10px;"><b>cmds:</b> '+afStudioConsoleCommands+'</span>'});
		
		var config = {
			id: "south_panel"
			,title: "Console"
			,iconCls: 'icon-console'
			,height: 200
			,minHeight: 0
			,autoScroll:true
			,split: true
			,collapsible: true
			,region: "south"
			,tbar: {
				items:[
					console_cmd_label
					,console_cmd_field
					,console_cmd_display
				]
			}
			,html: ''
			,method:'post'
			,consoleUrl:'/appFlowerStudio/console'
			,bodyStyle: 'background-color:black;font-family: monospace;font-size: 11px;color: #88ff88;'
		};
		
		this.on({
			afterrender:function(){
				var southPanel=this;
				this.body.mask('Loading, please Wait...', 'x-mask-loading');
				var options = {
								 url:this.consoleUrl
								,method:this.method
								,params:{
									command:'start'
								},
								success: function(response, opts) {
							      var response = Ext.decode(response.responseText);
							     						     
							      southPanel.body.unmask();
							      
							      southPanel.body.dom.innerHTML+=response.console;
							      southPanel.body.scroll( "bottom", 1000000, true );
							    }
							};
				Ext.Ajax.request(options);
			}
		});
		
				
		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));
		afStudio.southPanel.superclass.initComponent.apply(this, arguments);	
	}
});