function getNextPage(target) {
	var target = $(target);
	var url = target.attr('href');
	$.get(url, function(data) {
		target.parent().find('img').remove();
		target.parent().after(data);
		target.remove();
	});
	
	target.before('<img src="/ajax-loader.gif" />');
	target.hide();	
	return false;
}

$(function() {
	
	$('a.next-page-ajax').each(function() {
		getNextPage(this);
	});
	
});
