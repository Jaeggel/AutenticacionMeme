
<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/galmeme.css");?>" rel="stylesheet">

<div class="container">
	<div class="row main">

		<div class="panel-heading">
	       <div class="panel-title text-center">
	       		<h1 class="title">Generador de Meme</h1>
	       		<h2 class="title">Memes</h2>
	       		<hr/>
	       		<label id="ced" value="<?php echo $this->session->userdata("cedula")?>">C.I.<?php echo $this->session->userdata("cedula")?></label>
	       		<hr/>
	       	</div>
	    </div>
    </div>

    <div class="row">
  		<div class="col-sm-6">
  			<div class="form-group">
				<label class="cols-sm-2 control-label">Escoger Meme:</label>
			</div>
			<div style="position:relative;">
				<ul id="gallery">
					<div id="imagenes">
						<li id="spider"><img src="<?php echo base_url("imagenes/memes1/spider.jpg"); ?>" alt=""/></li>
						<li id="homer"><img src="<?php echo base_url("imagenes/memes1/homer.jpg"); ?>" alt="" /></li>
						<li id="cry"><img src="<?php echo base_url("imagenes/memes1/cry.jpg"); ?>" alt=""/></li>
						<li id="naah"><img src="<?php echo base_url("imagenes/memes1/naah.jpg"); ?>"  alt="" /></li>
						<li id="pontepilas"><img src="<?php echo base_url("imagenes/memes1/pontepilas.jpg"); ?>" alt="" /></li>
						<li id="what"><img src="<?php echo base_url("imagenes/memes1/what.jpg"); ?>" alt="" /></li>
						<li id="grito"><img src="<?php echo base_url("imagenes/memes1/grito.jpg"); ?>"  alt="" /></li>
						<li id="fake"><img src="<?php echo base_url("imagenes/memes1/fake.jpg"); ?>"  alt="" /></li>
						<li id="fry"><img src="<?php echo base_url("imagenes/memes1/fry.jpg"); ?>"   alt="" /></li>
						<li id="calmarno"><img src="<?php echo base_url("imagenes/memes1/calmarno.jpg"); ?>" alt="" /></li>
						<li id="drake"><img src="<?php echo base_url("imagenes/memes1/drake.jpg"); ?>" alt="" /></li>
						<li id="girl"><img src="<?php echo base_url("imagenes/memes1/girl.jpg"); ?>" alt="" /></li>
					</div>
					<div id="frases">
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Texto Cabecera</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-arrow-up fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id='top-text'  placeholder="Texto Cabecera"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Texto Pie</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-arrow-down fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id='bottom-text'  placeholder="Texto Pie"/>
								</div>
							</div>
						</div>
					</div>
					</br>
					<label for="username" class="cols-sm-2 control-label">Escoger Emoji:</label>
					<div id="emoji">
						<div class="form-group">
						        <div class="col-sm-2">
						          <button id ="risa" class="risa" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/risa.png"); ?>" WIDTH=36 HEIGHT=36  VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>
      						<div class="form-group">
						        <div class="col-sm-2">
						          <button id ="lagrima" class="lagrima" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/lagrima.png"); ?>" WIDTH=36 HEIGHT=36 BORDER=2 VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>
      						<div class="form-group">
						        <div class="col-sm-2">
						          <button id="yaa" class="yaa" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/yaa.png"); ?>" WIDTH=36 HEIGHT=36  BORDER=2 VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>
      						<div class="form-group">
						        <div class="col-sm-2">
						          <button id="love" class="love" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/love.png"); ?>" WIDTH=36 HEIGHT=36 BORDER=2 VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>
      						<div class="form-group">
						        <div class="col-sm-2">
						          <button id="fear" class="fear" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/fear.png"); ?>" WIDTH=36 HEIGHT=36 BORDER=2 VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>
      						<div class="form-group">
						        <div class="col-sm-2">
						          <button id="wink" class="wink" type="button" style="background: transparent;border: none !important;" ><img src="<?php echo base_url("imagenes/emoticones/wink.png"); ?>" WIDTH=36 HEIGHT=36 BORDER=2 VSPACE=3 HSPACE=3 align="left"/>
						          </button>
						        </div>
      						</div>

					</div>-
				</ul>
			</div>

  		</div>
  		<div class="col-sm-6">
  			<div class="form-group">
				<label class="cols-sm-2 control-label">Vista Previa Meme: </label>
				<div class="emojis" width="20" height="20" style="text-align: left">
				</div>
			</div>

			<canvas id="memecanvas">
  					Sorry, canvas not supported
			</canvas>
  		</div>
	</div>


</div>
<div class="main-center">
	<div class="form-group">
		<div>
			<button type="submit" id="auth" class="btn btn-primary btn-lg btn-block login-button">Cambiar Meme</button></br>
		</div>
	</div>
</div>

