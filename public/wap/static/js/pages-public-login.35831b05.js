(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-public-login"], {
    2279: function (e, t, i) {
        "use strict";
        var n = i("4ea4");
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var o = n(i("04c6")), a = i("e5bd"), r = n(i("a71d")), s = i("9a4c"), c = {
            components: {loading: o.default, navbar: r.default}, data: function () {
                return {static: "", scrollNum: 0, isSubmit: !1, platform: "app"}
            }, onLoad: function () {
                this.static = this.$static, this.platform = this.$utils.platformAgent()
            }, onShow: function () {
                var e = this;
                "h5" == this.platform.type && this.platform.isWechat && void 0 != this.$route.query.code && this.$route.query.code.length && (this.isSubmit = !0, this.$http.sendOauth({
                    code: this.$route.query.code,
                    state: this.$route.query.state
                }).then((function (t) {
                    t.status ? (e.$store.commit("UPDATEUSERS", t.data), e.$utils.switchTab("ucenter/index")) : e.$utils.msg(t.info), e.isSubmit = !1
                })).catch((function (t) {
                    e.isSubmit = !1, e.$utils.msg("请求失败，请稍后在试")
                })))
            }, onPageScroll: function (e) {
                this.scrollNum = e.scrollTop
            }, methods: {
                onBack: function () {
                    this.$utils.switchTab("index/index")
                }, onWechatLogin: function () {
                    var e = this;
                    (0, s.login)().catch((function (t) {
                        e.$utils.msg(t)
                    }))
                }, onGoHome: function () {
                    this.$utils.switchTab("index/index")
                }, onSubmit: function (e) {
                    var t = this, i = e.detail.value;
                    return this.isSubmit = !0, "" == i.password ? (this.isSubmit = !1, void this.$utils.msg("请填写密码！")) : void this.$http.sendLogin({
                        username: i.phone,
                        password: i.password
                    }).then((function (e) {
                        e.status ? (t.$store.commit("UPDATEUSERS", e.data), t.$utils.switchTab("ucenter/index")) : t.$utils.msg(e.info), t.isSubmit = !1
                    })).catch((function (e) {
                        t.isSubmit = !1, t.$utils.msg("连接网络错误，请检查网络是否连接！")
                    }))
                }
            }
        };
        t.default = c
    }, 6123: function (e, t, i) {
        "use strict";
        i.r(t);
        var n = i("2279"), o = i.n(n);
        for (var a in n) "default" !== a && function (e) {
            i.d(t, e, (function () {
                return n[e]
            }))
        }(a);
        t["default"] = o.a
    }, 9523: function (e, t) {
        function i(e, t, i) {
            return t in e ? Object.defineProperty(e, t, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = i, e
        }

        e.exports = i
    }, "98bd": function (e, t, i) {
        var n = i("24fb"), o = i("1de5"), a = i("9306");
        t = n(!1);
        var r = o(a);
        t.push([e.i, '@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */.login-wrap .logo[data-v-10566a4a]{text-align:center;padding-top:%?180?%}.login-wrap .logo uni-image[data-v-10566a4a]{width:%?180?%;height:%?180?%}.login-wrap .wechat-title[data-v-10566a4a]{font-size:%?35?%;font-weight:500;color:#333;margin-top:%?64?%;text-align:center}.login-wrap .wechat-desc[data-v-10566a4a]{font-size:%?28?%;font-weight:500;color:#999;margin-top:%?24?%;text-align:center;padding:%?10?% %?50?%}.login-wrap .wechat-login-btn[data-v-10566a4a]{height:%?80?%;line-height:%?80?%;color:#fff;background-color:#33a7ff;text-align:center;border-radius:%?50?%;margin:%?50?%;font-size:%?32?%}.login-wrap .wechat-go-home[data-v-10566a4a]{text-align:center;font-size:%?30?%;color:#666}.top[data-v-10566a4a]{background-color:initial;width:100%;height:%?386?%;position:relative;z-index:1;background-image:url(' + r + ');background-repeat:no-repeat;background-size:100%}.top uni-view[data-v-10566a4a]{z-index:2;position:absolute}.top uni-view[data-v-10566a4a]:nth-child(1){top:%?90?%;font-size:%?72?%;color:#fff;width:100%;text-align:center}.top uni-view[data-v-10566a4a]:nth-child(1)::after{position:absolute;content:" ";background-color:#7a91dc;height:1px;width:%?210?%;top:%?120?%;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.top uni-view[data-v-10566a4a]:nth-child(2){top:%?225?%;font-size:%?49?%;color:#fff000;text-align:center;width:100%}.top uni-image[data-v-10566a4a]{width:100%;height:%?386?%}.theform[data-v-10566a4a]{width:%?590?%;margin:%?70?% auto 0 auto}.theform .fields-box[data-v-10566a4a]{width:100%;border:1px solid #d2cdcd;overflow:hidden;border-radius:%?10?%}.theform .fields-box .field-box[data-v-10566a4a]{width:100%;height:%?100?%;position:relative;font-size:%?40?%}.theform .fields-box .field-box[data-v-10566a4a]:first-child{border-bottom:1px solid #d2cdcd}.theform .fields-box .field-box uni-input[data-v-10566a4a]{width:100%;height:%?100?%;line-height:%?100?%;text-indent:%?100?%;font-size:%?29?%;color:#888}.theform .fields-box .field-box[data-v-10566a4a]:nth-child(1):before{content:"\\e61b";color:#bfbfbf;position:absolute;left:%?30?%;top:%?28?%}.theform .fields-box .field-box[data-v-10566a4a]:nth-child(2):before{content:"\\e61a";color:#bfbfbf;position:absolute;left:%?30?%;top:%?28?%}.theform .btn[data-v-10566a4a]{width:100%;margin-top:%?48?%}.theform .btn uni-button[data-v-10566a4a]{color:#fff;background-color:#1b43c4;border:1px solid #1b43c4;border-radius:%?10?%;font-size:%?33?%;height:%?100?%;line-height:%?100?%;text-align:center}.theform .tips-box[data-v-10566a4a]{width:100%;font-size:%?28?%;color:#888;margin-top:%?45?%}.theform .tips-box uni-view[data-v-10566a4a]{width:50%;float:left}.theform .tips-box uni-view[data-v-10566a4a]:last-child{text-align:right}', ""]), e.exports = t
    }, "9a4c": function (e, t, i) {
        "use strict";
        var n = i("4ea4");
        i("99af"), i("d3b7"), Object.defineProperty(t, "__esModule", {value: !0}), t.login = a;
        var o = i("f3d4");
        i("2759"), n(i("b6e6"));

        function a() {
            return new Promise((function (e, t) {
                (0, o.wechatLogin)().then((function (e) {
                    1 == e.status && (location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".concat(e.data.appid, "&redirect_uri=").concat(e.data.url, "/pages/public/login&response_type=code&scope=snsapi_userinfo&state=").concat(e.data.state, "#wechat_redirect"))
                })).catch((function (e) {
                    t(e)
                }))
            }))
        }
    }, "9ffc": function (e, t, i) {
        "use strict";
        var n = i("b309"), o = i.n(n);
        o.a
    }, b309: function (e, t, i) {
        var n = i("98bd");
        "string" === typeof n && (n = [[e.i, n, ""]]), n.locals && (e.exports = n.locals);
        var o = i("4f06").default;
        o("dbee9c86", n, !0, {sourceMap: !1, shadowMode: !1})
    }, b4c4: function (e, t, i) {
        "use strict";
        i.d(t, "b", (function () {
            return o
        })), i.d(t, "c", (function () {
            return a
        })), i.d(t, "a", (function () {
            return n
        }));
        var n = {navbar: i("a71d").default}, o = function () {
            var e = this, t = e.$createElement, i = e._self._c || t;
            return i("v-uni-view", [i("navbar", {
                attrs: {
                    scroll: e.scrollNum,
                    iSimmersive: !0,
                    title: "",
                    onBack: e.onBack
                }
            }), "app" != e.platform.type && "h5" != e.platform.type || e.platform.isWechat ? e._e() : i("v-uni-view", {staticClass: "app"}, [i("v-uni-view", {staticClass: "top"}, [i("v-uni-view", [e._v("中非商城")]), i("v-uni-view", [e._v("www.c-aft.cn")])], 1), i("v-uni-view", {staticClass: "theform"}, [i("v-uni-form", {
                on: {
                    submit: function (t) {
                        arguments[0] = t = e.$handleEvent(t), e.onSubmit.apply(void 0, arguments)
                    }
                }
            }, [i("v-uni-view", {staticClass: "fields-box"}, [i("v-uni-view", {staticClass: "field-box iconfont"}, [i("v-uni-input", {
                staticClass: "uni-input",
                attrs: {type: "text", name: "phone", value: "", placeholder: "会员名(新用户自动注册)"}
            })], 1), i("v-uni-view", {staticClass: "field-box iconfont"}, [i("v-uni-input", {
                staticClass: "uni-input",
                attrs: {type: "text", name: "password", value: "", placeholder: "地址私钥"}
            })], 1)], 1), i("v-uni-view", {staticClass: "btn"}, [i("v-uni-button", {
                attrs: {
                    disabled: e.isSubmit,
                    "form-type": "submit"
                }
            }, [e._v("登 陆")])], 1)], 1), i("v-uni-view", {staticClass: "tips-box clear"}, [i("v-uni-view", [i("v-uni-navigator", {
                attrs: {
                    url: "register",
                    "hover-class": "none"
                }
            }, [e._v("用户注册")])], 1), i("v-uni-view", [i("v-uni-navigator", {
                attrs: {
                    url: "forget",
                    "hover-class": "none"
                }
            }, [e._v("忘记密码")])], 1)], 1)], 1)], 1), "h5" == e.platform.type && e.platform.isWechat ? i("v-uni-view", {staticClass: "login-wrap"}, [i("v-uni-view", {staticClass: "logo"}, [e.static ? i("v-uni-image", {attrs: {src: e.static + "app/a3mall.png"}}) : e._e()], 1), i("v-uni-view", {staticClass: "wechat-title"}, [e._v("微信授权登录")]), i("v-uni-view", {staticClass: "wechat-desc"}, [e._v("获得您的公开信息（昵称、头像等），以便为您提供更好的服务")]), i("v-uni-view", {
                staticClass: "wechat-login-btn",
                on: {
                    click: function (t) {
                        arguments[0] = t = e.$handleEvent(t), e.onWechatLogin.apply(void 0, arguments)
                    }
                }
            }, [e._v("授权登录")]), i("v-uni-view", {
                staticClass: "wechat-go-home", on: {
                    click: function (t) {
                        arguments[0] = t = e.$handleEvent(t), e.onGoHome.apply(void 0, arguments)
                    }
                }
            }, [e._v("暂不登录")])], 1) : e._e(), e.isSubmit ? i("loading", {attrs: {layer: !0}}) : e._e()], 1)
        }, a = []
    }, b6e6: function (e, t, i) {
        i("c975"), i("ac1f"), i("466d"), i("5319"), i("1276");
        var n = i("9523");
        !function (t, i) {
            e.exports = i(t)
        }(window, (function (e, t) {
            if (!e.jWeixin) {
                var i, o, a = {
                        config: "preVerifyJSAPI",
                        onMenuShareTimeline: "menu:share:timeline",
                        onMenuShareAppMessage: "menu:share:appmessage",
                        onMenuShareQQ: "menu:share:qq",
                        onMenuShareWeibo: "menu:share:weiboApp",
                        onMenuShareQZone: "menu:share:QZone",
                        previewImage: "imagePreview",
                        getLocation: "geoLocation",
                        openProductSpecificView: "openProductViewWithPid",
                        addCard: "batchAddCard",
                        openCard: "batchViewCard",
                        chooseWXPay: "getBrandWCPayRequest",
                        openEnterpriseRedPacket: "getRecevieBizHongBaoRequest",
                        startSearchBeacons: "startMonitoringBeacons",
                        stopSearchBeacons: "stopMonitoringBeacons",
                        onSearchBeacons: "onBeaconsInRange",
                        consumeAndShareCard: "consumedShareCard",
                        openAddress: "editAddress"
                    }, r = function () {
                        var e = {};
                        for (var t in a) e[a[t]] = t;
                        return e
                    }(), s = e.document, c = s.title, d = navigator.userAgent.toLowerCase(),
                    u = navigator.platform.toLowerCase(), l = !(!u.match("mac") && !u.match("win")),
                    p = -1 != d.indexOf("wxdebugger"), f = -1 != d.indexOf("micromessenger"),
                    h = -1 != d.indexOf("android"), m = -1 != d.indexOf("iphone") || -1 != d.indexOf("ipad"),
                    g = (o = d.match(/micromessenger\/(\d+\.\d+\.\d+)/) || d.match(/micromessenger\/(\d+\.\d+)/)) ? o[1] : "",
                    v = {initStartTime: O(), initEndTime: 0, preVerifyStartTime: 0, preVerifyEndTime: 0}, w = {
                        version: 1,
                        appId: "",
                        initTime: 0,
                        preVerifyTime: 0,
                        networkType: "",
                        isPreVerifyOk: 1,
                        systemType: m ? 1 : h ? 2 : -1,
                        clientVersion: g,
                        url: encodeURIComponent(location.href)
                    }, b = {}, S = {_completes: []}, y = {state: 0, data: {}};
                E((function () {
                    v.initEndTime = O()
                }));
                var _ = !1, x = [], I = (i = {
                    config: function (t) {
                        B("config", b = t);
                        var i = !1 !== b.check;
                        E((function () {
                            if (i) M(a.config, {
                                verifyJsApiList: L(b.jsApiList),
                                verifyOpenTagList: L(b.openTagList)
                            }, function () {
                                S._complete = function (e) {
                                    v.preVerifyEndTime = O(), y.state = 1, y.data = e
                                }, S.success = function (e) {
                                    w.isPreVerifyOk = 0
                                }, S.fail = function (e) {
                                    S._fail ? S._fail(e) : y.state = -1
                                };
                                var e = S._completes;
                                return e.push((function () {
                                    !function () {
                                        if (!(l || p || b.debug || g < "6.0.2" || w.systemType < 0)) {
                                            var e = new Image;
                                            w.appId = b.appId, w.initTime = v.initEndTime - v.initStartTime, w.preVerifyTime = v.preVerifyEndTime - v.preVerifyStartTime, I.getNetworkType({
                                                isInnerInvoke: !0,
                                                success: function (t) {
                                                    w.networkType = t.networkType;
                                                    var i = "https://open.weixin.qq.com/sdk/report?v=" + w.version + "&o=" + w.isPreVerifyOk + "&s=" + w.systemType + "&c=" + w.clientVersion + "&a=" + w.appId + "&n=" + w.networkType + "&i=" + w.initTime + "&p=" + w.preVerifyTime + "&u=" + w.url;
                                                    e.src = i
                                                }
                                            })
                                        }
                                    }()
                                })), S.complete = function (t) {
                                    for (var i = 0, n = e.length; i < n; ++i) e[i]();
                                    S._completes = []
                                }, S
                            }()), v.preVerifyStartTime = O(); else {
                                y.state = 1;
                                for (var e = S._completes, t = 0, n = e.length; t < n; ++t) e[t]();
                                S._completes = []
                            }
                        })), I.invoke || (I.invoke = function (t, i, n) {
                            e.WeixinJSBridge && WeixinJSBridge.invoke(t, C(i), n)
                        }, I.on = function (t, i) {
                            e.WeixinJSBridge && WeixinJSBridge.on(t, i)
                        })
                    }, ready: function (e) {
                        0 != y.state ? e() : (S._completes.push(e), !f && b.debug && e())
                    }, error: function (e) {
                        g < "6.0.2" || (-1 == y.state ? e(y.data) : S._fail = e)
                    }, checkJsApi: function (e) {
                        M("checkJsApi", {jsApiList: L(e.jsApiList)}, (e._complete = function (e) {
                            if (h) {
                                var t = e.checkResult;
                                t && (e.checkResult = JSON.parse(t))
                            }
                            e = function (e) {
                                var t = e.checkResult;
                                for (var i in t) {
                                    var n = r[i];
                                    n && (t[n] = t[i], delete t[i])
                                }
                                return e
                            }(e)
                        }, e))
                    }, onMenuShareTimeline: function (e) {
                        P(a.onMenuShareTimeline, {
                            complete: function () {
                                M("shareTimeline", {
                                    title: e.title || c,
                                    desc: e.title || c,
                                    img_url: e.imgUrl || "",
                                    link: e.link || location.href,
                                    type: e.type || "link",
                                    data_url: e.dataUrl || ""
                                }, e)
                            }
                        }, e)
                    }, onMenuShareAppMessage: function (e) {
                        P(a.onMenuShareAppMessage, {
                            complete: function (t) {
                                "favorite" === t.scene ? M("sendAppMessage", {
                                    title: e.title || c,
                                    desc: e.desc || "",
                                    link: e.link || location.href,
                                    img_url: e.imgUrl || "",
                                    type: e.type || "link",
                                    data_url: e.dataUrl || ""
                                }) : M("sendAppMessage", {
                                    title: e.title || c,
                                    desc: e.desc || "",
                                    link: e.link || location.href,
                                    img_url: e.imgUrl || "",
                                    type: e.type || "link",
                                    data_url: e.dataUrl || ""
                                }, e)
                            }
                        }, e)
                    }, onMenuShareQQ: function (e) {
                        P(a.onMenuShareQQ, {
                            complete: function () {
                                M("shareQQ", {
                                    title: e.title || c,
                                    desc: e.desc || "",
                                    img_url: e.imgUrl || "",
                                    link: e.link || location.href
                                }, e)
                            }
                        }, e)
                    }, onMenuShareWeibo: function (e) {
                        P(a.onMenuShareWeibo, {
                            complete: function () {
                                M("shareWeiboApp", {
                                    title: e.title || c,
                                    desc: e.desc || "",
                                    img_url: e.imgUrl || "",
                                    link: e.link || location.href
                                }, e)
                            }
                        }, e)
                    }, onMenuShareQZone: function (e) {
                        P(a.onMenuShareQZone, {
                            complete: function () {
                                M("shareQZone", {
                                    title: e.title || c,
                                    desc: e.desc || "",
                                    img_url: e.imgUrl || "",
                                    link: e.link || location.href
                                }, e)
                            }
                        }, e)
                    }, updateTimelineShareData: function (e) {
                        M("updateTimelineShareData", {title: e.title, link: e.link, imgUrl: e.imgUrl}, e)
                    }, updateAppMessageShareData: function (e) {
                        M("updateAppMessageShareData", {
                            title: e.title,
                            desc: e.desc,
                            link: e.link,
                            imgUrl: e.imgUrl
                        }, e)
                    }, startRecord: function (e) {
                        M("startRecord", {}, e)
                    }, stopRecord: function (e) {
                        M("stopRecord", {}, e)
                    }, onVoiceRecordEnd: function (e) {
                        P("onVoiceRecordEnd", e)
                    }, playVoice: function (e) {
                        M("playVoice", {localId: e.localId}, e)
                    }, pauseVoice: function (e) {
                        M("pauseVoice", {localId: e.localId}, e)
                    }, stopVoice: function (e) {
                        M("stopVoice", {localId: e.localId}, e)
                    }, onVoicePlayEnd: function (e) {
                        P("onVoicePlayEnd", e)
                    }, uploadVoice: function (e) {
                        M("uploadVoice", {localId: e.localId, isShowProgressTips: 0 == e.isShowProgressTips ? 0 : 1}, e)
                    }, downloadVoice: function (e) {
                        M("downloadVoice", {
                            serverId: e.serverId,
                            isShowProgressTips: 0 == e.isShowProgressTips ? 0 : 1
                        }, e)
                    }, translateVoice: function (e) {
                        M("translateVoice", {
                            localId: e.localId,
                            isShowProgressTips: 0 == e.isShowProgressTips ? 0 : 1
                        }, e)
                    }, chooseImage: function (e) {
                        M("chooseImage", {
                            scene: "1|2",
                            count: e.count || 9,
                            sizeType: e.sizeType || ["original", "compressed"],
                            sourceType: e.sourceType || ["album", "camera"]
                        }, (e._complete = function (e) {
                            if (h) {
                                var t = e.localIds;
                                try {
                                    t && (e.localIds = JSON.parse(t))
                                } catch (e) {
                                }
                            }
                        }, e))
                    }, getLocation: function (e) {
                    }, previewImage: function (e) {
                        M(a.previewImage, {current: e.current, urls: e.urls}, e)
                    }, uploadImage: function (e) {
                        M("uploadImage", {localId: e.localId, isShowProgressTips: 0 == e.isShowProgressTips ? 0 : 1}, e)
                    }, downloadImage: function (e) {
                        M("downloadImage", {
                            serverId: e.serverId,
                            isShowProgressTips: 0 == e.isShowProgressTips ? 0 : 1
                        }, e)
                    }, getLocalImgData: function (e) {
                        !1 === _ ? (_ = !0, M("getLocalImgData", {localId: e.localId}, (e._complete = function (e) {
                            if (_ = !1, 0 < x.length) {
                                var t = x.shift();
                                wx.getLocalImgData(t)
                            }
                        }, e))) : x.push(e)
                    }, getNetworkType: function (e) {
                        M("getNetworkType", {}, (e._complete = function (e) {
                            e = function (e) {
                                var t = e.errMsg;
                                e.errMsg = "getNetworkType:ok";
                                var i = e.subtype;
                                if (delete e.subtype, i) e.networkType = i; else {
                                    var n = t.indexOf(":"), o = t.substring(n + 1);
                                    switch (o) {
                                        case"wifi":
                                        case"edge":
                                        case"wwan":
                                            e.networkType = o;
                                            break;
                                        default:
                                            e.errMsg = "getNetworkType:fail"
                                    }
                                }
                                return e
                            }(e)
                        }, e))
                    }, openLocation: function (e) {
                        M("openLocation", {
                            latitude: e.latitude,
                            longitude: e.longitude,
                            name: e.name || "",
                            address: e.address || "",
                            scale: e.scale || 28,
                            infoUrl: e.infoUrl || ""
                        }, e)
                    }
                }, n(i, "getLocation", (function (e) {
                    M(a.getLocation, {type: (e = e || {}).type || "wgs84"}, (e._complete = function (e) {
                        delete e.type
                    }, e))
                })), n(i, "hideOptionMenu", (function (e) {
                    M("hideOptionMenu", {}, e)
                })), n(i, "showOptionMenu", (function (e) {
                    M("showOptionMenu", {}, e)
                })), n(i, "closeWindow", (function (e) {
                    M("closeWindow", {}, e = e || {})
                })), n(i, "hideMenuItems", (function (e) {
                    M("hideMenuItems", {menuList: e.menuList}, e)
                })), n(i, "showMenuItems", (function (e) {
                    M("showMenuItems", {menuList: e.menuList}, e)
                })), n(i, "hideAllNonBaseMenuItem", (function (e) {
                    M("hideAllNonBaseMenuItem", {}, e)
                })), n(i, "showAllNonBaseMenuItem", (function (e) {
                    M("showAllNonBaseMenuItem", {}, e)
                })), n(i, "scanQRCode", (function (e) {
                    M("scanQRCode", {
                        needResult: (e = e || {}).needResult || 0,
                        scanType: e.scanType || ["qrCode", "barCode"]
                    }, (e._complete = function (e) {
                        if (m) {
                            var t = e.resultStr;
                            if (t) {
                                var i = JSON.parse(t);
                                e.resultStr = i && i.scan_code && i.scan_code.scan_result
                            }
                        }
                    }, e))
                })), n(i, "openAddress", (function (e) {
                    M(a.openAddress, {}, (e._complete = function (e) {
                        e = function (e) {
                            return e.postalCode = e.addressPostalCode, delete e.addressPostalCode, e.provinceName = e.proviceFirstStageName, delete e.proviceFirstStageName, e.cityName = e.addressCitySecondStageName, delete e.addressCitySecondStageName, e.countryName = e.addressCountiesThirdStageName, delete e.addressCountiesThirdStageName, e.detailInfo = e.addressDetailInfo, delete e.addressDetailInfo, e
                        }(e)
                    }, e))
                })), n(i, "openProductSpecificView", (function (e) {
                    M(a.openProductSpecificView, {pid: e.productId, view_type: e.viewType || 0, ext_info: e.extInfo}, e)
                })), n(i, "addCard", (function (e) {
                    for (var t = e.cardList, i = [], n = 0, o = t.length; n < o; ++n) {
                        var r = t[n], s = {card_id: r.cardId, card_ext: r.cardExt};
                        i.push(s)
                    }
                    M(a.addCard, {card_list: i}, (e._complete = function (e) {
                        var t = e.card_list;
                        if (t) {
                            for (var i = 0, n = (t = JSON.parse(t)).length; i < n; ++i) {
                                var o = t[i];
                                o.cardId = o.card_id, o.cardExt = o.card_ext, o.isSuccess = !!o.is_succ, delete o.card_id, delete o.card_ext, delete o.is_succ
                            }
                            e.cardList = t, delete e.card_list
                        }
                    }, e))
                })), n(i, "chooseCard", (function (e) {
                    M("chooseCard", {
                        app_id: b.appId,
                        location_id: e.shopId || "",
                        sign_type: e.signType || "SHA1",
                        card_id: e.cardId || "",
                        card_type: e.cardType || "",
                        card_sign: e.cardSign,
                        time_stamp: e.timestamp + "",
                        nonce_str: e.nonceStr
                    }, (e._complete = function (e) {
                        e.cardList = e.choose_card_info, delete e.choose_card_info
                    }, e))
                })), n(i, "openCard", (function (e) {
                    for (var t = e.cardList, i = [], n = 0, o = t.length; n < o; ++n) {
                        var r = t[n], s = {card_id: r.cardId, code: r.code};
                        i.push(s)
                    }
                    M(a.openCard, {card_list: i}, e)
                })), n(i, "consumeAndShareCard", (function (e) {
                    M(a.consumeAndShareCard, {consumedCardId: e.cardId, consumedCode: e.code}, e)
                })), n(i, "chooseWXPay", (function (e) {
                    M(a.chooseWXPay, A(e), e)
                })), n(i, "openEnterpriseRedPacket", (function (e) {
                    M(a.openEnterpriseRedPacket, A(e), e)
                })), n(i, "startSearchBeacons", (function (e) {
                    M(a.startSearchBeacons, {ticket: e.ticket}, e)
                })), n(i, "stopSearchBeacons", (function (e) {
                    M(a.stopSearchBeacons, {}, e)
                })), n(i, "onSearchBeacons", (function (e) {
                    P(a.onSearchBeacons, e)
                })), n(i, "openEnterpriseChat", (function (e) {
                    M("openEnterpriseChat", {useridlist: e.userIds, chatname: e.groupName}, e)
                })), n(i, "launchMiniProgram", (function (e) {
                    M("launchMiniProgram", {
                        targetAppId: e.targetAppId, path: function (e) {
                            if ("string" == typeof e && 0 < e.length) {
                                var t = e.split("?")[0], i = e.split("?")[1];
                                return t += ".html", void 0 !== i ? t + "?" + i : t
                            }
                        }(e.path), envVersion: e.envVersion
                    }, e)
                })), n(i, "openBusinessView", (function (e) {
                    M("openBusinessView", {
                        businessType: e.businessType,
                        queryString: e.queryString || "",
                        envVersion: e.envVersion
                    }, (e._complete = function (e) {
                        if (h) {
                            var t = e.extraData;
                            if (t) try {
                                e.extraData = JSON.parse(t)
                            } catch (t) {
                                e.extraData = {}
                            }
                        }
                    }, e))
                })), n(i, "miniProgram", {
                    navigateBack: function (e) {
                        e = e || {}, E((function () {
                            M("invokeMiniProgramAPI", {name: "navigateBack", arg: {delta: e.delta || 1}}, e)
                        }))
                    }, navigateTo: function (e) {
                        E((function () {
                            M("invokeMiniProgramAPI", {name: "navigateTo", arg: {url: e.url}}, e)
                        }))
                    }, redirectTo: function (e) {
                        E((function () {
                            M("invokeMiniProgramAPI", {name: "redirectTo", arg: {url: e.url}}, e)
                        }))
                    }, switchTab: function (e) {
                        E((function () {
                            M("invokeMiniProgramAPI", {name: "switchTab", arg: {url: e.url}}, e)
                        }))
                    }, reLaunch: function (e) {
                        E((function () {
                            M("invokeMiniProgramAPI", {name: "reLaunch", arg: {url: e.url}}, e)
                        }))
                    }, postMessage: function (e) {
                        E((function () {
                            M("invokeMiniProgramAPI", {name: "postMessage", arg: e.data || {}}, e)
                        }))
                    }, getEnv: function (t) {
                        E((function () {
                            t({miniprogram: "miniprogram" === e.__wxjs_environment})
                        }))
                    }
                }), i), k = 1, T = {};
                return s.addEventListener("error", (function (e) {
                    if (!h) {
                        var t = e.target, i = t.tagName, n = t.src;
                        if (("IMG" == i || "VIDEO" == i || "AUDIO" == i || "SOURCE" == i) && -1 != n.indexOf("wxlocalresource://")) {
                            e.preventDefault(), e.stopPropagation();
                            var o = t["wx-id"];
                            if (o || (o = k++, t["wx-id"] = o), T[o]) return;
                            T[o] = !0, wx.ready((function () {
                                wx.getLocalImgData({
                                    localId: n, success: function (e) {
                                        t.src = e.localData
                                    }
                                })
                            }))
                        }
                    }
                }), !0), s.addEventListener("load", (function (e) {
                    if (!h) {
                        var t = e.target, i = t.tagName;
                        if (t.src, "IMG" == i || "VIDEO" == i || "AUDIO" == i || "SOURCE" == i) {
                            var n = t["wx-id"];
                            n && (T[n] = !1)
                        }
                    }
                }), !0), t && (e.wx = e.jWeixin = I), I
            }

            function M(t, i, n) {
                e.WeixinJSBridge ? WeixinJSBridge.invoke(t, C(i), (function (e) {
                    V(t, e, n)
                })) : B(t, n)
            }

            function P(t, i, n) {
                e.WeixinJSBridge ? WeixinJSBridge.on(t, (function (e) {
                    n && n.trigger && n.trigger(e), V(t, e, i)
                })) : B(t, n || i)
            }

            function C(e) {
                return (e = e || {}).appId = b.appId, e.verifyAppId = b.appId, e.verifySignType = "sha1", e.verifyTimestamp = b.timestamp + "", e.verifyNonceStr = b.nonceStr, e.verifySignature = b.signature, e
            }

            function A(e) {
                return {
                    timeStamp: e.timestamp + "",
                    nonceStr: e.nonceStr,
                    package: e.package,
                    paySign: e.paySign,
                    signType: e.signType || "SHA1"
                }
            }

            function V(e, t, i) {
                "openEnterpriseChat" != e && "openBusinessView" !== e || (t.errCode = t.err_code), delete t.err_code, delete t.err_desc, delete t.err_detail;
                var n = t.errMsg;
                n || (n = t.err_msg, delete t.err_msg, n = function (e, t) {
                    var i = e, n = r[i];
                    n && (i = n);
                    var o = "ok";
                    if (t) {
                        var a = t.indexOf(":");
                        "confirm" == (o = t.substring(a + 1)) && (o = "ok"), "failed" == o && (o = "fail"), -1 != o.indexOf("failed_") && (o = o.substring(7)), -1 != o.indexOf("fail_") && (o = o.substring(5)), "access denied" != (o = (o = o.replace(/_/g, " ")).toLowerCase()) && "no permission to execute" != o || (o = "permission denied"), "config" == i && "function not exist" == o && (o = "ok"), "" == o && (o = "fail")
                    }
                    return i + ":" + o
                }(e, n), t.errMsg = n), (i = i || {})._complete && (i._complete(t), delete i._complete), n = t.errMsg || "", b.debug && !i.isInnerInvoke && alert(JSON.stringify(t));
                var o = n.indexOf(":");
                switch (n.substring(o + 1)) {
                    case"ok":
                        i.success && i.success(t);
                        break;
                    case"cancel":
                        i.cancel && i.cancel(t);
                        break;
                    default:
                        i.fail && i.fail(t)
                }
                i.complete && i.complete(t)
            }

            function L(e) {
                if (e) {
                    for (var t = 0, i = e.length; t < i; ++t) {
                        var n = e[t], o = a[n];
                        o && (e[t] = o)
                    }
                    return e
                }
            }

            function B(e, t) {
                if (!(!b.debug || t && t.isInnerInvoke)) {
                    var i = r[e];
                    i && (e = i), t && t._complete && delete t._complete, console.log('"' + e + '",', t || "")
                }
            }

            function O() {
                return (new Date).getTime()
            }

            function E(t) {
                f && (e.WeixinJSBridge ? t() : s.addEventListener && s.addEventListener("WeixinJSBridgeReady", t, !1))
            }
        }))
    }, d12c: function (e, t, i) {
        "use strict";
        i.r(t);
        var n = i("b4c4"), o = i("6123");
        for (var a in o) "default" !== a && function (e) {
            i.d(t, e, (function () {
                return o[e]
            }))
        }(a);
        i("9ffc");
        var r, s = i("f0c5"),
            c = Object(s["a"])(o["default"], n["b"], n["c"], !1, null, "10566a4a", null, !1, n["a"], r);
        t["default"] = c.exports
    }
}]);
