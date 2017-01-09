@extends('layouts.main')

@section('content')

   <div id="app">
       <transition name="custom-classes-transition"
                   enter-active-class="animated fadeIn"
                   leave-active-class="animated fadeOut" mode="out-in">
        <router-view>
       </router-view>
       </transition>
   </div>

@endsection
