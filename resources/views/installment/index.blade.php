<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pay Installment
        </h2>
    </x-slot>

    <x-slot name="styles">
        <style>
            svg.rotate90 {
                transform-box: fill-box;
                transform-origin: center;
                transform: rotate(90deg);
            }

        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('pay-loan')
                <form action="{{ route('installment.pay', $loan->id) }}" method="POST">
                    @csrf
                    <div class="w-full  px-5 py-10 text-gray-800">
                        <div class="w-full">
                            <div class="-mx-3 md:flex items-start">
                                <div class="px-3 md:w-5/12">
                                    <div
                                        class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                        <div class="w-full flex mb-3 items-center">
                                            <div class="w-32">
                                                <span class="text-gray-600 font-semibold">Installment</span>
                                            </div>
                                            <div class="flex-grow pl-3">
                                                <span>Rs. {{ $loan->installment +0 }}</span>
                                            </div>
                                        </div>
                                        <div class="w-full flex mb-3 items-center">
                                            <div class="w-32">
                                                <span class="text-gray-600 font-semibold">Contact</span>
                                            </div>
                                            <div class="flex-grow pl-3">
                                                <span>{{ auth()->user()->name }}</span>
                                            </div>
                                        </div>
                                        <div class="w-full flex items-center">
                                            <div class="w-32">
                                                <span class="text-gray-600 font-semibold">Billing Address</span>
                                            </div>
                                            <div class="flex-grow pl-3">
                                                <span>{{ auth()->user()->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                                        <div class="w-full p-3 border-b border-gray-200">
                                            <div class="mb-5">
                                                <label for="type1" class="flex items-center cursor-pointer">
                                                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500"
                                                        name="type" id="type1" checked>
                                                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                                        class="h-6 ml-3">
                                                </label>
                                            </div>
                                            <div>
                                                <div class="mb-3">
                                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name on
                                                        card</label>
                                                    <div>
                                                        <input name="cardholder_name"
                                                            class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                            placeholder="John Smith" type="text" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Card
                                                        number</label>
                                                    <div>
                                                        <input pattern="\d*" maxlength="16" name="card_number"
                                                            class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                            placeholder="0000 0000 0000 0000" type="text" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 -mx-2 flex items-end">
                                                    <div class="px-2 w-1/3">
                                                        <label
                                                            class="text-gray-600 font-semibold text-sm mb-2 ml-1">Expiration
                                                            date</label>
                                                        <div>
                                                            <select name="exp_month"
                                                                class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                                <option value="01">01 - January</option>
                                                                <option value="02">02 - February</option>
                                                                <option value="03">03 - March</option>
                                                                <option value="04">04 - April</option>
                                                                <option value="05">05 - May</option>
                                                                <option value="06">06 - June</option>
                                                                <option value="07">07 - July</option>
                                                                <option value="08">08 - August</option>
                                                                <option value="09">09 - September</option>
                                                                <option value="10">10 - October</option>
                                                                <option value="11">11 - November</option>
                                                                <option value="12">12 - December</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="px-2 w-1/3">
                                                        <select name="exp_year"
                                                            class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                        </select>
                                                    </div>
                                                    <div class="px-2 w-1/3">
                                                        <label
                                                            class="text-gray-600 font-semibold text-sm mb-2 ml-1">Security
                                                            code</label>
                                                        <div>
                                                            <input pattern="\d*" maxlength="3" name="cvv"
                                                                class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                                placeholder="000" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i
                                                class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        </div>
    </div>

</x-app-layout>
