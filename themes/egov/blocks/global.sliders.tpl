<!-- BEGIN: main  -->
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/jssor.slider-21.1.5.mini.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/jssor.slider.css" />

<script type="text/javascript">
jQuery(document).ready(function ($) {

var jssor_1_SlideshowTransitions = [
{$Duration:1200,y:1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
{$Duration:1200,x:1,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1200,x:-1,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
{$Duration:1200,y:-1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
];

var jssor_1_options = {
$AutoPlay: true,
$FillMode: 5,
$SlideshowOptions: {
$Class: $JssorSlideshowRunner$,
$Transitions: jssor_1_SlideshowTransitions,
$TransitionsOrder: 1
},
$ArrowNavigatorOptions: {
$Class: $JssorArrowNavigator$
},
$BulletNavigatorOptions: {
$Class: $JssorBulletNavigator$
}

};

var jssor_1_slider = new $JssorSlider$("jssor_2", jssor_1_options);

//responsive code begin
//you can remove responsive code if you don't want the slider scales while window resizing
function ScaleSlider() {
var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
if (refSize) {
refSize = Math.min(refSize, 1366);
jssor_1_slider.$ScaleWidth(refSize);
}
else {
window.setTimeout(ScaleSlider, 30);
}
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
//responsive code end
});

</script>

<div class="slider fix-slider-body">
	<div class="slider_botton">
		<div class="">
			<div id="jssor_2" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1080px; height: 395px; visibility: hidden; background: #fff;">
				<!-- Loading Screen -->
				<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					<div style="position:absolute;display:block;background:url('{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				</div>
				<div data-u="slides" class="sliders" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1080px; height: 395px; overflow: hidden;text-align: center">
					<!-- BEGIN: loop -->
					<div data-p="112.50" class="sliders" style="display: none;">
						<!-- BEGIN: type_swf -->
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="{DATA.file_width}" height="{DATA.file_height}" >
							<param name="wmode" value="transparent" />
							<param name="movie" value="{DATA.file_image}" />
							<param name="quality" value="high" />
							<param name="menu" value="false" />
							<param name="seamlesstabbing" value="false" />
							<param name="allowscriptaccess" value="samedomain" />
							<param name="loop" value="true" />
							<!--[if !IE]> <-->
							<object type="application/x-shockwave-flash" width="{DATA.file_width}" height="{DATA.file_height}" data="{DATA.file_image}" >
								<param name="wmode" value="transparent" />
								<param name="pluginurl" value="http://www.adobe.com/go/getflashplayer" />
								<param name="loop" value="true" />
								<param name="quality" value="high" />
								<param name="menu" value="false" />
								<param name="seamlesstabbing" value="false" />
								<param name="allowscriptaccess" value="samedomain" />
							</object>
							<!--> <![endif]-->
						</object>
						<!-- BEGIN: fix_link -->
						<a href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}" class="link" style="width:{DATA.file_width}px; height:{DATA.file_height}px">&nbsp;</a>
						<!-- END: fix_link -->
						<!-- END: type_swf -->
						<!-- BEGIN: type_image_link -->
						<a href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}"> <img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}" height="{DATA.file_height}"/> </a>
						<!-- END: type_image_link -->

						<!-- BEGIN: type_image -->
						<img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}" class="img-thumbnail class-thumbnail"    height="{DATA.file_height}"/>
						<!-- END: type_image -->
					</div>
					<!-- END: loop -->
				</div>
				<span data-u="arrowleft" class="jssora22l" data-autocenter="2"></span>
				<span data-u="arrowright" class="jssora22r" data-autocenter="2"></span>
			</div>
		</div>
	</div>
</div>

<!-- END: main -->