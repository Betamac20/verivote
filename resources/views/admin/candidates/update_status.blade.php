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
                        {{ __("Candidates Application Form") }} 
                    </div>   
                    <!-- <p class="dark:text-gray-400 mt-1">A list of all the candidates with diffirent department in diffirent elections.</p> 
                    </div> -->

                    <!-- <a href=" {{ route('admin.search_candidates') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <x-icon name="plus-small" solid class=" h-5 w-auto"/> 
                        {{ ("Add Candidate") }}
                    </a> -->
                    <a href=" {{ route('admin.candidates') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <x-icon name="arrow-small-left" solid class=" h-5 w-auto"/> 
                        {{ ("Back") }}
                    </a>
                    
                </div>
                
                <div class="mx-2">
                <div class="border-t border-gray-200" />
                </div>

                <br>
                <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white">
                    <div  class="w-full max-w-lg space-y-8 p-1 ">
                <!-- content start -->
                    <div class="p-2 mb-4 mt-4">
                        @if($app_forms)
                        @foreach($app_forms as $application_forms)
                            <div class="mt-6 text-gray-600">
                                <div class="flex justify-center items-center p-4">
                                    <img src="/images/{{ $application_forms->id_photo }}" alt="" class=" h-72 w-auto rounded-md">
                                </div>

                                <div class="relative overflow-x-auto shadow-xl mx-5 mt-6 mb-4">
                                    <table class="w-full text-sm text-left ">
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
                                            {{ \Carbon\Carbon::parse($application_forms->birthday)->isoFormat('MMMM DD, YYYY')}}
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
                                                Last Semester Grade
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
                                    </table>
                                </div>
                                <br>
                                <div class="mx-2">
                                    {{ __('Essay Question: (Why do you want to join this organization?)')}}
                                    <br><br>
                                    Answer:
                                    
                                    <div class="text-justify text-sm indent-8">
                                    {{ $application_forms->essay_question }}
                                    </div>

                                    <br>
                                    {{ __('Attachments:')}}
                                    <br>
                                    <br>

                                    {{ __('First Semester Grade:')}}
                                    <embed
                                    src="/grades/{{ $application_forms->first_semester_grade }}"
                                    style="width:475px; height:675px;"
                                    frameborder="0">
                                    <br>
                                    <br>
                                    {{ __('Second Semester Grade:')}}
                                    <embed
                                    src="/grades/{{ $application_forms->second_semester_grade }}"
                                    style="width:475px; height:675px;"
                                    frameborder="0">

                                </div>

                            </div>
                        

                        <br><br>

                        <?php
                            $status = "Pending";
                            $post = \App\Models\Application_Form::select('status')->where(['status' => $status])->exists();
                            
                            if ($post) 
                                {
                        ?>
                                    <button class=" group relative items-center flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" 
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'approve-application')">
                                        {{ __('Approve Application') }}
                                    </button>
                                    
                                    <button class="mt-1 group relative items-center flex w-full justify-center rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'deny-application')">
                                        {{ __('Deny Application') }}
                                    </button>
                        <?php
                                }
                                else
                                {

                        ?>
                                    <button disabled class="group relative items-center flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" 
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'approve-application')">
                                        {{ __('Approve Application') }}
                                    </button>
                                    
                                    <button disabled class="mt-1 group relative items-center flex w-full justify-center rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'deny-application')">
                                        {{ __('Deny Application') }}
                                    </button>
                        <?php
                                }
                        ?>
                        @endforeach
                        @endif
                    </div>
                <!-- content end -->
                </div>
            </div>
                
        </div>
    </div>

<!-- approve modal start -->
    <x-modal name="approve-application" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <div class="p-4">
            <br><br>
            <h2 class="text-lg text-center font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to approve the applicaiton?') }}
            </h2>
            <br>
            <div class="mt-6 flex justify-end">
                @foreach ($app_forms as $application_forms)
                <form action="{{ route('admin.approve_status') }}" method="POST">
                @csrf
                    <input type="hidden" name="id_number" value="{{ $application_forms->id_number }}">
                    <button type="submit" class="ml-3 mr-4 inline-flex items-center px-4 py-2 bg-white dark:bg-indigo-800 border border-indigo-300 dark:border-indigo-500 rounded-md font-semibold text-xs text-indigo-700 dark:text-indigo-300 uppercase tracking-widest shadow-sm hover:bg-indigo-50 dark:hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Yes') }}
                    </button>
                </form>
                @endforeach
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
<!-- end modal approve -->

<!-- deny modal start -->
<x-modal name="deny-application" :show="$errors->userDeletion->isNotEmpty()" focusable>

<div class="p-5">
    <br><br>
        <h2 class="text-lg text-center font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to deny the applicaiton?') }}
        </h2>
    <br>
    <div class="mt-6 flex justify-end">
        @foreach ($app_forms as $application_forms)
        <form action="{{ route('admin.denied_status') }}" method="POST">
        @csrf
            <input type="hidden" name="id_number" value="{{ $application_forms->id_number }}">
            <button type="submit" class="ml-3 mr-4 inline-flex items-center px-4 py-2 bg-white dark:bg-indigo-800 border border-indigo-300 dark:border-indigo-500 rounded-md font-semibold text-xs text-indigo-700 dark:text-indigo-300 uppercase tracking-widest shadow-sm hover:bg-indigo-50 dark:hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Yes') }}
            </button>
        </form>
        @endforeach
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>
    </div>
</div>
</x-modal>
<!-- end modal deny -->


</x-admin-layout>