<script type="text/javascript">
	var gal =
	{
		init : function() {
			if (!document.getElementById || !document.createElement || !document.appendChild) return false;
				if (document.getElementById('gallery')) document.getElementById('gallery').id = 'jgal';
					var li = document.getElementById('jgal').getElementsByTagName('li');
					li[0].className = 'active';

				for (i=0; i<li.length; i++) {
					li[i].style.backgroundImage = 'url(' + li[i].getElementsByTagName('img')[0].src + ')';
					li[i].title = li[i].getElementsByTagName('img')[0].alt;

					gal.addEvent(li[i],'click',function()
					{
						var im = document.getElementById('jgal').getElementsByTagName('li');
						for (j=0; j<im.length; j++) {
							im[j].className = '';
						}
						this.className = 'active';
					});
			}
		},

		addEvent : function(obj, type, fn) {
			if (obj.addEventListener) {
				obj.addEventListener(type, fn, false);
			}
			else if (obj.attachEvent) {
				obj["e"+type+fn] = fn;
				obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
				obj.attachEvent("on"+type, obj[type+fn]);
			}
		}
	}
	gal.addEvent(window,'load', function() {
	gal.init();
	});


  var memeSize = 550;

  var canvas = document.getElementById('memecanvas');
  ctx = canvas.getContext('2d');


  // Set the text style to that to which we are accustomed



  canvas.width = memeSize;
  canvas.height = memeSize;

  //  Grab the nodes



  var img = document.getElementById('memecanvas');
  var topText = document.getElementById('top-text');
  var bottomText = document.getElementById('bottom-text');

  // When the image has loaded...
  img.onload = function() {
    drawMeme()
  }

  topText.addEventListener('keydown', drawMeme)
  topText.addEventListener('keyup', drawMeme)
  topText.addEventListener('change', drawMeme)

  bottomText.addEventListener('keydown', drawMeme)
  bottomText.addEventListener('keyup', drawMeme)
  bottomText.addEventListener('change', drawMeme)

  function drawMeme() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.drawImage(img, 0, 0, memeSize, memeSize);

    ctx.lineWidth  = 4;
    ctx.font = '22pt Impact';
    ctx.strokeStyle = 'black';
    ctx.fillStyle = 'white';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'top';

    var text1 = document.getElementById('top-text').value;
    text1 = text1.toUpperCase();
    x = memeSize / 2;
    y = 0;

    wrapText(ctx, text1, x, y, 300, 28, false);

    ctx.textBaseline = 'bottom';
    var text2 = document.getElementById('bottom-text').value;
    text2 = text2.toUpperCase();
    y = memeSize;

    wrapText(ctx, text2, x, y, 300, 28, true);

  }

  function wrapText(context, text, x, y, maxWidth, lineHeight, fromBottom) {

    var pushMethod = (fromBottom)?'unshift':'push';

    lineHeight = (fromBottom)?-lineHeight:lineHeight;

    var lines = [];
    var y = y;
    var line = '';
    var words = text.split(' ');

    for (var n = 0; n < words.length; n++) {
      var testLine = line + ' ' + words[n];
      var metrics = context.measureText(testLine);
      var testWidth = metrics.width;

      if (testWidth > maxWidth) {
        lines[pushMethod](line);
        line = words[n] + ' ';
      } else {
        line = testLine;
      }
    }
    lines[pushMethod](line);

    for (var k in lines) {
      context.strokeText(lines[k], x, y + lineHeight * k);
      context.fillText(lines[k], x, y + lineHeight * k);
    }


  }
  $(function () {
    $('.lagrima').on('click', function () {
        $('.emojis img').hide();
 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/lagrima.png"); ?>";

        $('.emojis').append(img);

   });
});
  $(function () {
    $('.risa').on('click', function () {
        $('.emojis img').hide();

 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/risa.png"); ?>";

        $('.emojis').append(img);

   });
});
   $(function () {
    $('.yaa').on('click', function () {
       $('.emojis img').hide();
 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/yaa.png"); ?>";

        $('.emojis').append(img);

   });
});
   $(function () {
    $('.fear').on('click', function () {
        $('.emojis img').hide();
 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/fear.png"); ?>";

        $('.emojis').append(img);

   });
});
   $(function () {
    $('.wink').on('click', function () {
       $('.emojis img').hide();
 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/wink.png"); ?>";

        $('.emojis').append(img);

   });
});
   $(function () {
    $('.love').on('click', function () {
       $('.emojis img').hide();
 		var img = document.createElement("IMG");
    	img.className = "mynasicondiv";
    	img.src = "<?php echo base_url("imagenes/emoticones/love.png"); ?>";

        $('.emojis').append(img);

   });
});



</script>
<script>


var id="spider";
var ide="risa";
$('#gallery li').click(function (){
	id = $(this).attr('id');
	//alert(id);
});
$('#emoji button').click(function() {
    ide = $(this).attr('id');
    //alert(ide);
});

$('#auth').on('click',function(){

	var meme=id;
	var datos;
	var emoji=ide;
	var top = $('#top-text').val().toLocaleUpperCase();
	var bottom = $('#bottom-text').val().toLocaleUpperCase();
	var label = $('#ced');
	var ced= label.attr('value');

	$.ajax({
		url: "update_meme",
		data: {"meme":meme, "emoji": emoji, "top": top, "bottom": bottom, "ced":ced},
		type: "POST",
		dataType: 'json',
		success: function(data){
			cambiar(data);
		}
	});
 });

    function cambiar(datos){
        if (datos) {
            alert('Su Meme se ha actualizado correctamente.');
            window.location="login";
        }else{
            alert('Su Meme no se ha actualizado.');
            window.location="verificar2";
        }
    }

 </script>