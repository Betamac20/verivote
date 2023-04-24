<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Application Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-5 sm:p-10 bg-white dark:text-white  dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <?php
                    $post = \App\Models\Application_Form::where(['id_number' => Auth::user()->id_number])->exists();
                    if ($post) 
                        {
                            ?>
                                @include('form.partials.status-header')
                            <?php
                        }
                    else
                        {
                            ?>
                                @include('form.partials.form-header')
                            <?php
                        }
                    ?>

                </div>

                    <?php
                    $post = \App\Models\Application_Form::where(['id_number' => Auth::user()->id_number])->exists();
                    if ($post) 
                        {
                            ?>
                                
                                <!-- Message section -->
                                @if(Session::has('success')) 
                                <div class="relative w-full flex items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg  mt-4 mb-2">
                                    <div class="flex flex-1 justify-between items-center mr-5">  
                                        <div class="flex flex-1 justify-center items-center mr-5">
                                            <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                            <p class="text-sm leading-6 text-gray-900 ">
                                                <strong class="font-semibold">Message</strong>
                                                <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                                {{Session::get('success')}}  
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                                @endif
                                <!-- End Message section -->
                                <br>
                                @include('form.partials.application-status')

  

                            <?php
                        }
                    else
                        {
                            ?>
                            <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 dark:text-white  dark:bg-gray-800 bg-white">
                                <div  class="w-full max-w-lg space-y-8 p-1 ">
                                    @include('form.partials.form-inputs')
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    
            </div>

        </div>
    </div>
</x-app-layout>
