<!-- BEGIN: main -->
<form action="{DATA.action}" method="get" role="form">
    <!-- BEGIN: no_rewrite -->
	<input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}"/>
	<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}"/>
	<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}"/>
    <!-- END: no_rewrite -->
    <!-- BEGIN: layouth -->
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" value="{DATA.q}" name="q" class="form-control" placeholder="{LANG.vieworg_name}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" value="{DATA.e}" name="e" class="form-control" placeholder="{LANG.email}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" value="{DATA.p}" name="p" class="form-control" placeholder="{LANG.phone}"/>
            </div>
        </div>
        <div class="col-md-6"><input type="submit" value="{LANG.search_submit}" class="btn btn-block btn-primary"/></div>
    </div>
    <!-- END: layouth -->
    <!-- BEGIN: layoutv -->
    <div class="form-group">
        <label>{LANG.vieworg_name}:</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" value="{DATA.q}" name="q" class="form-control" placeholder="{LANG.vieworg_name}"/>
        </div>
    </div>
    <div class="form-group">
        <label>{LANG.email}:</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" value="{DATA.e}" name="e" class="form-control" placeholder="{LANG.email}"/>
        </div>
    </div>
    <div class="form-group">
        <label>{LANG.phone}:</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" value="{DATA.p}" name="p" class="form-control" placeholder="{LANG.phone}"/>
        </div>
    </div>
    <input type="submit" value="{LANG.search_submit}" class="btn btn-primary"/>
    <!-- END: layoutv -->
</form>
<!-- END: main -->