<div class="catalogue_item_c">

<style>



<!--

.folding{cursor:hand;font-weight:bold}

-->



img {

border:none;	

}



b {

	

}



.acc {

}

#acc {

	list-style: none outside none;

    margin: 0 auto 40px;

    width: 480px;

}



.acc-section {

background: white;

margin: 0px;

overflow: hidden;

}



#acc .acc-content {

    border-style: none solid solid;

}



element.style {

height: 0px;

}



div {

	display:block;

}



p {

	font-family:Arial, Helvetica, sans-serif;

	font:Arial, Helvetica, sans-serif;

}



h3 {

display:block;

}



a {

	text-decoration:none;

	border:none;

}



.sequ_conteiner{

	width:100%;

}



.sequ_up { 

height:105 px;

width:100%;

position:relative;

float:left;

margin:0;

background:#264c7b;

}



.sequ_p_up_2 {

	color:#FFF;

	font-size:20 px;

	text-align:justify;

	line-height: 1 px;

	letter-spacing: 2 px;

}



.sequ_p_up_3 {

	color:#FFF;

	font-size:16 px;

	text-align:justify;

	line-height: 1 px;

	letter-spacing: 5 px;

}



.sequ_stroke {

width: 100%;

background-color:#edecea;

height:33px;

text-align:right;

padding:0;

position:relative;

float:left;

margin: -10 0 0 0;

}



.sequ_main_menu {

	position:relative;

	float:left;

	min-height:458;

	max-height:458;

	height:100%;

	background-color:#264c7b;

	padding:5px;

}

/*onas*/

.sequ_a_1 {

	width:135px;

	position:relative;

	float:right;

	margin-right:6px;

}

/*uslu*/

.sequ_a_2 {

	width:135px;

	position:relative;

	float:right;

	margin-right:6px;

	

}

/*kont*/

.sequ_a_3 {

	width:135px;

	position:relative;

	float:right;

	

}



.sequ_podmain{

width:955px;

height:20px;

position:relative;

float:left;

left:20px;

padding:5px;

background-color:#264c7b;

color:#FFF;

font-family:Arial, Helvetica, sans-serif;

font-size:13px;

text-align:center;

}



.showcase
{
	position: relative;
	margin: auto;
}

