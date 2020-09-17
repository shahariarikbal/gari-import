<div class="footer--section">
    <div class="footer--widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="left-section">
                        <div class="mb-20 text-center">
                            <img src="{{ asset('/images/'.$settings->logo) }}" alt="Gari-import Logo">
                        </div>
                        <div class="mb-10">
                            <p>
                                {!! $settings->footer_text !!}
                            </p>
                        </div>
                        <div class="mb-20">
                            <a href="{{ url('/about-us') }}">Read More <i class="fa fa-angle-double-right" style="margin-left: 8px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 col-xs-12">
                    <div class="col-md-12 padding-left-0 padding-right-0">
                        <div class="widget--title">
                            <h2 class="h4">Useful Links</h2>
                        </div>
                    </div>
                    <div class="col-md-12 padding-left-0 padding-right-0">
                        <div class="widget">
                            <div class="links--widget">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="nav">
                                            <li><a href="{{ url('/verify-auction-sheet') }}">Verify Auction Sheet </a></li>
                                            <li><a href="{{ url('/auction-sheet-guide') }}">Auction Sheet Guide</a></li>
                                            <li><a href="{{ url('/shipping-info') }}">Shipping Info</a></li>
                                            <li><a href="{{ url('/import-regulations') }}">Import Regulations</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="nav">
                                            <li><a href="{{ url('/news') }}">News</a></li>
                                            <li><a href="{{ url('/faqs') }}">FAQ</a></li>
                                            <li><a href="{{ url('/terms-condition') }}">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Contact Information</h2>
                        </div>
                        <div class="contact--widget">
                            {!! $settings->contact_info !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer--copyright">
    <div class="container">
        <p class="float--left">Copyright &copy; by <b class="domain-color" style="cursor: pointer">GARI-IMPORT.com.bd</b> 2020. All Rights Reserved.</p>
        <ul class="social nav float--right">
            <li><a href="{{ $settings->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ $settings->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ $settings->pinterest_link }}"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="{{ $settings->instagram_link }}"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
</div>
</div>