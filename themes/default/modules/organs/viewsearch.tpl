<!-- BEGIN: main -->
<h2>{LANG.vieworg_search_result}</h2>
<div class="row">
    <!-- BEGIN: loop -->
    <div class="col-sm-8 col-md-6">
        <div class="thumbnail">
            <div style="height: {HEIGHT}px">
                <a href="{ROW.link}" title="{ROW.name}"><img src="{ROW.photo}" style="max-height: {HEIGHT}px" alt="{ROW.name}"></a>
            </div>
            <div class="caption text-center">
                <h3><a href="{ROW.link}" title="{ROW.name}">{ROW.name}</a></h3>
                <p>
                    {ROW.position}
                    <br />
                    {ROW.birthday}
                </p>
            </div>
        </div>
    </div>
    <!-- END: loop -->
</div>
<!-- BEGIN: pages -->
<div class="text-center">
    {html_pages}
</div>
<!-- END: pages -->
<!-- BEGIN: nodata -->
<div class="alert alert-info">
    {LANG.vieworg_search_nodata}
</div>
<!-- END: nodata -->
<!-- END: main -->