/* This class is removed after the showcase is loaded */
/* Assign the correct showcase height to prevent loading jumps in IE */
.showcase-load
{
	height: 470px; /* Same as showcase javascript option */
	overflow: hidden;
}
	
	/* Navigation arrows */
	.showcase-arrow-previous, .showcase-arrow-next
	{
		position: absolute;
		background: url('../../root/msite/afrika/arrows.png');
		width: 33px;
		height: 33px;
		top: 220px;
		cursor: pointer;
	}
	
	.showcase-arrow-previous
	{
		left: -60px;
	}
	
	.showcase-arrow-previous:hover
	{
		background-position: 0px -34px;
	}
	
	.showcase-arrow-next
	{
		right: -56px;
		background-position: -34px 0;
	}
	
	.showcase-arrow-next:hover
	{
		background-position: -34px -34px;
	}
	
	/* Content */
	.showcase-content
	{
		text-align: center;
		background-color: #990033;
	}
		
		
		
		.showcase-tool-tip
		{
			background-color: #fff;
			color: #000;
			text-align: left;
			padding: 5px 8px;
			background-image: url(../../root/msite/afrika/white-opacity-80.png);
		}
		
		.showcase-caption
		{
			color: #000;
			padding: 8px 15px;
			text-align: left;
			position: absolute;
			bottom: 10px; left: 10px; right: 10px;
			display: none;
			background-image: url(../../root/msite/afrika/white-opacity-80.png);
		}
	
	/* Button Wrapper */
	.showcase-button-wrapper
	{
		clear: both;
		margin-top: 10px;
		text-align: center;
	}
	
		.showcase-button-wrapper span
		{
			margin-right: 3px;
			padding: 2px 5px 0px 5px;
			cursor: pointer;
			font-size: 12px;
			color: #444444;
		}
	
		.showcase-button-wrapper span.active
		{
			color: #fff;
		}
	
	/* Thumbnails */
	.showcase-thumbnail-container /* Used for backgrounds, no other styling!!! */
	{
		background-image:url(../../root/msite/afrika/logo_cli.jpg);
	}
	
	.showcase-thumbnail-wrapper
	{
		overflow: hidden;
	}
		
		.showcase-thumbnail
		{
			width: 120px;
			height: 80px;
			cursor: pointer;
			border: solid 1px #333;
			position: relative;
		}
		
			.showcase-thumbnail-caption
			{
				position: absolute;
				bottom: 2px;
				padding-left: 10px;
				padding-bottom: 5px;
			}
			
			.showcase-thumbnail-content
			{
				padding: 10px;
				text-align: center;
				padding-top: 25px;
			}
			
			.showcase-thumbnail-cover
			{
				background-image: url(../../root/msite/afrika/black-opacity-40.png);
				position: absolute;
				top: 0; bottom: 0; left: 0; right: 0;
			}
		
		.showcase-thumbnail:hover
		{
			border: solid 1px #999;
		}
		
			.showcase-thumbnail:hover .showcase-thumbnail-cover
			{
				display: none;
			}
		
		.showcase-thumbnail.active
		{
			border: solid 1px #999;
		}
		
			.showcase-thumbnail.active .showcase-thumbnail-cover
			{
				display: none;
			}
	
	.showcase-thumbnail-wrapper-horizontal
	{
		padding: 10px;
	}
	
		.showcase-thumbnail-wrapper-horizontal .showcase-thumbnail
		{
			margin-right: 10px;
			width: 116px;
		}
	
	.showcase-thumbnail-wrapper-vertical
	{
		padding: 10px;
	}
	
		.showcase-thumbnail-wrapper-vertical .showcase-thumbnail
		{
			margin-bottom: 10px;
		}
		
	.showcase-thumbnail-button-backward,
	.showcase-thumbnail-button-forward
	{
		padding: 7px;
		cursor: pointer;
	}
	
	.showcase-thumbnail-button-backward
	{
		padding-bottom: 0px;
		padding-right: 0px;
	}
	
		.showcase-thumbnail-button-backward .showcase-thumbnail-vertical,
		.showcase-thumbnail-button-forward .showcase-thumbnail-vertical,
		.showcase-thumbnail-button-forward .showcase-thumbnail-horizontal,
		.showcase-thumbnail-button-backward .showcase-thumbnail-horizontal
		{
			background-image: url(../../root/msite/afrika/arrows-small.png);
			background-repeat: no-repeat;
			display: block;
			width: 17px;
			height: 17px;
		}
		
		.showcase-thumbnail-button-backward .showcase-thumbnail-vertical
		{
			background-position: 0 -51px;
			margin-left: 55px;
		}
		.showcase-thumbnail-button-backward:hover .showcase-thumbnail-vertical
		{
			background-position: -17px -51px;
		}
		
		.showcase-thumbnail-button-forward .showcase-thumbnail-vertical
		{
			background-position: 0 -34px;
			margin-left: 55px;
		}
		.showcase-thumbnail-button-forward:hover .showcase-thumbnail-vertical
		{
			background-position: -17px -34px;
		}
		
		.showcase-thumbnail-button-backward .showcase-thumbnail-horizontal
		{
			background-position: 0 -17px;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		.showcase-thumbnail-button-backward:hover .showcase-thumbnail-horizontal
		{
			background-position: -17px -17px;
		}
		
		.showcase-thumbnail-button-forward .showcase-thumbnail-horizontal
		{
			background-position: 0 0;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		.showcase-thumbnail-button-forward:hover .showcase-thumbnail-horizontal
		{
			background-position: -17px 0;
		}
		
		
		.showcase-thumbnail-button-forward span span,
		.showcase-thumbnail-button-backward span span
		{
			display: none;
		}
.style_txt_menu_afrika_h01 {color: #000000; background-color: #ffffcc; font-size:14px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold;}


</style>

<?php

if ($_GET['pm'] == 1) 

{



?>

<div class="catalogue_item_cont_m" align="center"> 

<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery.aw-showcase.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		width:					500,
		height:					335,
		auto:					false,
		interval:				3000,
		continuous:				false,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					true,
		buttons:				false,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false,
		pauseonover:			true,
		transition:				'hslide', /* vslide/hslide/fade */
		transition_speed:		500,
		show_caption:			'onhover', /* onload/onhover/show */
		thumbnails:				true,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'vertical', /* vertical/horizontal */
		thumbnails_slidex:		0 /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
	});
});

