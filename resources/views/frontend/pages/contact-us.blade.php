@extends('frontend.layouts.master')

@section('content')


<section class="contact-page sec-pad">
    <div class="container">
        <div class="sec-title text-center">
            <h3><span>Contactez-nous</span></h3>
        </div>
        <div class="row">


            <div class="col-md-12" style="margin: auto;">
                <form method="post" action="{{route('contact.submit')}}" class="contact-form">
                    @csrf
                            <x-honey/>
                    <h3>Envoyer Un Message</h3>
                    <input id="name" type="text" name="name" placeholder="Nom" value="{{old('name')}}" required>
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="name" type="text" name="lastname" placeholder="Prénom" value="{{old('lastname')}}" required>
                    @error('lastname')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="name" type="text" name="company" placeholder="Nom d'entreprise" value="{{old('company')}}" >
                    @error('company')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="name" type="text" name="secteur_activite" placeholder="Secteur d'activité" value="{{old('secteur_activite')}}" required>
                    @error('secteur_activite')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="name" type="text" name="adresse" placeholder="Adresse" value="{{old('adresse')}}" required>
                    @error('adresse')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="email" type="text" name="email" placeholder="Email" value="{{old('email')}}" required>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="phone" type="text" name="phone" placeholder="Numéro de télephone" value="{{old('phone')}}" required>
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input id="phone" type="text" name="subject" placeholder="Sujet de message" value="{{old('subject')}}" required>
                    @error('subject')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <textarea id="message" name="content" required rows="8" placeholder="Message">{{old('content')}}</textarea>

                    <button type="submit" class="hvr-sweep-to-right">Envoyer</button>
                </form>
            </div>


        </div>
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
