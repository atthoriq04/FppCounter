<!-- Modal (Hidden by default) -->
<div id="logsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 hidden">
    <div class="bg-white rounded-lg shadow-xl w-[90vw]  md:w-[50vw] xl:w-[30vw] max-w-2xl mx-auto p-4">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h1 class="text-xl font-semibold" id="logsModalLabel">Logs</h1>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body ">
            <div class="mb-4">
                <h5 id="title" class="text-lg font-medium">Name Log</h5>
            </div>

            <div class="overflow-y-scroll max-h-[50vh]">
                <table class="w-full">
                    <thead class="">
                        <tr>
                            <th class="px-1 border-b border-gray-300">#</th>
                            <th class="px-3 border-b border-gray-300">Name</th>
                            <th class="px-0.5 border-b border-gray-300">Count</th>
                            <th class="px-5 border-b border-gray-300">Time</th>
                        </tr>
                    </thead>
                    <tbody id="logLists">
                        <!-- Dynamic log rows go here -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>