<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create an Interactive Post on Google+</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      
      .formDiv {
        margin: 0px auto !important;
        float:none !important;
        display: block;
        padding: 30px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      
      h2 {
        text-align:center;
      }
    </style>
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>
  <body>    
    <div class="container">
      <div class="row">
        <h2>Create an Interactive Post on Google+</h2>
        <div class="formDiv span6">
          <form class="form-horizontal" id="create">
            <div class="control-group string required disabled">
              <label class="string required control-label" for="content-url">Content URL</label>
              <div class="controls">
                <input class="string required span4 share-change" id="content-url" name="" type="text" required="required" placeholder="https://plus.google.com/pages/"/>
              </div>
            </div>
            <div class="control-group string required disabled">
              <label class="string required control-label" for="call-to-action-url">Call-To-Action URL</label>
              <div class="controls">
                <input class="string required span4 share-change" id="call-to-action-url" name="" type="text" required="required" placeholder="http://plus.google.com/pages/create"/>
                <br /><small class="text-warning">Must be the same protocol as content url  (HTTP or HTTPS)</small>
              </div>
            </div>
            <div class="control-group select required">
              <label class="select required control-label" for="cta-label-select">Call To Action Label</label>
              <div class="controls">
                <select class="select required share-change" id="cta-label-select" required="required" name="">
                  <option value=""></option>
                  <option value="Blog">Blog</option>
                  <option value="Editorial">Editorial</option>
                  <option value="Announce">Announce</option>
                  <option value="Advertisement">Advertisement</option>
                </select>
              </div>
            </div>
            <div class="control-group string required disabled">
              <label class="string required control-label" for="prefill-text">Prefill Text</label>
              <div class="controls">
                <input class="string required span4 share-change" id="prefill-text" name="" type="text" required="required" placeholder="Create your Google+ Page too!"/>
              </div>
            </div>
            <div class="form-actions">
              <input class="btn btn-primary" name="commit" type="submit" value="Share Interactive Post" />
              <input class="btn btn-danger" name="commit" type="reset" value="Clear" />
              <div class="hidden" id="sharePost">Share Interactive Post</div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
    
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
        po.src = 'https://plus.google.com/js/client:plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
      })();
    </script>
    <script type="text/javascript">
      function enablePostShare() {
        var options = {
          contenturl: $('#content-url').val(),
          clientid: getConfigVal('google_api_client_id'),
          cookiepolicy: 'single_host_origin',
          prefilltext: $('#prefill-text').val(),
          calltoactionlabel: $('#cta-label-select :selected').val(),
          calltoactionurl: $('#call-to-action-url').val(),
        };
        // Call the render method when appropriate within your app to display
        // the button.
        gapi.interactivepost.render('sharePost', options);
      }
      
      var getConfigVal = function(config_key) {
        var config_value = ""
        
        if (window.conf[config_key])
          config_value = window.conf[config_key];
        
        if (config_value)
          return config_value;
        else
          console.log("Conf not properly setup.")
      };
      
      $(document).ready(function() {        
        
        var cta_labels_html = "<option value=''>Select a Call To Action</option>";
        $.each( getConfigVal('cta_labels'), function( index, value ) {
          pretty_value = value.replace(/_/g, ' ').toLowerCase();
          cta_labels_html += "<option class='cta-options' value='"+value+"'>"+pretty_value+"</option>"
        });
        
        $('#cta-label-select').html(cta_labels_html);
        
        $('#call-to-action-url').focus(function() {
          if (! $("input#call-to-action-url").val())
            $("input#call-to-action-url").val($("input#content-url").val());  
        });
      });
      
      $('.share-change').change(function() {
        enablePostShare();
      });
      
      $('#create').submit(function() {
        $('#sharePost').trigger('click');
        return false;
      });
    </script>
  </body>
</html>
