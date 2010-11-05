Ext.ns('afStudio.models');

afStudio.models.gridFieldsPanel = Ext.extend(Ext.grid.GridPanel, {
	
	initComponent: function(){
		
		var gridFields=this;
		
		// Create a standard HttpProxy instance.
		var proxy = new Ext.data.HttpProxy({
		    url: '/appFlowerStudio/models'
		});
		
		// Typical JsonReader.  Notice additional meta-data params for defining the core attributes of your json-response
		var reader = new Ext.data.JsonReader({
		    totalProperty: 'totalCount',
		    successProperty: 'success',
		    idProperty: 'id',
		    root: 'rows',
		    messageProperty: 'message'  // <-- New "messageProperty" meta-data
		}, [
			{name: 'id', allowBlank: false}
		    ,{name: 'name', allowBlank: false}
		    ,{name: 'type', allowBlank: false}
		    ,{name: 'size', allowBlank: true}
		    ,{name: 'primary_key', allowBlank: true}
		    ,{name: 'required', allowBlank: true}
		    ,{name: 'autoincrement', allowBlank: true}
		    ,{name: 'default_value', allowBlank: true}
		    ,{name: 'foreign_table', allowBlank: true}
		    ,{name: 'foreign_key', allowBlank: true}
		]);
		
		// The new DataWriter component.
		var writer = new Ext.data.JsonWriter({
		    encode: true   // <-- don't return encoded JSON -- causes Ext.Ajax#request to send data using jsonData config rather than HTTP params
		    ,writeAllFields: true
		});
		
		var store = new Ext.data.Store({
		    id: 'user'
		    ,restful: false
		    ,proxy: proxy
		    ,reader: reader
		    ,writer: writer
		    ,baseParams: {
		    	model: gridFields.model
		    	,schema: gridFields.schema
		    }
		});
		
		// load the store immeditately
		store.load();
		
		store.on({
			beforewrite: function(proxy,action,rs,options,arg){
				options.oldName=rs.fields.items[1].name;
				
				console.log(options);
			}
		});
		
		Ext.util.Observable.capture(store, function(e){console.info(e)});
				
		var columns =  [
		    {header: "Name", width: 100, sortable: true, dataIndex: 'name', editor: new Ext.form.TextField({})}
		    ,{header: "Type", width: 100, sortable: true, dataIndex: 'type', editor: new Ext.form.TextField({})}
		    ,{header: "Size", width: 50, sortable: true, dataIndex: 'size', editor: new Ext.form.TextField({})}
		    ,{header: "Primary Key", width: 50, sortable: true, dataIndex: 'primary_key', editor: new Ext.form.TextField({})}
		    ,{header: "Required", width: 50, sortable: true, dataIndex: 'required', editor: new Ext.form.TextField({})}
		    ,{header: "Autoincrement", width: 50, sortable: true, dataIndex: 'autoincrement', editor: new Ext.form.TextField({})}
		    ,{header: "Default value", width: 100, sortable: true, dataIndex: 'default_value', editor: new Ext.form.TextField({})}
		     ,{header: "Foreign table", width: 100, sortable: true, dataIndex: 'foreign_table', editor: new Ext.form.TextField({})}
		      ,{header: "Foreign key", width: 50, sortable: true, dataIndex: 'foreign_key', editor: new Ext.form.TextField({})}
		];
		
		var editor = new Ext.ux.grid.RowEditor({
	        saveText: 'Update'
	    });
		
		var config = {			
			iconCls: 'icon-grid',
	        frame: true,
	        closable:true,
	        autoScroll: true,
	        height: 300,
	        store: store,
	        plugins: [editor],
	        columns : columns,
	        style: 'padding-bottom:10px;',
	        tbar: [{
	            text: 'Insert after',
	            iconCls: 'icon-add',
	            handler:function(btn, ev){
	            	var rec = gridFields.getSelectionModel().getSelected();
	            	var index=rec?gridFields.store.indexOf(rec)+1 : 0;
	            	
	            	var u = new gridFields.store.recordType({
			            name : '',
			            type: 'INT',
			            size : '11'
			        });
			        editor.stopEditing();
			        gridFields.store.insert(index, u);
			        editor.startEditing(index);
	            }
	        }, '-',{
	            text: 'Insert before',
	            iconCls: 'icon-add',
	            handler:function(btn, ev){
	            	var rec = gridFields.getSelectionModel().getSelected();
	            	var index=rec?gridFields.store.indexOf(rec) : 0;
	            	
	            	var u = new gridFields.store.recordType({
			            name : '',
			            type: 'INT',
			            size : '11'
			        });
			        editor.stopEditing();
			        gridFields.store.insert(index, u);
			        editor.startEditing(index);
	            }
	        }, '-', {
	            text: 'Delete',
	            iconCls: 'icon-add',
	            handler:function(btn, ev){
	            	
	            	var rec = gridFields.getSelectionModel().getSelected();
			        if (!rec) {
			            return false;
			        }
			        gridFields.store.remove(rec);
	            }
	        }, '-'],
	        viewConfig: {
	            forceFit: true
	        },
	        tools:[{
	        		id:'close'
	        		,handler:function(e,te,p,tc){
	        			p.destroy();
	        		}
	        	}]
		};
		
		// apply config
		Ext.apply(this, Ext.apply(this.initialConfig, config));
				
		afStudio.models.gridFieldsPanel.superclass.initComponent.apply(this, arguments);	
	}
	,onRender:function() {
		// call parent
		afStudio.models.gridFieldsPanel.superclass.onRender.apply(this, arguments);

	} // eo function onRender
}); 

// register xtype
Ext.reg('afStudio.models.gridFieldsPanel', afStudio.models.gridFieldsPanel);

// eof
