// create namespace for plugins
/**
 * Different from Extjs-2 Version
 */

Ext.namespace('Ext.ux.plugins');
Ext.ux.plugins.HelpText = {
    init: function(container){
        Ext.apply(container, {
            onRender: container.onRender.createSequence(function(ct, position){
                // if there is helpText create a div and display the text below the field
                if (typeof this.helpText == 'string') {
                    this.wrap = this.wrap || this.el.wrap();
                	var ins = this.el.dom;
                	ins = this.wrap.dom;
                    Ext.DomHelper.append(ins.parentNode,{
                        tag: 'div',
                        cls: typeof this.helpTextClass != 'undefined' ? this.helpTextClass : '',
                        style: typeof this.helpTextStyle != 'undefined' ? this.helpTextStyle : 'clear: right; font-size: 11px; color: #888888;',
                        html: this.helpText
                    });                   
                }
            }),// end of function onRender
            findByClassName: function(div,className){
        		var curDiv;
        		while(curDiv = div.parentNode){
        			if(curDiv.className.match(className)){
        				return curDiv
        			}
        			div = curDiv;
        		}
        		return false;
        	}
        });
        
    } // end of function init
};
Ext.ux.plugins.HelpText = Ext.extend(Ext.ux.plugins.HelpText, Ext.util.Observable);
// end of file