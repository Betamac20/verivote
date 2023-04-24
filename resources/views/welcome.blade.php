<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image" href="/img/verivote.png" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased ">
    
    
    <!-- bg-gradient-to-r from-amber-400 to-indigo-600 -->
    <!-- bg-white dark:bg-slate-200 -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-5 sm:pt-0">
    <img src="/img/cyber.jpg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center opacity-82.5" />
            <div class="w-full sm:max-w-md px-6   overflow-hidden sm:rounded-lg">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="flex min-h-full items-center justify-center  py-12 sm:px-4 lg:px-6 bg-white shadow-lg rounded-lg">
      <div  class="w-full max-w-lg space-y-8 p-4">
    
      <div>
      <div class="flex justify-center items-center">
                <x-umak-logo class="w-20 h-20 fill-current text-gray-500 " />
                &nbsp;&nbsp;&nbsp;
                <x-application-logo class="h-14 w-auto fill-current text-gray-500 " />
            </div>
         <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-indigo-500">  Welcome to VeriVote</h2>
         
       </div>
    
       <div class="rounded-md flex text-justify bg-emerald-600  sm:ml-2 sm:mr-2 text-emerald-50 p-3">
            &nbsp; as Empowerment through voting emphasizes that voting is a powerful tool for individuals to exercise their democratic rights and influence the direction of their organization.
        </div>

        <div class="flex items-center justify-between mt-4 mb-4">
            <a href="{{ route('login') }}" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mr-1">   
                {{ __('Login') }} 
            </a>
            <a href="{{ route('register') }}" class="group relative flex w-full justify-center rounded-md bg-rose-600 py-2 px-3 text-sm font-semibold text-white hover:bg-rose-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ml-1">   
                {{ __('Register') }} 
            </a>
        </div>
        
      </div>
    </div>
    </div>
  </div>


<div class="fixed w-full isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 py-2.5 px-6 sm:px-3.5 sm:before:flex-1  bottom-0">
  <svg viewBox="0 0 577 310" aria-hidden="true" class="absolute top-1/2 left-[max(-7rem,calc(50%-52rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
    <path id="1d77c128-3ec1-4660-a7f6-26c7006705ad" fill="url(#49a52b64-16c6-4eb9-931b-8e24bf34e053)" fill-opacity=".3" d="m142.787 168.697-75.331 62.132L.016 88.702l142.771 79.995 135.671-111.9c-16.495 64.083-23.088 173.257 82.496 97.291C492.935 59.13 494.936-54.366 549.339 30.385c43.523 67.8 24.892 159.548 10.136 196.946l-128.493-95.28-36.628 177.599-251.567-140.953Z" />
    <defs>
      <linearGradient id="49a52b64-16c6-4eb9-931b-8e24bf34e053" x1="614.778" x2="-42.453" y1="26.617" y2="96.115" gradientUnits="userSpaceOnUse">
        <stop stop-color="#9089FC" />
        <stop offset="1" stop-color="#FF80B5" />
      </linearGradient>
    </defs>
  </svg>
  <svg viewBox="0 0 577 310" aria-hidden="true" class="absolute top-1/2 left-[max(45rem,calc(50%+8rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
    <use href="#1d77c128-3ec1-4660-a7f6-26c7006705ad" />
  </svg>
  <div class="flex flex-wrap items-center gap-y-2 gap-x-4">
    <p class="text-sm leading-6 text-gray-900">
      <strong class="font-semibold">VeriVote 2023</strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
      
      <span class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">YOUR VOTE MATTERS.</span>
    </p>
  </div>
    <div class="flex flex-1 justify-end">

    </div>
</div>

</body>
</html>