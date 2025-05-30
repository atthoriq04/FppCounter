<!-- Modal (Hidden by default) -->
<div id="newDataModal" class="fixed modal inset-0 z-50 flex items-center justify-center bg-black/60 hidden">
    <div class="bg-white rounded-lg shadow-xl w-[90vw] max-w-4xl mx-auto p-4">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h1 class="text-xl font-semibold" id="logsModalLabel">Add New Counter</h1>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body pt-6">
            <div class="">
                <form action="" method="POST" id="addCounter" enctype="multipart/form-data" class="space-y-6 px-5 mt-3 pb-3">
                    <!-- Year Select -->
                    <div class="relative">
                        <select
                            id="year"
                            name="year"
                            class="peer w-full border-b-2 border-gray-300 bg-transparent text-gray-900 focus:outline-none focus:border-blue-600 h-12 appearance-none">
                            <option selected value="<?= date("Y") ?>"><?= date("Y") ?></option>
                        </select>
                        <label
                            for="year"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-gray-600 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
                            Year
                        </label>
                    </div>
                    <!-- Name Input -->
                    <div class="relative w-full mb-6">
                        <input
                            type="text"
                            id="searchName"
                            name="searchName"
                            placeholder=" "
                            class="peer h-12 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" />
                        <label
                            for="searchName"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                            Search a Name
                        </label>
                    </div>
                    <div class="grid gap-2 grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 mx-auto px-1 overflow-y-scroll max-h-[60vh]" id=selector>
                    </div>
                    <!-- Styled Checkbox -->
                    <div class="flex items-center gap-2 mt-4">
                        <input
                            type="checkbox"
                            id="log"
                            name="log"
                            class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" />
                        <label for="log" class="text-gray-700 text-sm font-medium">
                            Create a Log?
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6 border-t pt-4 modal-footer">
            <button type="button" class="px-4 py-1 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition" id="closeAddModal" data-bs-dismiss="modal">Close</button>
            <button type="button" class="px-4 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition" id="toEditData" data-bs-toggle="modal" data-bs-target="#addNewModal" disabled>Submit</button>
        </div>
    </div>
</div>