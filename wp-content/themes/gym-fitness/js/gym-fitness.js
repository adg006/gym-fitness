$ = jQuery.noConflict();

$(document).ready(function(){

	/***** SLICKNAV FOR RESPONSIVE MENU *****/
	$('#menu-main-menu').slicknav();

	/***** BXSLIDER FOR TESTIMONIALS *****/
	$('.testimonials-list').bxSlider({ 
		controls: false
	});

	const headerScroll = document.querySelector('.navigation-bar');
	const rect = headerScroll.getBoundingClientRect();
	const topDistance = Math.abs(rect.top);
	fixedMenu(topDistance);
	
});

window.onscroll = () => {
	const scroll = window.scrollY;
	fixedMenu(scroll);
}

function fixedMenu(scroll){
	const headerScroll = document.querySelector('.navigation-bar');
	
	if(scroll > 300){
		headerScroll.classList.add('fixed-top');
	} else {
		headerScroll.classList.remove('fixed-top');
	}
}