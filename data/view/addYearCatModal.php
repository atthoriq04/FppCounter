<!-- Modal (Hidden by default) -->
<div id="addNewModal" class="fixed modal inset-0 z-50 flex items-center justify-center bg-black/60 hidden">
    <div class="bg-white rounded-lg shadow-xl w-[90vw]  md:w-[50vw] xl:w-[30vw] max-w-2xl mx-auto p-4">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h1 class="text-xl modal-title  font-semibold" id="exampleModalLabel">Logs</h1>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body mt-10">
            <div class="w-full">
                <form action="../data/functions/crud.php" method="POST" id="uploadForm" enctype="multipart/form-data" class="space-y-6 px-5 mt-3 pb-3">
                    <!-- Name Input -->
                    <div class="relative w-full mb-6">
                        <input
                            type="text"
                            id="inputField"
                            name="inputField"
                            placeholder=" "
                            class="peer h-12 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" />
                        <label
                            for="inputField" id="inputLabel"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                            Name
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6 border-t pt-4 modal-footer">
            <button type="button"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition"
                data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit"
                id="submitButton"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Submit
            </button>
        </div>
    </div>
</div>