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

<style type="text/css">
.my-sticky-header-table {
  /* max height is important */
  /* this is when the loading indicator appears */
}
.my-sticky-header-table .q-table__middle {
  max-height: 300px;
}
.my-sticky-header-table .q-table__top,
.my-sticky-header-table .q-table__bottom,
.my-sticky-header-table thead tr:first-child th {
  /* bg color is important for th; just specify one */
  background-color: #c1f4cd;
  z-index: 1
}
/* 第二行表头边框 */
.my-sticky-header-table thead tr:nth-child(2) th {
  background-color: #c1f4cd;
  z-index: 1
}

.my-sticky-header-table thead tr th {
  position: sticky;
  z-index: 1;
}
.my-sticky-header-table thead tr:first-child th {
  top: 0;
}
/* 第二行表头固定 */
.my-sticky-header-table thead tr:nth-child(2) th {
  top: 48px;
}
/* 加载进度条的位置，48px为一行表头，96px为两行表头 */
.my-sticky-header-table.q-table--loading thead tr:last-child th {
  /* height of all previous header rows */
  top: 96px;
}
</style>

</head>
<body>

<div id="app">


  <q-layout view="hHh lpR fFf" container style="height: 800px" class="shadow-2 rounded-borders">
    
    <!-- 头部 -->
    <q-header reveal elevated class="bg-primary text-white">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="drawer = !drawer"></q-btn>

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

    <!-- <q-drawer
        v-model="drawer"
        show-if-above

        :mini="miniState"
        @mouseover="miniState = false"
        @mouseout="miniState = true"

        :width="260"
        :breakpoint="500"
        bordered
        content-class="bg-grey-3"
      > -->
    <q-drawer
        v-model="drawer"
        :width="200"
        :breakpoint="500"
        bordered
        content-class="bg-grey-3"
      >
      <q-tree
        :nodes="simple"
        node-key="label"
        no-connectors
        :expanded.sync="expanded"
      ></q-tree>


      <!-- <q-scroll-area class="fit">
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
      </q-scroll-area> -->


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

      <!-- tabs & tabpanels -->
      <div class="q-pa-md">
        <div class="q-gutter-y-md" style="max-width: 850px">
          <q-option-group
            v-model="panel"
            inline
            :options="[
              { label: 'Mails', value: 'mails' },
              { label: 'Alarms', value: 'alarms' },
              { label: 'Movies', value: 'movies' }
            ]"
          ></q-option-group>
    
          <q-tab-panels v-model="panel" animated class="shadow-2 rounded-borders">
            <q-tab-panel name="mails">
              <div class="text-h6">Mails</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </q-tab-panel>
    
            <q-tab-panel name="alarms">
              <div class="text-h6">Alarms</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </q-tab-panel>
    
            <q-tab-panel name="movies">
              <div class="text-h6">Movies</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </q-tab-panel>
          </q-tab-panels>
        </div>
      </div>

      <div class="q-pa-md">
        <div class="q-gutter-y-md" style="max-width: 600px">
          <q-card>
            <q-tabs
              v-model="tab"
              dense
              class="text-grey"
              active-color="primary"
              indicator-color="primary"
              align="justify"
              narrow-indicator
            >
              <q-tab name="mails" label="Mails" ></q-tab>
              <q-tab name="alarms" label="Alarms" ></q-tab>
              <q-tab name="movies" label="Movies" ></q-tab>
            </q-tabs>
    
            <q-separator ></q-separator>
    
            <q-tab-panels v-model="tab" animated>
              <q-tab-panel name="mails">
                <div class="text-h6">Mails</div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
              </q-tab-panel>
    
              <q-tab-panel name="alarms">
                <div class="text-h6">Alarms</div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
              </q-tab-panel>
    
              <q-tab-panel name="movies">
                <div class="text-h6">Movies</div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
              </q-tab-panel>
            </q-tab-panels>
          </q-card>
        </div>
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

      <div class="q-pa-md">
        <q-table
          class="my-sticky-header-table"
          title="Treats"
          :data="data"
          :columns="columns"
          row-key="name"
          flat
          bordered
          :separator="separator"
          :selected-rows-label="getSelectedString"
          selection="multiple"
          :selected.sync="tableselected"
          :visible-columns="visibleColumns"
          :loading="loading"
          no-data-label="Sorry! I didn't find anything for you!!"
        >
        
          <!-- 表格顶部 -->
          <template v-slot:top="props">
            <div class="col-2 q-table__title">Treats</div>

            <q-space></q-space>

            <div class="">
            <q-select
              v-model="visibleColumns"
              multiple
              borderless
              dense
              options-dense
              :display-value="$q.lang.table.columns"
              emit-value
              map-options
              :options="columns"
              option-value="name"
              style="min-width: 50px"
            ></select>
              
            </div>


            <q-btn
              flat round dense
              :icon="props.inFullscreen ? 'fullscreen_exit' : 'fullscreen'"
              @click="props.toggleFullscreen"
              class="q-ml-md"
            ></q-btn>
          </template>

          <template v-slot:header="props">
          <q-tr>
            <q-th rowspan="2" align="center">
              <q-checkbox color="primary" v-model="props.selected"></q-checkbox>
            </q-th>
            <q-th rowspan="2" align="center" key="name" :props="props">@{{ props.colsMap.name.label }}</q-th>
            <q-th colspan="2" align="center">表头一</q-th>
            <q-th key="carbs" :props="props">@{{ props.colsMap.carbs.label }}</q-th>
            <q-th colspan="3" align="center">表头二</q-th>
            <q-th key="iron" :props="props">@{{ props.colsMap.iron.label }}</q-th>
          </q-tr>
          <q-tr>
            <!-- <q-th>
              <q-checkbox color="primary" v-model="props.selected"></q-checkbox>
            </q-th> -->
            <!-- <q-th key="name" :props="props">@{{ props.colsMap.name.label }}</q-th> -->
            <!-- 以下样式，如左侧有上下合并的表头，则左侧追加一条分隔线 -->
            <q-th style="border-left:1px solid #ccc" key="calories" :props="props">@{{ props.colsMap.calories.label }}</q-th>
            <q-th key="fat" :props="props">@{{ props.colsMap.fat.label }}</q-th>
            <q-th key="carbs" :props="props">@{{ props.colsMap.carbs.label }}</q-th>
            <q-th key="protein" :props="props">@{{ props.colsMap.protein.label }}</q-th>
            <q-th key="sodium" :props="props">@{{ props.colsMap.sodium.label }}</q-th>
            <q-th key="calcium" :props="props">@{{ props.colsMap.calcium.label }}</q-th>
            <q-th key="iron" :props="props">@{{ props.colsMap.iron.label }}</q-th>
          </q-tr>
          </template>

          <!-- 表格主体 -->
          <template v-slot:body="props">
            <q-tr :props="props">
              <q-td auto-width>
                <!-- <q-checkbox v-model="props.selected"></q-checkbox> -->
                <q-toggle dense v-model="props.selected"></q-toggle>
              </q-td>
              <q-td key="name" :props="props">
                @{{ props.row.name }}
                <q-btn dense round flat :icon="props.expand ? 'arrow_drop_up' : 'arrow_drop_down'" @click="props.expand = !props.expand" ></q-btn>
              </q-td>
              <q-td key="calories" :props="props">@{{ props.row.calories }}
                <q-btn dense round flat :icon="props.expand ? 'arrow_drop_up' : 'arrow_drop_down'" @click="props.expand = !props.expand" ></q-btn>
              </q-td>
              <q-td key="fat" :props="props">@{{ props.row.fat }}</q-td>
              <q-td key="carbs" :props="props">@{{ props.row.carbs }}</q-td>
              <q-td key="protein" :props="props">@{{ props.row.protein }}</q-td>
              <q-td key="sodium" :props="props">@{{ props.row.sodium }}</q-td>
              <q-td key="calcium" :props="props">@{{ props.row.calcium }}</q-td>
              <q-td key="iron" :props="props">
                <q-badge color="amber">@{{ props.row.iron }}</q-badge>
              </q-td>
            </q-tr>

            <!-- 扩展栏 -->
            <q-tr v-show="props.expand" :props="props">
              <!-- <q-td colspan="100%">
                <div class="text-left">This is expand slot for row above: @{{ props.row.name }}.</div>
              </q-td> -->
              <q-td colspan="100%">
                <q-table
                  :data="data"
                  :columns="columns"
                  row-key="name"
                  dense
                  hide-bottom
                ></q-table>
              </q-td>
            </q-tr>


          </template>
        
        </q-table>


      </div>

      <div class="q-mt-md">
        Selected: @{{ JSON.stringify(tableselected) }}
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

      panel: 'mails',
      tab: 'mails',

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

      loading: true,
      tableselected: [],
      visibleColumns: [ 'calories', 'desc', 'fat', 'carbs', 'protein', 'sodium', 'calcium', 'iron' ],
      columns: [
        {
          name: 'name',
          required: true,
          label: 'Dessert (100g serving)',
          align: 'left',
          field: row => row.name,
          format: val => `${val}`,
          sortable: true
        },
        { name: 'calories', align: 'center', label: 'Calories', field: 'calories', sortable: true },
        { name: 'fat', label: 'Fat (g)', field: 'fat', sortable: true },
        { name: 'carbs', label: 'Carbs (g)', field: 'carbs' },
        { name: 'protein', label: 'Protein (g)', field: 'protein' },
        { name: 'sodium', label: 'Sodium (mg)', field: 'sodium' },
        { name: 'calcium', label: 'Calcium (%)', field: 'calcium', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
        { name: 'iron', label: 'Iron (%)', field: 'iron', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) }
      ],
      data: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          sodium: 87,
          calcium: '14%',
          iron: '1%'
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          sodium: 129,
          calcium: '8%',
          iron: '1%'
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          sodium: 337,
          calcium: '6%',
          iron: '7%'
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          sodium: 413,
          calcium: '3%',
          iron: '8%'
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          sodium: 327,
          calcium: '7%',
          iron: '16%'
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          sodium: 50,
          calcium: '0%',
          iron: '0%'
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          sodium: 38,
          calcium: '0%',
          iron: '2%'
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          sodium: 562,
          calcium: '0%',
          iron: '45%'
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          sodium: 326,
          calcium: '2%',
          iron: '22%'
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          sodium: 54,
          calcium: '12%',
          iron: '6%'
        }
      ],

      separator: 'cell',

      // 树
      expanded: [ 'Satisfied customers (with avatar)', 'Good food (with icon)' ],

      simple: [
        {
          label: 'Satisfied customers (with avatar)',
          avatar: 'https://cdn.quasar.dev/img/boy-avatar.png',
          children: [
            {
              label: 'Good food (with icon)',
              icon: 'restaurant_menu',
              children: [
                { label: 'Quality ingredients' },
                { label: 'Good recipe' }
              ]
            },
            {
              label: 'Good service (disabled node with icon)',
              icon: 'room_service',
              disabled: true,
              children: [
                { label: 'Prompt attention' },
                { label: 'Professional waiter' }
              ]
            },
            {
              label: 'Pleasant surroundings (with icon)',
              icon: 'photo',
              children: [
                {
                  label: 'Happy atmosphere (with image)',
                  img: 'https://cdn.quasar.dev/img/logo_calendar_128px.png'
                },
                { label: 'Good table presentation' },
                { label: 'Pleasing decor' }
              ]
            }
          ]
        }
      ],

    },
    methods: {
    
      notify: function () {
        this.$q.notify('Running on Quasar v' + this.$q.version)
      },

      getSelectedString () {
        return this.tableselected.length === 0 ? '' : `${this.tableselected.length} record${this.tableselected.length > 1 ? 's' : ''} selected of ${this.data.length}`
      },

      // emulate fetching data from server
      onRefresh () {
        this.loading = true
        setTimeout(() => {
          this.loading = false
        }, 5000)
      }
      
    },
    mounted () {
      this.onRefresh()
    },
  })
</script>

</html>