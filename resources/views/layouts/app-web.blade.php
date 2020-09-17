<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ isset($seoSettings) && $seoSettings->title ? $seoSettings->title:''  }}
    </title>
    <meta name="author" content="ThemeLooks">
    <meta name="description" content="{{ $seoSettings->meta_description }}">
    <meta name="keywords" content="{{ $seoSettings->meta_keyword }}">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="{{ isset($settings) && $settings->favicon ? asset('images/'.$settings->favicon):'' }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700%7CRoboto:300,400,500,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/fakeLoader.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/magnific-popup.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/fontawesome-stars-o.min.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/responsive-style.css" rel="stylesheet">
    <link href="{{ asset('/fontend/assets/') }}/css/colors/color-1.css" rel="stylesheet" id="changeColorScheme">
    <link href="{{ asset('/fontend/assets/') }}/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        lu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            margin-left: 100px;
        }

        il {
            float: left;
        }

        il a {
            display: block;
            color: black;
            text-align: center;
            padding: 24px 25px;
            text-decoration: none;
        }

        il a:hover {
            background-color: white;
        }

        .tr-th-font-color {
            color: black;
            font-family: Arial;
            font-size: medium;
        }

        .input-border {
            border: 1px solid darkgray;
            border-radius: 5px;
        }

        .all-span {
            color: #0b0b0b;
            font-size: 18px;
            margin-left: 40px;
        }

        .select-mr {
            margin-left: 10px;
        }

        .year-mr {
            margin-left: 150px;
        }

        .custom-button {
            border-radius: 5px;
            padding: 3px 3px;
            color: white;
        }

        .custom-button-a {
            margin-top: 50px;
        }

        .custom-button-available {
            background-color: orangered;
        }

        .custom-button-stock {
            background-color: deepskyblue;
        }

        .custom-button-inquiry {
            background-color: darkorange;
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="preloader"></div>
    <div class="wrapper">
        <!--Header start-->
        @include('fontend.includes.header')
        <!--Header end-->


        <!--Main content-->
        @yield('content')
        <!--Main content end-->


        <!--Footer start-->
        @include('fontend.includes.footer')
        <!--Footer end-->


        <div class="back-to-top-btn"> <a href="#" class="active"><i class="fa fa-chevron-up"></i></a> </div>
    </div>
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://www.elevateweb.co.uk/wp-content/themes/radial/jquery.elevatezoom.min.js"></script>
    <script>
        //initiate the plugin and pass the id of the div containing gallery images
        $("#zoom_03").elevateZoom({
            gallery: 'gallery_01',
            cursor: 'pointer',
            easing: true,
            galleryActiveClass: 'active',
            imageCrossfade: true,
            loadingIcon: 'https://www.elevateweb.co.uk/spinner.gif'
        });

        //pass the images to Fancybox
        $("#zoom_03").bind("click", function(e) {
            var ez = $('#zoom_03').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
    </script> -->
    <script>
        /*
Credits:
https://github.com/marcaube/bootstrap-magnify
*/


        ! function($) {

            "use strict"; // jshint ;_;


            /* MAGNIFY PUBLIC CLASS DEFINITION
             * =============================== */

            var Magnify = function(element, options) {
                this.init('magnify', element, options)
            }

            Magnify.prototype = {

                constructor: Magnify

                    ,
                init: function(type, element, options) {
                        var event = 'mousemove',
                            eventOut = 'mouseleave';

                        this.type = type
                        this.$element = $(element)
                        this.options = this.getOptions(options)
                        this.nativeWidth = 0
                        this.nativeHeight = 0

                        this.$element.wrap('<div class="magnify" \>');
                        this.$element.parent('.magnify').append('<div class="magnify-large" \>');
                        this.$element.siblings(".magnify-large").css("background", "url('" + this.$element.attr("src") + "') no-repeat");

                        this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
                        this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
                    }

                    ,
                getOptions: function(options) {
                        options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

                        if (options.delay && typeof options.delay == 'number') {
                            options.delay = {
                                show: options.delay,
                                hide: options.delay
                            }
                        }

                        return options
                    }

                    ,
                check: function(e) {
                    var container = $(e.currentTarget);
                    var self = container.children('img');
                    var mag = container.children(".magnify-large");

                    // Get the native dimensions of the image
                    if (!this.nativeWidth && !this.nativeHeight) {
                        var image = new Image();
                        image.src = self.attr("src");

                        this.nativeWidth = image.width;
                        this.nativeHeight = image.height;

                    } else {

                        var magnifyOffset = container.offset();
                        var mx = e.pageX - magnifyOffset.left;
                        var my = e.pageY - magnifyOffset.top;

                        if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                            mag.fadeIn(100);
                        } else {
                            mag.fadeOut(100);
                        }

                        if (mag.is(":visible")) {
                            var rx = Math.round(mx / container.width() * this.nativeWidth - mag.width() / 2) * -1;
                            var ry = Math.round(my / container.height() * this.nativeHeight - mag.height() / 2) * -1;
                            var bgp = rx + "px " + ry + "px";

                            var px = mx - mag.width() / 2;
                            var py = my - mag.height() / 2;

                            mag.css({
                                left: px,
                                top: py,
                                backgroundPosition: bgp
                            });
                        }
                    }

                }
            }


            /* MAGNIFY PLUGIN DEFINITION
             * ========================= */

            $.fn.magnify = function(option) {
                return this.each(function() {
                    var $this = $(this),
                        data = $this.data('magnify'),
                        options = typeof option == 'object' && option
                    if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
                    if (typeof option == 'string') data[option]()
                })
            }

            $.fn.magnify.Constructor = Magnify

            $.fn.magnify.defaults = {
                delay: 0
            }


            /* MAGNIFY DATA-API
             * ================ */

            $(window).on('load', function() {
                $('[data-toggle="magnify"]').each(function() {
                    var $mag = $(this);
                    $mag.magnify()
                })
            })

        }(window.jQuery);
    </script>

    <script src="{{ asset('/fontend/assets/') }}/js/jquery-ui.min.js"></script>

    <script src="{{ asset('/fontend/assets/') }}/js/fakeLoader.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery.sticky.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/isotope.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/jquery.barrating.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/color-switcher.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/retina.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('/fontend/assets/') }}/js/bootstrap.min.js"></script>
    <script>
        $('.carousel-fade').carousel({
            interval: 3000
        })
    </script>

    {!! Toastr::message() !!}
    @yield('page_js')
</body>

</html>