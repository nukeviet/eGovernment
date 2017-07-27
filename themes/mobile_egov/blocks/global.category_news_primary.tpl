<!-- BEGIN: main -->
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/category_news_primary.css" />
<div id="category_news_primary">
    <ul class="row">
        <!-- BEGIN: looptop -->
        <li class="clearfix">
            <h2><a href="{ROW.link}">{ROW.title_clean}</a></h2>
            <!--  BEGIN: img -->
            <a href="{ROW.link}"><img src="{ROW.thumb}"></a>
            <!--  END: img -->
            <p>{ROW.hometext_clean}</p>
        </li>
        <!--  END: looptop -->
        <!-- BEGIN: loop -->
        <li class="clearfix">
            <h5><a href="{ROW.link}">{ROW.title_clean}</a></h5>
        </li>
        <!-- END: loop -->
    </ul>
</div>
<!-- END: main -->