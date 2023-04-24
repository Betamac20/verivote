<section>
                <div class="mb-5 p-2">
                    {{ $app_forms->links() }}
                </div>

                <!-- table start -->
                <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 ">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Department
                                </th>
                                <th scope="col" class="px-6 py-3 flex justify-center items-center border-l">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- loop start here -->
                        @forelse($app_forms as $app_form)
                            <tr class="bg-white border-b border-gray-300 hover:bg-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        <div class="flex justify-between items-center">
                                            {{ $position->department }} 
                                        </div>
                                    </th>
                                <td class="px-6 py-4 flex justify-center items-center border-l">
                                    <a href="#" class="text-indigo-600 font-bold hover:text-indigo-400  mr-6 ">
                                        {{ __("Edit ") }} 
                                    </a>
                                    <a href="#" class="text-indigo-600 font-bold hover:text-indigo-400 ">
                                        {{ __("Remove ") }} 
                                    </a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                           <td scope="row" class="px-6 py-4 text-md dark:text-gray-900 whitespace-nowrap text-white"> No record of positions . . . </td>
                        </tr>
                        @endforelse
                        <!-- loop end here -->
                        </tbody>
                    </table>
                </div>
                <!-- table end -->  


</section>