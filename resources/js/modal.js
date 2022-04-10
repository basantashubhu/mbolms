export function confirmAction({action, btn, message, title, icon}, actionCallback) {
    const modalId = 'confirm-modal' + (new Date()).getTime();
    $('body').append(
        `<div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="${ modalId }">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    ${icon}
                    ${ title ? `<h2 class="text-xl font-bold py-4 ">${ title }</h3>` : '' }
                        <p class="text-sm text-gray-500 px-8">${ message }</p>
                </div>
                <!--footer-->
                <div class="p-3  mt-2 text-center space-x-4 md:block">
                    <button id="cancel-${ modalId }"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button id="confirm-${ modalId }"
                        class="mb-2 md:mb-0 bg-${ btn }-500 border border-${ btn }-500 hover:bg-${ btn }-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg">${ action }</button>
                </div>
            </div>
        </div>
    </div>`
    );

    $('#cancel-' + modalId).on('click', function(e) {
        $('body #' + modalId).remove();
    });
    $('#confirm-' + modalId).on('click', function(e) {
        actionCallback(function() {
            $('body #' + modalId).remove();
        });
    });
}