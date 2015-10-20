jQuery( document ).ready(function( $ ) {
	//would like to do this via mixins later, but for now we're hacking
    $('div.widget.panel ul').addClass("list-group");
	$('div.widget.panel li').addClass("list-group-item");
	$('div.widget.panel p, div.widget.panel form, div.widget.panel div.tagcloud').wrap( "<div class='panel-body' />");
});