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
    <div id="h_wrapper">
      <div id="h">
        <div id="site_name"><a href="${tg.url('/')}"><img src="/images/header_logo.png" alt="limelight" /></a></div>
        <ul id="h_top_nav">
          <li>limelight network:</li>
          <li><a href="/">tech</a></li>
        </ul>
        <div id="h_site_type">tech</div>
        <ul id="h_bottom_nav" class="rnd_3">
          <li id="h_link1"><a href="${tg.url('#')}">content feed</a></li>
          <li id="h_link2"><a href="${tg.url('#')}">power search</a></li>
          <li id="h_link3"><a href="${tg.url('/contribute')}">contribute</a></li>
          <li id="h_link4"><a href="${tg.url('#')}">rankings</a></li>
          <li id="h_link5"><a href="${tg.url('#')}">help</a></li>
        </ul>
        <div id="h_search" class="rnd_3">
          <div id="h_search_T">search</div>
          <input type="text" class="rnd_3"></input>
          <div id="h_search_choice">
            <div id="h_search_expand">+</div>
            <div id="h_search_chosen" class="rnd_3">limelights</div>
          </div>
        </div>
        <?php if ($sf_user->isAuthenticated()): ?>
          <div id="h_user_panel">
            <h4>username</h4>
            <div id="h_notification_num" class="rnd_5" title="you have ${g.get_notification_count(tg.identity['user'].id)} notification(s)">
              <a href="${tg.url('/user/' + tg.identity['user'].user_name)}">${g.get_notification_count(tg.identity['user'].id)}</a>
            </div>
            <div id="h_score" class="infobox rnd_3" title="this is your limelight score">${tg.identity['user'].tll_score}</div>
            <div class="h_badges infobox rnd_3">
              % for badge in g.get_user_badge_levels(tg.identity['user'].id):
                <span title="you have ${badge.num_earned} ${badge.badge_name} badges" class="${badge.badge_row_class}">
                  <img src="/images/lvl'+str(badge.level)+_badge.gif" alt="lvl${badge.level} badges" />${badge.num_earned}
                </span>
              % endfor
            </div>
            <a href="${tg.url('/user/' + tg.identity['user'].user_name)}" class="my_account rnd_3">my account</a>
            <a href="${tg.url('/user/logout_handler')}" id="logout_button" class="logout rnd_3">logout</a>
          </div>
        <?php else: ?>
          <div id="h_user_nav">
            <a href="${tg.url('/user/login')}" id="h_login">login</a>
            <a href="${tg.url('/user/register')}" id="h_register">register</a>
          </div>
        <?php endif ?>
      </div>
    </div>
    <div id="wrapper">
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
      <div id="footer">footer</div>
    </div>
    <div id="ajax_notice" class="rnd_5 hide"></div>
    <div id="ajax_error" class="rnd_5 hide"></div>
    <?php include_javascripts() ?>
  </body>
</html>
