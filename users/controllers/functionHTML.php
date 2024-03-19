<?php

    function htmlFormat($totalRows,$contacts,$pageNumber,$totalPages,$changePage,$nextPage,$prevPage,$retrieveContactData,$deleteContact){
        $html = '<p class="text-sm">Total contacts: '.$totalRows.'</p>';

        $html .= '
            <table class="w-full text-left border-collapse text-sm"> 
                <thead class="border-b-4 border-solid ">
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
        ';

        foreach($contacts as $contact){
            $html .= '
                    <tr class="border-b-4 border-solid" data-contact-id="'.$contact['contact_id'].'">    
                        <td>'.$contact['name'].'</td>
                        <td>'.$contact['mobile_number'].'</td>
                        <td>'.$contact['email'].'</td>
                        <td>
                            <button class="px-1 py-1 bg-blue-600 rounded-sm text-white text-sm" onclick="'.$retrieveContactData.'('.$contact['contact_id'].',\'edit_contact_modal\')">Edit</button>
                            <button class="px-1 py-1 bg-red-600 rounded-sm text-white text-sm" onclick="'.$deleteContact.'('.$contact['contact_id'].')">Delete</button>
                        </td>
                    </tr>
            ';
        }

        $html .= '
            </tbody>
            </table>
        ';

        $html .= '
            <div class="pagination_container flex flex-col items-center gap-5 mt-10">
                <ul class="flex items-center gap-1">
                    <li>
                        <button class="pagination_number page-link page-prev w-[30px] h-[30px] bg-none rounded border-2 border-black border-solid flex flex-col items-center justify-center font-semibold hover:bg-blue-300" onclick="'.$prevPage.'('.$pageNumber.','.$totalPages.')">
                            <span class="material-symbols-outlined text-[12px] p-l-[7px] font-semibold">arrow_back_ios</span>
                        </button>
                    </li>
        ';

        for($i = 1; $i <= $totalPages; $i++){
            if($i == $pageNumber){
                $html .= '<li class=""><button class="page-link active w-[30px] h-[30px] bg-none rounded border-2 border-black border-solid flex flex-col items-center justify-center font-semibold hover:bg-[#C0C0C0]" onclick="'.$changePage.'('.$i.')">'.$i.'</button></li>';
            }else{
                $html .= '<li class=""><button class="page-link w-[30px] h-[30px] bg-none rounded border-2 border-black border-solid flex flex-col items-center justify-center font-semibold hover:bg-[#C0C0C0]" onclick="'.$changePage.'('.$i.')">'.$i.'</button></li>';
            }
        }
        $html .= '
                    <li>
                        <button class="w-[30px] h-[30px] bg-none rounded border-2 border-black border-solid flex flex-col items-center justify-center font-semibold hover:bg-blue-300" onclick="'.$nextPage.'('.$pageNumber.','.$totalPages.')">
                        <span class="material-symbols-outlined text-[12px] font-semibold">arrow_forward_ios</span>
                        </button>
                    </li>
                </ul>
            </div>
        ';

        echo $html;
    }

    
?>