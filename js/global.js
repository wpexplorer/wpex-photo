jQuery(function($){
	$(document).ready(function(){
		
		//animate comments scroll
		function wpex_comment_scroll() {
			$(".comment-scroll a").click(function(event){
				event.preventDefault();
				$('html,body').animate({ scrollTop:$(this.hash).offset().top}, 'normal' );
			});
		} wpex_comment_scroll();
		
		//superFish
		$(function() {
			$("ul.sf-menu").superfish({
				delay: 200,
				autoArrows: true,
				dropShadows: false,
				animation: {opacity:'show', height:'show'},
				speed: 'fast'
			});
		});

		//responsive drop-down <== main nav
		$("<select />").appendTo("#navigation");
		$("<option />", {
			"selected": "selected",
			"value" : "",
			"text" : responsiveLocalize.text
		}).appendTo("#navigation select");
		$("#navigation a").each(function() {
			var el = $(this);
			$("<option />", {
				"value": el.attr("href"),
				"text": el.text()
			}).appendTo("#navigation select");
		});
		//open link
		$("#navigation select").change(function() {
			window.location = $(this).find("option:selected").val();
		});
		//uniform
		$("#navigation select").uniform();
	
	}); // end doc ready
}); // end function