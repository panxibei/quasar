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
    
    <!-- 头部 -->
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


        <!-- 头部菜单栏 -->
        <q-btn color="primary" label="Basic Menu">
          <q-menu transition-show="flip-right" transition-hide="flip-left">
            <q-list style="min-width: 100px">
              <q-item clickable v-close-popup>
                <q-item-section>New tab</q-item-section>
              </q-item>
              <q-item clickable v-close-popup>
                <q-item-section>New incognito tab</q-item-section>
              </q-item>
              <q-separator></q-separator>
              <q-item clickable v-close-popup>
                <q-item-section>Recent tabs</q-item-section>
              </q-item>
              <q-item clickable v-close-popup>
                <q-item-section>History</q-item-section>
              </q-item>
              <q-item clickable v-close-popup>
                <q-item-section>Downloads</q-item-section>
              </q-item>
              <q-separator></q-separator>
              <q-item clickable v-close-popup>
                <q-item-section>Settings</q-item-section>
              </q-item>
              <q-separator></q-separator>
              <q-item clickable v-close-popup>
                <q-item-section>Help &amp; Feedback</q-item-section>
              </q-item>
            </q-list>
          </q-menu>
        </q-btn>

        <q-btn flat round dense icon="sim_card" class="q-mr-xs"></q-btn>
        <q-btn flat round dense icon="gamepad"></q-btn>

      </q-toolbar>

      <!-- 工具栏中的面包屑 -->
      <q-toolbar inset>
        <q-breadcrumbs active-color="white" style="font-size: 16px">
          <q-breadcrumbs-el label="Home" icon="home"></q-breadcrumbs-el>
          <q-breadcrumbs-el label="Components" icon="widgets"></q-breadcrumbs-el>
          <q-breadcrumbs-el label="Toolbar"></q-breadcrumbs-el>
        </q-breadcrumbs>
      </q-toolbar>

    </q-header>
    

    <!-- 左侧导航/菜单栏 -->
    <q-drawer
        v-model="drawer"
        show-if-above

        :mini="miniState"
        @mouseover="miniState = false"
        @mouseout="miniState = true"

        :width="200"
        :breakpoint="500"
        bordered
        content-class="bg-grey-3"
      >
      <q-scroll-area class="fit">
        <q-list padding>
          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="inbox"></q-icon>
            </q-item-section>

            <q-item-section>
              Inbox
            </q-item-section>
          </q-item>

          <q-item active clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="star"></q-icon>
            </q-item-section>

            <q-item-section>
              Star
            </q-item-section>
          </q-item>

          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="send"></q-icon>
            </q-item-section>

            <q-item-section>
              Send
            </q-item-section>
          </q-item>

          <q-separator></q-separator>

          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="drafts"></q-icon>
            </q-item-section>

            <q-item-section>
              Drafts
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>
    
    <!-- 中间主内容区域 -->
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

      <div class="q-ma-md" style="max-width: 400px">
        <q-input v-model="input1" label="q-input"></q-input>
        <br>

        <q-select v-model="select1" :options="options1" label="Standard"></q-select>
        <br>

        <q-radio v-model="radio1" val="line" label="Line"></q-radio>
        <q-radio v-model="radio1" val="rectangle" label="Rectangle"></q-radio>
        <q-radio v-model="radio1" val="ellipse" label="Ellipse"></q-radio>
        <q-radio v-model="radio1" val="polygon" label="Polygon"></q-radio>
        <br>

        <q-checkbox v-model="teal" label="Teal" color="teal"></q-checkbox>
        <q-checkbox v-model="orange" label="Orange" color="orange"></q-checkbox>
        <q-checkbox v-model="red" label="Red" color="red"></q-checkbox>
        <q-checkbox v-model="cyan" label="Cyan" color="cyan"></q-checkbox>
        <br>

        <q-toggle v-model="toggle1" label="On Right"></q-toggle>
        <q-toggle v-model="toggle1" color="green"></q-toggle>
        <q-toggle v-model="toggle1" label="On Left" left-label color="yellow"></q-toggle>
        <q-toggle v-model="toggle1" color="red"></q-toggle>
        <br>

        <q-option-group v-model="optiongroup1" :options="group_options1" color="primary"></q-option-group>
        <br>
        <q-option-group v-model="optiongroup2" :options="group_options2" color="green" type="checkbox"></q-option-group>
        <br>
        <q-option-group v-model="optiongroup3" :options="group_options3" color="yellow" type="toggle"></q-option-group>
        <br>

        <q-input filled v-model="timeWithSeconds" mask="fulltime" :rules="['fulltime']">
          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-time
                  v-model="timeWithSeconds"
                  with-seconds
                  format24h
                />
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
        <br>

        <q-input filled v-model="date1" mask="date" :rules="['date']">
          <template v-slot:append>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                <q-date v-model="date1" @input="() => $refs.qDateProxy.hide()"></q-date>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
        <br>

        <q-input filled v-model="date2">
          <template v-slot:prepend>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-date v-model="date2" mask="YYYY-MM-DD HH:mm:ss"></q-date>
              </q-popup-proxy>
            </q-icon>
          </template>

          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy transition-show="scale" transition-hide="scale">
                <q-time v-model="date2" mask="YYYY-MM-DD HH:mm:ss" with-seconds format24h></q-time>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
        <br>

      </div>

      <q-page padding class="q-pa-md">
        <p v-for="n in 5" :key="n">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nihil praesentium molestias a adipisci, dolore vitae odit, quidem consequatur optio voluptates asperiores pariatur eos numquam rerum delectus commodi perferendis voluptate?
        </p>




        <!-- place QPageScroller at end of page -->
        <q-page-scroller position="bottom-right" :scroll-offset="150" :offset="[18, 18]">
          <q-btn fab icon="keyboard_arrow_up" color="accent" />
        </q-page-scroller>

      </q-page>

    </q-page-container>

    <!-- 底部 -->
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