</script>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="4" align="center"><div align="center">
      <table width="950" height="40" bgcolor="#ffffcc" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" bgcolor="#ffffcc"><div align="center" class="style_txt_menu_afrika_h01"><a style="color:#333333; text-decoration:none" href="#">О нас</a> | <a style="color:#333333; text-decoration:none" href="#">Меню</a> | <a style="color:#333333; text-decoration:none" href="#">Услуги</a> | <a style="color:#333333; text-decoration:none" href="#">Залы</a> | <a style="color:#333333; text-decoration:none" href="#">Развлечения</a> | <a style="color:#333333; text-decoration:none" href="#">Спец предложения</a> | <a style="color:#333333; text-decoration:none" href="#">Контакты</a></span></div></td>
          </tr>
          </table>
    </div></td>
  </tr>
  <tr>
    <td width="20" height="335">&nbsp;</td>
    <td width="470"><img src="../root/msite/afrika/logo.jpg" width="470" height="335" /></td>
    <td colspan="2">
    <div id="showcase" class="showcase">
	<div>
		<img src="../root/msite/afrika/07.png" alt="07" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/07.png" alt="07" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">			</div>
	</div>
	<div>
		<img src="../root/msite/afrika/01.png" alt="01" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/01.png" alt="01" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №1</h2>
		</div>
	</div><div>
		<img src="../root/msite/afrika/02.png" alt="02" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/02.png" alt="02" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №2</h2>
		</div>
	</div><div>
		<img src="../root/msite/afrika/03.png" alt="03" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/03.png" alt="03" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №3</h2>
		</div>
	</div><div>
		<img src="../root/msite/afrika/04.png" alt="04" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/04.png" alt="04" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №4</h2>
		</div>
	</div>
    <div>
		<img src="../root/msite/afrika/05.png" alt="05" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/05.png" alt="05" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №5</h2>
		</div>
	</div><div>
		<img src="../root/msite/afrika/06.png" alt="06" />
		<div class="showcase-thumbnail">
			<img src="../root/msite/afrika/06.png" alt="06" width="120px" />
			<div class="showcase-thumbnail-cover"></div>
		</div>
		<div class="showcase-caption">
			<h2>Добро пожаловать в зал №6</h2>
		</div>
	</div>
</div>    </td>
  </tr>
  <tr>
    <td colspan="4"><table width="100%" border="0">
  <tr>
    <td width="66" height="162">&nbsp;</td>
    <td width="579" background="../root/msite/afrika/txt.png" bgcolor="#ffffcc">&nbsp;</td>
    <td width="264" background="../root/msite/afrika/button.png"  bgcolor="#ffffcc">&nbsp;</td>
    <td width="67">&nbsp;</td>
  </tr>
  <tr>
    <td height="162">&nbsp;</td>
    <td rowspan="3" bgcolor="#ffffcc">&nbsp;</td>
    <td background="../root/msite/afrika/button.png" bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="162">&nbsp;</td>
    <td background="../root/msite/afrika/button.png" bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="162">&nbsp;</td>
    <td background="../root/msite/afrika/button.png" bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="162">&nbsp;</td>
    <td background="../root/msite/afrika/down.png" bgcolor="#ffffcc">&nbsp;</td>
    <td background="../root/msite/afrika/button.png" bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></td>
  </tr>
</table>

<?php

}

