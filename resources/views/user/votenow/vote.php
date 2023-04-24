<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vote Now') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
            

        <!-- For President -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 font-bold dark:text-gray-100">
                    <div class="flex justify-start">
                        <div class="bg-emerald-800 p-3 rounded-lg">
                            Department: {{ Auth::user()->department }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end for President -->

        <!-- main content -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 font-bold dark:text-gray-100">
                    <div class="flex justify-start">
                        <div class="p-2 bg-red-500 rounded-md">
                           Select position
                        </div>
                    </div>
                    <div aria-hidden="true">
                        <div class="py-5">
                        <div class="border-t border-gray-300" ></div>
                        </div>
                    </div>
                    <!-- content start here -->
                    <div>

                            

                             <!-- student here -->
                             @role('student')


                                        @if($student == "true")
                                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3">

                                                @foreach($student_positions as $positions)
                                                    @if($positions->department ==  Auth::user()->department)
                                                        <div class=" flex flex-col py-4 px-6 shadow-lg bg-gray-900 hover:bg-gray-700 hover:text-gray-50 h-[170px] rounded-lg">
                                                            <br>
                                                            <h1 class="flex font-bold items-center justify-start">
                                                                Position: {{ $positions->position }} 
                                                            </h1>
                                                            <div aria-hidden="true">
                                                                <div class="py-5">
                                                                <div class="border-t border-gray-300" ></div>
                                                                </div>
                                                            </div>

                                                            <a href="{{ route('select_candidate', [$positions->position, Auth::user()->candidate_role, $positions->election_id] ) }}" class="flex justify-center py-2 px-4 border border-transparent text-sm rounded-md text-white bg-emerald-600 hover:bg-emerald-700 hover:text-emerald-400 focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3.75H6A2.25 2.25 0 003.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0120.25 6v1.5m0 9V18A2.25 2.25 0 0118 20.25h-1.5m-9 0H6A2.25 2.25 0 013.75 18v-1.5M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                                &nbsp; Select
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                 </div> 
                                                <!-- Start Message -->
                                                @if($positions->department !=  Auth::user()->department)
                                                    <div class="relative w-full items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg">
                                                        <div class="flex flex-1 justify-between items-center mr-5">  
                                                            <div class="flex flex-1 justify-center items-center mr-5  text-gray-900 font-bold">
                                                                <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                                                <p class="text-sm leading-6 ">
                                                                    <strong class="font-semibold">Message</strong>
                                                                    <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                                                    {{"No scheduled election on your department ..."}}  
                                                                </p>
                                                            </div>
                                                            
                                                            <div>
                                                                <p class="text-sm leading-6 text-gray-900 ">
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                @endif
                                                <!-- End Message -->
                                        @endif
                                @if($student == "false")
                                    <!-- Start Message -->

                                        <div class="relative w-full items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg">
                                            <div class="flex flex-1 justify-between items-center mr-5">  
                                                <div class="flex flex-1 justify-center items-center mr-5  text-gray-900 font-bold">
                                                    <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                                    <p class="text-sm leading-6 ">
                                                        <strong class="font-semibold">Message</strong>
                                                        <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                                        {{"No scheduled election on your department ..."}}  
                                                    </p>
                                                </div>
                                                
                                                <div>
                                                    <p class="text-sm leading-6 text-gray-900 ">
                                                        </p>
                                                </div>
                                            </div>
                                        </div> 

                                        <!-- End Message -->
                            @endif
                            @endrole
                            <!-- end professor here -->

                        </div>
                        <!-- content end here -->
                </div>
            </div>
        </div>
        <!-- end main content -->
               
    </div>
    
    
</x-app-layout>
