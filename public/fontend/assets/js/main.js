;
(function (b) {
    var g = b(window),
        h = b("body"),
        l = "rtl" === b("html").attr("dir") ? !0 : !1,
        k = b(".preloader");
    k.length && k.fakeLoader({
        spinner: "spinner2",
        bgColor: !1
    });
    var d = function (b, d) {
        return "undefined" === typeof b ? d : b
    };
    b(function () {
        b("[data-bg-img]").each(function () {
            var a = b(this);
            a.css("background-image", "url(" + a.data("bg-img") + ")").addClass("bg--img bg--overlay").attr("data-rjs", 2).removeAttr("data-bg-img")
        });
        b("img").attr("data-rjs", 2);
        retinajs();
        b('[data-trigger="sticky"]').each(function () {
            b(this).sticky({
                zIndex: 999
            })
        });
        b('[data-form="validate"]').each(function () {
            b(this).validate({
                errorPlacement: function () {
                    return !0
                }
            })
        });
        b('[data-form="ajax"]').each(function () {
            var a = b(this),
                c = a.find(".status");
            a.validate({
                errorPlacement: function () {
                    return !0
                },
                submitHandler: function (a) {
                    var d = b(a);
                    a = d.attr("action");
                    d = d.serialize();
                    b.post(a, d, function (b) {
                        c.show().html(b).delay(3E3).fadeOut("show")
                    })
                }
            })
        });
        b('[data-form="mailchimpAjax"]').each(function () {
            b(this).validate({
                errorPlacement: function () {
                    return !1
                },
                submitHandler: function (a) {
                    a =
                        b(a);
                    var c = a.serialize(),
                        d = a.attr("action").replace("/post?", "/post-json?").concat("&c=?"),
                        e = a.children(".status");
                    b.getJSON(d, c, function (a) {
                        a.html = "error" === a.result && "0" === a.msg.charAt(0) ? a.msg.substring(4) : a.msg;
                        e.slideUp(function () {
                            b(this).html(a.html).slideDown()
                        })
                    })
                }
            })
        });
        var c = b('[data-popup="img"]');
        c.length && c.magnificPopup({
            type: "image"
        });
        c = b('[data-popup="video"]');
        c.length && c.magnificPopup({
            type: "iframe"
        });
        b("[data-countdown]").each(function () {
            var a = b(this);
            a.countdown(a.data("countdown"),
                function (a) {
                    b(this).html("<ul>" + a.strftime("<li><strong>%D</strong><span>DAYS</span></li><li><strong>%H</strong><span>HOURS</span></li><li><strong>%M</strong><span>MINUTES</span></li><li><strong>%S</strong><span>SECONDS</span></li>") + "</ul>")
                })
        });
        var c = b(".testimonial--section").find(".testimonial--clients"),
            g = c.data("increment");
        c.on("changed.owl.carousel", function (a) {
            a = b(a.currentTarget).find(".owl-item")[a.item.index + g];
            a = b(a).children().data("target");
            b(a).addClass("active in").siblings().removeClass("active in")
        });
        b(".owl-carousel").each(function () {
            var a = b(this);
            a.owlCarousel({
                rtl: l,
                items: d(a.data("owl-items"), 1),
                margin: d(a.data("owl-margin"), 0),
                loop: d(a.data("owl-loop"), !0),
                autoplay: d(a.data("owl-autoplay"), !0),
                smartSpeed: d(a.data("owl-speed"), 1200),
                autoplaySpeed: 1600,
                mouseDrag: d(a.data("owl-drag"), !0),
                nav: d(a.data("owl-nav"), !1),
                navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
                dots: d(a.data("owl-dots"), !1),
                responsive: d(a.data("owl-responsive"), {})
            })
        });
        b(".progress-bar").each(function () {
            var a =
                    b(this),
                c = a.attr("aria-valuenow"),
                d = b("<span></span>").appendTo(a.siblings(".h4"));
            a.waypoint(function () {
                a.animate({
                    width: c + "%"
                }, {
                    step: function (a) {
                        d.text(parseInt(a) + "%")
                    }
                }, 1200);
                this.destroy()
            }, {
                offset: "bottom-in-view"
            })
        });
        b('[data-trigger="spinner"]').each(function () {
            var a = b(this);
            a.spinner({
                min: a.data("min"),
                max: a.data("max")
            })
        });
        c = b(".gallery--section").find(".gallery--slider");
        c.length && c.magnificPopup({
            delegate: "[data-popup]",
            type: "image"
        });
        b(".products--section").find(".product-single--img").on("click",
            '[data-toggle="tab"]',
            function () {
                b(this).parent(".item").addClass("active").parent(".owl-item").siblings().children(".item").removeClass("active")
            });
        c = b("#productRatingSelect");
        c.length && c.barrating({
            theme: "fontawesome-stars-o",
            hoverState: !1
        });
        b(".checkout--section").on("click", ".checkout--info-toggle", function (a) {
            a.preventDefault();
            b(this).toggleClass("active").parent("p").parent(".title").siblings(".checkout--info-form").slideToggle()
        });
        var e = b(".map--section"),
            c = function () {
                var a = new google.maps.Map(e[0], {
                    center: {
                        lat: e.data("map-latitude"),
                        lng: e.data("map-longitude")
                    },
                    zoom: e.data("map-zoom"),
                    scrollwheel: !1,
                    disableDefaultUI: !0,
                    zoomControl: !0,
                    styles: [{
                        featureType: "landscape",
                        stylers: [{
                            hue: "#FFBB00"
                        }, {
                            saturation: 43.400000000000006
                        }, {
                            lightness: 37.599999999999994
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "road.highway",
                        stylers: [{
                            hue: "#FFC200"
                        }, {
                            saturation: -61.8
                        }, {
                            lightness: 45.599999999999994
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "road.arterial",
                        stylers: [{
                            hue: "#FF0300"
                        }, {
                            saturation: -100
                        }, {
                            lightness: 51.19999999999999
                        }, {
                            gamma: 1
                        }]
                    },
                        {
                            featureType: "road.local",
                            stylers: [{
                                hue: "#FF0300"
                            }, {
                                saturation: -100
                            }, {
                                lightness: 52
                            }, {
                                gamma: 1
                            }]
                        }, {
                            featureType: "water",
                            stylers: [{
                                hue: "#0078FF"
                            }, {
                                saturation: -13.200000000000003
                            }, {
                                lightness: 2.4000000000000057
                            }, {
                                gamma: 1
                            }]
                        }, {
                            featureType: "poi",
                            stylers: [{
                                hue: "#00FF6A"
                            }, {
                                saturation: -1.0989010989011234
                            }, {
                                lightness: 11.200000000000017
                            }, {
                                gamma: 1
                            }]
                        }
                    ]
                });
                if ("undefined" !== typeof e.data("map-marker")) {
                    var b = e.data("map-marker"),
                        c = 0;
                    for (c; c < b.length; c++) new google.maps.Marker({
                        position: {
                            lat: b[c][0],
                            lng: b[c][1]
                        },
                        map: a,
                        animation: google.maps.Animation.DROP,
                        draggable: !0
                    })
                }
            };
        e.length && (e.css("height", 400), c());
        var f = b(".footer--section"),
            c = f.find(".widget--title"),
            f = f.find(".widget--logo");
        f.length && f.outerHeight() > c.outerHeight() && c.css("margin-top", f.outerHeight() - c.outerHeight());
        b(".back-to-top-btn").on("click", "a", function (a) {
            a.preventDefault();
            b("html, body").animate({
                scrollTop: 0
            }, 1200)
        });
        "undefined" !== typeof b.cColorSwitcher && b.cColorSwitcher({
            switcherTitle: "Main Colors",
            switcherColors: [{
                bgColor: "#fd8469",
                filepath: "css/colors/color-1.css"
            },
                {
                    bgColor: "#82b440",
                    filepath: "css/colors/color-2.css"
                }, {
                    bgColor: "#179ea8",
                    filepath: "css/colors/color-3.css"
                }, {
                    bgColor: "#e91e63",
                    filepath: "css/colors/color-4.css"
                }, {
                    bgColor: "#f69323",
                    filepath: "css/colors/color-5.css"
                }, {
                    bgColor: "#FC5143",
                    filepath: "css/colors/color-6.css"
                }, {
                    bgColor: "#00B249",
                    filepath: "css/colors/color-7.css"
                }, {
                    bgColor: "#D48B91",
                    filepath: "css/colors/color-8.css"
                }, {
                    bgColor: "#8CBEB2",
                    filepath: "css/colors/color-9.css"
                }, {
                    bgColor: "#119ee6",
                    filepath: "css/colors/color-10.css"
                }
            ],
            switcherTarget: b("#changeColorScheme")
        })
    });
    g.on("load", function () {
        var c = b(".AdjustRow");
        c.length && c.isotope({
            layoutMode: "fitRows"
        });
        c = b(".MasonryRow");
        c.length && c.isotope();
        c = function () {
            1 < g.scrollTop() ? h.addClass("isScrolling") : h.removeClass("isScrolling")
        };
        c();
        g.on("scroll", c)
    })
})(jQuery);