</div>

</body>
<script src="{{ asset('js/vue.min.js') }}"></script>
<!-- <script src="{{ asset('statics/quasar/vue.min.js') }}"></script> -->
<script src="{{ asset('statics/quasar/quasar.umd.min.js') }}"></script>
<script src="{{ asset('statics/quasar/lang/zh-hans.umd.min.js') }}"></script>
    
<script>
  Quasar.lang.set(Quasar.lang.zhHans)
  /*
  Example kicking off the UI. Obviously, adapt this to your specific needs.
  Assumes you have a <div id="q-app"></div> in your <body> above
  */
  var vm_app = new Vue({
    el: '#app',
    data: {
        
      version: Quasar.version,
      left: false,
      drawer: false,
      miniState: true,

      input1: '',

      select1: null,
      options1: [
        'Google', 'Facebook', 'Twitter', 'Apple', 'Oracle'
      ],

      radio1: 'line',

      teal: true,
      orange: false,
      red: false,
      cyan: true,

      toggle1: true,

      optiongroup1: 'opt1',
      group_options1: [
        {
          label: 'Option 1',
          value: 'op1'
        },
        {
          label: 'Option 2',
          value: 'op2'
        },
        {
          label: 'Option 3',
          value: 'op3'
        }
      ],
      optiongroup2: [ 'op1' ],
      group_options2: [
        {
          label: 'Option 1',
          value: 'op1'
        },
        {
          label: 'Option 2',
          value: 'op2'
        },
        {
          label: 'Option 3',
          value: 'op3'
        }
      ],
      optiongroup3: [ 'op1' ],
      group_options3: [
        {
          label: 'Option 1',
          value: 'op1'
        },
        {
          label: 'Option 2',
          value: 'op2'
        },
        {
          label: 'Option 3',
          value: 'op3'
        }
      ],

      timeWithSeconds: '10:56:00',
      
      date1: '2019/02/01',
      date2: '2019-02-01 12:44:55',
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