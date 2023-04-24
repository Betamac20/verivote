<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image" href="/img/verivote.png" />
  <title>VeriVote | Forgot Password</title>
  @vite('resources/css/app.css')
  @vite('resources/css/style.css')
</head>
<body>

<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">

    <div  class="w-full max-w-lg space-y-6">
                <!-- forgot password section -->
                <div>
                    <div class="flex justify-center items-center">
                        <a href="#"><img class="mx-auto h-20 w-auto" src="/img/umak.png" alt="Your Company" style="ease-in" /></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#"><img class="mx-auto h-24 w-auto" src="/img/verivote.png" alt="Your Company" style="ease-in" /></a>
                    </div>
                    <h2 class="mt-6 text-center text-5xl font-bold tracking-tight text-gray-800"> <span class="text-indigo-500 "> Forgot Password</span></h2>
                    <p class="mt-4 text-center text-sm text-gray-600">
                    
                    <div class="font-medium text-gray-400 bg-gray-800 rounded-lg p-5 text-justify"> 
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    </p>
                </div>
                <!-- end forgot password section -->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

       <form method="POST" action="{{ route('password.email') }}">
       @csrf

         <input type="hidden" name="remember" value="true" />
         <div class="-space-y-px rounded-md shadow-sm">
           <div>
             <label for="email-address" class="sr-only">Email address</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                <input name="email" type="email" autocomplete="email" :value="old('email')" required  class="relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="UMak Email Address" />
           </div>
         </div>
 
         <div>
           <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
             <span class="absolute inset-y-0 left-0 flex items-center pl-3">
               <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
             </span>
             {{ __('Email Password Reset Link') }}
           </button>
         </div>
         
         <div class="border-t border-gray-200" />
        
         <!-- do not have account section -->
            <div class="flex items-center justify-center text-md text-gray-800">
                Already have an account? &nbsp; <a href="{{ route('login') }}"  class="font-medium text-indigo-800 hover:text-indigo-500">Sign in</a>          
            </div>

       </form>
      </div>
   </div>
   
        <!-- Banner -->
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
            <strong class="font-semibold">VeriVote 2023</strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>Register now to vote your desire candidates. Just click the button here
            </p>
            <a href="#" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register now <span aria-hidden="true">&rarr;</span></a>     
        </div>
            <div class="flex flex-1 justify-end">
            </div>
        </div>

</body>
</html>