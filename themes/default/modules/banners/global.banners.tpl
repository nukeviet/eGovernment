<!-- BEGIN: main  -->
<!-- BEGIN: loop -->
<div class="nv-block-banners">
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
    <a rel="nofollow" href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}" class="link" style="width:{DATA.file_width}px; height:{DATA.file_height}px">&nbsp;</a>
    <!-- END: fix_link -->
    <!-- END: type_swf -->
    <!-- BEGIN: type_image_link -->
    <a rel="nofollow" href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}"> <img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}" height="{DATA.file_height}" /> </a>
    <!-- END: type_image_link -->
    <!-- BEGIN: type_image -->
    <img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}" height="{DATA.file_height}" />
    <!-- END: type_image -->
    <!-- BEGIN: bannerhtml -->
    <div class="clearfix text-left">
        {DATA.bannerhtml}
    </div>
    <!-- END: bannerhtml -->
</div>
<!-- END: loop -->
<!-- END: main -->