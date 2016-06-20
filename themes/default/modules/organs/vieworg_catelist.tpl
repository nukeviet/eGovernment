<!-- BEGIN: main -->

<!-- BEGIN: cateloop -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <caption>
            <a href="{CATE.link}">{CATE.title}</a>
            <!-- BEGIN: suborgan -->
            <!-- Single button -->
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <!-- BEGIN: loop -->
                    <li>
                        <a href="{SUBORGAN.link}">{SUBORGAN.title}</a>
                    </li>
                    <!-- END: loop -->
                </ul>
            </div>
            <!-- END: suborgan -->
        </caption>
        <thead>
            <tr>
                <th class="text-center">{LANG.vieworg_no}</th>
                <th>{LANG.vieworg_name}</th>
                <th>{LANG.vieworg_position}</th>
                <th>{LANG.vieworg_birthday}</th>
                <th>{LANG.vieworg_mobile_title}</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">{ROW.no}</td>
                <td><a href="{ROW.link}">{ROW.name}</a></td>
                <td>{ROW.position}</td>
                <td>{ROW.birthday}</td>
                <td>{ROW.mobile}</td>
            </tr><!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: cateloop -->

<!-- END: main -->