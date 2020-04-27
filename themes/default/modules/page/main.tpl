<!-- BEGIN: main -->

<!-- BEGIN: warning -->
<div class="alert alert-danger">{LANG.warning}</div>
<!-- END: warning -->

<div class="page panel panel-default" itemtype="http://schema.org/Article" itemscope>
    <div class="panel-body">
        <h1 class="title margin-bottom-lg" itemprop="headline">{CONTENT.title}</h1>
        <div class="hidden hide d-none" itemprop="author" itemtype="http://schema.org/Organization" itemscope>
            <span itemprop="name">{SCHEMA_ORGNAME}</span>
        </div>
        <span class="hidden hide d-none" itemprop="datePublished">{SCHEMA_DATEPUBLISHED}</span>
        <span class="hidden hide d-none" itemprop="dateModified">{SCHEMA_DATEPUBLISHED}</span>
        <span class="hidden hide d-none" itemprop="mainEntityOfPage">{SCHEMA_URL}</span>
        <span class="hidden hide d-none" itemprop="image">{SCHEMA_IMAGE}</span>
        <div class="hidden hide d-none" itemprop="publisher" itemtype="http://schema.org/Organization" itemscope>
            <span itemprop="name">{SCHEMA_ORGNAME}</span>
            <span itemprop="logo" itemtype="http://schema.org/ImageObject" itemscope>
                <span itemprop="url">{SCHEMA_ORGLOGO}</span>
            </span>
        </div>
        <!-- BEGIN: socialbutton -->
        <div class="well well-sm">
            <ul class="nv-social-share">
                <li class="facebook">
                    <div class="fb-like" data-href="{SELFURL}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true">&nbsp;</div>
                </li>
                <li>
                    <a href="http://twitter.com/share" class="twitter-share-button">Tweet</a>
                </li>
            </ul>
        </div>
        <!-- END: socialbutton -->

        <!-- BEGIN: imageleft -->
        <figure class="article left noncaption pointer" style="width:100px" onclick="modalShow('', '<img src={CONTENT.image} />');">
            <img alt="{CONTENT.title}" src="{CONTENT.image}" width="{CONTENT.imageWidth}" class="img-thumbnail" />
            <!-- BEGIN: alt --><figcaption>{CONTENT.imagealt}</figcaption><!-- END: alt -->
        </figure>
        <!-- END: imageleft -->

        <!-- BEGIN: description -->
        <div class="hometext margin-bottom-lg" itemprop="description">{CONTENT.description}</div>
        <!-- END: description -->

        <!-- BEGIN: imagecenter -->
        <figure class="article center pointer" onclick="modalShowByObj(this);">
            <p class="text-center"><img alt="{CONTENT.title}" src="{CONTENT.image}" width="{CONTENT.imageWidth}" class="img-thumbnail" /></p>
            <!-- BEGIN: alt --><figcaption>{CONTENT.imagealt}</figcaption><!-- END: alt -->
        </figure>
        <!-- END: imagecenter -->

        <div class="clear"></div>

        <div id="page-bodyhtml" class="bodytext margin-bottom-lg">
            {CONTENT.bodytext}
        </div>
    </div>
</div>
<!-- BEGIN: adminlink -->
<p class="text-center margin-bottom-lg">
    <a class="btn btn-primary" href="{ADMIN_EDIT}"><em class="fa fa-edit fa-lg">&nbsp;</em>{GLANG.edit}</a>
    <a class="btn btn-danger" href="javascript:void(0);" onclick="nv_del_content({CONTENT.id}, '{ADMIN_CHECKSS}','{NV_BASE_ADMINURL}')"><em class="fa fa-trash-o fa-lg">&nbsp;</em>{GLANG.delete}</a>
</p>
<!-- END: adminlink -->
<!-- BEGIN: comment -->
<div class="page panel panel-default">
    <div class="panel-body">
    {CONTENT_COMMENT}
    </div>
</div>
<!-- END: comment -->
<!-- BEGIN: other -->
<div class="page panel panel-default">
    <div class="panel-body">
        <ul class="nv-list-item">
            <!-- BEGIN: loop -->
            <li><em class="fa fa-angle-double-right">&nbsp;</em><h3><a title="{OTHER.title}" href="{OTHER.link}">{OTHER.title}</a></h3></li>
            <!-- END: loop -->
       </ul>
    </div>
</div>
<!-- END: other -->
<!-- END: main -->
