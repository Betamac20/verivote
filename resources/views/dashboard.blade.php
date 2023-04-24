<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    
                @role('student')
                {{ __("Hi,") }} <b class="text-emerald-400"> {{ Auth::user()->name }}</b>! welcome to <b class="text-amber-400">VeriVote.</b>
                @endrole
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
