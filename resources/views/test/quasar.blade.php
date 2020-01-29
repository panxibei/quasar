<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
	<title>quasar</title>
    <link rel='stylesheet' href="{{ asset('statics/quasar/material-icons.css') }}">
    <link rel='stylesheet' href="{{ asset('statics/quasar/quasar.min.css') }}">
<style type="text/css">
	/* 解决闪烁问题的CSS */
	[v-cloak] {	display: none; }
</style>
<style type="text/css">
.ivu-table-cell{
	font-size: 12px;
}
</style>

</head>
<body>

<div id="app">
  aaaa
  
  <!-- <div class="q-pa-md q-gutter-sm"> -->
  <!-- <q-btn color="white" text-color="black" label="Standard"></q-btn> -->
  <!-- </div> -->
  
    <div class="q-ma-md">
    <q-btn label="Notify" color="primary" @click="notify"></q-btn>
    
    <q-btn color="white" text-color="black" label="Standard"></q-btn>
  </div>
  
  <q-icon name="alarm"></q-icon>
  
  bbbb
  
  <div class="q-ma-md">
    Running Quasar v@{{ version }}
  </div>
  
  </div>


</body>
<script src="{{ asset('js/vue.min.js') }}"></script>
<!-- <script src="{{ asset('statics/quasar/vue.min.js') }}"></script> -->
<script src="{{ asset('statics/quasar/quasar.umd.min.js') }}"></script>
    
<script>
    /*
    Example kicking off the UI. Obviously, adapt this to your specific needs.
    Assumes you have a <div id="q-app"></div> in your <body> above
    */
    new Vue({
    el: '#app',
    data: function () {
        return {
        version: Quasar.version
        }
    },
    methods: {
    
    notify: function () {
    this.$q.notify('Running on Quasar v' + this.$q.version)
}
    
    },
    // ...etc
    })
</script>

</html>