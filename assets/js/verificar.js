$(document).ready(function() {
    veri();
});

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
    ctx.font = '20pt sans-serif';
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

        var img = document.createElement("IMG");
        img.className = "mynasicondiv";
        img.src = "<?php echo base_url("imagenes/emoticones/lagrima.png"); ?>";

        $('.emojis').append(img);

   });
});
  $(function () {
    $('.risa').on('click', function () {

        var img = document.createElement("IMG");
        img.className = "mynasicondiv";
        img.src = "<?php echo base_url("imagenes/emoticones/risa.png"); ?>";

        $('.emojis').append(img);

   });
});
   $(function () {
    $('.yaa').on('click', function () {

        var img = document.createElement("IMG");
        img.className = "mynasicondiv";
        img.src = "<?php echo base_url("imagenes/emoticones/yaa.png"); ?>";

        $('.emojis').append(img);

   });
});

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


    function veri(){
    var meme1=id;
    var emoji1=ide;
    var top1 = $('#top-text').val();
    var bottom1 = $('#bottom-text').val();

    $.ajax({
        data: {"meme1":meme1, "emoji1": emoji1, "top1": top1, "bottom1": bottom1},
        url: "verificar",
        type: "post",
        success: function(response){
            //alert("Se ha autentificado el Meme");
           window.location="verificar";
        }
    });

    }