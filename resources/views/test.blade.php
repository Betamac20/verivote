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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-5 sm:pt-0 bg-slate-200">
    <!-- <img src="/img/cyber.jpg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center opacity-82.5" /> -->
    <div class="w-full sm:max-w-md px-6   overflow-hidden sm:rounded-lg">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="flex items-center justify-center  py-12  bg-white shadow-lg rounded-lg">
      <div  class="w-full max-w-lg  p-4">
    
      <div>
      <div class="flex justify-center items-center">
                <x-umak-logo class="w-20 h-20 fill-current text-gray-500 " />
                &nbsp;&nbsp;&nbsp;
                <x-application-logo class="h-14 w-auto fill-current text-gray-500 " />
            </div>
         <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-indigo-500">  Testing for EC KeyPair</h2>
         
       </div>
        <br>
        <div class="mb-2">
            <span class="font-bold mb-2">Private Key:</span>
            <textarea id="message" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $private_key ?? null ?></textarea>
        </div>
        <div class="mb-2">
            <span class="font-bold mb-2">Public Key:</span>
            <textarea id="message" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $public_key ?? null ?></textarea>
        </div>

        <div class="mb-2">
            <span class="font-bold mb-2">Token:</span>
            <textarea id="message" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $jwt ?? null ?></textarea>
        </div>
        
        <div class="mb-2">
            <span class="font-bold mb-2">Payloads:</span>
            <textarea id="message" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $dec ?? null ?></textarea>
        </div>
        <?php 
             if ($result == env('RESULT_TRUE')) {
             ?>
             <div class="mt-4 font-semibold text-blue-600 text-lg">
                <?php echo env('RESULT_TRUE') ?>
             </div>
             <?php
             }
             else if ($result == env('RESULT_FALSE')) {
             ?>
             <div class="mt-4 font-semibold text-red-600 text-lg">
                <?php echo env('RESULT_FALSE') ?>
             </div>
             <?php
             }
             ?>
        
      </div>
    </div>
    </div>
  </div>
<!-- Main modal -->
<div id="defaultModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="false" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
    <script>
        $('#defaultModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    </script>
</body>
</html>