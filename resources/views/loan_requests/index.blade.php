<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Loan Requests
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
            @can('view-pending-requests')
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Email</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan Type</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Loan Amount (Rs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Interest Rate (%)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Loan Terms (Yrs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Installment (Rs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @forelse($loanRequests as $request)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                        <img
                                                            class="rounded-full"
                                                            src="{{ asset("images/icons/" . ($request->sex == 'male' ? 'matthew.png' : 'stevie.jpg')) }}" width="40"
                                                            height="40"></div>
                                                    <div class="font-medium text-gray-800">{{ $request->name }}</div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $request->email }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $request->loan_type_full }} ({{ $request->loan_type }})</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $request->amount + 0 }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">{{ $request->interest_rate + 0 }} %</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">{{ $request->loan_terms + 0 }} Yrs</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $request->installment + 0 }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right text-lg">
                                                    @can('approve-loan-requests')
                                                      <svg xmlns="http://www.w3.org/2000/svg" data-id="{{ $request->id }}" title="Approve"
                                                      class="h-6 w-6 inline-block cursor-pointer approve-request hover:bg-gray-200 rounded-md" 
                                                      fill="none" viewBox="0 0 24 24" stroke="green" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                      </svg>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-3">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            function approveRequest() {
                const id = $(this).attr('data-id');
                utils.confirmAction({
                        action: 'Confirm',
                        btn : 'green',
                        icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>`,
                        title: 'Confirm Loan Request',
                        message: `Are you sure you want to approve this request?`,
                    }, (done) => {
                        axios.post('/loan-requests/approve/'+ id)
                            .then(function (response) {
                                done();
                                $('.all-alerts').alertSuccess(response.data?.message || 'Request approved successfully');
                                setTimeout(() => {
                                    window.location.reload(); 
                                }, 3000);
                            })
                            .catch(function (error) {
                                done();
                                $('.all-alerts').alertError(error.response?.data?.message || 'Something went wrong');
                            });
                    })
            }

            document.addEventListener('DOMContentLoaded', () => {
                // do your setup here
                $('.approve-request').on('click', approveRequest);
            })
        </script>
    </x-slot>
</x-app-layout>
