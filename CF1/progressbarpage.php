<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/progressbar.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js">
        </script>
        
         <script>
        $(function() {
		
	$('.progressbar').each(function(){
		var t = $(this),
			dataperc = t.attr('data-perc'),
			barperc = Math.round(dataperc*5.56);
		t.find('.bar').animate({width:barperc}, dataperc*25);
		t.find('.label').append('<div class="perc"></div>');
		
		function perc() {
			var length = t.find('.bar').css('width'),
				perc = Math.round(parseInt(length)/5.56),
				labelpos = (parseInt(length)-2);
			t.find('.label').css('left', labelpos);
			t.find('.perc').text(perc+'%');
		}
		perc();
		setInterval(perc, 0); 
	});
    });
        </script>
        
    </head>
    <body>



    <div class="progressbar" data-perc="15"> 
            <div class="bar"><span></span></div>
            <div class="label"><span></span></div>
    </div>
 
        <?php
        // put your code here
        ?>
    </body>
</html>
