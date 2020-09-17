@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">Contact</h1>
            </div>
        </div>
    </div>
    <div class="contact--section pd--24-0-110">
        <div class="container">
        <div class="row row--vc">
            <div class="col-md-6">
               <div class="row AdjustRow">
                  <div class="col-sm-6 col-xs-12 mb-20">
                     <div class="contact--info-item">
                        <div class="icon"> <img src="{{ asset('/fontend/assets/') }}/img/contact-img/icon-01.png" alt=""> </div>
                        <div class="title">
                           <h2 class="h4">Office Address</h2>
                        </div>
                        <div class="content">
                           <p>{!! $contact->address !!}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 mb-20">
                     <div class="contact--info-item">
                        <div class="icon"> <img src="{{ asset('/fontend/assets/') }}/img/contact-img/icon-02.png" alt=""> </div>
                        <div class="title">
                           <h2 class="h4">Make A Call Now</h2>
                        </div>
                        <div class="content">
                           <p>{{ $contact->phone }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 mb-20">
                     <div class="contact--info-item">
                        <div class="icon"> <img src="{{ asset('/fontend/assets/') }}/img/contact-img/icon-03.png" alt=""> </div>
                        <div class="title">
                           <h2 class="h4">E-mail Address</h2>
                        </div>
                        <div class="content">
                           <p>{{ $contact->email }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 mb-20">
                     <div class="contact--info-item">
                        <div class="icon"> <img src="{{ asset('/fontend/assets/') }}/img/contact-img/icon-04.png" alt=""> </div>
                        <div class="title">
                           <h2 class="h4">Our Websites</h2>
                        </div>
                        <div class="content">
                           <p><a href="#">{{ $contact->web_site }}</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="contact--form">
                  <div class="title">
                     <h2 class="h2">Just Say Hello!</h2>
                  </div>
                  <form action="{{ url('/query-send') }}" method="post">
                      @csrf
                     <div class="row">
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group">
                               <label>
                                   <span>Name *</span>
                                   <input type="text" name="name" class="form-control" required>
                               </label>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group">
                               <label>
                                   <span>Phone</span>
                                   <input type="text" name="phone" class="form-control">
                               </label>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group">
                               <label>
                                   <span>E-mail *</span>
                                   <input type="email" name="email" class="form-control" required>
                               </label>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <div class="form-group">
                               <label>
                                   <span>Subject *</span>
                                   <input type="text" name="subject" class="form-control" required>
                               </label>
                           </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                           <div class="form-group">
                               <label> <span>Message *</span>
                                   <textarea name="message" class="form-control" required></textarea>
                               </label>
                           </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-block btn-default">Send Message</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
    </div>
    </div>
    <div class="container-fluet">
        <div class="">
            @if($contact->map)
                <iframe src="{{ $contact->map }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            @else
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.234785696463!2d90.3632147140493!3d23.774652284577428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0b00362c719%3A0x98ffa85ad21b509e!2z4Ka24KeN4Kav4Ka-4Kau4Kay4KeAIOCmuOCnjeCmleCmr-CmvOCmvuCmsCDgprbgpqrgpr_gpoIg4Kau4Kay!5e0!3m2!1sbn!2sbd!4v1595411233795!5m2!1sbn!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            @endif
        </div>
    </div>
@endsection
