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
            	<!-- BEGIN: loop -->
                <div class="items clearfix">
                	<div class="fl clearfix" style="width:80%">
                        <span>{ROW.position} : </span>
                        <span><strong><a href="javascript:void(0)" onclick="viewper('{ROW.personid}')" >{ROW.name}</a></strong></span>
                        <span>{LANG.vieworg_phone} : </span><span>{ROW.phone}</span>
                        <span>{LANG.vieworg_email} :</span><span><a href="mailto:{ROW.email}">{ROW.email}</a></span>
                        <span>{LANG.viewper_address} :</span><span>{ROW.address}</span>
                    </div>
                    <!-- BEGIN: img -->
                    <a href="{ROW.link}"><img src="{ROW.photo}"></a>
                    <!-- END: img -->
                    <div class="clear"></div>
                    <div id="viewper_{ROW.personid}"></div>
                </div>
                <!-- END: loop -->
            </div> 
            <!-- END: person -->
        </div>
    </div>    
</div>
<script language="javascript" type="text/javascript">
	tabview_initialize('TabView');
</script>
<!-- END: main -->