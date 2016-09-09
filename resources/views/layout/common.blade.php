
<!DOCTYPE html>
<html class=no-js>

<head>
  <meta charset=utf-8>
  <title>vpn</title>
  <meta name=description content="">
  <meta name=viewport content="width=device-width">
  <script type="text/javascript">
  </script>
  <link rel="shortcut icon" href=/favicon.ec0f3a1b.ico>
  <link rel=stylesheet href=/static/styles/app.min.df5e9cc9.css>

  <body>
    <div class="app">
      <div class=main-panel>
        <header class="header navbar">
          <ul class="nav navbar-nav">
              <a href="http://{{$_SERVER['HTTP_HOST']}}"><p class=navbar-text> vpn.xlvlx.com </p></a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href=javascript:; data-toggle=dropdown>
                <img src= /static/images/avatar.21d1cc35.jpg class="header-avatar img-circle ml10" alt=user title=user>
                <span class=pull-left><?php echo Session::get('name'); ?></span>
              </a>
              <ul class=dropdown-menu>
                <li><a href=/logout><i class="fa fa-sign-out"></i>登出</a></li>
              </ul>
            </li>

          </ul>
        </header>
        <div class=main-content>
           @yield('content')
        </div>
      </div>
      <footer class=content-footer>
        <nav class=footer-right>
          <ul class=nav>
            <li> <span class="label label-warning" href=javascript:;>联系qq：1550520500 千叶传奇</span> </li>
            <li> <a href=javascript:;>QQ群：52568496</a> </li>
            <li>
              <a href=javascript:; class=scroll-up> <i class="fa fa-angle-up"></i> </a>
            </li>
          </ul>
        </nav>
        <nav class=footer-left>
          <ul class=nav>
            <li> <a href=javascript:;>Copyright <i class="fa fa-copyright"></i> <span>xlvlx.com</span> 2016. All rights reserved</a> </li>

          </ul>
        </nav>
      </footer>
    </div>
    <script src=/static/scripts/app.min.4fc8dd6e.js></script>
