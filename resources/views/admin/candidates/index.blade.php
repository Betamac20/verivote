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
                  {{ __("Candidate Dashboard ") }} 
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-xl rounded-xl mt-5">
                <div class="p-3 font-bold text-gray-600 flex justify-between items-center">
                    <!-- <div> -->
                    <div class="flex items-center justify-center">
                        <x-icon name="user-group" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Election Candidates") }} 
                    </div>   
                    <!-- <p class="dark:text-gray-400 mt-1">A list of all the candidates with diffirent department in diffirent elections.</p> 
                    </div> -->
                    <div class="flex items-center">
                        <a href=" {{ route('admin.approve_application') }} " class="mx-2 group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <x-icon name="eye" solid class=" h-5 w-auto mx-1"/> 
                            {{ ("View Approved Application") }}
                        </a>
                        <a href=" {{ route('admin.denied_application') }} " class="mx-2 group flex justify-center rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            <x-icon name="eye" solid class=" h-5 w-auto mx-1"/> 
                            {{ ("View Denied Application") }}
                        </a>
                    </div>
                    
                </div>
                
                <div class="mx-2">
                <div class="border-t border-gray-200" />
                </div>

                
                <div class="p-2 mb-4 mt-4">
                    
                
                <div class="mb-5 p-2">
                    {{ $app_forms->links() }}
                </div>

                <!-- table start -->
                <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 ">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                        Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                        ID Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Position Applying
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Department
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <!-- loop start here -->
                        @forelse($app_forms as $app_form)
                            <tr class="bg-white text-xs border-b border-gray-300 hover:bg-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        <div class="flex justify-between items-center">
                                        {{ \Carbon\Carbon::parse($app_form->created_at)->isoFormat('MMM. DD, YYYY')}}
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $app_form->id_number }} 
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $app_form->name }} 
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $app_form->position }} 
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $app_form->department }} 
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                    <?php 
                                        if ($app_form->status === "Pending") 
                                        {
                                    ?>
                                        <span class="bg-gray-500 text-white p-2 rounded-full">
                                            {{ $app_form->status }}
                                        </span>
                                    <?php
                                        }
                                        else if ($app_form->status === "Approved")
                                        {
                                    ?>
                                        <span class="bg-emerald-400 text-white p-2 rounded-full">
                                            {{ $app_form->status }}
                                        </span>
                                    <?php
                                        }
                                        else if ($app_form->status === "Denied")
                                        {
                                    ?>
                                        <span class="bg-red-500 text-white p-2 rounded-full">
                                            {{ $app_form->status }}
                                        </span>

                                    <?php
                                        }
                                    ?>

                                    </td>
                                    <td class="px-6 py-4">
                                    <a href="{{ route('admin.review_candidate', $app_form->id_number) }}" class="text-indigo-600 font-bold hover:text-gray-400">
                                        {{ __("View ") }} 
                                    </a>
                                    </td>
                            </tr>
                        @empty
                        <tr>
                           <td scope="row" class="px-6 py-4 text-md text-gray-900 whitespace-nowrap "> No pending application . . . </td>
                        </tr>
                        @endforelse
                        <!-- loop end here -->
                        </tbody>
                    </table>
                </div>
                <!-- table end -->  

                </div>
                
            </div>

        </div>
    </div>



</x-admin-layout>