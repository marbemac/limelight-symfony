<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
  </head>
  <body>
    <noscript>
      <div id="no_javascript">Tech Limelight uses javascript extensively. Please enable it in your browser.</div>
    </noscript>
    <!--[if IE 6]>
    <div id="ie_6_notice">
      You're using an old version of internet explorer that <?php echo sfConfig::get('sf_site_name') ?> does not currently support.
      Please consider upgrading your IE version or trying one of these alternatives:
      <ul>
        <li><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Upgrade to internet explorer 8</a></li>
        <li><a href="http://www.mozilla.com/en-US/firefox/ie.html">Switch to mozilla firefox</a></li>
        <li><a href="http://www.apple.com/safari/">Switch to safari</a></li>
      </ul>
    </div>
    <![endif]-->

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="/css/ie.css" />
    <![endif]-->
    <div id="wrapper">
      <?php include_partial('root/mainHeader') ?>
      <div id="container">
        <div id="center" class="column">
          <div class="content_panel">
            <?php echo $sf_content ?>
          </div>
        </div>
        <div id="right" class="column">
          <h2>top users</h2>
          <div class="sidebar_C side_top_users rnd_3">
            <ul>
              <li class="rndB_3 on" alt="#users-1">today</li>
              <li class="rndB_3" alt="#users-7">week</li>
              <li class="rndB_3" alt="#users-30">month</li>
              <li class="rndB_3" alt="#users-0">all time</li>
            </ul>
            <div id="users-${days}" class="top_user_list ${on} ${hide}">
              <div class="user_link">
                <span class="rnd_3">1</span>
                <a href="${tg.url('/user/'+str(user['user'].user_name))}" alt="${tg.url('/user/get_user_tab/'+str(user['user'].id))}" class="rnd_3">username</a>
                <span class="score rnd_3">0</span>
                <span class="score_increase rnd_3">+ 0</span>
              </div>
            </div>
          </div>
          <h2>latest</h2>
          <div class="sidebar_C rnd_3">
            sidebar
          </div>
        </div>
      </div>
      <div id="f_wrapper">
        <div id="f" class="rnd_5">footer</div>
      </div>
    </div>
    <div id="ajax_notice" class="rnd_5 hide"></div>
    <div id="ajax_error" class="rnd_5 hide"></div>
    <?php include_javascripts() ?>
  </body>
</html>
