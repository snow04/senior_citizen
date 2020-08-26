const base_url = window.location.origin;
const location_path = window.location.pathname;

$.get(`${base_url}/senior/load_barangay`, function(data)
{
    let html = '';
    for(let i=0; i < data.length; i++)
    {
        html += `<option value="${data[i].barangay}">${data[i].barangay}</option>`;
    }

    $('#barangay').append(html);

},'json');

$('#barangay').change(function()
{
    console.log('trigger');
    let barangay = $(this).val();

    $.get(`${base_url}/senior/load_purok/${barangay}`, function(data)
    {
        console.log(data);
        let html = '';
        for(let i=0; i < data.length; i++)
        {
            html += `<option value="${data[i].purok}">${data[i].purok}</option>`;
        }

        $('#purok').html(html);

    },'json');
})

let seniorTable =  $('#seniorTable').DataTable({ 
    "processing": true,
        "ajax": `${base_url}/senior/senior_list`,
        "columns": [
            { "visible": false, "width": "40%", "data": "pi_pk"},
            { "width": "40%", "data": "name[, ]" },
            { "width": "10%", "data": "gender" },
            { "width": "10%", "data": "purok" },
            { "width": "10%", "data": "barangay" },
            { "width": "10%", "data": "picture" },
            { "width": "10%", "data": "signature" },
            { "width": "10%", "data": "thumbmark" }
        ],
        "order": [[ 0, "desc" ]],
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
                  $('#seniorForm')[0].reset();
                  seniorTable.ajax.reload();
              })
        }
        else
        {
            Swal.fire(
                'Failed!',
                `Something went wrong`,
                'error'
              ); 
        }
    },'json');
});