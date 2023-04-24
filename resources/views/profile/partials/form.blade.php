<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Application Form for Executive Officer') }}
        </h2>
    </header>

    <!-- Message section -->
    @if(Session::has('success')) 
    <div class="relative w-full flex items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg  mt-4 mb-4">
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
    @role('student')
        <?php 
        $post = \App\Models\Application_Form::where(['id_number' => Auth::user()->id_number])->exists();

        if ($post) 
        {
        ?>
            <a href=" {{ route('application_form', [Auth::user()->id_number, Auth::user()->department]) }} ">
                <x-success-button>{{ __('View') }}</x-success-button>
            </a>
        <?php
        }
        else
        {
        ?>
            <a href=" {{ route('application_form', [Auth::user()->id_number, Auth::user()->department] ) }} ">
                <x-success-button>{{ __('Apply') }}</x-success-button>
            </a>
        <?php
        }
        ?>
    @endrole
    @role('professor')
        <?php 
        $post = \App\Models\Application_Form::where(['id_number' => Auth::user()->id_number])->exists();

        if ($post) 
        {
        ?>
            <a href=" {{ route('application_form', [Auth::user()->id_number, Auth::user()->department] ) }} ">
                <x-success-button>{{ __('View') }}</x-success-button>
            </a>
        <?php
        }
        else
        {
        ?>
            <a href=" {{ route('application_form', [Auth::user()->id_number, Auth::user()->department] ) }} ">
                <x-success-button>{{ __('Apply') }}</x-success-button>
            </a>
        <?php
        }
        ?>
    @endrole
</section>
