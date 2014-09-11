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
    <meta content="">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
      
    <script src="js/jquery-2.0.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mahlowat-rt.js"></script>
    
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
	  'cookie_domain' : '//ToDo',
        'uri' : '//ToDo'
	  
	  });}
      });
    </script>
  </head>
  <body>
  
  <?php if($warning){ ?>
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
  
  <div class="container" style="margin-top: 20px;">
      <img src="img/mahlowat_logo.png" title="Mahlowat Logo" class="pull-right" onclick="changeText()"/>
	<p id="spruch" class="pull-right"></p>
      <div class="bottom-buffer top-buffer">
    
    <h1>Ergebnisse</h1>
    
        <ul class="pagination">
            <li class=""><a href="result-bars.php?ans=<?php echo $answerstring; ?>">Übersicht</a></li>
            <li class="active"><a href="result-table.php?ans=<?php echo $answerstring; ?>">Detailansicht</a></li>
        </ul>
    
    <p><small>Thesen mit <span class="glyphicon glyphicon-star" title="Sternchen"></span> fandest du besonders wichtig.<br> Wenn du auf den Button mit dem Namen der These klickst, bekommst du die Statements der Listen in einer Übersicht angezeigt.</small></p>
    
    <table class="table table-bordered" id="resulttable">
      <tr id="tableheader"><th> </th><th>Deine Wahl</th>
      <?php 
      
      
      for($i = 0; $i < sizeof($hsg_array); $i = $i + 1){
            echo "<th onclick='toggleColumn(\"{$hsg_array[$i]['name']}\")'>{$hsg_array[$i]['name_x']} (".calculate_points($ans, $hsg_array[$i]['answers'], $emph).")</th>";   
      }
      echo "</tr>\n";
      
      for($i = 0; $i < $theses_count; $i = $i + 1){
            $emph[$i]==2 ? $star = '<span class="glyphicon glyphicon-star" title="Doppelte Gewichtung"></span>' : $star = '';
            $emph[$i]==2 ? $tdcl = ' class="warning"' : $tdcl = '';
            $labelclass = code_to_labelclass($ans[$i]);
            echo "<tr$tdcl>\n";
            echo '<td><p class="text-center">'.$star.'</p></td>';
            echo '<td><a id="thesis'.$i.'" class="btn '.code_to_btnclass($ans[$i]).' btn-block" onclick="toggleNext(this)">'.$theses['s'][$i].'</a></td>';
            for($hsg = 0; $hsg < sizeof($hsg_array); $hsg = $hsg + 1){
                  echo hsg_get_td($hsg_array[$hsg], $i);
            }
            echo "</tr>\n";
            // Erläuterungen
            echo "<tr class='multheseslong'><td class='mtl'></td><td class='mtl' colspan='".(sizeof($hsg_array)+1)."'><!--<span class='label $labelclass'>These ".($i+1).": ".$theses['s'][$i]."</span><br>--> <p class='well'>".$theses['l'][$i]."</p>";
            for($hsg = 0; $hsg < sizeof($hsg_array); $hsg = $hsg + 1){
                  echo hsg_get_explanation($hsg_array[$hsg], $i);
            }
            echo "</td></tr>\n";
      }
      
      ?>
     </table>
    
    <hr />
    
    <div id="socialshareprivacy" class="social_share_privacy clearfix 1.6.2 locale-de_DE sprite-de_DE" style="width: 330px; height: 50px;"></div>
    
    <div class="text-right">
      <small>Du kannst die Befragung 
      <a href="index.php" title="Von vorn beginnen">neu starten</a>,
      deine 
      <a href="mahlowat.php?ans=<?php echo $answerstring; ?>" title="Antworten ändern">Antworten ändern</a>
      oder die 
      <a href="multiplier.php?ans=<?php echo $answerstring; ?>" title="Gewichtung ändern">Gewichtung anpassen</a>.<br />
      Außerdem haben wir auch eine <a href="faq.php?from=result-table.php?ans=<?php echo $answerstring; ?>" title="FAQ">FAQ-Seite</a>.
      </small>
    </div>
    </div>
  </div>
  
  <script type="text/javascript">
      $('[id^="thesis"]').popover();
      $('.hsganswer').tooltip();
      $('.multheseslong').hide();
      $('.tt').tooltip();
      function toggleNext(caller){
          $(caller).parent().parent().next().toggle();
      }
      
      function toggleColumn(hsgname){
		$('.hsg-'+hsgname).toggle();
      }
  </script>


  
  </body>
</html>