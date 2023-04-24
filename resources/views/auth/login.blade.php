<x-guest-layout>

    <!-- Session Status -->
      <x-auth-session-status class="mb-4 bg-white p-5 rounded-lg" :status="session('status')" />



    <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white shadow-lg rounded-lg">
      <div  class="w-full max-w-lg space-y-8 p-1">
    
      <div>
      <div class="flex justify-center items-center">
                <x-umak-logo class="w-20 h-20 fill-current text-gray-500 " />
                &nbsp;&nbsp;&nbsp;
                <x-application-logo class="h-14 w-auto fill-current text-gray-500 " />
            </div>
         <h2 class="mt-6 text-center text-5xl font-bold tracking-tight text-gray-800"> <span class="text-indigo-500 "> VeriVote Login</span></h2>
         <!-- <p class="mt-4 text-center font-medium text-gray-800 ">
                  Or sign up now &nbsp;
                  <a href="{{ route('register') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                  Register Here 
                  <span aria-hidden="true">&rarr;</span>
                  </a>
         </p> -->
       </div>
    
       <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <x-input-error :messages="$errors->get('email')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->


        <div class="flex items-center justify-between mt-4 mb-4">
        <div>
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" name="remember">
            <span class="ml-2 block text-sm text-gray-800">{{ __('Remember me') }}</span>
        </label>
        </div>
          <div>
          @if (Route::has('password.request'))
              <a  class="text-md text-indigo-800 hover:text-indigo-500" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif
          </div>


        </div>
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </form>

      </div>
    </div>
</x-guest-layout>

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
    <a href="{{ route('register') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register now <span aria-hidden="true">&rarr;</span></a>
  </div>
    <div class="flex flex-1 justify-end">

    </div>
</div>