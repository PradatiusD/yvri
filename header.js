(function addMobileNavigation($){
	var $menuButton = $('<li id="menuButton" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home"><i class="fa fa-bars"></i><a href="#">Menu</a></li>');
	var $navMenu    = $('#menu-primary-menu');

	// Search for About us and hide it on mobile
	$navMenu.find('li').each(function(){
		var $this = $(this);

		if ($this.text().indexOf('About Us')>-1) {
			$this.addClass('about-us-nav');
		}
	});

	$navMenu.prepend($menuButton);
	$menuButton.click(function(e){
		e.preventDefault();
		$navMenu.toggleClass('pd-nav-expanded');
	});
})(jQuery);