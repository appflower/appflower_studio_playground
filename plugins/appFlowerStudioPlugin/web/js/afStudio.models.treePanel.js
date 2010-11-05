Ext.ns('afStudio.models');

afStudio.models.treePanel = Ext.extend(Ext.tree.TreePanel, {
	
	initComponent: function(){
		
		var config = {			
			title: 'Models'
			,iconCls: 'icon-models'
			,url: '/appFlowerStudio/models'
			,method: 'post'
			,reallyWantText: 'Do you really want to'
		    ,root:new Ext.tree.AsyncTreeNode({path:'root',allowDrag:false})
			,rootVisible:false
		};
		
		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));
		
		if(!this.loader) {
			this.loader = new Ext.tree.TreeLoader({
				 url:this.url
				,baseParams:{cmd:'get'}
			});
		}

		// setup loading mask if configured
		this.loader.on({
			 beforeload:function (loader,node,clb){
			 	node.getOwnerTree().body.mask('Loading, please Wait...', 'x-mask-loading');
			 }
			,load:function (loader,node,resp){
				node.getOwnerTree().body.unmask();
			}
			,loadexception:function(loader,node,resp){
				node.getOwnerTree().body.unmask();
			}
		});
		
		this.treeEditor = new Ext.tree.TreeEditor(this, {
				 cancelOnEsc:true
				,completeOnEnter:true
				,ignoreNoChange:true
		});
		
		//renaming model
		this.treeEditor.on({
			complete: function(editor,newValue,oldValue)
			{
				if(newValue!=oldValue)
				editor.editNode.getOwnerTree().renameModel(editor.editNode,newValue,oldValue);
			}
		});
		
		//showing context menu for each node
		this.on({
			contextmenu: function(node, e) {
	            node.select();
	            var c = node.getOwnerTree().contextMenu;
	            c.contextNode = node;
	            c.showAt(e.getXY());
	        }
		});
		
		afStudio.models.treePanel.superclass.initComponent.apply(this, arguments);	
	}
	,onRender:function() {
		// call parent
		afStudio.models.treePanel.superclass.onRender.apply(this, arguments);
		
		this.root.expand();

		// prevent default browser context menu to appear 
		this.el.on({
			contextmenu:{fn:function(){return false;},stopEvent:true}
		});

	} // eo function onRender
	,contextMenu: new Ext.menu.Menu({
	        items: [{
			            id: 'delete-model'
			            ,text: 'Delete Model'
			            ,iconCls: 'icon-models-delete'
	        		}
	        		,{
			            id: 'edit-model'
			            ,text: 'Edit Model'
			            ,iconCls: 'icon-models-edit'
			        }
	        ],
	        listeners: {
	            itemclick: function(item) {
	                switch (item.id) {
	                    case 'delete-model':
	                    	var node = item.parentMenu.contextNode;
	                    	node.getOwnerTree().deleteModel(node);
	                        break;
	                    case 'edit-model':
	                    	var node = item.parentMenu.contextNode;
	                    	node.getOwnerTree().editModel(node);
	                        break;
	                }
	            }
	        }
	})
    ,getModel:function(node) {
		var model;

		// get path for non-root node
		if(node !== this.root) {
			model = node.text;
		}
		// path for root node is it's path attribute
		else {
			model = node.attributes.path || '';
		}

		return model;
	}
	,getSchema:function(node) {
		return node.attributes.schema || '';
	}
	,deleteModel:function(node)
	{
		Ext.Msg.show({
			 title:'Delete'
			,msg:this.reallyWantText + ' delete <b>' + this.getModel(node) + '</b> model?'
			,icon:Ext.Msg.WARNING
			,buttons:Ext.Msg.YESNO
			,width:400
			,scope:this
			,fn:function(response) {
				// do nothing if answer is not yes
				if('yes' !== response) {
					this.getEl().dom.focus();
					return;
				}
				// setup request options
				var options = {
					 url:this.url
					,method:this.method
					,scope:this
					//,callback:this.cmdCallback
					,node:node
					,params:{
						 cmd:'delete'
						,model:this.getModel(node)
						,schema:this.getSchema(node)
					},
					success: function(response, opts) {
				      var response = Ext.decode(response.responseText);
				      
				      if(response.success)
				      {
				      	node.remove();
				      	
				      	afStudio.vp.layout.west.items[0].root.reload();
				      	
				      	if(response.console)
				      	{
				      		afStudio.vp.layout.south.panel.body.dom.innerHTML+=response.console;
							afStudio.vp.layout.south.panel.body.scroll( "bottom", 1000000, true );
				      	}				      	
				      }
				      else
				      {
				      }
				      
				      Ext.Msg.show({
						 title:response.success?'Success':'Failure'
						,msg:response.message
						,buttons:Ext.Msg.OK
						,width:400
				      });
				    }
				};
				Ext.Ajax.request(options);
			}
		});
	}
	,renameModel:function(node,newValue,oldValue)
	{
		Ext.Msg.show({
			 title:'Rename'
			,msg:this.reallyWantText + ' rename model\'s phpName from <b>' + oldValue + '</b> to <b>' + newValue + '</b>?'
			,icon:Ext.Msg.WARNING
			,buttons:Ext.Msg.YESNO
			,width:400
			,scope:this
			,fn:function(response) {
				// do nothing if answer is not yes
				if('yes' !== response) {
					node.setText(oldValue);
					this.getEl().dom.focus();
					return;
				}
				// setup request options
				var options = {
					 url:this.url
					,method:this.method
					,scope:this
					//,callback:this.cmdCallback
					,node:node
					,params:{
						 cmd:'rename'
						,model:oldValue
						,renamedModel:newValue
						,schema:this.getSchema(node)
					},
					success: function(response, opts) {
				      var response = Ext.decode(response.responseText);
				      
				      if(response.success)
				      {
				      	afStudio.vp.layout.west.items[0].root.reload();
				      	
				      	if(response.console)
				      	{
				      		afStudio.vp.layout.south.panel.body.dom.innerHTML+=response.console;
							afStudio.vp.layout.south.panel.body.scroll( "bottom", 1000000, true );
				      	}
				      }
				      else
				      {
				      	node.setText(oldValue);
				      }
				      
				      Ext.Msg.show({
						 title:response.success?'Success':'Failure'
						,msg:response.message
						,buttons:Ext.Msg.OK
						,width:400
				      });
				    }
				};
				Ext.Ajax.request(options);
			}
		});
	}
	,editModel:function(node)
	{
		//afStudio.vp.layout.center.panel.body.mask('Loading, please Wait...', 'x-mask-loading');
		
		var fieldsGrid=new afStudio.models.gridFieldsPanel({'title':'Editing '+this.getModel(node),'renderTo':afStudio.vp.layout.center.panel.items.items[0].getEl(),model:this.getModel(node),schema:this.getSchema(node)});
		
	}
}); 

// register xtype
Ext.reg('afStudio.models.treePanel', afStudio.models.treePanel);

// eof
