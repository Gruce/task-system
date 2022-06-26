@section('header-actions')
@endsection
@section('title', __('ui.home'))

<div>
    <div class="flex flex-col ">

        <div class="flex flex-row bg-white pl-20 pr-20 pt-3 rounded-lg">
            <div class="basis-3/4">
                <div class="bg-white w-3/4 border rounded-lg p-5">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h6 class="text-xs font-semibold text-gray-400">
                                Tasks To Do
                            </h6>
                            <h1 class="font-semibold text-indigo-700 text-2xl">
                                42
                            </h1>
                            <h5 class="text-gray-400 text-sm">
                                Current Month
                            </h5>
                        </div>
                        <img class="w-40 h-20" src="https://pbs.twimg.com/media/FWHXePoUAAA0sZZ?format=jpg&name=240x240"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="basis-3/4">
                <div class="bg-white w-3/4 border rounded-lg p-5">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h6 class="text-xs font-semibold text-gray-400">
                                Tasks in Progress
                            </h6>
                            <h1 class="font-semibold text-orange-400 text-2xl">
                                30
                            </h1>
                            <h5 class="text-gray-400 text-sm">
                                Current Month
                            </h5>
                        </div>
                        <img class="w-40 h-20" src="https://pbs.twimg.com/media/FWHXWpMVEAA1hKP?format=jpg&name=240x240"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="basis-3/4">
                <div class="bg-white w-3/4 border rounded-lg p-5">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <h6 class="text-xs font-semibold text-gray-400">
                                Tasks Completed
                            </h6>
                            <h1 class="font-semibold text-green-400 text-2xl">
                                42
                            </h1>
                            <h5 class="text-gray-400 text-sm">
                                Current Month
                            </h5>
                        </div>
                        <img class="w-40 h-20" src="https://pbs.twimg.com/media/FWHXgVWUUAA1pZq?format=jpg&name=240x240"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row bg-white pt-10 pl-20 pr-20 justify-between">
            <div class="flex flex-col ">
                <div class="flex flex-col mb-2 ">
                    <div @class([
                        'bg-white w-80 border rounded-lg pl-5' => en(),
                        'bg-white w-80 border rounded-lg pr-5' => ar(),
                    ])>
                        <div class="flex flex-col">
                            <div>
                                <h1 class="mt-2 font-semibold text-xs text-secondary-500  ">
                                    Employees Of The Week
                                </h1>
                            </div>
                            <div class="flex flex-row ">
                                <div @class([
                                    'flex my-4 -space-x-4 rtl:space-x-reverse mr-10' => en(),
                                    'flex my-4 -space-x-4 rtl:space-x-reverse ml-10' => ar(),
                                ]) class="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <a href="#"
                                        class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800">
                                        +99
                                    </a>
                                </div>
                                <div class="  text-sm text-center text-gray-500">
                                    <div @class(['px-4 py-1', 'border-l' => en(), 'border-r' => ar()]) class="">
                                        <div class="flex flex-col items-center ">
                                            <h4 class="mb-2 font-semibold text-sm text-gray-500">
                                                Tasks Completed
                                            </h4>
                                            <div class="flex flex-row justify-between items-center">
                                                <h5 class=" font-semibold text-sm text-secondary-500">
                                                    46%
                                                </h5>

                                                <h5 @class([
                                                    'ml-4 text-xs font-semibold  text-secondary-500' => en(),
                                                    'mr-4 text-xs font-semibold  text-secondary-500' => ar(),
                                                ])>
                                                    in 5 dayes
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-2 ">
                    <div @class(['bg-white w-80 border rounded-lg pl-5' => en(), 'bg-white w-80 border rounded-lg pr-5' => ar()])>
                        <div class="flex flex-col">
                            <div>
                                <h1 class="mt-2 font-semibold text-xs text-secondary-500  ">
                                    Employees Of The Month
                                </h1>
                            </div>
                            <div class="flex flex-row ">
                                <div @class(['flex my-4 -space-x-4 rtl:space-x-reverse mr-10' => en(), 'flex my-4 -space-x-4 rtl:space-x-reverse ml-10' => ar()]) class="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <a href="#"
                                        class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800">
                                        +99
                                    </a>
                                </div>
                                <div class="  text-sm text-center text-gray-500">
                                    <div @class(['px-4 py-1', 'border-l' => en(), 'border-r' => ar()]) class="">
                                        <div class="flex flex-col items-center ">
                                            <h4 class="mb-2 font-semibold text-sm text-gray-500">
                                                Tasks Completed
                                            </h4>
                                            <div class="flex flex-row justify-between items-center">
                                                <h5 class=" font-semibold text-sm text-secondary-500">
                                                    46%
                                                </h5>

                                                <h5 @class(['ml-4 text-xs font-semibold  text-secondary-500' => en(), 'mr-4 text-xs font-semibold  text-secondary-500' => ar()]) >
                                                    in 23 dayes
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-2 ">
                    <div @class(['bg-white w-80 border rounded-lg pl-5' => en(), 'bg-white w-80 border rounded-lg pr-5' => ar()])>
                        <div class="flex flex-col">
                            <div>
                                <h1 class="mt-2 font-semibold text-xs text-secondary-500  ">
                                    Employees Of The Year
                                </h1>
                            </div>
                            <div class="flex flex-row ">
                                <div @class(['flex my-4 -space-x-4 rtl:space-x-reverse mr-10' => en(), 'flex my-4 -space-x-4 rtl:space-x-reverse ml-10' => ar()]) class="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                        alt="">
                                    <a href="#"
                                        class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800">
                                        +99
                                    </a>
                                </div>
                                <div class="  text-sm text-center text-gray-500">
                                    <div @class(['px-4 py-1', 'border-l' => en(), 'border-r' => ar()]) class="">
                                        <div class="flex flex-col items-center ">
                                            <h4 class="mb-2 font-semibold text-sm text-gray-500">
                                                Tasks Completed
                                            </h4>
                                            <div class="flex flex-row justify-between items-center">
                                                <h5 class=" font-semibold text-sm text-secondary-500">
                                                    46%
                                                </h5>

                                                <h5 @class(['ml-4 text-xs font-semibold  text-secondary-500' => en(), 'mr-4 text-xs font-semibold  text-secondary-500' => ar()]) >
                                                    in 8 months
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col text-center mt-5 mb-5">
                    <div
                        class=" max-w-sm bg-white rounded-lg border border-gray-200  sm:p-2 lg:p-2 ">
                        <h4 class=" font-semibold text-xl text-center text-secondary-500">
                            Best Employee Of The Year
                        </h4>
                        <div class="flex justify-between mt-5">
                            <span class="text-xs font-medium text-secondary-500">100%</span>
                            <span class="text-xs font-medium text-secondary-500">34 / 34</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-secondary-600 h-2.5 rounded-full" style="width: 100%"></div>
                        </div>

                        <p class="mt-5 mb-5 text-gray-500 text-xs text-center">
                            The emploeyee who has the most tasks completed <br> in this year is <span class="font-semibold">
                                <span class=" mb-3 font-semibold text-sm text-secondary-500">
                                    Hassan Hazim
                                </span>
                        </p>
                        <a href="{{route('employees.profile',['id' => auth()->id() ])}}" class=" text-sm p-1 rounded-lg text-white bg-slate-400 hover:bg-slate-700">
                            Show Profile
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
