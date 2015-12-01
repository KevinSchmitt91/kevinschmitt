<?php
	
	$min = 1;
	$max = 20;
	$number1 = rand ($min,$max);
	$number2 = rand ($min,$max);
	$antispam = "Was ist $number1 + $number2 ? (Anti-Spam)";
	$erg = $number1 + $number2;
	
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = "Kontaktanfrage von $email"; 
		$to = 'kevin.schmitt.1991@gmail.com'; 
		$subject = "Anfrage von $name";
		
		$body ="Name / Firma: $name\n E-Mail: $email\n Telefonnummer: $phone\n Nachricht: $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Bitte geben Sie einen Namen an';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Bitte eine gültige Email Adresse eingeben';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Bitte geben Sie eine Nachricht ein';
		}
		//Check if simple anti-bot test is correct
		if ($human !== ($number1 + $number2)) {
			$errHuman = 'Ihr Anti-Spam ist nicht korrekt';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Danke! Ihre Nachricht wurde verschickt!</div>';
	} else {
		$result='<div class="alert alert-danger">Entschuldigung, es gab einen Fehler beim senden ihrer Nachricht. Versuchen Sie es noch einmal.</div>';
	}
}
	}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <title>Kevin Schmitt | Kontakt</title>
    <meta name="description" content="The online portfolio of Kevin Schmitt; a visual designer based in Fernwald, Germany">
    <meta name="author" content="Kevin Schmitt">
	
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat|Varela+Round' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
  </head>
  
  <body>
  <!-- Navigation -->
   <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav uppercase" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.html"><img src="img/brand.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right cl-effect-13">
                    <li>
                        <a class="" href="index.html"><span class="fa fa-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="index.html#services"><span class="fa fa-gear"></span> Leistungen</a>
                    </li>
                    <li>
                        <a href="portfolio.html"><span class="fa fa-book"></span> Portfolio</a>
                    </li>
                    <li>
                        <a class="active" href="contact.php"><span class="fa fa-comment"></span> Kontakt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        
      
    <!-- Impressum-Section -->
    <div class="content">
        <div class="container-fluid intro">
              <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                <div class="row">
                  <h2 class="uppercase">Kontakt</h2>
                  <div class="divider divider-intro"></div>
                </div>
              </div>
        </div>
        <div class="container-fluid contact">
                    <div class="row">
                      	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
	                      	<div class="text-left contact-intro">
						  		<p>Was auch immer Sie benötigen oder Ihre Ziele auch sein mögen, treten Sie mit mir in Verbindung und ich versuche Ihnen zu helfen, ihr Projekt voranzubringen. Egal ob Sie ihr Projekt mit mir besprechen wollen oder einfach nur um Hallo zu sagen, zögern Sie nicht! Schreiben Sie mir eine Nachricht auf <a href="http://www.twitter.com/kevinschmitt91" target="_blank">Twitter</a>, schreiben Sie mir eine Email an <a href="mailto:ich@kevinschmitt.info">ich@kevinschmitt.info</a> oder nutzen Sie das unten stehende Kontaktformular.</p>
                  			</div>
                  			<!-- Kontakt Form -->
                  			<h3 class="uppercase">Nachricht schreiben</h3>
                  			<div class="divider-large"></div>
                  			<p><small>Die mit <i style="color:#1773c7; font-size: 1.5em;">*</i> gekennzeichneten Felder müssen ausgefüllt sein!</small></p>
                  			<form method="post" action="" class="form">
								<div class="text-center">
			                        <div class="form-group">
										<?php echo $result; ?>	
									</div>
								</div>    
			                    <div class="input-group-lg">
			                    <label class="pull-left" for="name">Name / Firma<i>*</i></label>
			                      <input name="name" type="text" class="form-control" placeholder="Wie soll ich Sie nennen?">
			                      <?php echo "<p class='text-danger'>$errName</p>";?>
			                    </div>
			                    <div class="input-group-lg">
			                      <label class="pull-left" for="email">Email Adresse<i>*</i></label>
			                      <input name="email" type="email" class="form-control" placeholder="ich@beispiel.de">
			                      <?php echo "<p class='text-danger'>$errEmail</p>";?>
			                      </div>
			                    <div class="input-group-lg">
			                      <label class="pull-left" for="phone">Telefonnummer</label>
			                      <input name="phone" type="text" class="form-control" placeholder="Telefonnummer">
			                    </div>
			                    <div class="input-group-lg">
			                      <label class="pull-left" for="message">Nachricht<i>*</i></label>
			                      <textarea name="message" class="form-control" rows="4" placeholder="Wie kann ich Ihnen helfen?"></textarea>
			                      <?php echo "<p class='text-danger'>$errMessage</p>";?>
			                    </div>
			                    <div class="input-group-lg">
			                      <label class="pull-left" for="human"><?php echo $antispam;?> <i>*</i></label>
			                      <input name="human" type="text" class="form-control" placeholder="Ergebnis">
			                      <?php echo "<p class='text-danger'>$errHuman</p>";?>
			                    </div>
			                    <div class="text-center">
			                      <input name="submit" type="submit" value="senden" class="btn btn-custom">
			                    </div>
			                  </form>                      
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
      
    <!-- Footer -->
    <footer>
          <ul class="list-inline social">
            <li><a href="https://facebook.com/kevin.schmitt.16" target="_blank" class="social-facebook"><i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></i></a></li>
          <li><a href="https://twitter.com/kevinschmitt91" target="_blank" class="social-twitter"><i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></i></a></li>
          <li><a href="mailto:ich@kevinschmitt.info" class="social-mail"><i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></i></a></li>
              <li><a href="impressum.html" class="social-impressum">Impressum</a></li>
        </ul>
            <p>Made with <span class="fa fa-heart animated pulse"></span> in Fernwald, Germany.</p>
            <p>&copy; 2015 Kevin Schmitt. All rights reserved.</p>
            
        </footer>
	
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>