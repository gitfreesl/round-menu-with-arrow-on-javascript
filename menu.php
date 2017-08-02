<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jqueryrotate.2.1.js"></script>

</head>
<body>

<!-- меню-->
<?php
$BEGIN_MENU_ITEM=1; // первоначальное положение стрелки
$KOL_MENU_ITEMS=14; // кол-во пунктов меню
$RADIUS=237;  //радиус пунктов меню
$BEGIN_YGOL=45; // начальный угол поворота стрелки
$RIGHT_STRELKA=382;  //праваЯ позициЯ стрелки меню
$BOTTOM_STRELKA=33; // нижнЯЯ позициЯ стрелки меню
$KOL_LINES=4; // количество линий между пунктами меню
$CENTER_MENU_R=398; //правое положение центра меню
$CENTER_MENU_B=234; // нижнее положение центра меню
$KOL_DLIN_DELEN=1; // количество длинных черточек между пунктами меню
$KOL_SHORT_DELEN=1; // количество коротких черточек между длинными
$YGOL_FOR_ITEMS=(360-(2*$BEGIN_YGOL))/($KOL_MENU_ITEMS-1);// угол отклонения между пунктами меню
$YSLYGI_TERM=array('аэрографиЯ<br/> и наклейки','изменение<br/> характеристик','изменение<br/> экстерьера','аудио и видео<br/> инсталЯции','стайлинг<br/> салона','дополнительное<br/> оборудование','шины<br/> и диски','оптика<br/> и свет','тонирование<br/> и бронирование стекол',
                   'шумоизолЯциЯ<br/> и виброизолЯциЯ','дистанционный<br/> прогрев автомобилЯ','спортивные<br/> и детские кресла','остановка систем<br/> навигации','охранные системы,<br/> сигнализация');
