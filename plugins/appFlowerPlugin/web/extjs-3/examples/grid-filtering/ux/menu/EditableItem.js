Ext.namespace("Ext.ux.menu");
Ext.ux.menu.EditableItem = Ext.extend(Ext.menu.BaseItem, {
    itemCls : "x-menu-item",
    hideOnClick: false,
    
    initComponent: function(){
    	this.addEvents({keyup: true});
    	
		this.editor = this.editor || new Ext.form.TextField();
		if(this.text)
			this.editor.setValue(this.text);
    },
    
    onRender: function(container){
        var s = container.createChild({
        	cls: this.itemCls,
        	html: '<img id="my" src="' + (Ext.BLANK_IMAGE_URL)+ '" class="x-menu-item-icon'+(this.iconCls?' '+this.iconCls:'')+'" style="margin: 3px 7px 2px 2px;" />'
        });
        
        Ext.apply(this.config, {width: 125});
        this.editor.render(s);
        
        this.el = s;
        this.relayEvents(this.editor.el, ["keyup"]);
        
        if(Ext.isGecko)
			s.setStyle('overflow', 'auto');
		
		//added next line to hide the class name created automatically by Extjs
		//@author radu
		container.dom.firstChild.className="x-menu-item-icon";
			
		if(this.iconCls&&this.iconCls=='ux-rangemenu-lt')
		{
			s.dom.firstChild.style.margin='28px 7px 2px 2px';
		}
		else if(this.iconCls&&this.iconCls=='ux-rangemenu-eq')
		{
			s.dom.firstChild.style.margin='60px 7px 2px 2px';
		}
			
		this.editor.el.setStyle('marginLeft','0px');	
			
        Ext.ux.menu.EditableItem.superclass.onRender.apply(this, arguments);
    },
    
    getValue: function(){
    	return this.editor.getValue();
    },
    
    setValue: function(value){    	
    	this.editor.setValue(value);
    },
    
    isValid: function(preventMark){
    	return this.editor.isValid(preventMark);
    }
});