<div class="header--section">
    <div class="header--topbar">
        <div class="container">
            <b class="float--left"><i class="fa fa-mobile-phone" style="font-size: 24px;"></i></b>
            <b class="float--left"> &nbsp;&nbsp;{{ $settings->hotline_number }}</b>
            <ul class="nav social float--right">
                <li><a href="{{ $settings->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $settings->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ $settings->pinterest_link }}"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="{{ $settings->instagram_link }}"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <nav class="header--navbar navbar" data-trigger="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/images/'.$settings->logo) }}" class="logo" alt="Gari-import Logo">
                </a>
            </div>
            <div id="headerNav" class="navbar-collapse collapse float--right">
                <ul class="header--nav-links nav navbar-right">
                    <li class="{{ Request::is('/') ? 'active':'' }}"><a href="{{ url('/') }}">Home</a></li>
                    <li class="{{ Request::is('about-us') ? 'active':'' }}"><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li class="{{ Request::is('how-to-buy') ? 'active':'' }}"><a href="{{ url('/how-to-buy') }}">How to Buy</a></li>
                    <li class="{{ Request::is('verify-auction-sheet*') ? 'active':'' }}"><a href="{{ url('/verify-auction-sheet') }}">Verify Auction Sheet</a></li>
                    <li class="{{ Request::is('stock-list') || Request::is('search*') || Request::is('vehicles*') ? 'active':'' }}"><a href="{{ url('/stock-list') }}">Stock List</a></li>
                    <li class="dropdown {{ Request::is('online-payment') || Request::is('our-banks')  ? 'active':'' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payment<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/online-payment') }}">Online Payment </a></li>
                            <li><a href="{{ url('/our-banks') }}">Our Bank</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('contact') ? 'active':'' }}"><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
