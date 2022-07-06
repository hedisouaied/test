@extends('frontend.layouts.master')

@section('content')

<style>
    @media only screen and (max-width: 600px) {
  .hedi-menu {
    height: 180px !important;
  }
}
</style>
<!-- Page Title -->
<section class="page-title hedi-menu" style="background:black;height: 128px;">
    <div class="auto-container">
        <div class="content-box" style="padding: 63px 0px;">
            <div class="content-wrapper">

            </div>
        </div>
    </div>
</section>

<!-- Contact Form section -->
<section class="contact-form-section style-four">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="office-address">
                    <div class="icon-box">
                        <div class="icon"><i class="flaticon-geolocation"></i></div>
                        <h4>Visitez notre usine</h4>
                        <div class="text">{{get_setting('address')}}</div>
                    </div>
                    <div class="text">
                        Nous sommes impatients de développer de nouvelles opportunités et de produire des produits de classe mondiale pour nos clients.
                        Contactez notre équipe pour en discuter.
                    </div>
                </div>
                <div class="contact-info mb-30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-call"></i></div>
                                <h4>Téléphone</h4>
                                <div class="text"><a href="tel:{{get_setting('phone')}}">{{get_setting('phone')}}</a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-correspondence"></i></div>
                                <h4>Email</h4>
                                <div class="text"><a href="mailto:{{get_setting('email')}}">{{get_setting('email')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-box">
                    <div class="sec-title">
                        <div class="sub-title">Envoyer Un Message</div>
                        <h2>Besoin D'aide? Envoyer Un Message</h2>
                    </div>
                    <!--Contact Form-->
                    <div class="contact-form">
                        <form name="contactform" method="post" action="{{route('contact.submit')}}" id="contact-form">
                            @csrf
                            <x-honey/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom *</label>
                                        <input id="name" type="text" name="name" placeholder="Nom" value="{{old('name')}}" required>
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Prénom *</label>
                                        <input id="name" type="text" name="lastname" placeholder="Prénom" value="{{old('lastname')}}" required>
                                        @error('lastname')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom d'entreprise</label>
                                        <input id="name" type="text" name="company" placeholder="Nom d'entreprise" value="{{old('company')}}" >
                                        @error('company')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Secteur d'activité *</label>
                                        <input id="name" type="text" name="secteur_activite" placeholder="Secteur d'activité" value="{{old('secteur_activite')}}" required>
                                        @error('secteur_activite')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Adresse *</label>
                                        <input id="name" type="text" name="adresse" placeholder="Adresse" value="{{old('adresse')}}" required>
                                        @error('adresse')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input id="email" type="text" name="email" placeholder="Email" value="{{old('email')}}" required>
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Numéro de télephone *</label>
                                        <input id="phone" type="text" name="phone" placeholder="Numéro de télephone" value="{{old('phone')}}" required>
                                        @error('phone')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Sujet de message *</label>
                                        <input id="phone" type="text" name="subject" placeholder="Sujet de message" value="{{old('subject')}}" required>
                                        @error('subject')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea id="message" name="content" required rows="8" placeholder="Message">{{old('content')}}</textarea>
                                        <div class="form-btn">

                                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">

                                            <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span><i class="flaticon-up-arrow"></i>Envoyer</span></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Contact Form-->
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2721.517046329986!2d10.66018012101702!3d35.78894747526715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13027580d686bd19%3A0xd06c2769ee271609!2sHPC%20GROUP!5e0!3m2!1sfr!2stn!4v1644838599928!5m2!1sfr!2stn" width="600" height="550" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


    </div>
</section>





@endsection

@section('scripts')
@if(session()->has('success'))

<script>
 $(document).ready(function () {
alertify.set('notifier','position','bottom-left');
alertify.success('{{session()->get('success')}}');
 });
</script>
@endif
@endsection
