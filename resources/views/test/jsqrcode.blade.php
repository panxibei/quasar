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
    <link rel="stylesheet" href="{{ asset('css/qrcodescan.css') }}">
    
</head>
<body>

<div id="app" class="contentarea">

    aaaaaaaaaaaaaaaaa test jsqrcode aaaaaaaaaaaaaaaaaa
    
    <br>
    权限必须允许
    <br>

    <button id="startcapture" @click="vm_app.modal_qrcodescan_show=true">Start Up (permit camera)</button>
    <br><br>

    imgUrl:<br>
    @{{ camera_imgurl.substr(0, 40) }}
    <br><br>

    qrcodeinfo:<br>
    @{{ qrcodeinfo }}
    <br>
    <!-- <button @click="submitpic">Submit Pic</button> -->
    <button @click="close_camera">close camera</button>

    <br><br>

    <my-qrcodescan></my-qrcodescan>

<br><br>
foot foot foot
<br>

<!-- <div class="container">
	
    <object  id="iembedflash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="320" height="240">
        <param name="movie" value="camcanvas.swf" />
        <param name="quality" value="high" />
        <param name="allowScriptAccess" value="always" />
        <embed allowScriptAccess="always" id="embedflash" src="camcanvas.swf" quality="high" width="320" height="240" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" mayscript="true"  />
  </object>
  
  </div>
<button onclick="captureToCanvas()">Capture</button><br>
<canvas id="qr-canvas" width="640" height="480"></canvas> -->

<br>
fffffffffffffffffff
<br><br>

</div>




</body>
<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/bluebird.min.js') }}"></script>
<script src="{{ asset('statics/iview/iview.min.js') }}"></script>
<script src="{{ asset('js/httpVueLoader.js') }}"></script>

<!-- 二维码扫描要加载以下js库文件 -->
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

<!-- 二维码扫描还要加载以下两个js文件 -->
<script src="{{ asset('js/qrcodeCamera.js') }}"></script>
<script src="{{ asset('js/qrcodeScan.js') }}"></script>


<script type="text/javascript">
var vm_app = new Vue({
    el: '#app',
	components: {
		'my-qrcodescan': httpVueLoader("{{ asset('components/my-qrcodescan.vue') }}")
	},
	data: {

        modal_qrcodescan_show: false,
        stopscan: null,
        camera_imgurl: '',

        qrcodeinfo: '',

    },
	methods: {

        // 在这里没有用到
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

            if (imgurl == '') return false;
            // alert(imgurl);

            // console.log(imgurl);

            // initCanvas(640,480);
            qrcode.callback = read;
            // qrcode.decode("{{ asset('statics/jsqrcode/test.jpg') }}");
            qrcode.decode(imgurl);
            
        },

        close_camera() {

            var video = document.getElementById('video');
            const stream = video.srcObject;

            if (stream) {
                const tracks = stream.getTracks();
            
                tracks.forEach(function(track) {
                    track.stop();
                });
            
                video.srcObject = null;
            }

        },


    },
	mounted: function () {

    }
})
</script>
</html>