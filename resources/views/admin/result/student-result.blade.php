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
                    {{ __("Result Dashboard ") }} 
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="receipt-percent" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Result for Student Elections ") }} 
                    </div>     
                    <!-- <div class="flex">
                        <a href=" # " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <x-icon name="eye" solid mini class=" h-5 w-auto mr-1"/> 
                            {{ ("View Result") }}
                        </a>
                    </div> -->
                </div>

                <div class="mx-2">
                    <div class="border-t border-gray-200 mb-5"></div>
                </div>
                
                <div class="mt-1">
                    <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white">
                        <div  class="w-full max-w-xl space-y-8 p-1 ">
                            <div class="mt-5 p-5 font-semibold">
                                List of Candidates:
                            </div>
                            <!-- table start -->
                            <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-4">
                                        <table class="w-full text-sm text-left text-gray-600 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Candidate Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Position
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Total Votes
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($student_result)
                                            @forelse ($student_result as $result)
                                                <tr class="bg-white border-b border-gray-300 hover:bg-gray-200">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                        {{ $result->candidate_name }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $result->position }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $result->Total_Votes }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td scope="row" class="px-6 py-4 text-md dark:text-gray-900 whitespace-nowrap text-white"> No record of elections . . . </td>
                                                </tr>
                                            @endforelse
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table end -->  

                                    <div class="mt-5">
                                        <form action="{{ route('admin.student_winner') }}" method="POST">
                                        @csrf
                                        <br>
                                            <div class="mt-5 mb-5 p-5 font-semibold">
                                                Winners:
                                            </div>
                                   
                                    <!-- table start -->
                                    <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-4">
                                        <table class="w-full text-sm text-left text-gray-600 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-emerald-400 ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Candidate Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Position
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Total Votes
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($winners)
                                            @forelse ($winners as $result)
                                                <tr class="bg-white border-b border-gray-300 hover:bg-gray-200">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                        {{ $result->candidate_name }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $result->position }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $result->Total_Votes }}
                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $result->election_id }}" name="election_id">
                                            @empty
                                                <tr>
                                                    <td scope="row" class="px-6 py-4 text-md dark:text-gray-900 whitespace-nowrap text-white"> No record of elections . . . </td>
                                                </tr>
                                            @endforelse
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table end -->                                      
                                        <div class="p-5">
                                            <x-primary-button>
                                                {{ __("Declare Winner") }}
                                            </x-primary-button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>

</x-admin-layout>