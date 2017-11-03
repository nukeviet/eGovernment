<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-danger">{ERROR}</div>
<!-- END: error -->
<div id="users">
    <form action="{FORM_ACTION}" method="post">
        <div class="table-responsive" style="margin-top: 10px">
            <table class="table table-striped table-bordered table-hover">
                <colgroup>
                    <col class="w300" />
                </colgroup>
                <tbody>
                    <tr>
                        <td>{LANG.config_organ_view_main}</td>
                        <td>
                            <select name="organ_view_type_main" class="form-control w200">
                                <!-- BEGIN: view_type_main -->
                                <option value="{VIEW_TYPE_MAIN.key}" {VIEW_TYPE_MAIN.selected}>{VIEW_TYPE_MAIN.title}</option>
                                <!-- END: view_type_main -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.config_organ_view}</td>
                        <td>
                            <select name="organ_view_type" class="form-control w200">
                                <!-- BEGIN: view_type -->
                                <option value="{VIEW_TYPE.key}" {VIEW_TYPE.selected}>{VIEW_TYPE.title}</option>
                                <!-- END: view_type -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.config_per_page}</td>
                        <td>
                            <input type="text" name="per_page" value="{DATA.per_page}" class="form-control w100" />
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.config_thumb_size}</td>
                        <td>
                            <input type="text" name="thumb_width" value="{DATA.thumb_width}" class="form-control w100 pull-left" />
                            <span class="text-middle pull-left">&nbsp;x&nbsp;</span>
                            <input type="text" name="thumb_height" value="{DATA.thumb_height}" class="form-control w100 pull-left" />
                            <span class="text-middle pull-left">&nbsp;px&nbsp;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.email_require}</td>
                        <td>
                            <input type="checkbox" name="email_require" value="1" {EMAIL} />
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.phone_require}</td>
                        <td>
                            <input type="checkbox" name="phone_require" value="1" {PHONE} />
                        </td>
                    </tr>
                </tbody>
          </table>
        </div>
        <input type="submit" name="submit" value="{LANG.save}" class="btn btn-primary" />
    </form>
</div>
<!-- END: main -->