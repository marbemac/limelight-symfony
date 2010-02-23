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
    <?php echo $sf_content ?>
    <?php include_javascripts() ?>
  </body>
</html>
