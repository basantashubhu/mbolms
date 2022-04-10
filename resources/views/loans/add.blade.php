<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Loan
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('loans.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Loan Type
                    </label>
                    <select name="loan_type"
                        class="w-full px-3 py-2 mb-3 {{ $errors->has('loan_type') ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        <option value="">Select Loan Type</option>
                        @foreach($loanTypes as $code => $type)
                        <option value="{{ $code }}" @if(old('loan_type') == $code) selected @endif>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('loan_type')
                        <p class="text-xs italic text-red-500">{{ $errors->first('loan_type') }}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col md:flex-row gap-5 md:gap-10">
                    <div class="w-full md:w-1/2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Duration (Yrs)
                        </label>
                        <input type="text" name="duration" placeholder="Loan duration in years" value="{{ old('duration') }}"
                            class="w-full px-3 py-2 mb-3 {{ $errors->has('duration') ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        @error('duration')
                            <p class="text-xs italic text-red-500">{{ $errors->first('duration') }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Interest Rate (%)
                        </label>
                        <input type="text" name="interest_rate" placeholder="Interest Rate (%)" value="{{ old('interest_rate') }}"
                            class="w-full px-3 py-2 mb-3 {{ $errors->has('interest_rate') ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        @error('interest_rate')
                            <p class="text-xs italic text-red-500">{{ $errors->first('interest_rate') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 flex flex-col md:flex-row gap-5 md:gap-10">
                    <div class="w-full md:w-1/2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Amount Upto (Rs)
                        </label>
                        <input type="text" name="amount" placeholder="Loan Amount Upto" value="{{ old('amount') }}"
                            class="w-full px-3 py-2 mb-3 {{ $errors->has('amount') ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        @error('amount')
                            <p class="text-xs italic text-red-500">{{ $errors->first('amount') }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Installment Amount (Rs)
                        </label>
                        <input type="text" name="installment" placeholder="Installment Amount (Rs)" value="{{ old('installment') }}" readonly
                            class="w-full px-3 py-2 mb-3 {{ $errors->has('installment') ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        @error('installment')
                            <p class="text-xs italic text-red-500">{{ $errors->first('installment') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Criteria/Description
                    </label>
                    <x-editor.tinymce-editor name="criteria" :content="old('criteria')" />
                </div>
                <div class="">
                    <button
                        class="px-4 py-2 font-bold text-white bg-indigo-500 rounded-full hover:bg-indigo-700 focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <x-editor.tinymce-config />
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function calculateInstallment(amount, duration, interest_rate) {
                    console.log(amount, duration, interest_rate);
                    let interest = (amount * interest_rate) / 100;
                    let installment = (amount + interest) / (duration * 12);
                    return installment;
                }
                function rawInstallmentCalculator() {
                    const installment = calculateInstallment(
                        Number($('[name="amount"]').val()),
                        Number($('[name="duration"]').val()),
                        Number($('[name="interest_rate"]').val())
                    );
                    $('[name="installment"]').val(installment);
                }
                $('[name="duration"]').on('keyup', function(e) {
                    rawInstallmentCalculator();
                });
                $('[name="interest_rate"]').on('keyup', function(e) {
                    rawInstallmentCalculator();
                });
                $('[name="amount"]').on('keyup', function(e) {
                    rawInstallmentCalculator();
                });
            });
        </script>
    </x-slot>

</x-app-layout>
