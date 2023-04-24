<x-admin-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-5 mx-5 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-2 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 flex justify-between items-center">
                    <div class="ml-2">
                        <a href="{{ route('admin.candidates') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Candidate Dashboard ") }} 
                        </a>
                        /
                        <a href="{{ route('admin.search_candidates') }}" class="text-amber-400 hover:text-gray-300">
                            {{ __("Search Candidate ") }} 
                        </a>
                    </div> 
                    <a href=" {{ route('admin.candidates') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <x-icon name="arrow-small-left" solid class=" h-5 w-auto"/> 
                        {{ ("Back") }}
                    </a>
                </div>
            </div>
        </div>

            <div class="bg-white overflow-hidden shadow-xl rounded-xl mt-5 ">
                <div class="p-3 text-gray-600 font-bold ">
                    <div class="flex items-center justify-start mt-2">
                        <x-icon name="magnifying-glass" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Search Candidates") }} 
                    </div> 
                </div>
                <div class="mx-2 mt-2 mb-4">
                    <div class="border-t border-gray-200" />
                </div>


                <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white">
                    <div  class="w-full max-w-lg space-y-8 p-1 ">

                            <!-- Message section -->
                            @if(Session::has('success'))
                        
                            <div class="relative w-full flex items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg">
                                <div class="flex flex-1 justify-between items-center mr-5">  
                                    <div class="flex flex-1 justify-center items-center mr-5">
                                        <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                        <p class="text-sm leading-6 text-gray-900 ">
                                            <strong class="font-semibold">Message</strong>
                                            <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                            {{Session::get('success')}}  
                                        </p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm leading-6 text-gray-900 ">
                                            <a href="{{ route('admin.candidates') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                                                View        
                                                <span aria-hidden="true">&rarr;</span>
                                            </a>
                                            </p>
                                    </div>
                                </div>
                            </div> 
                            @endif
                            <!-- End Message section -->

                            <!-- Message section -->
                            @if(Session::has('error'))
                        
                            <div class="relative w-full flex items-center  overflow-hidden bg-red-400 py-2.5 ml-0 top-0 rounded-lg">
                                <div class="flex flex-1 justify-center p-2 items-center mr-5">  
                                        <div class="flex justify-center items-center">
                                            <p class="text-sm leading-6 text-gray-900 font-bold ">
                                                <x-icon name="exclamation-triangle" outline class=" h-5 w-auto mr-2"/>   
                                            </p>
                                            <div>
                                            <p class="text-sm leading-6 text-gray-900 ">
                                                {{Session::get('error')}}  
                                            </p>
                                        </div>
                                        </div>
                                </div>
                            </div> 
                            @endif
                            <!-- End Message section -->

                        <form method="POST" action="{{ route('admin.add_candidates') }}">
                            @csrf


                            <!-- ID Number -->
                            <x-input-error :messages="$errors->get('id_number')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                            <div>
                                <x-input-label for="id_number" :value="__('ID Number')" />
                                <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number"  required autofocus autocomplete="id_number" />
                                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 mb-4">
                                <x-primary-button>
                                <x-icon name="magnifying-glass" solid class=" h-5 w-auto mr-2"/> 
                                    {{ __('Search Candidate') }}
                                </x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

    </div>


</x-admin-layout>