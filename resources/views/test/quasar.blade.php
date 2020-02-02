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


  <q-layout view="hHh lpR fFf" container style="height: 800px" class="shadow-2 rounded-borders">
    
    <q-header reveal elevated class="bg-primary text-white">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="left = !left"></q-btn>

        <q-toolbar-title>
          <q-icon name="alarm"></q-icon>
          <!-- <q-avatar>
            <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
          </q-avatar> -->
          Title header
        </q-toolbar-title>
      </q-toolbar>
    </q-header>
    
    <q-drawer show-if-above v-model="left" side="left" bordered>
    <!-- drawer content -->
      drawer here
  </q-drawer>
    
  <q-page-container>
    router-view

    <br>

    <div class="q-ma-md">
      <q-btn label="Notify" color="primary" @click="notify"></q-btn>
      
      <q-btn color="white" text-color="black" label="Standard"></q-btn>
    </div>
    
    <q-icon name="alarm"></q-icon>

    <div class="q-ma-md">
      Running Quasar v@{{ version }}
    </div>

    <q-page padding class="q-pa-md">
      <p v-for="n in 15" :key="n">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nihil praesentium molestias a adipisci, dolore vitae odit, quidem consequatur optio voluptates asperiores pariatur eos numquam rerum delectus commodi perferendis voluptate?
      </p>




      <!-- place QPageScroller at end of page -->
      <q-page-scroller position="bottom-right" :scroll-offset="150" :offset="[18, 18]">
        <q-btn fab icon="keyboard_arrow_up" color="accent" />
      </q-page-scroller>

    </q-page>

  </q-page-container>
    
  <q-footer elevated class="bg-grey-8 text-white">
    <q-toolbar>
      <q-toolbar-title>
        <!-- <q-avatar>
          <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
        </q-avatar> -->
        Title footer
      </q-toolbar-title>
    </q-toolbar>
  </q-footer>     


    

  </q-layout>





<br>


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
        version: Quasar.version,
        left: false
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