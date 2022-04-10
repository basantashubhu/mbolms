<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pending Requests
        </h2>
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
                                            <div class="font-semibold text-left">Gender</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">DOB</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Email</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Phone</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Adress</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Action</div>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @forelse($pendingRequests as $user)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                        <img
                                                            class="rounded-full"
                                                            src="{{ asset("images/icons/{$user->avatar}") }}" width="40"
                                                            height="40"></div>
                                                    <div class="font-medium text-gray-800">{{ $user->name }}</div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ ucwords($user->sex) }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">{{ $user->dob->format('m/d/Y') }} ( {{ $user->dob->diffInYears() }} Yrs)</div>
                                            </td>
    
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $user->email }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left font-medium">{{ $user->phone }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $user->address }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg text-right">
                                                    @can('approve-pending-requests')
                                                    <svg xmlns="http://www.w3.org/2000/svg" data-id="{{ $user->id }}" title="Approve"
                                                        class="h-6 w-6 inline-block cursor-pointer approve-request hover:bg-gray-200 rounded-md" fill="none"
                                                        viewBox="0 0 24 24" stroke="green" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-3">No data</td>
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
                        action: 'Approve',
                        btn : 'green',
                        icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>`,
                        title : 'Approve User Request',
                        message: `Are you sure you want to approve this request?`,
                    }, (done) => {
                        axios.post('/pending-requests/approve/'+ id)
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
