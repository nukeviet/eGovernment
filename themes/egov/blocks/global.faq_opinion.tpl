<!-- BEGIN: main  -->
<div class="faqopinion clearfix panel-body">
    <div class="row">
        <div class="col-sm-18 col-md-18">
            <div class="optabarea">
                <div class="tptabtitle">
                    <ul>
                        <li><a href="{LINK_MAINFAQ}">{TAB1_TITLE}</a></li>
                        <li><a href="#tptab2" data-toggle="faqoptab" class="active">{TAB2_TITLE}</a></li>
                    </ul>
                </div>
                <div class="tptabcontent">
                    <div id="tptab1">&nbsp;</div>
                    <div id="tptab2">
                        <!-- BEGIN: opinion  -->
                        <div class="clearfix">
                            <!-- BEGIN: thumb  -->
                            <div class="pull-left left">
                                <img src="{OPINION.thumb}" alt="{OPINION.title}" width="115"/>
                            </div>
                            <!-- END: thumb  -->
                            <h3><a href="{OPINION.link}">{OPINION.title}</a></h3>
                            <div>{OPINION.hometext}</div>
                        </div>
                        <!-- END: opinion  -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-2">&nbsp;</div>
        <div class="col-sm-4 col-md-4">
            <div class="sendfaq">
                <a href="{LINK_SENDFAQ}">{LANG.sendfaq}</a>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <a class="faqitem" href="{LINK_LISTFAQ}"><span><i class="fa fa-question" aria-hidden="true"></i></span>{LANG.listfaq}</a>
                </div>
                <div class="col-sm-12 col-md-12">
                    <a class="faqitem answerfaq" href="{LINK_ANSWERFAQ}"><span><i class="fa fa-tty" aria-hidden="true"></i></span>{LANG.answerfaq}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: main -->