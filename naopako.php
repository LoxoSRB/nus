<?php

include_once('konektor.php');

$procitajzapise = mysql_query("SELECT * FROM naopako WHERE objavljeno=1");

?>
<html>
	<head>
		<title>Наопаке ствари</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Заједно откривамо које су то све наопаке ствари у нашој земљи" />
		<meta name="keywords" content="наопако, србија, ујс" />

		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="vex-2.0.1/js/vex.combined.min.js"></script>
        <script>vex.defaultOptions.className = 'vex-theme-os';</script>
        <link rel="stylesheet" href="vex-2.0.1/css/vex.css" />
        <link rel="stylesheet" href="vex-2.0.1/css/vex-theme-os.css" />
		<link rel="stylesheet" href="css/naopakestv.css" />

		<noscript>
			<link rel="stylesheet" href="css/naopakestv.css" />
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>

	</head>


<body style="overflow: auto;">
<center>
<div id="meni" class="opcije"><p style="margin-top: -2;font-weight: bold;font-size: 54px;"><a href="#" class="fa fa-zupcanik" title="Опције">Опције</a></p></div>
<div class="meni-podloga"></div>
<div id="opcije" class="meni fa fa-menu">
        <nav>
            <ul>
            	<br>
            	<li><a href="/nus" class="fa fa-indeks" style="text-decoration: none;" title="Почетна"></a></li>
            	<br>
                <li><a href="#" class="fa fa-dodavanje dodavanje" style="text-decoration: none;" title="Додај"></a></li>
            	<br>
                <li><a href="https://github.com/novicaz/naopako" target="_blank" class="fa fa-github" title="Прикључи се развоју ове апликације"></a></li>
            	<br>
				<li><a href="https://www.facebook.com/groups/1428615774079658/" target="_blank" class="fa fa-facebook" title="Пронађи нас на фејсу"></a></li>
            	<br>
				<li><a href="#" class="fa fa-pomoc pomoc" title="Помоћ"></a></li>
            	<br>
            </ul>
        </nav>
</div>
<div class="tabela">
                <table>
                    <tr style="height: 32px;">
						<p class="krug1">.</p>		<span class="tt">Све наопаке ствари на једном месту</span>				<p class="krug2">.</p>
                    </tr>
<?php
date_default_timezone_set('Europe/Belgrade');
while ($unos = mysql_fetch_array($procitajzapise)){
	if($unos{'objavljeno'}==1){

		
		$tstamp = explode(' ', $unos{'timestamp'});

		echo '<tr>
				<td width="160px"><p class="rbr">'.$unos{"id"}.'</p></td>
				<td width="200px;">
					<span class="datumunosa">'.$tstamp[0].'</span><br><span class="vremeunosa">'.$tstamp[1].'</span>
				</td>
				<td>
					<p class="opis">'.$unos{"opis"}.'</p>
					<p class="tacnoinetacno"> 
						<p class="tacno">'.$unos{"tacno"}.' особа мисли да је ово тачно</p>
						<p class="netacno">'.$unos{"netacno"}.' особа мисли да је ово нетачно</p>
					</p>
				</td>
			</tr>';
	}
}
?>                    

                </table>
            </div>
</center>

<script>	$(document).ready(function() {	$('#meni').click(function() {	$('#opcije').slideToggle("fast");	});	});	</script>
       <!-- Формулар за додавање -->
         <script>
                  $('.dodavanje').click(function(){
                      vex.dialog.open({
                          message: '<p>Изнесите своје запажање</p>',
                          input: '<textarea name="opis" style="color: black;" placeholder="Опишите укратко" cols="25" rows="6" required></textarea>' + '<br>',
                          buttons: [  $.extend({}, vex.dialog.buttons.YES, { text: 'Даље' })  ],
                          callback: function (data){
                              if(data.opis!=undefined){ 
                                  vex.dialog.confirm({
                                      message: '<h2>Хвала на времену које сте издвојили</h2><br><span>Ваше запажање је успешно забележено.' + '</span>' + '<br>',
                                      buttons: [  $.extend({}, vex.dialog.buttons.YES, { text: 'Даље' })  ],
                                      callback: function(value) {
                                      	$.post('dbupis.php', {unos: data.opis});
                                      }
                                  });
                              }
                           }
                      });
                  });
		<!-- Помошћ -->                        
		$('.pomoc').click(function(){
			vex.dialog.confirm({
				message: '<span style="font-size: 16px;">' + 'Наопаке ствари има задатак да уз помоћ људи који брину о заједници, на један рапидан начин, детектује и централизује све уочене погрешне и непожељне ствари, проблеме итд. <br>Овде је фокус одвојен од дискусија о томе како решити неку од наведених ствари и усмерен је искључиво на бележењу, наопаких ствари уочених од стране становника Србије.<br>Посебна локација, алати и људи се баве другим делом посла који се односи на проверу сваке наведене ставке, тј. филтрирањем сакупљених информација, те формирањем поузданијег списка наопаких ствари које треба исправити, након чега на сцену ступа грађански активизам који ће се побринути да свака од наведених ставки буде исправљена на једнако рапидан начин као и што је то био случај са прикупљањем информација. <br>  ' + '</span>' + '<br>',
				buttons: [  $.extend({}, vex.dialog.buttons.YES, { text: 'Ај гот ит!:)' })  ],
				callback: function(value) {  }
			});
		});                               
        </script>
</body>
</html>