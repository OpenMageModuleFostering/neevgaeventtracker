jQuery(document).ready(function(){
	if(gaModuleEnable == 1){
	jQuery.each(gaJsonString, function(i, object) {
		var forum = object;
		switch(i){
			case 'Classname':
				jQuery.each(forum, function(i, object) {
					jQuery('.'+object.name).click(function(){					
						var action = object.action;
						var label = object.label;	

						if(value.toString() == ''){
							value = jQuery(this).parent().parent().children("a").attr("title");
						}
					
						_gaq.push(['_trackEvent', action.toString(), label.toString(),value.toString(), 1 ]);
					});				
				});
			case 'ID':
				jQuery.each(forum, function(i, object) {				
					jQuery('#'+object.name).click(function(){						
						var action = object.action;
						var label = object.label;
						if(value.toString() == ''){
							value = jQuery(this).parent().parent().children("a").attr("title");
						}
						_gaq.push(['_trackEvent', action.toString(), label.toString(),value.toString(), 1 ]);
					});			
				});
			case 'URL':
				jQuery.each(forum, function(i, object) {					
					jQuery('a[href="'+object.name+'"]').click(function(){										;
						var action = object.action;
						var label = object.label;	
						if(value.toString() == ''){
							value = jQuery(this).parent().parent().children("a").attr("title");
						}				
						_gaq.push(['_trackEvent', action.toString(), label.toString(),value.toString(), 1 ]);
					});					
				});		
	    }
	});
	}
});
