(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-order-express"],{"08dc":function(e,t,i){var a=i("ab27");"string"===typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);var r=i("4f06").default;r("702c8872",a,!0,{sourceMap:!1,shadowMode:!1})},"249d":function(e,t,i){"use strict";i.r(t);var a=i("acc9"),r=i("38af");for(var n in r)"default"!==n&&function(e){i.d(t,e,(function(){return r[e]}))}(n);i("fc7b");var s,o=i("f0c5"),d=Object(o["a"])(r["default"],a["b"],a["c"],!1,null,"349786ee",null,!1,a["a"],s);t["default"]=d.exports},"38af":function(e,t,i){"use strict";i.r(t);var a=i("4344"),r=i.n(a);for(var n in a)"default"!==n&&function(e){i.d(t,e,(function(){return a[e]}))}(n);t["default"]=r.a},4344:function(e,t,i){"use strict";var a=i("4ea4");i("4160"),i("159b"),Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var r=a(i("ed15")),n=a(i("62dd")),s=a(i("a71d")),o={components:{MallInfo:r.default,uniSteps:n.default,navbar:s.default},data:function(){return{isError:!1,active:0,orderId:0,order:{express:{expName:"",number:"",takeTime:"",updateTime:""},accept_name:"",address:"",create_time:"",mobile:"",order_no:"",region:""},stepsOptions:[]}},onLoad:function(e){var t=this;this.isError=!1,this.orderId=e.id,this.$http.getOrderExpress({id:this.orderId}).then((function(e){e.status?(t.order=e.data,e.data.express.list.forEach((function(e,i){t.stepsOptions.push({title:e.time,desc:e.status})}))):t.$utils.msg(e.info)})).catch((function(e){t.isError=!0,t.$utils.msg("网络出错，请检查网络是否连接")}))},methods:{}};t.default=o},ab27:function(e,t,i){var a=i("24fb");t=a(!1),t.push([e.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */.money[data-v-349786ee]{color:#fc4141}.top[data-v-349786ee]{background-color:#fff;position:relative}.top[data-v-349786ee]:before{position:absolute;right:0;bottom:0;left:0;height:%?4?%;background:-webkit-repeating-linear-gradient(135deg,#ff6c6c,#ff6c6c 20%,transparent 0,transparent 25%,#1989fa 0,#1989fa 45%,transparent 0,transparent 50%);background:repeating-linear-gradient(-45deg,#ff6c6c,#ff6c6c 20%,transparent 0,transparent 25%,#1989fa 0,#1989fa 45%,transparent 0,transparent 50%);background-size:%?160?%;content:""}.top .status[data-v-349786ee]{width:95%;margin:0 auto}.top .address[data-v-349786ee]{font-size:%?28?%;width:92%;margin:0 auto}.top .address .info[data-v-349786ee]{height:%?60?%;line-height:%?60?%}.top .address .info uni-text[data-v-349786ee]:first-child{padding-right:%?20?%}.top .address .address-info[data-v-349786ee]{height:%?60?%;line-height:%?40?%}.order[data-v-349786ee]{background-color:#fff;margin-top:%?30?%;padding-bottom:%?20?%}.order .title[data-v-349786ee]{width:100%;margin:0 auto;color:#666;font-size:%?30?%;height:%?80?%;line-height:%?80?%;border-bottom:%?2?% solid #eee}.order .title uni-text[data-v-349786ee]{padding-left:%?30?%}.order .list[data-v-349786ee]{width:100%}.order .list .list-box[data-v-349786ee]{width:92%;height:auto!important;height:%?80?%;min-height:%?80?%;line-height:%?80?%;margin:0 auto;font-size:%?26?%;color:#333;border-bottom:%?2?% solid #ebedf0}.order .list .list-box uni-view[data-v-349786ee]{display:inline-block}.order .list .list-box uni-view[data-v-349786ee]:first-child{float:left}.order .list .list-box uni-view[data-v-349786ee]:last-child{float:right}.order .list .list-box uni-textarea[data-v-349786ee]{height:%?150?%}',""]),e.exports=t},acc9:function(e,t,i){"use strict";i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return n})),i.d(t,"a",(function(){return a}));var a={navbar:i("a71d").default,uniSteps:i("62dd").default},r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",[i("navbar",{attrs:{iSimmersive:!1,"title-color":"#ffffff",background:"#1b43c4",placeholder:!0,title:"物流信息"}}),e.isError?i("info"):e._e(),e.isError?e._e():i("v-uni-view",[i("v-uni-view",{staticClass:"top"},[i("v-uni-view",{staticClass:"address"},[i("v-uni-view",{staticClass:"info"},[i("v-uni-text",[e._v("收件人："+e._s(e.order.accept_name))]),i("v-uni-text",[e._v("手机号："+e._s(e.order.mobile))])],1),i("v-uni-view",{staticClass:"address-info"},[e._v(e._s(e.order.region)+" "+e._s(e.order.address))])],1)],1),i("v-uni-view",{staticClass:"order"},[i("v-uni-view",{staticClass:"title"},[i("v-uni-text",[e._v("订单信息")])],1),i("v-uni-view",{staticClass:"list clear"},[i("v-uni-view",{staticClass:"list-box clear"},[i("v-uni-view",[e._v("订单编号：")]),i("v-uni-view",{staticClass:"money"},[e._v(e._s(e.order.order_no))])],1),e.order.express.expName?i("v-uni-view",{staticClass:"list-box clear"},[i("v-uni-view",[e._v("快递名称：")]),i("v-uni-view",[e._v(e._s(e.order.express.expName||""))])],1):e._e(),i("v-uni-view",{staticClass:"list-box clear"},[i("v-uni-view",[e._v("快递单号：")]),i("v-uni-view",[e._v(e._s(e.order.express.number||""))])],1),i("v-uni-view",{staticClass:"list-box clear"},[i("v-uni-view",[e._v("物流耗时：")]),i("v-uni-view",{staticClass:"money"},[e._v(e._s(e.order.express.takeTime||""))])],1),i("v-uni-view",{staticClass:"list-box clear"},[i("v-uni-view",[e._v("更新时间：")]),i("v-uni-view",{staticClass:"money"},[e._v(e._s(e.order.express.updateTime||""))])],1)],1),i("uni-steps",{attrs:{options:e.stepsOptions,direction:"column","active-color":"#07c160",active:e.active}})],1)],1)],1)},n=[]},fc7b:function(e,t,i){"use strict";var a=i("08dc"),r=i.n(a);r.a}}]);