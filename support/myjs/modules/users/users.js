$(document).ready(function(){

    const base_url = window.location.origin;
    const location_path = window.location.pathname;


    $('.dt-buttons').addClass('float-left');

    $.get(`${base_url}/users/usertype_load`, function(data)
    {
        let html = '';
        for(let i = 0; i < data.length; i++)
        {
            html += `<option value="${data[i].id}">${data[i].usertype} - ${data[i].description}</option>`;
        }
        $('#usertype').append(html);
    },'json');


    let usersTable =  $('#usersTable').DataTable({ 
        "processing": true,
            "ajax": `${base_url}/users/users_load`,
            "columns": [
                { "width": "45%", "data": "name[, ]" },
                { "width": "10%", "data": "username" },
                { "width": "10%", "data": "email" },
                { "width": "10%", "data": "usertype" },
                { "width": "10%", "data": "status" },
                { "width": "15%", "data": "action" }
            ],
            "deferRender": true,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Add Users <i class="fa fa-user-plus"></i>',
                    action: function ( e, dt, node, config ) {
                        // $('#usersForm')[0].reset();
                        $('#usersModal').modal('show');
                    }
                }
            ],

    });  

    let groupTable =  $('#groupTable').DataTable({ 
        "processing": true,
            "ajax": `${base_url}/users/group_load`,
            "columns": [
                { "width": "30%", "data": "usertype" },
                { "width": "20%", "data": "description" },
                { "width": "10%", "data": "action" }
            ],
            "deferRender": true,
            "responsive": true,
    });  



    $('#usersForm').submit(function(e){
        e.preventDefault();

        console.log('payts');
        $.post(`${base_url}/users/registerUser`, $(this).serialize(), function(succ){
            if(succ.status == true)
            {
                Swal.fire(
                    'Success!',
                    'You have successfully registered!',
                    'success'
                ).then(()=>{
                    $('#usersForm')[0].reset();
                    usersTable.ajax.reload();
                    $('#usersModal').modal('hide');
                })
            }
            else
            {
                Swal.fire(
                    'Failed!',
                    `${succ.err_msg}`,
                    'error'
                ); 
            }
        },'json');
    });

});