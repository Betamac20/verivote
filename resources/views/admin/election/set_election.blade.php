<x-admin-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-5 mx-5 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 flex justify-between items-center">
                <div class="ml-2">
                        <a href="{{ route('admin.election') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Election Dashboard ") }} 
                        </a>
                        /
                        <a href="{{ route('admin.set_election') }}" class="text-amber-400 hover:text-gray-300">
                            {{ __("Set Election") }} 
                        </a>
                    </div> 
                    <a href=" {{ route('admin.election') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <x-icon name="arrow-small-left" solid class=" h-5 w-auto"/> 
                        {{ ("Back") }}
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="receipt-percent" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Set Election ") }} 
                    </div>     
                    <div class="flex">

                    </div>
                </div>
                    <div class="mx-2">
                        <div class="border-t border-gray-200 mb-5"></div>
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
                                            <a href="{{ route('admin.election') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
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
                                <div class="flex flex-1 justify-between items-center mr-5">  
                                    <div class="flex flex-1 justify-center items-center mr-5">
                                        <x-icon name="exclamation-triangle" outline class=" h-5 w-auto mr-2"/>   
                                        <p class="text-sm leading-6 text-gray-900 ">
                                            <strong class="font-semibold">Message</strong>
                                            <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                            {{Session::get('error')}}  
                                        </p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm leading-6 text-gray-900 ">
                                            <a href="{{ route('admin.election') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                                                View        
                                                <span aria-hidden="true">&rarr;</span>
                                            </a>
                                            </p>
                                    </div>
                                </div>
                            </div> 
                            @endif
                            <!-- End Message section -->

                            <form method="POST" action="{{ route('admin.add_election') }}">
                            @csrf


                            <!-- Election Title -->
                            <div>
                                <x-input-label for="election_title" :value="__('Election Title')" />
                                <x-text-input id="election_title" class="block mt-1 w-full" type="text" name="election_title"  required autofocus autocomplete="election_title" />
                                <x-input-error :messages="$errors->get('election_title')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                            </div>
                            
                            <!-- Department -->
                            <div class="mt-4">
                                <x-input-label for="department" :value="__('Department')" />
                                <select id="department" name="department" autocomplete="department" required="" :value="old('department')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                                    <option value="">Select Options</option>
                                    <option value="College of Allied Health Sciences">College of Allied Health Sciences</option>
                                    <option value="College of Arts and Letters">College of Arts and Letters</option>
                                    <option value="College of Human Kinetics">College of Human Kinetics</option>
                                    <option value="College of Business and Financial Science">College of Business and Financial Science</option>
                                    <option value="College of Continuing, Advanced and Professional Studies">College of Continuing, Advanced and Professional Studies</option>
                                    <option value="College of Computing and Information Sciences">College of Computing and Information Sciences</option>
                                    <option value="College of Construction Sciences and Engineering">College of Construction Sciences and Engineering</option>
                                    <option value="College of Education">College of Education</option>
                                    <option value="College of Governance and Public Policy">College of Governance and Public Policy</option>
                                    <option value="College of Maritime Leadership Innovation">College of Maritime Leadership Innovation</option>
                                    <option value="College of Sciences">College of Sciences</option>
                                    <option value="College of Technology Management">College of Technology Management</option>
                                    <option value="Center of Tourism and Hospitality Management">Center of Tourism and Hospitality Management</option>
                                    <option value="Higher School ng Umak">Higher School ng Umak</option>
                                </select>
                            </div>

                            <!-- Role -->
                            <div class="mt-4">
                                <x-input-label for="candidate_role" :value="__('Role')" />
                                    <select id="candidate_role" onchange="val()" name="candidate_role" autocomplete="candidate_role" required="" :value="old('candidate_role')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                                        <option value="">Select Options</option>
                                        <option value="student">Student</option>
                                        <option value="professor">Professor</option>
                                    </select>
                            </div>
                            
                            <!-- Election Start Date -->
                            <div class="mt-4 flex  justify-between">
                                <div class="w-full mr-2">
                                    <x-input-label for="election_start_date" :value="__('Start Date')" />
                                    <x-text-input id="election_start_date" class="block mt-1 w-full" type="date" name="election_start_date"  required autofocus autocomplete="election_start_date" />
                                    <x-input-error :messages="$errors->get('election_start_date')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                </div>
                                <div class="w-full ml-2">
                                    <x-input-label for="election_start_time" :value="__('Start Time')" />
                                    <x-text-input id="election_start_time" class="block mt-1 w-full" type="time" name="election_start_time"  required autofocus autocomplete="election_start_time" />
                                    <x-input-error :messages="$errors->get('election_start_time')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                </div>
                            </div>

                            <!-- Election End Date -->
                            <div class="mt-4 flex  justify-between">
                                <div class="w-full mr-2">
                                    <x-input-label for="election_end_date" :value="__('End Date')" />
                                    <x-text-input id="election_end_date" class="block mt-1 w-full" type="date" name="election_end_date"  required autofocus autocomplete="election_end_date" />
                                    <x-input-error :messages="$errors->get('election_end_date')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                </div>
                                <div class="w-full ml-2">
                                    <x-input-label for="election_end_time" :value="__('End Time')" />
                                    <x-text-input id="election_end_time" class="block mt-1 w-full" type="time" name="election_end_time"  required autofocus autocomplete="election_end_time" />
                                    <x-input-error :messages="$errors->get('election_end_time')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-4 mb-4">
                                <x-primary-button>
                                    <x-icon name="plus-small" solid class=" h-5 w-auto mr-2"/> 
                                    {{ __('Create Election') }}
                                </x-primary-button>
                            </div>
                        </form>
                            </div>
                    </div>
                
                
            </div>
        </div>
    </div>

    </div>



</x-admin-layout>