else

   if ($_GET['pm'] == 2)

   {

?>

<div class="catalogue_item_cont_m"> 

<div class="sequ_conteiner">

    <div class="sequ_up">

		<div style="position:relative; float:left; padding:10px; top:10px; left:50px;"><img src="../root/msite/kardio/ser.png"/></div>

		<div style="position:relative; float:left; left:80px; top:48px; color:#FFF;	font-size:24px; text-align:justify; line-height:1px; letter-spacing:14px;">Частный приём</div>

		<div style="position:relative; float:left; left:240px; top:50px; color:#FFF;	font-size:12px;  line-height:1.2; text-align:right;"><span>тел. (066) 907-94-66</span><br />

<div style="color:#95b7e2;">Г. Донецк, Калининский район, Пр. Ильича, 14-Е <br />

<div style="letter-spacing:2px;">(ДОКТМО, больница им. Калинина),</div>

Медицинский центр «ГЕРЦ», 7 этаж, кабинет 715.</div></div>

		<div style="position:relative; float:left; clear:left; left:190px; top:-32px; color:#FFF;	font-size:24px; text-align:justify; line-height:1px; letter-spacing:1px; text-transform:uppercase;"><b>Кардиолога-терапевта</b></div>

		<div style="position:relative; float:left; clear:left; left:190px; top:-17px; color:#FFF; margin-bottom:10px;	font-size:16px; text-align:justify; line-height:1px; letter-spacing:6px;">Медицинский центр "Герц"</div>

    	<!--

		<div style="position:relative; float:left; clear:left; margin-bottom:10; padding:0; left:20; width:100%;"><img src="../root/msite/kardio/up.png" align="left" width="100%" height="105" /></div>

		-->

    </div>

    <div class="sequ_stroke"> 

        <div style="padding:6px; bottom: -10px; color:#264c7b; font-family:'Times New Roman', Times, serif; font-size:20px;">

        Сердце - это ключевой орган в организме человека</div>

        </div>

    <div class="sequ_main_menu">

    	<div style="background: url(../root/msite/kardio/neb.jpg); width:100%; height:452px; position:relative; float:left;">

        	<div style="position:relative; float:left; left:25; width:370;"><img src="../root/msite/kardio/dev.png" align="left" width="367" height="450" /></div>

			<div style="position:relative; float:right; padding:0px;">

				<div class="sequ_a_3"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=3"><img src="../root/msite/kardio/ko.jpg" width="135" height="36" /></a></div>

				<div class="sequ_a_2"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=2"><img src="../root/msite/kardio/se_on.jpg" width="135" height="36" /></a></div>

				<div class="sequ_a_1"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=1"><img src="../root/msite/kardio/us.jpg" width="135" height="36" /></a></div>

			</div>

            

            <div style="padding-top: 100; text-align:left; font-style:italic; color:#264c7b; font:Tahoma, Geneva, sans-serif; font-family:Tahoma, Geneva, sans-serif; font-size:22px; line-height:1.4; padding-left:390; margin-top:100;"><br /><br />Наша жизнь и наше здоровье напрямую зависят от его состояния. Именно поэтому опасение приобрести заболевание сердца является одним из самых распространенных и самых сильных страхов человека. С любыми жалобами на боли в области сердца следует обращаться к кардиологу для выяснения причины ваших жалоб и прояснения серьезности ситуации!</div>       

        </div>

    </div>

    <div class="sequ_podmain">

    <b>В нашем центре Вы можете пройти полное диагностическое обследование сердечно-сосудистой системы.</b>

    </div>

	

	<!-- Основной текст -->

	

    <div class="sequ_text">

    	<div style="position:relative; float:left; width:100%;">

			<div id="cenyt_block1_sequ_text" style="position:relative; float:left; width:95%; padding:6px; left:25px;">

				<div style="position:relative; float:left; width:100%; text-align:left; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:15px; padding-bottom:15px;"><b>Наши специалисты помогут вам оценить состояние сердечно-сосудистой системы, устранить факторы риска сердечно-сосудистых заболеваний, провести профилактику и лечение выявленных заболеваний и их возможных осложнений.</b>

				</div>

                <div style="position:relative; float:left; width:100%; text-align:left; text-indent: 20; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:15px; color:#264c7b;"><b>На базе центра возможно проведение полного диагностического обследования все органов и систем с использованием современного профессионального медицинского оборудования квалифицированными специалистами.</b>

           		</div>

			</div>

			<div id="left_block_sequ_text" style="position:relative; float:left; text-align:left; text-indent: 20px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:20px; color:#264c7b; width:30%; left:30px;">

			У нас Вы можете пройти полное диагностическое обследование сердечно-сосудистой системы: 

				<div style="color:black; font-size:15px; padding:15px; line-height:1.8;">

				<ul type="disc">

					<li>- элекетрокардиографию (ЭКГ);</li>

					<li>- суточное (холтеровское) мониторирование ЭКГ;</li>

					<li>- УЗИ сердца; </li>

					<li>- нагрузочные пробы; </li>

					<li>- лабораторное обследование. </li>

				</ul>

				</div>

				<div style="position:relative; float:left;  width:100%; text-align:left; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:18px; color:#900;">

                <b>	

					<div style="padding-top:10px; padding-bottom:7px; font-size:16px; color:#264c7b;">Пенсионерам - скидка 20%</div> 

                    <div style="text-indent:70px; font-size:14px; color:black;"> (консультация кардиолога, ЭКГ)</div>

                    <div style="padding-top:16px; padding-bottom:7px; font-size:16px; color:#264c7b;">Участникам войны и детям войны - скидка 35%</div>

                    <div style="text-indent:70px; font-size:14px; color:black;">(консультация кардиолога, ЭКГ)</div>

                    <div style="margin-top:10px; font-size:16px; color:#264c7b; text-transform:uppercase;">Подробнее на вкладке услуги

                    </div>

                </b>

                </div>

			</div>

			<div id="centr_block_sequ_text" style="position:relative; float:left; text-align:left; text-indent:20px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:14px; color:#264c7b; width:50%; left:30px;">

			<table width="100%" cellpadding="50" cellspacing="0" border="2">

			<tbody>

				<tr style=" text-align:center;">

					<td width="70%">

						Наименование услуги

					</td>

					<td width="30%" style="text-align:center;">

						Стоимость, грн

					</td>

				</tr>

				<tr>

					<td>

						Вызов врача на дом (консультация + ЭКГ)

					</td>

					<td style="text-align:center;">

						350

					</td>

				</tr>	

				<tr>

					<td>

						Первичный прием кардиолога-семейного врача 

					</td>

					<td style="text-align:center;">

						150

					</td>

				</tr>   

				<tr>

					<td>

						Повторный прием кардиолога-семейного врача

					</td>

					<td style="text-align:center;">

						100

					</td>

				</tr>

				<tr>

					<td>

						Контрольные консультации по результатам лечения 	 

					</td>

					<td style="text-align:center;">

						Бесплатно

					</td>

				</tr>   

				<tr>

					<td>

						Первичный прием терапевта-кардиолога, к. мед. н., доцента 	         	 

					</td>

					<td style="text-align:center;">

						250

					</td>

				</tr>    

				<tr>

					<td>

						Повторный прием терапевта-кардиолога, к. мед. н., доцента  	         	 

					</td>

					<td style="text-align:center;">

						175

					</td>

				</tr>

				<tr>

					<td>

						Электрокардиограмма (ЭКГ) с расшифровкой         	 

					</td>

					<td style="text-align:center;">

						50

					</td>

				</tr> 

				<tr>

					<td>

						Холтеровское мониторирование ЭКГ 	        	 

					</td>

					<td style="text-align:center;">

						250

					</td>

				</tr>           

			</tbody>

			</table>

					<div style="color:black; font-size:14px; padding:5px;">

					<ul id="acc" class="acc">         

                        <li>              

                            <h3 style="text-align:left;">

                            <b style="color:#900; font-size:20px;"><img src="../root/msite/kardio/heart.png" width="20px" height="20px" />

                            Вызов врача на дом

                            </b>

                            </h3>              

                             <div class="acc-section" style="height: auto; ">               

                              <div class="acc-content">                

                               <ul class="acc"> 

							   <b>

                                <p>           

	     Платный вызов врача – прекрасная альтернатива государственного медицинского обслуживания, когда Вам нужен медицинский специалист с выездом на дом. Воспользуйтесь нашей услугой и наш специалист (терапевт или кардиолог) приедет к Вам в условленное время.<br />

&nbsp;&nbsp;&nbsp;Мы предоставляем следующие медицинские услуги: <br />

• медицинская консультация (терапевт, кардиолог);<br />

• осмотр пациента;<br />

• проведение электрокардиографии (ЭКГ)<br />

• холтеровское мониторирование ЭКГ<br />

• постановка диагноза<br />

• назначение лечения			

								</p>

								</b>

                       		  </ul>  

                      		 </div> 			 

                     		</div> 		 

                      </li> 		

		 			  <li>              

						<h3 style="text-align:left;">

                        <b style="color:#900; font-size:20px;">

                        <img src="../root/msite/kardio/heart.png" width="20px" height="20px" /> Электрокардиография (ЭКГ)

                        </b>

                        </h3>              

                             <div class="acc-section" style="height:0px;">               

                              <div class="acc-content">                

                               <ul class="acc"> 	

							   <b>	

                                <p>

	     Электрокардиография (ЭКГ) – графическое изображение электрических процессов, происходящих в сердце – основной метод диагностики заболеваний сердечно-сосудистой системы. Несомненными плюсами ЭКГ являются: высокая информативность, неинвазивность, простота выполнения, общедоступность и безопасность. 

         						</p>

                                <p>

 Электрокардиография относится к обязательным общеклиническим методам диагностики, которые проводятся пациенту вне зависимости от предварительного диагноза. 

 								</p>

                                <p>

 ЭКГ – незаменимый метод диагностики ишемической болезни сердца (ИБС) и ее типичных проявлений: стенокардии и инфаркта миокарда. Также эта методика является хорошим подспорьем в диагностике электролитных нарушений (нарушений обмена кальция, калия и др.) и внесердечной патологии, например, заболеваний легких. Несмотря на свою высокую диагностическую ценность, электрокардиограмма не может нам дать полную картину физиологических и патологических процессов, происходящих в сердце. Связано это, главным образом, с кратковременностью записи ЭКГ и регистрацией ее в покое. Поэтому для повышения эффективности данного метода при диагностике стенокардии напряжения, безболевой ишемии, аритмий и др. применяются модифицированные методики: суточное мониторирование ЭКГ, велоэргометрия, тредмилл.

								</p>

							   </b>

                               </ul>	 		  

                             </div> 			 

                           </div> 		 

		 			   </li> 	

                       <li>              

					   <h3 style="text-align:left;">

                       <b style="color:#900; font-size:20px;">

                       <img src="../root/msite/kardio/heart.png" width="20px" height="20px" />					                       Холтеровское мониторирование (ЭКГ) 

                       </b>

                       </h3>              

                         <div class="acc-section" style="height:0px;">               

                          <div class="acc-content">                

                           <ul class="acc"> 	

						   <b>

                            <p>

	     Холтеровское мониторирование - это метод функциональной диагностики, с помощью которого осуществляется запись ЭКГ (электрокардиограммы) непрерывно в течение суток. Для этого используется носимый портативный регистратор (холтер), который производит круглосуточную запись электрокардиограммы и передачу информации о работе сердца за сутки в компьютер. 

Специальная программа обеспечивает выявление и анализ всех видов нарушения сердечного ритма, болевых и без болевых приступов ишемии миокарда. Этот метод позволяет не только точно поставить диагноз, но и существенно повысить эффективность лечения сердечно-сосудистых заболеваний (гипертония, инфаркт, атеросклероз, миокардит, аритмии, вегето-сосудистая дистония). 

							</p>

                            <p>

Для чего проводится холтеровское мониторирование?

							</p>

                            <p>

Холтеровское мониторирование используется для оценки работы сердца, выявления изменений и нарушений в функционировании сердечно-сосудистой системы. Суточное холтеровское мониторирование выявляет практически все возможные нарушения в работе сердечно-сосудистой системы в течение суток, что невозможно при обследовании другими способами кардиологической диагностики.

							</p>

							</b>

						  </ul>

                        </div> 			 

                     </div> 		 

					</li> 		 

				</ul>

					<script type="text/javascript">

					 var parentAccordion=new TINY.accordion.slider("parentAccordion");

					 parentAccordion.init("acc","h3",false,0);

					 var nestedAccordion=new TINY.accordion.slider("nestedAccordion");

					 nestedAccordion.init("nested","h3",true,0,"acc-selected");

					</script> 	

				</div>

				

			</div>

			<div id="right_block_sequ_text" style="position:relative; float:left; text-align:left; text-indent: 0px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1.2; font-style:italic; font-size:13px; color:#900; width:15%; left:35px;">

			<div>Не относитесь легкомысленно к своему здоровью.

Прислушайтесь к своему сердцу и проконсультируйтесь у врача-кардиолога! </div>

				<div style="margin-top:15px; margin-bottom:15px; padding:5px;"><img align="right" src="../root/msite/kardio/usl_1.jpg" width="140px" height="90px" /></div>

				<div style="padding:5px;"><br /><br /><br /><br /><br /><img align="right" src="../root/msite/kardio/usl_2.jpg" width="140px" height="90px" /></div>

				<div style="padding:5px;"><br /><br /><br /><br /><br /><br /><img align="right" src="../root/msite/kardio/usl_3.jpg" width="140px" height="90px" />&nbsp;</div>

			</div>

			

        </div>

     </div>

       

    </div>

</div>

<?php

}

