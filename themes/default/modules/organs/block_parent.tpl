<!-- BEGIN: main -->
<div class="menuparent_ograns">
    <ul class="clearfix">
        <!-- BEGIN: loop -->
        <li><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></li>
        <!-- END: loop -->
    </ul>
</div>
<div class="search_ograns">
	<form action="" method="post" onSubmit="return search_submit_form();">
		<table><tr>
        <td>{LANG.vieworg_search_title}</td>
        <td><input type="text" value="{text_search}" style="width:200px;" id="otextseach"/></td>
        <td>
        	<select name="organid" style="width:230px;padding:1px" id="organid">
        		<option value="0">{LANG.all_title}</option>
                <!-- BEGIN: parent_loop -->
                <option value="{PAR.organid}">{PAR.xtitle}</option>
                <!-- END: parent_loop -->
        	</select>
        </td>
        <td><input type="button" value="{LANG.search_submit}" onClick="search_submit_form()"/></td>
        </tr></table>
    </form>
</div>
<!-- END: main -->