$YGOL_FOR_LINES=$YGOL_FOR_ITEMS/(($KOL_DLIN_DELEN+1)*($KOL_SHORT_DELEN+1));// угол между черточками 
$COUNTER_LINES=0;
?>
<div id="menu_yslygi">
   <div id="bottom-text">
      “слуги компании
   </div>
   <img id="count-client" src="images/count_client.png" />
   <img id="new" src="images/new.png" />
   <img id="hot" src="images/hot.png" />
   <img id="persent" src="images/persent.png" />
   <img id="logo" src="images/logo.png" />
  
   <?php 
   $CURRENT_YGOL=$BEGIN_YGOL;
   $YGOL_ROTATE_LINE=$BEGIN_YGOL-($YGOL_FOR_LINES*($KOL_SHORT_DELEN+1));
   
   echo '<img id="line_'.$COUNTER_LINES.'" class="long_line" src="images/long_line.png" />'; echo '<script>$("#line_'.$COUNTER_LINES.'").rotate({angle:'.$YGOL_ROTATE_LINE.'});</script>';
   for($j=0;$j<$KOL_SHORT_DELEN;$j++)  // выводим черточки до первого пункта меню
     { $COUNTER_LINES++;
	   $YGOL_ROTATE_LINE+=$YGOL_FOR_LINES;
	   echo '<img id="line_'.$COUNTER_LINES.'" class="long_line" src="images/short_line.png" />'; echo '<script>$("#line_'.$COUNTER_LINES.'").rotate({angle:'.$YGOL_ROTATE_LINE.'});</script>';
	   
	 }
   
   for($i=1;$i<=$KOL_MENU_ITEMS;$i++)
    { 
	  
	  $CENTER_R_CURRENT=$CENTER_MENU_R+($RADIUS*sin(deg2rad($CURRENT_YGOL)));
      $CENTER_B_CURRENT=$CENTER_MENU_B-($RADIUS*cos(deg2rad($CURRENT_YGOL)));
      $BOTTOM_CURRENT=$CENTER_B_CURRENT-15;
      $RIGHT_CURRENT=$CENTER_R_CURRENT-17;
	  $BOTTOM_CURRENT_TEXT=$BOTTOM_CURRENT;
	  $RIGHT_CURRENT_TEXT=$RIGHT_CURRENT+42;
	  $LEFT_CURRENT_TEXT=790-$RIGHT_CURRENT_TEXT+47;
	  ?>
	    <a href=""><img id="cur_yslyga<?php echo $i;?>" onmouseout="$('#cur_yslyga'+<?php echo $i;?>).attr('src','images/yslygi_'+<?php echo $i;?>+'.png');$('#yslygi_text_'+<?php echo $i;?>).css('color','#5e5e5e');" onmouseover="tern_strelka(<?php echo $i;?>);" style="position:absolute;border:0px;bottom:<?php echo $BOTTOM_CURRENT ?>px; right:<?php echo $RIGHT_CURRENT; ?>px" src="images/yslygi_<?php echo $i;?>.png" /></a>
	    <?php if($CURRENT_YGOL<=180) { if($CURRENT_YGOL>165) {$BOTTOM_CURRENT_TEXT+=30;$RIGHT_CURRENT_TEXT-=15;}?>
		     <div id="yslygi_text_<?php echo $i;?>" align="right" class="menu_yslygi_text" style="bottom:<?php echo $BOTTOM_CURRENT_TEXT ?>px; right:<?php echo $RIGHT_CURRENT_TEXT; ?>px"><?php echo $YSLYGI_TERM[$i-1];?></div>
	    <?php }else{ if($CURRENT_YGOL<195) {$BOTTOM_CURRENT_TEXT+=30;$LEFT_CURRENT_TEXT-=15;}?>
		     <div id="yslygi_text_<?php echo $i;?>"  align="left" class="menu_yslygi_text" style="bottom:<?php echo $BOTTOM_CURRENT_TEXT ?>px; left:<?php echo $LEFT_CURRENT_TEXT; ?>px"><?php echo $YSLYGI_TERM[$i-1];?></div>
		<?php } ?>
	   <?php 
	   
	  //рисуем черточки
	  for($j=0;$j<$KOL_DLIN_DELEN+1;$j++)  // выводим черточки до первого пункта меню
     { $COUNTER_LINES++;
	   $YGOL_ROTATE_LINE=$CURRENT_YGOL+(($KOL_SHORT_DELEN+1)*$YGOL_FOR_LINES*$j);
	   echo '<img id="line_'.$COUNTER_LINES.'" class="long_line" src="images/long_line.png" />'; echo '<script>$("#line_'.$COUNTER_LINES.'").rotate({angle:'.$YGOL_ROTATE_LINE.'});</script>';
	   for($k=0;$k<$KOL_SHORT_DELEN;$k++)
	    { $YGOL_ROTATE_LINE+=$YGOL_FOR_LINES;
		  $COUNTER_LINES++;
		  if($COUNTER_LINES<=($KOL_MENU_ITEMS*($KOL_DLIN_DELEN+1)*($KOL_SHORT_DELEN+1)))
		    echo '<img id="line_'.$COUNTER_LINES.'" class="long_line" src="images/short_line.png" />'; echo '<script>$("#line_'.$COUNTER_LINES.'").rotate({angle:'.$YGOL_ROTATE_LINE.'});</script>';
		}
	 }
	   $CURRENT_YGOL+=$YGOL_FOR_ITEMS;
	}
	// длЯ IE указываем еще раз css!
	   echo '<script>$(".long_line").css({position: "absolute", bottom:"17px", right:"396px"});</script>';
   ?>
   <img id="strelka" style="z-index: 101;position: absolute; bottom:<?php echo $BOTTOM_STRELKA; ?>px; right:<?php echo $RIGHT_STRELKA;?>px" src="images/strelka.png" />
   
   <script> <!-- перемещаем  в начальное положение-->
      $(document).ready(function () {
      $('#strelka').rotate({animateTo:<?php echo ($BEGIN_YGOL+($BEGIN_MENU_ITEM-1)*$YGOL_FOR_ITEMS); ?>});
	  $('#strelka').css({position: "absolute", bottom:"<?php echo $BOTTOM_STRELKA; ?>px", right:"<?php echo $RIGHT_STRELKA;?>px"});
	  });
	  function tern_strelka(item)
	   {  var ygol=<?php echo $YGOL_FOR_ITEMS?>;
	      var beg_ygol=<?php echo $BEGIN_YGOL?>;
	      var cur_item = $('#cur_yslyga_item').val();
		  if(item-cur_item)
		    $('#strelka').rotate({animateTo:(item-1)*ygol+beg_ygol});
		  $('#cur_yslyga_item').val(item); // устанавливаем текущее значение меню
		  $('#strelka').css({position: "absolute", bottom:"<?php echo $BOTTOM_STRELKA; ?>px", right:"<?php echo $RIGHT_STRELKA;?>px"});
		  $("#cur_yslyga"+item).attr("src","images/yslygi_light_"+item+".png");
		  $("#yslygi_text_"+item).css('color','#f5d6d6');
	   }
   </script>
   <input type="hidden" id="cur_yslyga_item" value="<?php echo $BEGIN_MENU_ITEM;?>"/>
  
</div>
<!--  END:меню-->

</body>
</html>