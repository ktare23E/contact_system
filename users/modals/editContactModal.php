<!-- Main modal -->
<div id="edit_contact_modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 w-full h-full bg-black bg-opacity-30 backdrop-blur-sm">
    <div class="flex justify-center items-center min-h-full">
        <!-- Modal content -->
        <div class="modal_body relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Contact
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit_contact_modal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div>
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="hidden" name="edit_contact_id" id="edit_contact_id">
                        <input type="text" id="edit_name" name="edit_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Full Name" required="">
                    </div>
                    <div>
                        <label for="officeLocation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="edit_email" name="edit_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email Address" required="">
                    </div> 
                </div>
                
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <label for="officeLocation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                        <input type="text" id="edit_mobile_number" name="edit_mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mobile Number" required="">
                    </div> 
                </div>
                
                <button class="edit_contact bg-blue-800 p-2 rounded-md text-white" type="button" name="edit">
                    Edit Contact
                </button>
            </form>
        </div>
    </div>
</div>
