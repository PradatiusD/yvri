(function($){
	var $menuButton = $('<li id="menuButton" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home"><a href="#">Menu</a></li>');
	var $navMenu    = $('#menu-primary-menu');

	$navMenu.prepend($menuButton);
	$menuButton.click(function(e){
		e.preventDefault();
		$navMenu.toggleClass('pd-nav-expanded');
	});
})(jQuery);