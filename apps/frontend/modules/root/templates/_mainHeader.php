<div id="h_wrapper">
  <div id="h" class="rnd_5">
    <div id="site_name">
      <a href="<?php echo url_for('@homepage') ?>"><img src="/images/header_logo.png" alt="limelight" /></a>
    </div>
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
        <?php echo link_to('register', '@user_new', 'id=h_register') ?>
      </div>
    <?php endif ?>
  </div>
</div>