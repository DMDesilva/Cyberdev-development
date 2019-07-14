var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'developergroup/data',
        type:'POST',
        dataType: 'JSON',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization');
        }
    },
    columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},
        // {data: 'id' , name: 'id', orderable: true},
        {data: 'name' , name: 'name', orderable: true, searchable : true},
        {
            data:'developer',
            name: 'developers',
            orderable: true,
            searchable : true,
            "render": function ( data, type, full, meta ) {
                var developer_list = '';
               // console.log(full.developer[0].firstname);
                for(var i=0;i<full.developer.length;i++){
                    if(i > 0){
                        developer_list +=' ,';
                    }
                    developer_list += full.developer[i].firstname+' '+full.developer[i].lastname;
                }
                return developer_list;
            }

        },
        {data: 'action' , name: 'action', orderable: false, searchable : false},
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

