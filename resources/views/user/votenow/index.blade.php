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
                        <div class="dark:bg-emerald-800 bg-emerald-500 text-white p-3 rounded-lg">
                        @if($has_election == "true")
                            @foreach($departments as $department)
                                 Title: {{ $department->election_title }}
                            @endforeach
                        @endif
                        @if($has_election == "false")
                                 No Election
                        @endif
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
                    <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
                        <div class="w-full max-w-lg space-y-8 p-1 text-justify">
                            
                            @role('student')
                                    @if($has_election == "true")
                                        <?php
                                            $voted = \App\Models\VoteTransaction::where(['id_number' => Auth::user()->id_number])->where(['candidate_role' => Auth::user()->candidate_role])->exists();
                                            // $collection = collect($post)->collect();
                                            // $collection->get('position');
                                            if ($voted) {
                                        ?>
                                            <div class="text-center">
                                                <span class=" text-blue-500 text-5xl">
                                                    Thank you for voting.
                                                </span>
                                                    <br>
                                                <span class="text-blue-400 text-lg">
                                                    to view your e-ballot just <a href="{{ route('ballot', [Auth::user()->id_number]) }}" class="text-red-500"> click here </a>
                                                </span>
                                                    <br>
                                                <center>
                                                    <x-icon name="check-circle" solid class=" h-20 w-auto text-emerald-400"/> 
                                                </center>
                                            </div>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                                
                                                Hi <span class="text-blue-500">{{ Auth::user()->name }}</span>, <br>
                                                <!-- content start here -->
                                                <?php
                                                    $post = \App\Models\VoteHistory::where(['id_number' => Auth::user()->id_number])->exists();
                                                    // $collection = collect($post)->collect();
                                                    // $collection->get('position');
                                                    if ($post) {
                                                ?>
                                                    <div class="indent-8 ">
                                                        The voting line is now open for <strong class="text-blue-500"> {{ Auth::user()->department }}</strong>. To continue voting just click the button bellow. Please vote responsibly. <br><br>
                                                        Thank you!
                                                    </div>
                                                    <div class="flex justify-center mt-5">
                                                        <a href="{{ route('position', [Auth::user()->department, Auth::user()->id_number, Auth::user()->candidate_role]) }}" class="dark:bg-indigo-800 bg-indigo-600 dark:hover:bg-indigo-500 hover:bg-indigo-400 dark:hover:text-gray-400 hover:text-gray-200 text-white p-3 rounded-lg flex justify-center  w-full ">
                                                            Continue Voting
                                                        </a>
                                                    </div>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                    <div class="indent-8 ">
                                                        The voting line is now open for <strong class="text-blue-500"> {{ Auth::user()->department }}</strong>. To start your vote just click the button bellow. Please vote responsibly. <br><br>
                                                        Thank you!
                                                    </div>
                                                    <div class="flex justify-center mt-5">
                                                        <a href="{{ route('position', [Auth::user()->department, Auth::user()->id_number, Auth::user()->candidate_role]) }}" class="dark:bg-indigo-800 bg-indigo-600 dark:hover:bg-indigo-500 hover:bg-indigo-400 dark:hover:text-gray-400 hover:text-gray-200 text-white p-3 rounded-lg flex justify-center w-full">
                                                            Start Voting
                                                        </a>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                                <!-- content end here -->
                                            <?php 
                                                }
                                            ?>
                                        
                                    @endif
                                    @if($has_election == "false")
                                        <div class="flex justify-center items-center p-2 text-black font-semibold bg-emerald-400 rounded-md sm:text-sm">
                                        <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                        {{"No election for ".Auth::user()->department}}
                                        </div>
                                    @endif
                            @endrole
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main content -->
               
    </div>
    
    
</x-app-layout>
