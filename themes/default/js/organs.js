/**
 * @Project NUKEVIET 4.x
 * @Author VINADES., JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES ., JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Dec 3, 2010 12:49:25 PM
 */

// ----- Auxiliary -------------------------------------------------------------
function tabview_aux(TabViewId, id) {
    var TabView = document.getElementById(TabViewId);
    // ----- Tabs -----
    var Tabs = TabView.firstChild;
    while (Tabs.className != "Tabs")
        Tabs = Tabs.nextSibling;
    var Tab = Tabs.firstChild;
    var i = 0;
    do {
        if (Tab.tagName == "A") {
            i++;
            Tab.href = "javascript:tabview_switch('" + TabViewId + "', " + i + ");";
            Tab.className = (i == id) ? "Active" : "";
            Tab.blur();
        }
    } while (Tab = Tab.nextSibling);
    // ----- Pages -----
    var Pages = TabView.firstChild;
    while (Pages.className != 'Pages')
        Pages = Pages.nextSibling;
    var Page = Pages.firstChild;
    var i = 0;
    do {
        if (Page.className == 'Page') {
            i++;
            // if (Pages.offsetHeight) Page.style.height =
            // (Pages.offsetHeight-2)+"px";
            // Page.style.overflow = "auto";
            Page.style.display = (i == id) ? 'block' : 'none';
        }
    } while (Page = Page.nextSibling);
}

function SetCookieForTabView(cookieName, cookieValue, nDays) {
    var today = new Date();
    var expire = new Date();
    if (nDays == null || nDays == 0)
        nDays = 1;
    expire.setTime(today.getTime() + 3600000 * 24 * nDays);
    document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString();
}

function ReadCookie(cookieName) {
    var theCookie = "" + document.cookie;
    var ind = theCookie.indexOf(cookieName);
    if (ind == -1 || cookieName == "")
        return "";
    var ind1 = theCookie.indexOf(';', ind);
    if (ind1 == -1)
        ind1 = theCookie.length;
    return unescape(theCookie.substring(ind + cookieName.length + 1, ind1));
}

function tabview_switch(TabViewId, id) {
    tabview_aux(TabViewId, id);
    SetCookieForTabView('tvID', id, 36)
}

function tabview_initialize(TabViewId) {
    tvID2 = ReadCookie('tvID')
    if (tvID2 == -1 || tvID2 == "") {
        SetCookieForTabView('tvID', 1, 36);
        tabview_aux(TabViewId, 1);
    } else {
        tabview_aux(TabViewId, tvID2);
    }
}

function nv_del_org(id, base_adminurl, lang_confirm) {
    if (confirm(lang_confirm)) {
        var href = base_adminurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=delrow&id=' + id;
        $.ajax({
            type : 'POST',
            url : href,
            data : '',
            success : function(data) {
                alert(data);
                window.location = nv_base_siteurl + "index.php?" + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name;
            }
        });
    }
}
function nv_del_per(id, base_adminurl, lang_confirm) {
    if (confirm(lang_confirm)) {
        var href = base_adminurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=delper&id=' + id;
        $.ajax({
            type : 'POST',
            url : href,
            data : '',
            success : function(data) {
                alert(data);
                window.location = nv_base_siteurl + "index.php?" + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name;
            }
        });
    }
}

function search_submit_form() {
    var oid = $("#organid").val();
    var text = $("#otextseach").val();
    window.location = nv_base_siteurl + "index.php?" + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=viewsearch&oid=' + oid + '&q=' + rawurlencode(text);
    return false;
}