else

   if ($_GET['pm'] == 3)

   {

?>

<div class="catalogue_item_cont_m"> 

<div class="sequ_conteiner">

   <div class="sequ_up">

		<div style="position:relative; float:left; padding:10px; top:10px; left:50px;"><img src="../root/msite/kardio/ser.png"/></div>

		<div style="position:relative; float:left; left:80px; top:48px; color:#FFF;	font-size:24px; text-align:justify; line-height:1px; letter-spacing:14px;">Частный приём</div>

		<div style="position:relative; float:left; left:240px; top:50px; color:#FFF;	font-size:12px;  line-height:1.2; text-align:right;"><span>тел. (066) 907-94-66</span><br />

<div style="color:#95b7e2;">Г. Донецк, Калининский район, Пр. Ильича, 14-Е <br />

<div style="letter-spacing:2px;">(ДОКТМО, больница им. Калинина),</div>

Медицинский центр «ГЕРЦ», 7 этаж, кабинет 715.</div></div>

		<div style="position:relative; float:left; clear:left; left:190px; top:-32px; color:#FFF;	font-size:24px; text-align:justify; line-height:1px; letter-spacing:1px; text-transform:uppercase;"><b>Кардиолога-терапевта</b></div>

		<div style="position:relative; float:left; clear:left; left:190px; top:-17px; color:#FFF; margin-bottom:10px;	font-size:16px; text-align:justify; line-height:1px; letter-spacing:6px;">Медицинский центр "Герц"</div>

    	<!--

		<div style="position:relative; float:left; clear:left; margin-bottom:10; padding:0; left:20; width:100%;"><img src="../root/msite/kardio/up.png" align="left" width="100%" height="105" /></div>

		-->

    </div>

    <div class="sequ_stroke"> 

        <div style="padding:6px; bottom: -10px; color:#264c7b; font-family:'Times New Roman', Times, serif; font-size:20px;">

        Сердце - это ключевой орган в организме человека</div>

        </div>

    <div class="sequ_main_menu">

    	<div style="background: url(../root/msite/kardio/neb.jpg); width:100%; height:452px; position:relative; float:left;">

        	<div style="position:relative; float:left; left:25; width:370;"><img src="../root/msite/kardio/dev.png" align="left" width="367" height="450" /></div>

			<div style="position:relative; float:right; padding:0px;">

				<div class="sequ_a_3"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=3"><img src="../root/msite/kardio/ko_on.jpg" width="135" height="36" /></a></div>

				<div class="sequ_a_2"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=2"><img src="../root/msite/kardio/se.jpg" width="135" height="36" /></a></div>

				<div class="sequ_a_1"><a href="http://eurodonetsk.com/index.php?business_full=404&pm=1"><img src="../root/msite/kardio/us.jpg" width="135" height="36" /></a></div>

			</div>

            

            <div style="padding-top: 100; text-align:left; font-style:italic; color:#264c7b; font:Tahoma, Geneva, sans-serif; font-family:Tahoma, Geneva, sans-serif; font-size:22px; line-height:1.4; padding-left:390; margin-top:100;"><br /><br />Наша жизнь и наше здоровье напрямую зависят от его состояния. Именно поэтому опасение приобрести заболевание сердца является одним из самых распространенных и самых сильных страхов человека. С любыми жалобами на боли в области сердца следует обращаться к кардиологу для выяснения причины ваших жалоб и прояснения серьезности ситуации!</div>       

        </div>

    </div>

    <div class="sequ_podmain">

    <b>В нашем центре Вы можете пройти полное диагностическое обследование сердечно-сосудистой системы.</b>

    </div>

	

	<!-- Основной текст -->

	

    <div class="sequ_text">

    	<div style="position:relative; float:left; width:100%;">

			<div id="left_block_sequ_text" style="position:relative; float:left; width:50%; padding:16px; left:25px; text-align:left; font-style:italic; color:black; font:Tahoma, Geneva, sans-serif; font-family:Tahoma, Geneva, sans-serif; font-size:18px; text-indent:0px;">

			<b style="line-height:1.7;">

			Г. Донецк, Калининский район, Пр. Ильича, 14-Е <br />

			ДОКТМО, больница им. Калинина), <br />

			Медицинский центр «ГЕРЦ», 7 этаж, <br />

			 кабинет 715. <br />

			<b style="color:#900;">http://www.cardiology.at.ua</b> <br />

			Прием больных ведется ежедневно  <br />

			с понедельника по пятницу <br />

			с 8:00 по 16:00 <br />

			по предварительной записи <br />

			по телефону: 066-907-94-66. <br />

			</b>

							<div style="position:relative; float:left;  width:60%; text-align:left; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; line-height:1; font-style:italic; font-size:18px; color:#900;">

                <b>	

					<div style="padding-top:50px; padding-bottom:7px; font-size:16px; color:#264c7b;">Пенсионерам - скидка 20%</div> 

                    <div style="text-indent:30px; font-size:14px; color:black;"> (консультация кардиолога, ЭКГ)</div>

                    <div style="padding-top:16px; padding-bottom:7px; font-size:16px; color:#264c7b;">Участникам войны и детям войны - скидка 35%</div>

                    <div style="text-indent:30px; font-size:14px; color:black;">(консультация кардиолога, ЭКГ)</div>

                    <div style="margin-top:10px; font-size:16px; color:#264c7b; text-transform:uppercase;">Подробнее на вкладке услуги

                    </div>

               </b>

               				 </div>

			</div>

			

		<div id="photo_sequ_bottom" style="position:relative; float:left; margin-top:15px; left:50px;"><img src="../root/msite/kardio/photo.jpg" width="365px" height="484px" align="right" /></div>

		

			<div id="div_st">

        <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AAmDzUsBAAAARkVWCAIAXzMCgKN58_MQUqB134Sdp-unCH0AAAAAAAAAAACbJlz2mcKc4anRgbxx6LBZ5BHPyg==" type="text/javascript"></script>

    <script type="text/javascript">

        window.onload = function () {

            var map = new YMaps.Map(document.getElementById("YMapsID"));

            map.setCenter(new YMaps.GeoPoint(37.824874,48.002321), 17);



            var content = document.createElement('span');

            content.innerHTML = "Медицинский центр «Герц»";

            map.openBalloon(new YMaps.GeoPoint(37.824174,48.002221), content);



            map.addControl(new YMaps.ToolBar());

            map.addControl(new YMaps.Zoom());

            map.addControl(new YMaps.MiniMap());

            map.addControl(new YMaps.ScaleLine());

        }

    </script>





	 <div id="YMapsID" style="width:90%; height:450px; position:relative; float:left; top:20px; left:40px; z-index:20; margin-bottom:40px;"></div>

   </div>





			

			

			

			

			

        </div>

    </div>

       

    </div>

