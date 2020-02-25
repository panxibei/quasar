<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
	<title>test jsqrcode</title>
    <link rel="stylesheet" href="{{ asset('statics/iview/styles/iview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/camera.css') }}">
    
</head>
<body>

<div id="app" class="contentarea">

<form method="post" action="#" id="printJS-form">
    aaaaaaaaaaaaaaaaa
 </form>

    <br>
    <button @click="printJS('app', 'html')">Print</button>
    <br>
    <br>
    必须允许
    <br>

    <button id="startcapture" @click="vm_app.modal_camera_show=true">Start Up (permit camera)</button>
    <br><br>

    imgUrl:<br>
    @{{ camera_imgurl.substr(0, 40) }}
    <br>
    <!-- <button @click="submitpic">Submit Pic</button> -->
    <button @click="get_qrcode">Submit Pic</button>


    <br><br>


    <br><br>



    <br><br>




<br><br>
<br><br>
aaaaaaaaaaaaaaaaa
<br><br>

<div class="container">
	
    <object  id="iembedflash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="320" height="240">
        <param name="movie" value="camcanvas.swf" />
        <param name="quality" value="high" />
      <param name="allowScriptAccess" value="always" />
        <embed  allowScriptAccess="always"  id="embedflash" src="camcanvas.swf" quality="high" width="320" height="240" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" mayscript="true"  />
  </object>
  
  </div>
<button onclick="captureToCanvas()">Capture</button><br>
<canvas id="qr-canvas" width="640" height="480"></canvas>

<br><br>
fffffffffffffffffff
<br><br>

</div>




</body>
<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/bluebird.min.js') }}"></script>
<script src="{{ asset('statics/iview/iview.min.js') }}"></script>
<script src="{{ asset('js/camera.js') }}"></script>
<script src="{{ asset('js/httpVueLoader.js') }}"></script>

<script type="text/javascript" src="{{ asset('statics/jsqrcode/grid.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/version.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/detector.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/formatinf.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/errorlevel.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/bitmat.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/datablock.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/bmparser.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/datamask.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/rsdecoder.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/gf256poly.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/gf256.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/decoder.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/qrcode.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/findpat.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/alignpat.js') }}"></script>
<script type="text/javascript" src="{{ asset('statics/jsqrcode/databr.js') }}"></script>

<script type="text/javascript">
var gCtx = null;
	var gCanvas = null;

	var imageData = null;
	var ii=0;
	var jj=0;
	var c=0;
	
	
function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;

  handleFiles(files);
}

function handleFiles(f)
{
	var o=[];
	for(var i =0;i<f.length;i++)
	{
	  var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {
          qrcode.decode(e.target.result);
        };
      })(f[i]);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f[i]);	}
}
	
function read(a)
{
	alert(a);
    
    if (a == 'error decoding QR Code' || a == 'Failed to load the image') {
        return false;
    } else {
        console.log('path: ' + a);
    }
}	
	
function load()
{
	initCanvas(640,480);
	qrcode.callback = read;
	qrcode.decode("{{ asset('statics/jsqrcode/test.jpg') }}");
	
}

function initCanvas(ww,hh)
	{
		gCanvas = document.getElementById("qr-canvas");
		gCanvas.addEventListener("dragenter", dragenter, false);  
		gCanvas.addEventListener("dragover", dragover, false);  
		gCanvas.addEventListener("drop", drop, false);
		var w = ww;
		var h = hh;
		gCanvas.style.width = w + "px";
		gCanvas.style.height = h + "px";
		gCanvas.width = w;
		gCanvas.height = h;
		gCtx = gCanvas.getContext("2d");
		gCtx.clearRect(0, 0, w, h);
		imageData = gCtx.getImageData( 0,0,320,240);
	}

	function passLine(stringPixels) { 
		//a = (intVal >> 24) & 0xff;

		var coll = stringPixels.split("-");
	
		for(var i=0;i<320;i++) { 
			var intVal = parseInt(coll[i]);
			r = (intVal >> 16) & 0xff;
			g = (intVal >> 8) & 0xff;
			b = (intVal ) & 0xff;
			imageData.data[c+0]=r;
			imageData.data[c+1]=g;
			imageData.data[c+2]=b;
			imageData.data[c+3]=255;
			c+=4;
		} 

		if(c>=320*240*4) { 
			c=0;
      			gCtx.putImageData(imageData, 0,0);
		} 
 	} 

        function captureToCanvas() {
		flash = document.getElementById("embedflash");
		flash.ccCapture();
		qrcode.decode();
        }
</script>


<script type="text/javascript">
var vm_app = new Vue({
    el: '#app',
	data: {

        modal_camera_show: false,
        camera_imgurl: '',


    },
	methods: {

        submitpic() {
			var _this = this;
			var imgurl = _this.camera_imgurl;
			// var imgurl = 'data:image/png;base64,R0lGODlhWAAfAJEAAAAAAP////8AAGZmZiH5BAAHAP8ALAAAAABYAB8AAALfhI+py+0PX5i02ouz3rxn44XiSHJgiaYqdq7uK7bwTFtyjcN3zqd7D4wBgkTSr4i87AQCCrPCfFoG1IGIWqtabUOLNPCVfgNY8rZTzp4py+Yk7B6nL9pp3T6f3O3KLrQJ6OYlqLdGUTaHuKZYwcjHdfEUOEh4aGiW4Vi4acnZeNkGBlb5Ror5mbmVqLrISgfq9zcqO4uxmup5enuKChk56RRHqKnbmktMnDvxI1kZRbpnmZccXTittXaUtB2gzY3k/U0ULg5EXs5zjo6jvk7T7q4TGz8+T28eka+/zx9RAAA7';
            // console.log(imgurl);return false;
			
			var url = "{{ route('test.camera.testcamera') }}";
			axios.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';
			axios.post(url,{
				id: 2,
				imgurl: imgurl
			})
			.then(function (response) {
                // console.log(response.data);return false;

				if (response.data) {
                    console.log('成功');
                    alert('成功');
                    alert(imgurl);
				} else {
                    console.log('失败');
                    alert('失败');
				}
			})
			.catch(function (error) {
                console.log(error);
                alert('error');
			})
        },

        get_qrcode () {
            var imgurl = this.camera_imgurl;

            initCanvas(640,480);
            qrcode.callback = read;
            // qrcode.decode("{{ asset('statics/jsqrcode/test.jpg') }}");
            qrcode.decode(imgurl);
            
        },


	},
	mounted: function () {
        // this.get_qrcode();
	}
})
</script>
</html>