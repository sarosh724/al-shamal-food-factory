/*
Name: 			View - Landing
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	12.0.0
*/

(($ => {
    let timeout = false;

    $('#demoFilter').keyup(() => {

		if(!timeout) {

			timeout = true;

			$('html, body').animate({
				scrollTop: $('#demos').offset().top - 90
			}, 600, 'easeOutQuad', () => {
				$('body').removeClass('scrolling');
				timeout = false;
			});

		}

	});

    $('.custom-banner-content-item-1').on('click', () => {		
	});
})).apply( this, [ jQuery ]);