</div>



<?php

   } 

?>







<div id="catalogue_item_menu">

<p>&nbsp;</p>

<p>&nbsp;</p>

<div class="catalogue_item_cont">

<a href="index.php?section_id=2&amp;business=1">бизнес</a>

 / 

<a href="index.php?section_id=32&amp;business=1">предприятия</a>

 / 

<a href="index.php?section_id=389&amp;business=2">отдых и развлечения</a>

 / 

<a href="index.php?section_id=390&amp;business=2">кафе и рестораны</a>

</div>






<div id="catalogue_item_menu">

<div class="catalogue_item_mp_a">

<a href="">Фотогалегея:</a></div>

</div>

<div class="catalogue_item_cont">

</div>

<div id="catalogue_item_menu">

<div class="catalogue_item_mp_a">

<a href="">Контактная информация:</div>

</div>

 <div class="catalogue_item_cont">

 		 <table width="100%">

			<tbody>

 			<tr>

			<!--	<td><img class="main_sec_image" src="" width="60" height="60" border="0" alt="" /></td>-->

				<td>Адрес:</td>

				<td>Телефон:</td>

				<td>Факс:</td>

				<td>E-mail:</td>

				<td>Веб-сайт:</td>

			</tr>

			<tr>

				<td>Донецк, ул. Квиринга, 71а<br /> Ленинский р-н, <br />

			микрорайон Широкий</td>

				<td>+38 (062) 348-28-94</td>

				<td></td>

				<td></td>

				<td>http://artemida.donetsk.ua</td>



			</tr>

			</tbody> 

		 </table> 		

	 </div>

</div>  





