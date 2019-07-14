 var SSPEnable=true;
 var opt= {
     responsive: true,
     processing: true,
     serverSide: true,
     ajax: {
         url:'task/data',
         type:'POST',
         dataType: 'JSON',
         beforeSend: function (xhr) {
             xhr.setRequestHeader('Authorization');
         }
     }
     ,
      columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},       
        {data: 'title' , name: 'title', orderable: true, searchable : true},
        {data: 'type' , name: 'type', orderable: true, searchable : true},
        {data: 'priority' , name: 'priority', orderable: true, searchable : true},
        {data: 'deadline' , name: 'deadline', orderable: true, searchable : true},
        {data: 'status' , name: 'status', orderable: true, searchable : true},
        {data: 'bitbucket_repo_id' , name: 'bitbucket_repo_id', orderable: true, searchable : true},       
        {data: 'action' , name: 'action', orderable: false, searchable : false},
        ]
      }
 
 function successHandler(form, data) {
     returnMessage('success', data.msg);
 }
 
 $(function () {
     datatabel=$('.dataTable').DataTable(opt)
 }
 
 );
 function addClick(e) {
     loadModal(resource);
 }
 
 function editClick(e) {
     loadModal(resource, $(e).attr('data-id'));
 }
 
 function deleteClick(e) {
     var delete_confirm=confirm("Please confirm delete");
     if(delete_confirm) {
         deleteRow(resource + '/'+ $(e).attr('data-id'));
     }
 }
 function assignClick(e){
    loadModal_assign(resource,$(e).attr('data-id'));
 }
 
 function loadModal(resource, id=0) {
     var url='';
     if(id==0) {
         url=resource+"/create";
     }
     else {
         url=resource+"/"+id+"/edit";
     }
     $.ajax( {
         url: url,
          method: "get", 
          data: {
             id: id
         },
          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
             setModelContent(data);
         },
          error: function(data) {
    }
      });
    }

    function loadModal_assign(resource, id=0) {
     var url=resource+"/assign";
    
     $.ajax( {
         url: url,
          method: "POST", 
          data: {
             id: id
         },
          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
             setModelContent(data);
         },
          error: function(data) {
    }
      });
    }
 
 function setModelContent(data) {
     $('#formModal .modal-content').html(data);
     $('#formModal').modal('show');
 }
 
 function successHandler(form, data) {
     $('#formModal').modal('hide');
     datatabel.draw();
 }