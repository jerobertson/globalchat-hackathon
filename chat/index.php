<!DOCTYPE html>
<html>

  <head>
    <title>Global Chat</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/watson-bootstrap-style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/uri.min.js"></script>
	<script src="../js/artyom.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/chat.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="../js/app.js"></script>
  </head>

  <body>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">				
				<img src="../images/logo.png"</a>
			</div>
		</div>
	</div>
	<div class="row">
            <div>
                <h2>Welcome to Global Chat!</h2>
            </div>
            <div>
                <h3>Session Length:</h3>
				<div>
					<label id="minutes">00</label>:<label id="seconds">00</label>
						<script type="text/javascript">
							var minutesLabel = document.getElementById("minutes");
							var secondsLabel = document.getElementById("seconds");
							var totalSeconds = 0;
							setInterval(setTime, 1000);

							function setTime()
							{
								++totalSeconds;
								secondsLabel.innerHTML = pad(totalSeconds%60);
								minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
							}

							function pad(val)
							{
								var valString = val + "";
								if(valString.length < 2)
								{
									return "0" + valString;
								}
								else
								{
									return valString;
								}
							}
						</script>
						<button type="button" class="btn btn-default" id="btn" onclick="window.location.href='../index.php'" style="margin-bottom:5px;margin-left:25px;width:150px">
							End Session
						</button>
					</div>
					
	
                <p class="help-block">Hold space to record</p>
                <div class="form-group row">
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuInput" data-toggle="dropdown" aria-expanded="true">Select Recieving Language <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" id="ulSourceLang"><li role="presentation"><a role="menuitem" tabindex="-1">Detect Language</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Arabic</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Egyptian Arabic</a></li><li role="presentation"><a role="menuitem" tabindex="-1">German</a></li><li role="presentation"><a role="menuitem" tabindex="-1">English</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Spanish</a></li><li role="presentation"><a role="menuitem" tabindex="-1">French</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Italian</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Japanese</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Korean</a></li><li role="presentation"><a role="menuitem" tabindex="-1">Portuguese</a></li></ul>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <form class="form-horizontal">
                        <div role="tabpanel">
                            <div class="hr-tab"></div>
                            <fieldset>
                                <div class="form-group row">
                                    <div>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home">
                                                <textarea id="input-id"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-lg-12 -->
                                </div>
                                <!-- .form -->
                            </fieldset>
                    
                    </div></form>
                    <!-- /.well -->
                </div>
				
                <!-- /.tabpanel -->
                <div class="form-group row">
                </div>
                <!-- /.form -->
            </div>
            <!-- /.row -->
        </div>
  </body>

</html>