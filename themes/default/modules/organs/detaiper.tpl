<!-- BEGIN: main -->
<div class="detail_person">
	<table width="100%"><tr>
    	<!-- BEGIN: photo -->
    	<td width="85"><a href="{DATA.imgsrc}" rel="shadowbox"><img src="{DATA.photo}" class="detail_img" /></a></td>
        <!-- END: photo -->
        <td>
            <ul class="ullist">
                <li><span>{LANG.vieworg_name} : </span><strong style="font-size:14px">{DATA.name}</strong></li>
                <li><span>{LANG.vieworg_position} : </span><strong>{DATA.position}</strong></li>
                <li><span>{LANG.vieworg_position_other} : </span><strong>{DATA.position_other}</strong></li>
                <li><span>{LANG.vieworg_ofogran} : </span><strong>{DATA.ofogran}</strong></li>
                <li><span>{LANG.vieworg_mobile_title} : </span><strong>{DATA.mobile}</strong></li>
            </ul>
        </td>
    </tr></table>
    <table width="100%"><tr>
        <td>
            <ul class="ullist">
            	<li><span>{LANG.vieworg_birthday} : </span><strong>{DATA.birthday}</strong></li>
                <li><span>{LANG.vieworg_dayinto} : </span><strong>{DATA.dayinto}</strong></li>
                <li><span>{LANG.vieworg_email} : </span><strong><a href="mailto:{ROW.email}">{DATA.email}</a></strong></li>
                <li><span>{LANG.vieworg_phone} : </span><strong>{DATA.phone}</strong>
                &nbsp;&nbsp;&nbsp; {LANG.vieworg_phone_ext}: <strong>{DATA.phone_ext}</strong></li>
                <li><span>{LANG.vieworg_marital_status} : </span><strong>{DATA.marital_status}</strong></li>
                <li><span>{LANG.viewper_address} : </span><strong>{DATA.address}</strong></li>
            </ul>
        </td>
    </tr></table>
    <table width="100%">
        <tr><td>
            <ul class="ullist">
            	<li>{LANG.vieworg_professional} : <strong>{DATA.professional}</strong></li>
            </ul>
        </tr></td>
        <tr><td>
            {DATA.description}
        </tr></td>
        <tr><td align="right">
            {admin_link}
        </tr></td>
    </table>
    
</div>
<!-- END: main -->
