(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-goods-list"],{"0558":function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */.navbar[data-v-d17f382e]{position:fixed;top:calc(45px + env(safe-area-inset-top))rpx;left:0;display:flex;width:100%;height:%?100?%;background:#1b43c4;z-index:10111}.navbar .nav-item[data-v-d17f382e]{flex:1;display:flex;justify-content:center;align-items:center;height:100%;font-size:%?28?%;color:#fff;position:relative}.navbar .nav-item.current[data-v-d17f382e]{color:#fff000}.navbar .nav-item .arrow-box[data-v-d17f382e]{display:flex;flex-direction:column}.navbar .nav-item .arrow-box .icon[data-v-d17f382e]{display:flex;align-items:center;justify-content:center;width:%?38?%;height:%?10?%;line-height:%?10?%;margin-left:0;font-size:%?30?%;color:#fff;text-align:center}.navbar .nav-item .arrow-box .icon.active[data-v-d17f382e]{color:#fff000}.navbar .nav-item .arrow-box .icon-arrow-down[data-v-d17f382e]{-webkit-transform:rotate(-180deg);transform:rotate(-180deg)}.goods-list-box[data-v-d17f382e]{margin-top:%?20?%;width:100%;display:flex;flex-direction:row;flex-wrap:wrap}.goods-list-item-box[data-v-d17f382e]{width:50%;margin-bottom:%?20?%}.goods-list-item-box:nth-child(2n+1) .goods-list-item-wrap[data-v-d17f382e]{margin-left:%?20?%;margin-right:%?10?%}.goods-list-item-box:nth-child(2n) .goods-list-item-wrap[data-v-d17f382e]{margin-left:%?10?%;margin-right:%?20?%}.goods-list-item-wrap[data-v-d17f382e]{height:%?520?%;background:#fff;overflow:hidden;border-radius:%?16?%}.goods-list-item-wrap uni-view[data-v-d17f382e]{display:block}.goods-list-item-wrap uni-view[data-v-d17f382e]:nth-child(1){height:%?370?%}.goods-list-item-wrap uni-view:nth-child(1) uni-image[data-v-d17f382e]{padding:%?20?% 5%;width:90%;height:%?330?%}.goods-list-item-wrap uni-view[data-v-d17f382e]:nth-child(2){height:%?80?%;font-size:%?30?%;padding:0 %?20?%;display:-webkit-box;overflow:hidden;-webkit-line-clamp:2;-webkit-box-orient:vertical}.goods-list-item-wrap uni-view[data-v-d17f382e]:nth-child(3){font-size:%?26?%;padding:%?10?%;color:red}',""]),t.exports=e},"1e81":function(t,e,i){"use strict";i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return n}));var n={navbar:i("a71d").default,mescrollBody:i("7a94").default},a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",[i("navbar",{attrs:{"title-color":"#ffffff",background:"#1b43c4",iSimmersive:!1,placeholder:!0,title:"商品列表"},model:{value:t.screenHeight,callback:function(e){t.screenHeight=e},expression:"screenHeight"}}),i("v-uni-view",{staticClass:"navbar"},[i("v-uni-view",{staticClass:"nav-item",class:{current:0===t.filterIndex},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.tabClick(0)}}},[t._v("综合排序")]),i("v-uni-view",{staticClass:"nav-item",class:{current:1===t.filterIndex},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.tabClick(1)}}},[t._v("销量优先")]),i("v-uni-view",{staticClass:"nav-item",class:{current:2===t.filterIndex},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.tabClick(2)}}},[i("v-uni-view",[t._v("价格")]),i("v-uni-view",{staticClass:"arrow-box"},[i("v-uni-text",{staticClass:"icon iconfont icon-arrow-up",class:{active:1===t.priceOrder&&2===t.filterIndex,"icon-arrow-up-active":1===t.priceOrder&&2===t.filterIndex}},[t._v("")]),i("v-uni-text",{staticClass:"icon iconfont icon-arrow-down",class:{active:2===t.priceOrder&&2===t.filterIndex,"icon-arrow-down-active":2===t.priceOrder&&2===t.filterIndex}},[t._v("")])],1)],1)],1),i("v-uni-view",{staticStyle:{height:"100rpx","background-color":"#1b43c4"}}),i("mescroll-body",{ref:"mescrollRef",attrs:{height:t.screenHeight-50+"px"},on:{init:function(e){arguments[0]=e=t.$handleEvent(e),t.mescrollInit.apply(void 0,arguments)},down:function(e){arguments[0]=e=t.$handleEvent(e),t.downCallback.apply(void 0,arguments)},up:function(e){arguments[0]=e=t.$handleEvent(e),t.upCallback.apply(void 0,arguments)}}},[i("v-uni-view",{staticClass:"goods-list-box"},t._l(t.result,(function(e,n){return i("v-uni-view",{key:n,staticClass:"goods-list-item-box",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.$utils.navigateTo("goods/view",{id:e.id})}}},[i("v-uni-view",{staticClass:"goods-list-item-wrap"},[i("v-uni-view",[i("v-uni-image",{attrs:{src:e.photo}})],1),i("v-uni-view",[t._v(t._s(e.title))]),i("v-uni-view",[t._v("￥"+t._s(e.price))])],1)],1)})),1)],1)],1)},r=[]},"2aa2":function(t,e,i){"use strict";var n=i("4ea4");i("99af"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=n(i("dad5")),r=n(i("a71d")),o={mixins:[a.default],components:{navbar:r.default},data:function(){return{screenHeight:0,filterIndex:0,priceOrder:1,result:[],cat_id:0}},onLoad:function(t){this.cat_id=t.id},onPageScroll:function(t){this.scrollNum=t.scrollTop},methods:{tabClick:function(t){this.filterIndex===t&&2!==t||(this.filterIndex=t,this.priceOrder=2===t?1===this.priceOrder?2:1:0,this.mescroll.resetUpScroll())},downCallback:function(){var t=this;setTimeout((function(){t.mescroll.resetUpScroll()}),200)},triggerDownScroll:function(){this.mescroll.triggerDownScroll()},upCallback:function(t){var e=this;this.$http.getGoodsList({page:t.num,id:this.cat_id,type:this.filterIndex,sort:this.priceOrder}).then((function(i){e.mescroll.endByPage(i.data.list.length,i.data.total),1==i.status?(1==t.num&&(e.result=[]),e.result=e.result.concat(i.data.list)):-1==i.status&&e.mescroll.endErr()})).catch((function(t){e.mescroll.endErr()}))}}};e.default=o},"2f5b":function(t,e,i){"use strict";i.r(e);var n=i("2aa2"),a=i.n(n);for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);e["default"]=a.a},9396:function(t,e,i){"use strict";i.r(e);var n=i("1e81"),a=i("2f5b");for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);i("f390");var o,s=i("f0c5"),l=Object(s["a"])(a["default"],n["b"],n["c"],!1,null,"d17f382e",null,!1,n["a"],o);e["default"]=l.exports},a172:function(t,e,i){var n=i("0558");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("154e4898",n,!0,{sourceMap:!1,shadowMode:!1})},f390:function(t,e,i){"use strict";var n=i("a172"),a=i.n(n);a.a}}]);