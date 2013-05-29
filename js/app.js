// This callback ALWAYS happens when signin is attempted
function signinCallback(authResult) {
  // Since this callback ALWAYS happens, we have to make sure it was actually successful	
  if (authResult['access_token']) {
	$('#signinArea').hide();
	$('.formDiv').show();
  }
}

// loading the google api js lets us assign a onload, so we enable signin AFTER google api js is available
function enableSignin() {
  var options = {
	callback: "signinCallback",
	clientid: getConfigVal('google_api_client_id'),
	cookiepolicy: 'single_host_origin',
	requestvisibleactions: "http://schemas.google.com/AddActivity",
	scope: "https://www.googleapis.com/auth/plus.login"
  };
  // Call the render method when appropriate within your app to display
  // the button.
  gapi.signin.render('signinButton', options);
}

// this launches the share button render with our options (they may change, so we render again and again)
function enablePostShare() {
  var options = {
	contenturl: $('#content-url').val(),
	clientid: getConfigVal('google_api_client_id'),
	cookiepolicy: 'single_host_origin',
	calltoactionlabel: $('#cta-label-select :selected').val(),
	calltoactionurl: $('#call-to-action-url').val(),
	requestvisibleactions: "http://schemas.google.com/AddActivity",
	scope: "https://www.googleapis.com/auth/plus.login"
  };
  // Call the render method when appropriate within your app to display
  // the button.
  gapi.interactivepost.render('sharePost', options);
  
  // Show/hide depending on form completion
  if (isFormComplete())
	$('.form-actions').show();
  else
	$('.form-actions').hide();
}

// simple form completion check
function isFormComplete() {
  if ($("input#call-to-action-url").val() && $("input#content-url").val() && $('#cta-label-select :selected').val())
	return true;
}

// config val getter
function getConfigVal(config_key) {
  var config_value = "";
  
  if (window.conf[config_key])
	config_value = window.conf[config_key];
  
  if (config_value)
	return config_value;
  else
	console.error("Conf not properly setup.");
}

// when our document is ready, launch these
$(document).ready(function() {        
  
  // load our CTA labels from conf
  var cta_labels_html = "<option value=''>Select a Call To Action</option>";
  $.each( getConfigVal('cta_labels'), function( index, value ) {
	pretty_value = value.replace(/_/g, ' ').toLowerCase();
	cta_labels_html += "<option class='cta-options' value='"+value+"'>"+pretty_value+"</option>";
  });
  $('#cta-label-select').html(cta_labels_html);
  
  // if we don't have a val in our cta url, copy the one from content (just a nicety)
  $('#call-to-action-url').focus(function() {
	if (! $("input#call-to-action-url").val())
      $("input#call-to-action-url").val($("input#content-url").val());  
  });  
});

// anytime a share-change input is changed, re-fire the enablePostShare function
$('.share-change').change(function() {
  enablePostShare();
});

// stop our form from reloading the page
$('#create').submit(function() {
  return false;
});

// when clicking reset ALSO hide the form actions
$('input[type=reset]').click(function() {
  $('.form-actions').hide();
});
