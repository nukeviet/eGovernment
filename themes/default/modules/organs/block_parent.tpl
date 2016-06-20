<!-- BEGIN: main -->
<ul class="clearfix" style="padding: 0">
    <!-- BEGIN: loop -->
    <li>
        <a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a>
    </li>
    <!-- END: loop -->
</ul>
<div class="search_ograns">
    <form action="" method="post" onSubmit="return search_submit_form();">
        <div class="form-group">
            <label>{LANG.vieworg_search_title}</label>
            <input class="form-control" type="text" value="{text_search}" id="otextseach" />
        </div>
        
        <div class="form-group">
            <label>{LANG.vieworg_search_title}</label>
            <select class="form-control" name="organid" id="organid">
                <option value="0">{LANG.all_title}</option>
                <!-- BEGIN: parent_loop -->
                <option value="{PAR.organid}">{PAR.xtitle}</option>
                <!-- END: parent_loop -->
            </select>
        </div>
        
        <div class="form-group">
            <input type="button" value="{LANG.search_submit}" onClick="search_submit_form()" class="btn btn-primary" />
        </div>
    </form>
</div>
<!-- END: main -->