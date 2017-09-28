<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery/jquery.treeview.css" />
<script src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery/jquery.cookie.js" type="text/javascript"></script>
<script src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery/jquery.treeview.min.js" type="text/javascript"></script>
<div class="divscroll">
    <ul id="browser" class="filetree">
        {MENU}
    </ul>
</div>
<script type="text/javascript">
    $("#browser").treeview({
        persist: "cookie",
        collapsed: true,
        animated:"normal",
        unique: true
    });
</script>
<!-- END: main -->