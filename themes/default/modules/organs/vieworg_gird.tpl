<!-- BEGIN: main -->
<div class="view_org">
	<div class="div_header">
		<h2>{DATA.title} {admin_link}</h2>
        <!-- BEGIN: address -->
        <span>{LANG.vieworg_address} :</span><span>{DATA.address}</span> <br />
        <!-- END: address -->
        <!-- BEGIN: phone -->
        <span>{LANG.vieworg_phone} :</span><span>{DATA.phone}</span><br />
        <!-- END: phone -->
        <!-- BEGIN: fax -->
        <span>{LANG.vieworg_fax} : {DATA.fax}</span> <br>
        <!-- END: fax -->
        <!-- BEGIN: website -->
        <span>{LANG.vieworg_website} : </span><span>{DATA.website}</span> <br />
        <!-- END: website -->
    </div>
    <div class="TabView" id="TabView">
        <div class="Tabs">
        	<!-- BEGIN: tab_about -->
            <a href="#">{LANG.vieworg_about}</a> 
            <!-- END: tab_about -->
            <!-- BEGIN: tab_person -->
            <a href="#">{LANG.vieworg_person}</a>
            <!-- END: tab_person -->
        </div>
        <div class="Pages">
        	<!-- BEGIN: about -->
            <div class="Page">
                {DATA.description}
            </div>
            <!-- END: about -->
            <!-- BEGIN: person -->
            <div class="Page">
            	<div class="clearfix">
                    <!-- BEGIN: loop -->
                    <div class="items_gird">
                    	<div class="content">
                            <!-- BEGIN: img --><a href="{ROW.link}"><img src="{ROW.photo}"></a><!-- END: img --> 
                            <br /><span style="font-weight:700"><a href="{ROW.link}">{ROW.name}</a></span> 
                            <br /><span>{ROW.position}</span>
                            <br /><span style="color:#FF0000">{LANG.vieworg_birthday} {ROW.birthday}</span>
                        </div>
                    </div>
                    <!-- END: loop -->
                </div>
                <!-- BEGIN: pages -->
                <div style="line-height:22px; text-align:right">{html_pages}</div>
                <!-- END: pages -->
            </div> 
            <!-- END: person -->
        </div>
    </div>    
</div>
<script language="javascript" type="text/javascript">
	tabview_initialize('TabView');
</script>
<!-- END: main -->