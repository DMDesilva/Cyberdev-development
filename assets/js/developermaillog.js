var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'developermaillog/data',
        type:'POST',
        dataType: 'JSON',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization');
        }
    },
    columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},
        // {data: 'id' , name: 'id', orderable: true},
        {data: 'developermail_name' , name: 'developermail_name', orderable: true, searchable : true},
        {data: 'mail_type' , name: 'mail_type', orderable: true, searchable : true},
        {data: 'developers' , name: 'developers', orderable: true, searchable : true},
        {data: 'developer_groups' , name: 'developer_groups', orderable: true, searchable : true},
        {data: 'type' , name: 'type', orderable: true, searchable : true},
        {data: 'created_at' , name: 'created_at', orderable: true, searchable : true},
    ]
}
$(function () {
    datatabel = $('.dataTable').DataTable(opt)
});

function addClick(e){
    loadModal(resource);
}

function editClick(e){
    loadModal(resource,$(e).attr('data-id'));
}

function deleteClick(e){
    var delete_confirm = confirm("Please confirm delete");
    if(delete_confirm){
        deleteRow(resource + '/'+ $(e).attr('data-id'));
    }
}

function loadModal(resource,id = 0){
    var url = '';
    if(id == 0){
        url = resource+"/create";
    }else{
        url = resource+"/"+id+"/edit";
    }

    $.ajax({
        url: url,
        method: "get",
        data: {
            id:id
        },
        beforeSend: function () {
        },
        complete: function () {
        },
        success: function (data) {
            setModelContent(data);
        },
        error: function(data){

        }
    });
}

function setModelContent(data){
    $('#formModal .modal-content').html(data);
    $('#formModal').modal('show');
}

function successHandler(form,data){
    $('#formModal').modal('hide');
    datatabel.draw();
}
