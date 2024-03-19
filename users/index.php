<?php
include_once 'header.php';
include_once 'modals/addContactModal.php';
include_once 'modals/editContactModal.php';
?>
<main class="w-screen h-screen bg-[#f6f6f9] grid grid-cols-[8%,2fr] md:grid-cols-[10%,2fr]">
    <?php include_once 'sidebar.php'; ?>
    <div class="main_content w-full ">
        <h1 class="font-bold text-center text-2xl mt-5">Contact List</h1>
        <div class="add_contact_container flex justify-end w-[96%] mx-auto">
            <button class="py-1 px-2 text-sm bg-orange-600 text-white rounded-sm" data-modal-target="add_contact_modal" data-modal-toggle="add_contact_modal">Add Contact</button>
        </div>
        <div class="shadow-2xl rounded-md  bg-{#fff] p-[2rem] w-[96%] mx-auto mt-2">
                <div class="search_input flex justify-end">
                    <input type="text" name="search_contact" id="search_contact" class="border-2 border-black text-sm py-1 px-2 rounded-md" placeholder="search">
                </div>
                <div class="table_container">

                </div>
            </div>
        </div>
    </main>

    <script src="../js/index.js"></script>
    <script src="../js/sidebar.js"></script>
    <script>

        //call function to display data
        displayContact(1);


        // add contact
        $('.add_contact').click(function(){
            let name =  $('#name').val();
            let email =  $('#email').val();
            let mobile_number = $('#mobile_number').val();
            let submit = $(this).attr('name')
            $.ajax({
                url : 'controllers/add_contact_handler.php',
                type : 'POST',
                data : {
                    submit : submit,
                    name : name,
                    email : email,
                    mobile_number : mobile_number
                },
                success : function(response,status){
                    if(response == 'success'){
                        alert('New Contact Successfully Added!');
                        location.reload();
                    }else{
                        let data = JSON.parse(response);
                        $.each(data,function(index,value){
                            alert(value);
                        });
                        location.reload();
                    }
                }
            })
        });

        //display contact in table with pagination
        function displayContact(pageNumber){
            let get_contacts = true;

            $.ajax({
                url : './controllers/display_contact_handler.php',
                type : 'POST',
                data : {
                    get_contacts : get_contacts,
                    pageNumber : pageNumber
                },
                success : function(response){
                    $('.table_container').html(response)
                }
            });
        }

        //change page via page number for on click event
        function changePage(pageNumber){
            displayContact(pageNumber);
        }

        function searchChangePage(pageNumber){
            searchContact(pageNumber);
        }

        //change page using next page for on click event
        function nextPage(currentPageNumber,totalPages){
            if(currentPageNumber < totalPages){
                displayContact(currentPageNumber + 1);
            }
        
        }

        function searchNextPage(currentPageNumber,totalPages){
            if(currentPageNumber < totalPages){
                searchContact(currentPageNumber + 1);
            }
        }

        //change page using previous page for on click event
        function prevPage(currentPageNumber){
            if(currentPageNumber > 1){
                displayContact(currentPageNumber - 1)
            }
        }

        function searchPrevPage(currentPageNumber){
            if(currentPageNumber > 1 ){
                searchContact(currentPageNumber - 1)
            }
        }

        //search contact
        function searchContact(pageNumber){
            let search_contact = $('#search_contact').val();
            let is_search = true;

            $.ajax({
                url : './controllers/search_contact.php',
                type : 'POST',
                data :{
                    is_search : is_search,
                    search_contact : search_contact,
                    pageNumber : pageNumber
                },
                success : function(response){
                    $('.table_container').html(response)
                }
            })
        }

        $('#search_contact').on('input',function(){
            event.preventDefault();
            let pageNumber = 1;
            searchContact(pageNumber);
        })



        //retrieve contact data for modal
        function retrieveContactData(contact_id,modal){
            let edit_contact_id = $('#edit_contact_id').val(contact_id);

            $.ajax({
                url : './controllers/fetch_contact_data.php',
                type : 'POST',
                data : {
                    contact_id : contact_id
                },
                success : function(response){
                    let data = JSON.parse(response)
                    $('#edit_name').val(data.name);
                    $('#edit_mobile_number').val(data.mobile_number);
                    $('#edit_email').val(data.email);
                }
            });

            $('#' + modal).toggleClass('hidden');
        }

        //update contact
        $('.edit_contact').click(function(){
            let edit_contact_id = $('#edit_contact_id').val();
            let edit_name = $('#edit_name').val();
            let edit_mobile_number = $('#edit_mobile_number').val();
            let edit_email = $('#edit_email').val();
            let editButton = $(this).attr('name');

            $.ajax({
                url : './controllers/update_contact.php',
                type : 'POST',
                data : {
                    editButton : editButton,
                    edit_contact_id : edit_contact_id,
                    edit_name : edit_name,
                    edit_mobile_number : edit_mobile_number,
                    edit_email : edit_email
                },
                success : function(response,status){
                    if(response == 'success'){
                        Swal.fire({
                            title: "Contact Update Successfully!",
                            text: "You clicked the button!",
                            icon: "success"
                        }).then(result =>{
                            if(result.isConfirmed){
                                location.reload();
                            }
                        })
                    }
                }
            })
        });

        //delete contact
        function deleteContact(contact_id){
            //get tr using contact_id arguments

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : './controllers/delete_contact.php',
                        type : 'POST',
                        data : {
                            contact_id : contact_id
                        },
                        success : function(response){
                            // console.log(response);
                            if(response == 'success'){
                                Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                                }).then(result =>{
                                    if(result.isConfirmed){
                                        location.reload();
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }

        
        //close modal
        closeModal('add_contact_modal');
        closeModal('edit_contact_modal');


    </script>
</body>
</html>