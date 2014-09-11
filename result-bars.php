<?php    
    include 'includes/funcs.php';
    include 'includes/theses.php';
    include 'includes/hsg.php';
    


    $theses = get_theses_array();

    $theses_count = sizeof($theses['s']);
    
    $ans = Array();
    $emph = Array();
    $answerstring = '';
    $warning = false;
    
    if(!isset($_GET['ans'])){
      $warning = true;
      for($i = 0; $i < $theses_count; $i++){
          $ans[$i] = 'skip';
          $emph[$i] = 1;
      }
    } else {
		$answerstring = $_GET['ans'];
		$retval = result_from_string($answerstring, $theses_count);
		$ans = $retval[0];
		$emph = $retval[1];
    }
    
    $hsg_array = get_hsg_array();
    $hsg_array = sort_hsgs($ans, $hsg_array, $emph);
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mahlowat - Ergebnis</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta content="Mahlowat, akut, akut Bonn, SP-Wahl Bonn">
    
    <meta name="image_src" content="img/mahlowat_logo.png"/>
    <meta name="description" content="Mein Mahlowat-Ergebnis"/>
    
    <meta property="og:title" content="Mahlowat"/>
    <meta property="og:type"  content="website"/>
    <meta property="og:image" content="img/mahlowat_logo.png"/>
    <meta property="og:url"   content=""/>
    <meta property="og:site-name" content="akut-bonn.de"/>
    <meta property="og:description" content="Mein Mahlowat-Ergebnis"/>
    
    
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script src="js/jquery-2.0.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mahlowat-rb.js"></script>
    
    <link href="css/socialshareprivacy-min.css" rel="stylesheet">
    
    <script type="text/javascript" src="js/social_bookmarks-min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        if($('#socialshareprivacy').length > 0){
          $('#socialshareprivacy').socialSharePrivacy({
        "services":{"facebook":{
		"status":"on",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Facebook senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off",
		"action":"recommend",
		"language":"de_DE"
        },
        "twitter":{
		"tweet_text":"Der Mahlowat meint, ich könnte evtl. \'<?php echo $hsg_array[0]['name']; ?>\' gut finden.",
		"status":"on",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Twitter senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off",
		"language":"de",
		'referrer_track' : ''
	  },
	  "gplus":{
		"status":"off",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Google+ senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off"
	  },
	  "flattr":{
		"status":"off",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Flattr senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off"
	  },
	  "xing":{
		"status":"off","txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Xing senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off",
		"language":"de"
	  },
	  "pinterest":{
		"status":"off",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an Pinterest senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off"
	  },
	  "t3n":{
		"status":"off",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an t3n senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off"
	  },
	  "linkedin":{
		"status":"off",
		"txt_info":"2 Klicks f\u00fcr mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k\u00f6nnen Ihre Empfehlung an LinkedIn senden. Schon beim Aktivieren werden Daten an Dritte \u00fcbertragen.",
		"perma_option":"off"
	  }
	  },
	  "info_link":"http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html",
	  "display_infobox":"off",
	  'cookie_domain' : 'akut-bonn.de',
        'uri' : ''
	  
	  });}
      });
    </script>
  </head>
  <body>

  <div class="container" style="margin-top: 20px;">
      <img src="img/mahlowat_logo.png" title="Mahlowat Logo" class="pull-right" onclick="changeText()"/>
	<p id="spruch" class="pull-right"></p>
	
      <div class="bottom-buffer top-buffer">
    
    <h1>Ergebnisse</h1>
    
        <ul class="pagination">
            <li class="active"><a href="result-bars.php?ans=<?php echo $answerstring; ?>">Übersicht</a></li>
            <li class=""><a href="result-table.php?ans=<?php echo $answerstring; ?>">Detailansicht</a></li>
        </ul>
    
    
      <?php if($warning && !isset($_GET['ans'])){ ?>
      <div id="warning" class="modal hide fade">
            <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3>Hoppla...</h3>
            </div>
            <div class="modal-body">
                  <p><strong>Anscheinend hast du keine Fragen beantwortet.</strong><br />
                  Entweder musst du auf dieser Seite Cookies zulassen, oder du hast die Thesen wirklich noch nicht bearbeitet.</p> 
                  <p>Falls letzteres zutrifft, möchten wir dir empfehlen, dies nun zu tun.</p>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Schließen</button>
                  <a href="mahlowat.php" class="btn btn-primary">Thesen bearbeiten</a>
            </div>
      </div>
      
      <script type="text/javascript">
      $(document).ready(function() {
            setTimeout(function(){
                  $('#warning').modal('show');
            }, 1000);
      });
      </script>
     <?php } ?>
     
     <p><small>Nicht zufrieden mit dem Ergebnis? Vielleicht willst du die Thesen <a href="multiplier.php?ans=<?php echo $answerstring; ?>" title="Gewichtung ändern">anders gewichten</a>.</small></p>
     
     <table class="table table-bordered table-hover">
     <tr><th style="width: 200px;">Liste</th><th style="width:100px">Punkte</th><th style="width:640px;">Punkte</th></tr>
            <?php
                  $top = calculate_points($ans, $hsg_array[0]['answers'], $emph);
                  for($i = 0; $i < sizeof($hsg_array); $i++){
                        (calculate_points($ans, $hsg_array[$i]['answers'], $emph) == $top) ? $class = "success" : $class = "";
                        html_hsg_bar($hsg_array[$i], $ans, $emph, $class);
                        echo "\n";
                  }
            ?>

     </table>
    
    
    <hr />
    
	<div class="control-group alert alert-info">
		<p><strong>Ergebnis teilen:</strong></p>
		<div class="controls sharecontrols">
			<input type="text" class="col-md-5 form-control" id="resultlink" placeholder="" value="result-bars.php?ans=<?php echo result_to_string($ans, $emph); ?>">
		</div>
		<p><strong>Achtung!</strong> Aus diesem Link kann man ablesen, welche Antworten du ausgewählt und wie du die Thesen gewichtet hast!</p>
	</div>
    
    
    <div id="socialshareprivacy" class="social_share_privacy clearfix 1.6.2 locale-de_DE sprite-de_DE" style="width: 330px; height: 50px;"></div>
    <div class="text-right">
      <small>Du kannst die Befragung 
      <a href="index.php" title="Von vorn beginnen">neu starten</a>,
      deine 
      <a href="mahlowat.php?ans=<?php echo $answerstring; ?>" title="Antworten ändern">Antworten ändern</a>
      oder die 
      <a href="multiplier.php?ans=<?php echo $answerstring; ?>" title="Gewichtung ändern">Gewichtung anpassen</a>.<br />
      Außerdem haben wir auch eine <a href="faq.php?from=result-bars.php?ans=<?php echo $answerstring; ?>" title="FAQ">FAQ-Seite</a>.
      </small>
    </div>
    </div>
  </div>
  
  <script type="text/javascript">
	$('#resultlink').click(function() {
		var $this = $(this);
		$this.select();
	});
	
	$('#resultlink').val(window.location.href);
	/*$('.sharecontrols').hide();
	function displayshare(){
		$('.sharecontrols').toggle();
	}*/
  </script>
  
  </body>
</html>