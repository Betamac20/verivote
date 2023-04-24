<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ballot') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100 ">
                    <!--  -->
                    <?php
                    $voted = \App\Models\VoteTransaction::where(['id_number' => Auth::user()->id_number])->where(['candidate_role' => Auth::user()->candidate_role])->exists();

                    if($voted) {
                    ?>
                    <div class="flex min-h-full items-center justify-center px-4 sm:px-6 lg:px-8 ">
                        <div class="w-full max-w-lg p-6 dark:bg-white dark:text-gray-900 bg-white shadow-2xl rounded-lg mt-8 mb-8">
                                <div class="font-semibold flex items-center justify-center text-gray-500 text-xl mt-5 ">
                                  <img src="/img/verivote.png" class="h-8 w-auto mr-2" alt="">  Official Electronic Ballot
                                </div>
                                <div class="flex justify-center font-semibold text-gray-500 text-md">
                                    University of Makati
                                </div>
                                <div class="flex justify-center font-semibold text-gray-500 text-xs">
                                    JP Rizal Extn. West Rembo, Makati City
                                </div>
                                <div class="mt-4 mb-4">
                                    <div class="border-t border-gray-300 "></div>
                                </div>
                                <div class="flex justify-start font-semibold text-gray-500 text-lg">
                                Voter Details: <br>
                                </div>
                                <span class="flex justify-start font-semibold text-gray-500 text-sm mt-2">
                                    Name: {{ Auth::user()->name }} <br>
                                    ID Number: {{ Auth::user()->id_number }} <br>
                                    Email: {{ Auth::user()->email }} <br>
                                </span>
                                <div class="mt-4 mb-4">
                                    <div class="border-t border-gray-300 "></div>
                                </div>
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                                        <table class="w-full text-sm text-left text-gray-500 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Position
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Candidate Name
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vote_history as $vote_his)
                                                <tr class="bg-white border-b">
                                                    <th scope="row" class="px-6 py-4 font-bold text-gray-800 whitespace-nowrap">
                                                        {{ $vote_his->position }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $vote_his->candidate_name }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>   
                                <div class="mt-4">
                                    <div class="border-t border-gray-300 "></div>
                                </div> 
                                <div class="flex justify-center font-semibold text-gray-500 text-lg p-5">
                                    @foreach($vote_transaction as $vote_transactions)
                                        <!-- {{ QrCode::size(500)->generate($vote_transactions->token) }} -->
                                        {{ QrCode::merge('/public/img/verivote.png')->eye('circle')->style('round')->size(500)->generate($vote_transactions->token) }}   
                                    @endforeach 
                                <!-- <img src="\img\qrcode.png" alt=""> -->
                                </div>  
                                <div class="mt-4 mb-4">
                                    <div class="border-t border-gray-300 "></div>
                                </div> 
                                <div class="flex justify-center font-semibold text-gray-500 text-xs">
                                © VeriVote 2023
                                </div> 
                        </div>
                    </div>
                    <?php
                    }
                    else
                    {
                    ?>
                            <div class="text-center mt-10 mb-10">
                                <span class=" text-red-700 dark:text-red-500 font-semibold text-3xl">
                                    No voting transaction.
                                </span>
                                    <br>
                                <span class="text-blue-400 text-lg">
                                    vote now just <a href="{{ route('votenow', [Auth::user()->department, Auth::user()->candidate_role]) }}" class="text-emerald-500"> click here </a>
                                </span>
                                    <br>
                                <center>
                                    <!-- <x-icon name="check-circle" solid class=" h-20 w-auto text-emerald-400"/>  -->
                                </center>
                            </div>
                    <?php
                    }
                    ?>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
