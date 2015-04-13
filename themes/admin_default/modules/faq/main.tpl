<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<caption>{TABLE_CAPTION}</caption>
	    <thead>
	        <tr>
	            <!-- BEGIN: is_cat1 -->
	            <th>
	                {LANG.faq_pos}
	            </th>
	            <!-- END: is_cat1 -->
	            <th>
	                {LANG.faq_title_faq}
	            </th>
	            <th>
	                {LANG.faq_catid_faq}
	            </th>
	            <th style="width:60px;white-space:nowrap;text-align:center">
	                {LANG.faq_active}
	            </th>
	            <th style="width:150px;white-space:nowrap;text-align:center">
	                {LANG.faq_feature}
	            </th>
	        </tr>
	    </thead>
	    <tbody>
	    <!-- BEGIN: row -->
	        <tr>
	            <!-- BEGIN: is_cat2 -->
	            <td style="width:15px">
	                <select class="form-control" name="weight" id="weight{ROW.id}" onchange="nv_chang_row_weight({ROW.id});">
	                    <!-- BEGIN: weight -->
	                    <option value="{WEIGHT.pos}"{WEIGHT.selected}>{WEIGHT.pos}</option>
	                    <!-- END: weight -->
	                </select>
	            </td>
	            <!-- END: is_cat2 -->
	            <td>
	                {ROW.title}
	            </td>
	            <td>
	                <a href="{ROW.catlink}">{ROW.cattitle}</a>
	            </td>
	            <td style="width:60px;white-space:nowrap;text-align:center">
	                <input name="status" id="change_status{ROW.id}" value="1" type="checkbox"{ROW.status} onclick="nv_chang_row_status({ROW.id})" />
	            </td>
	            <td style="width:150px;white-space:nowrap;text-align:center">
	                <span class="edit_icon"><a href="{EDIT_URL}">{GLANG.edit}</a></span>
	                &nbsp;&nbsp;<span class="delete_icon"><a href="javascript:void(0);" onclick="nv_row_del({ROW.id});">{GLANG.delete}</a></span>
	            </td>
	        </tr>
	    <!-- END: row -->
	    <tbody>
	    <!-- BEGIN: generate_page -->
	    <tr class="footer">
	        <td colspan="8">
	            {GENERATE_PAGE}
	        </td>
	    </tr>
	    <!-- END: generate_page -->
	</table>
</div>
<div style="margin-top:8px;">
    <a class="button1" href="{ADD_NEW_FAQ}"><span><span>{LANG.faq_addfaq}</span></span></a>
</div>
<!-- END: main -->