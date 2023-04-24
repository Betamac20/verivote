<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vote Now') }}
        </h2>
    </x-slot>

    <div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 font-bold dark:text-gray-100">
                    <div class="flex justify-between">
                        <div class="dark:bg-emerald-800 bg-emerald-500 text-white p-3 rounded-lg mr-2">
                            Department: {{ Auth::user()->department }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100">

                <div class="flex items-center justify-between">
                <span class=" p-3 dark:text-blue-400 text-blue-600 font-bold flex justify-start "> Review your votes </span>
                
                <!-- Start Message -->
                @if(Session::has('success'))
                <span class=" p-3 rounded-lg text-gray-900 text-sm font-bold flex justify-end bg-emerald-400" id="alert_message"> 
                        <div class="flex w-full items-center">
                        <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto ml-5"/>   
                        <strong class="ml-2"> Message: </strong>
                        <strong class="mr-2 ml-2"> {{Session::get('success')}}  </strong>
                        <x-icon name="check-circle" solid mini class=" h-5 w-auto mr-5"/>   
                    </div>
                </span>
                @endif
                <!-- End Message -->
                </div>



                    <div aria-hidden="true">
                        <div class="py-4">
                            <div class="border-t border-gray-300" ></div>
                        </div>
                    </div>

                <!-- content start here -->
                @role('student')
                    @if($dept_view == "true")
                        <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
                            <div  class="w-full max-w-lg space-y-8 p-1 ">
                                <div class="relative overflow-x-auto shadow-lg rounded-lg mb-5">
                                @if ($id_num === Auth::user()->id_number)
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-amber-400 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Position
                                                </th>
                                                <th scope="col" class="px-6 py-3 flex items-center justify-start">

                                                        <x-icon name="viewfinder-circle" outline class=" h-5 w-auto mr-2"/>  Selected Candidate

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vote_histories as $vote_history)
                                            <tr class="bg-white dark:bg-gray-900  hover:bg-gray-200 dark:hover:bg-gray-600">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $vote_history->position }}
                                                </th>
                                                <td class="px-6 py-4 ">
                                                    {{ $vote_history->candidate_name }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    
                                        <form action="{{ route('store_vote') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id_number" value="{{ Auth::user()->id_number }}">
                                            <input type="hidden" name="candidate_role" value="{{ Auth::user()->candidate_role }}">
                                            <button type="submit" class="group relative items-center flex w-full justify-center rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                Cast Votes
                                            </button>
                                        </form>
                                    @else
                                        <div class="relative w-full items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg">
                                            <div class="flex flex-1 justify-between items-center mr-5">  
                                                <div class="flex flex-1 justify-center items-center mr-5  text-gray-900 font-bold">
                                                    <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                                    <p class="text-sm leading-6 ">
                                                        <strong class="font-semibold">Message</strong>
                                                        <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                                        {{"Invalid Transaction "}}  
                                                        <a href="{{ route('votenow', [Auth::user()->department, Auth::user()->candidate_role]) }}" class="text-gray-50 hover:bg-gray-700 ml-5 bg-gray-900 p-2 rounded-full">  
                                                             <span aria-hidden="true">&larr;</span> Back
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div> 
                                    @endif

                            </div>
                        </div>
                    @endif
                    @if($dept_view == "false")
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
                            </div>
                        </div> 
                    @endif                    
                @endrole

                <!-- content end here -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    function hidediv() {
        document.getElementById("alert_message").style.visibility="hidden";
    }

    setTimeout("hidediv()", 5000);

// function myFunction() {
//   let text;
//   if (confirm("Are you sure to cast your votes?") == true) {
//     location.href = "/cast_vote";
//   }
//   document.getElementById("demo").innerHTML = text;
// }

</script>
