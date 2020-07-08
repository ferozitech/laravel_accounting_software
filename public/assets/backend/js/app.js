! function(e) {
    "use strict";

    function t() {
        e(".slimscroll").slimscroll({
            height: "auto",
            position: "right",
            size: "7px",
            color: "#a2b1d021",
            opacity: 1,
            wheelStep: 5,
            touchScrollStep: 50,
            alwaysVisible: !1
        })
    }

    function a() {
        e(document).ready(function() {
            e("#AllCompo").autocomplete({
                source: ["Forms", "Tables", "Charts", "Icones", "Maps"],
                minLength: 0,
                scroll: !0
            }).focus(function() {
                e(this).autocomplete("search", "")
            })
        })
    }
    t(), e(".metismenu").metisMenu(), e(window).resize(function() {}), e(".button-menu-mobile").on("click", function(a) {
        a.preventDefault(), e("body").toggleClass("enlarge-menu"), t()
    }), e(".enlarge-menu .left-sidenav-menu > li").hover(function() {
        e(this).addClass("nav-hover")
    }, function() {
        e(this).removeClass("nav-hover")
    }), e(window).width() < 1025 ? e("body").addClass("enlarge-menu enlarge-menu-all") : e.fn.tooltip && e('[data-toggle="tooltip"]').tooltip(), e('[data-toggle="tooltip-custom"]').tooltip({
        template: '<div class="tooltip tooltip-custom" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
    }), e(".main-icon-menu .nav-link").on("click", function(a) {
        e("body").removeClass("enlarge-menu"), a.preventDefault(), e(this).addClass("active"), e(this).siblings().removeClass("active"), e(".main-menu-inner").addClass("active");
        var t = e(this).attr("href");
        e(t).addClass("active"), e(t).siblings().removeClass("active")
    }), e(".leftbar-tab-menu a, .left-sidenav a").each(function() {
        var a = window.location.href.split(/[?#]/)[0];
        if (this.href == a) {
            e(this).addClass("active"), e(this).parent().addClass("active"), e(this).parent().parent().addClass("in"), e(this).parent().parent().addClass("mm-show"), e(this).parent().parent().parent().addClass("mm-active"), e(this).parent().parent().prev().addClass("active"), e(this).parent().parent().parent().addClass("active"), e(this).parent().parent().parent().parent().addClass("mm-show"), e(this).parent().parent().parent().parent().parent().addClass("mm-active"), e(this).parent().parent().parent().parent().parent().addClass("active");
            var t = e(this).closest(".main-icon-menu-pane").attr("id");
            e("a[href='#" + t + "']").addClass("active")
        }
    }), feather.replace(), a(), e(".navigation-menu a").each(function() {
        var a = window.location.href.split(/[?#]/)[0];
        console.log("pageUrl", a, this.href), this.href == a && (e(this).parent().addClass("active"), e(this).parent().parent().parent().addClass("active"), e(this).parent().parent().parent().parent().parent().addClass("active"), e(this).parent().parent(".submenu-tab").addClass("show"))
    }), e(".navbar-toggle").on("click", function(a) {
        e(this).toggleClass("open"), e("#navigation").slideToggle(400)
    }), e(".navigation-menu>li").slice(-2).addClass("last-elements"), e('.navigation-menu li.main-nav-item a[href="#"]').on("click", function(a) {
        e(window).width() < 992 && (a.preventDefault(), e(this).parent("li").toggleClass("open").find(".submenu-tab:first").toggleClass("open"))
    }), Waves.init(), e(".main-nav-item").on("click", function(a) {
        a.preventDefault(), e(this).addClass("active"), e(this).siblings().removeClass("active"), e(this).children(".submenu-tab").addClass("show");
        var t = e(this).attr("href");
        e(t).addClass("active"), e(t).siblings().removeClass("active")
    }), e(".submenu-tab li").on("click", function(a) {
        e(this).addClass("active"), e(this).siblings().removeClass("active"), window.location.href = a.target.href
    }), new ApexCharts(document.querySelector("#rightbar_chart"), {
        chart: {
            height: 250,
            type: "radialBar",
            dropShadow: {
                enabled: !0,
                top: 10,
                left: 0,
                bottom: 0,
                right: 0,
                blur: 2,
                color: "#45404a2e",
                opacity: .35
            }
        },
        colors: ["#6d81f5", "#fd3c97", "#1eca7b"],
        plotOptions: {
            radialBar: {
                track: {
                    background: "#b9c1d4",
                    opacity: .5
                },
                dataLabels: {
                    name: {
                        fontSize: "16px"
                    },
                    value: {
                        fontSize: "13px",
                        color: "#0f4069"
                    },
                    total: {
                        show: !0,
                        label: "Total Tasks",
                        color: "#0f4069",
                        formatter: function(a) {
                            return 249
                        }
                    }
                }
            }
        },
        series: [44, 55, 67],
        labels: ["Development", "Backup Create", "Admin Design"]
    }).render(), e(window).scroll(function() {
        50 <= e(window).scrollTop() ? e(".sticky-tab-text").addClass("nav-text-visible") : e(".sticky-tab-text").removeClass("nav-text-visible")
    })
}(jQuery);
