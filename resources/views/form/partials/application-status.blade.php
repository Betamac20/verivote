<section>

     <!-- table start -->
     <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-4">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Image
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
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        @if($application_form)
                        @forelse ($application_form as $application_forms)
                            <tr class="bg-white border-b dark:border-gray-300 hover:bg-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <img src="/images/{{ $application_forms->id_photo }}" alt="" class=" h-10 w-auto rounded-md">

                                    <!-- <embed
                                    src="/grades/{{ $application_forms->second_semester_grade}}"
                                    style="width:600px; height:800px;"
                                    frameborder="0"> -->
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $application_forms->id_number }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $application_forms->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $application_forms->position }}
                                </td>
                                <td class="px-6 py-4">
                                    <?php 
                                        if ($application_forms->status === "Pending") 
                                        {
                                    ?>
                                        <span class="bg-gray-500 text-white p-2 rounded-full">
                                            {{ $application_forms->status }}
                                        </span>
                                    <?php
                                        }
                                        else if ($application_forms->status === "Approved")
                                        {
                                    ?>
                                        <span class="bg-emerald-400 text-white p-2 rounded-full">
                                            {{ $application_forms->status }}
                                        </span>
                                    <?php
                                        }
                                        else if ($application_forms->status === "Denied")
                                        {
                                    ?>
                                        <span class="bg-red-500 text-white p-2 rounded-full">
                                            {{ $application_forms->status }}
                                        </span>

                                    <?php
                                        }
                                    ?>

                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-indigo-600 font-bold hover:text-gray-400" 
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                        {{ __("View ") }} 
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row" class="px-6 py-4 text-md dark:text-gray-900 whitespace-nowrap text-white"> No record . . . </td>
                            </tr>
                        @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- table end -->   
                <!-- modal start -->
                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                @if($application_form)
                        @foreach ($application_form as $application_forms)
                            <div class="p-6">

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Application Form') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    <!-- {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }} -->
                                </p>

                                <div class="mt-6">
                                    <div class="flex justify-center items-center p-4">
                                        <img src="/images/{{ $application_forms->id_photo }}" alt="" class=" h-72 w-auto rounded-md">
                                    </div>

                                    <div class="relative overflow-x-auto shadow-xl mx-5 mt-6 mb-4">
                                        <table class="w-full text-sm text-left text-gray-400">
                                            <tr class="bg-transparent border  dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Name
                                                </td>
                                                <td class="px-6 py-1 ">
                                                    {{ $application_forms->name }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    ID Number
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->id_number }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Birthday
                                                </td>
                                                <td class="px-6 py-1">
                                                {{ \Carbon\Carbon::parse($application_forms->birthday)->isoFormat('MMM. DD, YYYY')}}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Place of Birth
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->placeofBirth }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Gender
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->gender }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Year Level
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->year_level }} Year
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Section
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->section }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Department
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->department }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Email
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->email }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Last Semestral Grade
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->last_grade }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Position Applying
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->position }}
                                                </td>
                                            </tr>
                                            <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Status
                                                </td>
                                                <td class="px-6 py-1">
                                                    {{ $application_forms->status }}
                                                </td>
                                            </tr>
                                            <!-- <tr class="bg-transparent border dark:border-gray-300 hover:bg-transparent">
                                                <td class="px-6 py-1 border-r">
                                                    Essay Answer
                                                </td>
                                                <td class="px-6 py-1 text-justify indent-8">
                                                    {{ $application_forms->essay_question }}
                                                </td>
                                            </tr> -->
                                        </table>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-danger-button x-on:click="$dispatch('close')">
                                        {{ __('Close') }}
                                    </x-danger-button>
                                </div>

                            </div>
                        @endforeach
                @endif
                </x-modal>



</section>