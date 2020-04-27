<!-- BEGIN: main -->
<div id="users">
    <form class="form-inline" action="{FORM_ACTION}" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <td width="260">{LANG.config_type_main}</td>
                    <td><select class="form-control" name="type_main">
                            <!-- BEGIN: type_main -->
                            <option value="{TYPE_MAIN.key}"{TYPE_MAIN.selected}>{TYPE_MAIN.title}</option>
                            <!-- END: type_main -->
                    </select></td>
                </tr>
            </tbody>
        </table>
        <div style="text-align: center; padding-top: 15px">
            <input class="btn btn-primary" type="submit" name="submit" value="{LANG.faq_save}" />
        </div>
    </form>
</div>
<!-- END: main -->