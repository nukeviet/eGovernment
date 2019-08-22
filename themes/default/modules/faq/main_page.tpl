<!-- BEGIN: main -->
<!-- BEGIN: welcome -->
<div class="well">{WELCOME}.</div>
<!-- END: welcome -->
<!-- BEGIN: subcats -->
<ul class="cd-faq-categories" style="left: 0px; top: 0px; transform: translateZ(0px);">
				<li class="side-tabs__header"><h4 class="t-heading -size-xs">{LANG.faq_categories}</h4></li>
				<!-- BEGIN: li -->
				<li class="name">{SUBCAT.name}</li>
				<!-- BEGIN: description -->
				<li><a class="selected" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {SUBCAT.description}</a></li>
				<!-- END: description -->
				<!-- END: li -->
</ul>
<!-- END: subcats -->
<!-- BEGIN: is_show_row -->
<div class="row">
				<div class="layout__main-content license-faqs h-mr0 cd-faq-items col-sm-18 col-md-19 col-sm-push-6 col-md-push-5" data-view="faqs">
								<div class="content-s -content-wide">
												<div class="e-box h-p2">
																<!-- BEGIN: detail -->
																<div id="sec{ROW.id}" class="secclass">
																				<h2 class="faq-section-general-questions">{ROW.title}</h2>
																				<h3 class="js-faq-question license-faqs__question" id="royalty-free-q">
																								<a href="#royalty-free-a">{ROW.question}</a>
																				</h3>
																				<div class="answer">
																								<strong>{LANG.faq_answer}:</strong><br /> {ROW.answer}
																				</div>
																</div>
																<!-- END: detail -->
												</div>
								</div>
				</div>
				<div class="col-sm-6 col-md-5 col-sm-pull-18 col-md-pull-19 menu">
								<div class="cd-faq-categories">
												<ul style="transform: translateZ(0px);">
																<li class="side-tabs__header"><h4 class="t-heading -size-xs">{LANG.faq_question}</h4></li>
																<!-- BEGIN: row -->
																<li><a class="selected" href="#sec{ROW.id}">{ROW.title}</a></li>
																<!-- END: row -->
												</ul>
								</div>
				</div>
</div>
<script type="text/javascript">
    $(window).bind('scroll', function() {
        if ($(window).scrollTop() > 250) {
            $('.menu').addClass('fixed');
        } else {
            $('.menu').removeClass('fixed');
        }
    });
</script>
<script>
    $(document).ready(function() {
        $("a[href*='#']:not([href='#])").click(function() {
            let target = $(this).attr("href");
            $('html,body').stop().animate({
                scrollTop : $(target).offset().top
            }, 1000);
            event.preventDefault();
        });
    });
</script>
<!-- END: is_show_row -->
<!-- END: main -->