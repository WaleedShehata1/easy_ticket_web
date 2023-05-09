@extends('layouts.HeaderAndFooter')

@section('contant')
<section class="Home-page" id="Home-page" >
<!-- popoup1 -->
<div class="search-national-numbe" id="search-national-numbe">
<x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
        <h2 class="search-national-title">Enter<br> the national number to search for your account.</h2>
        
        <div class="search-national-group">

            <input type="text" name="national_ID" :value="old('national_ID')" required autofocus>
            <x-input-error :messages="$errors->get('national_ID')" class="search-national-error" />
            <x-primary-button class="search-btn" id="search-btn">
                 <!-- @error('national_ID')
                <span>{{$message}} </span>
                @enderror -->
                {{ __('send') }}
            </x-primary-button>

        </div>
    </form>

<a href="route('login')"><div class="close-search-national" id="close-search-national">&times;</div> </a>
</div>
</section>
@stop
