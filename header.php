<html>
<head>
	<title>Twitter users</title>
	<link href = "style.css" rel = "stylesheet" type = "text/css" />
	<link href = "http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css" rel = "stylesheet" type = "text/css" />
	<script type = "application/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type = "application/javascript" src = "http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js"></script>
	<script type = "application/javascript">
		$(document).ready(function() {
			
			$('a.delete_link').click(function() {
				var a = $(this);
				var status_span = a.next();
				var link = a.attr('href') + '&ajax=true';
				status_span.text('...');
				$.ajax({
					url: link,
					method: 'GET'
				}).done(function(msg) {
					if(msg == '<p>OK</p>')
					{
						a.parent().parent().fadeOut();
					}
					else
					{
						status_span.attr('title', msg.replace('<p>', '').replace('</p>', ''));
						status_span.text('!');
					}
				});
				return false;
			});
			$('div.twitter_user img').each(function() {
				$(this).qtip({
					content: {
						text: $(this).next('div')
					},
					hide: {
						fixed: true,
						delay: 200
					}
				});
			});
		});
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-65160766-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>

<body>
