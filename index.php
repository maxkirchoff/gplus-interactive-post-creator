<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create an Interactive Post on Google+</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simple app for creating Interactive Posts on Google+">
    <meta name="author" content="Max Kirchoff">
    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>
  <body>    
    <div class="container">
      <div class="row">
        <h2>Create an Interactive Post on Google+</h2>
        <div id="signinArea" class="span6">
          <div id="signinButton">
            <span class="icon"></span>
            <span class="buttonText">Authorize on Google+</span>
          </div>
        </div>
        <div class="formDiv span6">
          <form class="form-horizontal" id="create">
            <div class="control-group string disabled">
              <label class="string control-label" for="content-url">Content URL</label>
              <div class="controls">
                <input class="string span4 share-change" id="content-url" name="" type="text" placeholder="https://plus.google.com/pages/"/>
              </div>
            </div>
            <div class="control-group string disabled">
              <label class="string control-label" for="call-to-action-url">Call-To-Action URL</label>
              <div class="controls">
                <input class="string span4 share-change" id="call-to-action-url" name="" type="text" placeholder="http://plus.google.com/pages/create"/>
                <br /><small class="text-warning">Must be the same protocol as content url  (HTTP or HTTPS)</small>
              </div>
            </div>
            <div class="control-group select">
              <label class="select control-label" for="cta-label-select">Call To Action Label</label>
              <div class="controls">
                <select class="select share-change" id="cta-label-select" name="">
                </select>
              </div>
            </div>
            <div class="form-actions" style="display:none;">
              <input class="btn btn-primary" id="sharePost" name="commit" type="submit" value="Share Interactive Post" />
              <input class="btn btn-danger" name="commit" type="reset" value="Clear" />
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
    <div class="built-by">
      <i class="icon-heart"></i>
      <small>Lovingly built by <a href="https://github.com/maxkirchoff" rel="external">Max</a> using <a href="https://plus.google.com/" rel="external">Google+</a> & <a href="http://twitter.github.io/bootstrap/" rel="external">Bootstrap</a></small>
    </div>
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- JavaScript specific to this application that is not related to API
       calls -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
    <script src="js/conf.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function() {
        var po = document.createElement('script');
        po.type = 'text/javascript'; po.async = true;
        po.src = 'https://plus.google.com/js/client:plusone.js?onload=enableSignin';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
      })();
    </script>
    <script src="js/app.js"></script>
  </body>
</html>
