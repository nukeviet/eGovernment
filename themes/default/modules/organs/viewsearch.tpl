<!-- BEGIN: main -->
<h2 style="font-weight:bold">{LANG.vieworg_search_result} : </h2>
<div class="view_org clearfix">
    <!-- BEGIN: loop -->
    <div class="items_gird">
        <div class="content">
            <!-- BEGIN: img --><a href="{ROW.link}"><img src="{ROW.photo}"></a><!-- END: img --> 
            <br /><span style="font-weight:700"><a href="{ROW.link}">{ROW.name}</a></span> 
            <br /><span>{ROW.position}</span>
            <br /><span style="color:#FF0000">{LANG.vieworg_birthday} {ROW.birthday}</span>
        </div>
    </div>
    <!-- END: loop -->
</div>
<!-- BEGIN: pages -->
<div style="line-height:22px; text-align:right">{html_pages}</div>
<!-- END: pages -->
<!-- BEGIN: nodata -->
<center>{LANG.vieworg_search_nodata}</center>
<!-- END: nodata -->
<!-- END: main -->
