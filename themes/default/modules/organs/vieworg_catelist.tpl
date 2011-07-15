<!-- BEGIN: main -->
<!-- BEGIN: cateloop -->
<div class="catelist">
    <h2><a href="{CATE.link}">{CATE.title}</a></h2>
    <div class="content">
        <table class="tabo">
            <thead><tr>
            	<td align="center" width="20">{LANG.vieworg_no}</td>
            	<td>{LANG.vieworg_name}</td>
                <td width="280">{LANG.vieworg_position}</td>
                <td  width="100">{LANG.vieworg_birthday}</td>
                <td  width="100">{LANG.vieworg_mobile_title}</td>
            </tr></thead>
            <!-- BEGIN: loop -->
            <tbody {bg}><tr>
            	<td align="center">{ROW.no}</td>
                <td><a href="{ROW.link}">{ROW.name}</a></td>
                <td>{ROW.position}</td>
                <td>{ROW.birthday}</td>
                <td>{ROW.mobile}</td>
            </tr></tbody>
            <!-- END: loop -->
        </table>
    </div>
</div>
<!-- END: cateloop -->
<!-- END: main -->
