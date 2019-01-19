<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Global Chat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uri.min.js"></script>
    <script src="js/communicate.js"></script>
	<script src="js/clipboard.min.js"></script>


</head>

<body>


    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1 style="color:#000060">Start Session</h1>
            <h3 style="color:#000060">Send this link to your friend to begin chatting:</h3>
			<textarea class="form-control" id="chat-link" style="width: 600px;height:40px;margin-left:auto;margin-right:auto;opacity:0.9;"></textarea>
			
			<button type="button" class="btn-light" id="btn" style="margin-top:4px"  data-clipboard-target="#chat-link">
				Copy
			</button>
			<script>
				var btn = document.getElementById('btn');
				var clipboard = new Clipboard(btn);
				clipboard.on('success', function(e) {
					console.log(e);
				});
				clipboard.on('error', function(e) {
					console.log(e);
				});
			</script>
	
        </div>
    </header>

</body>

</html>