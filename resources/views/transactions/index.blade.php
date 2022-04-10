<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transactions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('view-transactions')
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    @can('filter-transactions')
                        <header class="px-5 py-4 border-b border-gray-100">
                            <form action="{{ route('transactions') }}">
                                <div class="flex flex-col md:flex-row gap-3 md:gap-5 items-start">
                                    <select name="loan_type"
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">Select Loan Type</option>
                                        @foreach ($loanTypes as $code => $type)
                                            <option value="{{ $code }}"
                                                @if (request('loan_type') == $code) selected @endif>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>

                                    <select name="user_id"
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">Select User</option>
                                        @foreach ($users as $code => $name)
                                            <option value="{{ $code }}"
                                                @if (request('user_id') == $code) selected @endif>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit"
                                        class="rounded-lg w-64 flex justify-center items-center gap-2 px-4 py-1 bg-blue-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                        <span class="font-medium subpixel-antialiased">Filter</span>
                                    </button>
                                </div>
                            </form>
                        </header>
                    @endcan
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan ID</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan Type</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Trans. Type</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Amount</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Status</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Trans. Date</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @forelse($transactions as $transaction)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">
                                                    L-{{ str_pad($transaction->loan_id, 7, 0, STR_PAD_LEFT) }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $transaction->loan->loan->loan_type_full }} ({{ $transaction->loan->loan->loan_type }})</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                        <img class="rounded-full"
                                                            src="{{ asset('images/icons/' . ($transaction->user->sex == 'male' ? 'matthew.png' : 'stevie.jpg')) }}"
                                                            width="40" height="40">
                                                    </div>
                                                    <div class="font-medium text-gray-800">{{ $transaction->user->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $transaction->transaction_type }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $transaction->amount + 0 }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">
                                                    <span
                                                        class="text-green-600 bg-green-100 px-2 py-1">{{ $transaction->status }}</span>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">
                                                    {{ $transaction->created_at->format('m/d/Y') }}</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-3">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="p-2 text-right">Total</td>
                                        <td class="p-2 text-right">Rs. {{ $transactions->sum('amount') }}</td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

</x-app-layout>
