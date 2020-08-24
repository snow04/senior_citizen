const base_url = window.location.origin;
const location_path = window.location.pathname;

let seniorTable =  $('#seniorTable').DataTable({ 
    "processing": true,
        "ajax": `${base_url}/senior/senior_list`,
        "columns": [
            { "width": "40%", "data": "name[, ]" },
            { "width": "10%", "data": "gender" },
            { "width": "10%", "data": "purok" },
            { "width": "10%", "data": "barangay" },
            { "width": "10%", "data": "picture" },
            { "width": "10%", "data": "signature" },
            { "width": "10%", "data": "thumbmark" }
        ],
        "deferRender": true,
        "responsive": true,
    dom: 'PBfrtip',
    // buttons: [
    //     {
    //         text: 'Add Doctor <i class="fa fa-user-plus"></i>',
    //         action: function ( e, dt, node, config ) {
    //             $('#doctorForm')[0].reset();
    //             $('#doctorModal').modal('show');
    //         }
    //     }
    // ],

});     

$('.dt-buttons').addClass('float-left');

$('#seniorForm').submit(function(e){
    e.preventDefault();
    $.post(`${base_url}/senior/save`, $(this).serialize(), function(succ){
        if(succ.status)
        {
            Swal.fire(
                'Success!',
                'You have successfully registered!',
                'success'
              ).then(()=>{
                  $('#doctorForm')[0].reset();
                  doctorTable.ajax.reload();
                  $('#doctorModal').modal('hide');
              })
        }
        else
        {
            Swal.fire(
                'Failed!',
                `${data.error}`,
                'error'
              ); 
        }
    });
});