<!-- BEGIN: main -->
<link media="screen" type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/news_center.css" />
<div id="hot-news">
    <div class="margin-bottom">
        <a href="{main.link}" title="{main.link}" {main.target_blank}>
            <img src="{main.imgsource}" alt="{main.title}" width="{main.width}" class="img-thumbnail"/>
        </a>        
        <h2 class="margin-bottom-sm"><a href="{main.link}" title="{main.title}" {main.target_blank}>{main.titleclean60}</a></h2>
        <div class="hometexthot">
            <p>{main.hometext}</p>
        </div>
    </div>
    <div class="panel-body">
        <ul>
            <!-- BEGIN: othernews -->
            <li class="clearfix">
                <a class="show black h4" href="{othernews.link}" {othernews.target_blank}  title="{othernews.title}" >
                    {othernews.titleclean60}
                </a>
            </li>
            <!-- END: othernews -->
        </ul>
    </div>
</div>
<!-- END: main -->