module.exports = {
    currentId : null,
    open() {
        if ($("#loanCalculator").elements.length) {
            return;
        }
        const modalId = "confirm-modal" + new Date().getTime();
        this.currentId = modalId;
        $("body").append(
            `<div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="${modalId}">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center flex-auto justify-center">
                    <h2 class="text-xl font-bold py-4 ">Loan Calculator</h3>
                    <div id="calculatorContent">

                    </div>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 text-center space-x-4 md:block">
                    <button id="cancel-${modalId}"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>`
        );

        $("#cancel-" + modalId).on("click", function (e) {
            $("body #" + modalId).remove();
        });
    },
    setContent(content) {
        document.getElementById('calculatorContent').innerHTML = '';
        document.getElementById('calculatorContent').appendChild(content);
    }
};
