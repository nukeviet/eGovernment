<!-- BEGIN: main -->
<div class="panel panel-primary">
    <div class="panel-heading">
        {DATA.title}
    </div>
    <div class="panel-body">
        <ul style="padding: 0">
            <!-- BEGIN: address -->
            <li>
                <strong>{LANG.vieworg_address}:</strong> {DATA.address}
            </li>
            <!-- END: address -->
            <!-- BEGIN: phone -->
            <li>
                <strong>{LANG.vieworg_phone}:</strong> {DATA.phone}
            </li>
            <!-- END: phone -->
            <!-- BEGIN: fax -->
            <li>
                <strong>{LANG.vieworg_fax}:</strong> {DATA.fax}
            </li>
            <!-- END: fax -->
            <!-- BEGIN: website -->
            <li>
                <strong>{LANG.vieworg_website}:</strong> {DATA.website}
            </li>
            <!-- END: website -->
        </ul>
        <!-- BEGIN: about -->
        <p>{DATA.description}</p>
        <!-- END: about -->

        <p class="text-center">
            {admin_link}
        </p>

        <!-- BEGIN: person -->
        <hr />
        <div class="row">
            <!-- BEGIN: loop -->
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                    <div style="height: {HEIGHT}px">
                        <a href="{ROW.link}" title="{ROW.name}"><img src="{ROW.photo}" style="max-height: {HEIGHT}px" alt="{ROW.name}"></a>
                    </div>
                    <div class="caption text-center">
                        <h3><a href="{ROW.link}" title="{ROW.name}">{ROW.name}</a></h3>
                        <p>
                            {ROW.position}<br />
                            {ROW.birthday}
                        </p>
                    </div>
                </div>
            </div>
            <!-- END: loop -->
        </div>
        <!-- END: person -->
    </div>
</div>

<!-- BEGIN: pages -->
<div class="text-center">
    {html_pages}
</div>
<!-- END: pages -->

<!-- END: main -->