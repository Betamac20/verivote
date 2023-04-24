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
                    <div class="flex justify-between">
                        <div class="dark:bg-emerald-800 bg-emerald-500 text-white p-3 rounded-lg mr-2">
                            Department: {{ Auth::user()->department }}
                        </div>
                        <a href="{{ route('position', [Auth::user()->department, Auth::user()->id_number, Auth::user()->candidate_role]) }}" class="flex items-center justify-center bg-blue-600 hover:bg-blue-400 text-white p-3 rounded-lg ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 font-bold dark:text-gray-100">
                    <span class=" p-2 dark:text-blue-400 text-blue-600 font-bold "> Select Candidate </span>

                    <div aria-hidden="true">
                        <div class="py-4">
                            <div class="border-t border-gray-300" ></div>
                        </div>
                    </div>
                    <!-- content start here -->
                    <div>
                    @role('student')
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3">

                                @if($candidatesview == "true")
                                    @foreach($candidates as $candidate)
                                    @if($candidate->department ==  Auth::user()->department)
                                    <div class=" flex flex-col py-4 px-6 shadow-lg dark:bg-gray-900 bg-gray-200  dark:hover:bg-gray-700 hover:bg-gray-300 dark:hover:text-gray-50 h-[450px] rounded-lg">
                                    <img src="/images/{{ $candidate->id_photo }}" alt="" class="w-full h-48 object-cover border rounded-t-md bg-white">
                                    <h1 class="flex font-bold items-center justify-center bg-blue-500 p-1 rounded-b-md">
                                        Candidate Name: {{ $candidate->name }} 
                                    </h1>
                                    <br>
                                        <h1 class="flex font-semibold items-center justify-start">

                                            Position: {{ $candidate->position }} <br>
                                            Section: {{ $candidate->section }} <br>
                                        
                                        </h1>
                                        <div aria-hidden="true">
                                            <div class="py-5">
                                            <div class="border-t border-gray-300" ></div>
                                            </div>
                                        </div>
                                        <form action="{{ route('vote') }} " method="POST">
                                            @csrf

                                            <input type="hidden" value="{{ Auth::user()->id_number }}" name="id_number">
                                            <input type="hidden" value="{{ Auth::user()->name }}" name="name">
                                            <input type="hidden" value="{{ $candidate->position }}" name="position">
                                            <input type="hidden" value="{{ $candidate->name }}" name="candidate_name">
                                            <input type="hidden" value="{{ $candidate->id_number }}" name="candidate_id_number">
                                            <input type="hidden" value="{{ $candidate->election_id }}" name="election_id">
                                            <input type="hidden" value="{{ $candidate->department }}" name="department">
                                            <input type="hidden" value="{{ $candidate->candidate_role }}" name="candidate_role">

                                            <x-primary-button type="submit" class="flex justify-center py-2 px-4 border border-transparent text-sm rounded-md text-white hover:text-indigo-400 focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13zm10.857 5.691a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 00-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                            </svg>

                                                &nbsp; VOTE
                                            </x-primary-button>
                                            
                                        </form>
                                    </div>
                                    @endif
                                    @endforeach
                                @endif
                                </div> 
                                @if($candidatesview == "false")
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
                                @endrole
                                <!-- end student here -->
                                                          
                    </div>   
                    <!-- content end here -->
                </div>
            </div>
        </div>
    
        


    </div>
    
    
</x-app-layout>
