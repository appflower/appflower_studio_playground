Ext.override(Ext.tree.TreeEditor, {
	
	onSpecialKey : function(field, e){
        var k = e?e.getKey():Ext.EventObject.getKey();
        if(k == Ext.EventObject.ESC){
            if(e)e.stopEvent();
            this.cancelEdit();
        }else if(k == Ext.EventObject.ENTER && !Ext.EventObject.hasModifier()){
            if(e)e.stopEvent();            
            this.completeEdit();
        }
    }
});