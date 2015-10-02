/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010  12:48:35 PM
 */

function delete_one(class_name,lang_confirm,url_back){
	$('a.'+class_name).click(function(event){
		event.preventDefault();
		if (confirm(lang_confirm))
		{
			var href= $(this).attr('href');
			$.ajax({
				type: 'POST',
				url: href,
				data:'',
				success: function(data){
					alert(data);
					if (url_back !='') {
						window.location=url_back;
					}
				}
			});
		}
	});
}

// delete all items select checkbox
function delete_all(filelist,class_name,lang_confirm,lang_error,url_del,url_back){
	$('a.'+class_name).click(function(event){
		event.preventDefault();
		var listall = [];
		$('input[name="' + filelist +'"]:checked').each(function(){
			listall.push($(this).val());
		});
		if (listall.length<1){
			alert(lang_error);
			return false;
		}
		if (confirm(lang_confirm))
		{
			$.ajax({
				type: 'POST',
				url: url_del,
				data:'listall='+listall,
				success: function(data){
					window.location=url_back;
				}
			});
		}
	});
}

//change active
function ChangeActive(idobject,url_active){
	var id = $(idobject).attr('id');
	var value = $(idobject).val();
	$.ajax({
		type: 'POST',
		url: url_active,
		data:'id='+id + '&value='+value,
		success: function(data){
			alert(data);
		}
	});
}

function nv_chang_organs(organid, object,url_change,url_back) {
	var value = $(object).val();
	$.ajax({
		type: 'POST',
		url: url_change,
		data:'oid='+organid + '&w='+value,
		success: function(data){
			window.location = url_back;
		}
	});
	return;
}
function nv_chang_person(personid, object,url_change,url_back) {
	var value = $(object).val();
	$.ajax({
		type: 'POST',
		url: url_change,
		data:'personid='+personid + '&w='+value,
		success: function(data){
			window.location = url_back;
		}
	});
	return;
}

$(document).ready(function() {
	$("input[name=selectimg]").click(function() {
		nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", "850", "420", "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
		return false;
	});
});