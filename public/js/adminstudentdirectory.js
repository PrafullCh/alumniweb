window.onload=function(){
    document.getElementById('fake').onclick=function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
          $.ajax({
              type: 'POST',
              url: 'fakestudent',
              success: function (data) { 
                console.log(data);
                  document.getElementById('entries').innerHTML ="";
                  if(data.length > 0){
                  var str="";
                  for(i=0;i<data.length;i++){
                  str += "<tr><td>"+data[i].id+"</td>";
                  str += "<td>"+data[i].firstname+"</td>";
                  str += "<td>"+data[i].lastname+"</td>";
                  str += "<td>"+data[i].role+"</td>";
                  str += "<td>"+data[i].yearofgrad+"</td>";
                  str += "<td><a href='user/"+data[i].id+"' class='btn btn-primary'>View Record</a></td></tr>"; 
                  }
                  document.getElementsByClassName('title-entries')[0].innerHTML = "Fake";
                  document.getElementsByClassName('title-entries')[1].innerHTML = "Fake";
                  document.getElementById('entries').innerHTML = str;
                  
                }
                else{
                  Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'No record found',
                  })
                }
                if(document.getElementById('unauthorised').classList.contains('btn-success'))
                {
                  document.getElementById('unauthorised').classList.remove('btn-success');
                  document.getElementById('unauthorised').classList.add('btn-primary');
                }
                if(document.getElementById('authorised').classList.contains('btn-success'))
                {
                  document.getElementById('authorised').classList.remove('btn-success');
                  document.getElementById('authorised').classList.add('btn-primary');
                }
                  document.getElementById('fake').classList.add("btn-success");
              }
          });
  };
  document.getElementById('unauthorised').onclick=function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
        $.ajax({
            type: 'GET',
            url: 'user',
            success: function (data) { 
              // console.log(data);
                document.getElementById('entries').innerHTML ="";
                if(data.length > 0){
                var str="";
                for(i=0;i<data.length;i++){
                str += "<tr><td>"+data[i].id+"</td>";
                str += "<td>"+data[i].firstname+"</td>";
                str += "<td>"+data[i].lastname+"</td>";
                str += "<td>"+data[i].role+"</td>";
                str += "<td>"+data[i].yearofgrad+"</td>";
                str += "<td><a href='user/"+data[i].id+"' class='btn btn-primary'>View Record</a></td></tr>"; 
                }
                document.getElementsByClassName('title-entries')[0].innerHTML = "UnAuthorised";
                document.getElementsByClassName('title-entries')[1].innerHTML = "UnAuthorised";
                document.getElementById('entries').innerHTML = str;
                
              }
              else{
                Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  text: 'No record found',
                })
              }
              if(document.getElementById('fake').classList.contains('btn-success'))
              {
                document.getElementById('fake').classList.remove('btn-success');
                document.getElementById('fake').classList.add('btn-primary');
              }
              if(document.getElementById('authorised').classList.contains('btn-success'))
              {
                document.getElementById('authorised').classList.remove('btn-success');
                document.getElementById('authorised').classList.add('btn-primary');
              }
                document.getElementById('unauthorised').classList.add("btn-success");
            }
        });
};
    document.getElementById('authorised').onclick=function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
          $.ajax({
              type: 'POST',
              url: 'authorisedstudent',
              success: function (data) {
                document.getElementById('entries').innerHTML=""; 
                
                  if(data.length > 0){
                 var str ="";
                  for(i=0;i<data.length;i++){
                  str += "<tr><td>"+data[i].id+"</td>";
                  str += "<td>"+data[i].firstname+"</td>";
                  str += "<td>"+data[i].lastname+"</td>";
                  str += "<td>"+data[i].role+"</td>";
                  str += "<td>"+data[i].yearofgrad+"</td>";
                  str += "<td><a href='user/"+data[i].id+"' onclick='submitForm()' class='btn btn-primary'>View Record</a></td></tr>";  
                  }
                  document.getElementsByClassName('title-entries')[0].innerHTML = "Authorised";
                  document.getElementsByClassName('title-entries')[1].innerHTML = "Authorised";
                  document.getElementById('entries').innerHTML = str;
                  
                }
                else{
                  Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'No record found',
                  })
                }
                if(document.getElementById('fake').classList.contains('btn-success'))
                {
                  document.getElementById('fake').classList.remove('btn-success');
                  document.getElementById('fake').classList.add('btn-primary');
                }
                if(document.getElementById('unauthorised').classList.contains('btn-success'))
                {
                  document.getElementById('unauthorised').classList.remove('btn-success');
                  document.getElementById('unauthorised').classList.add('btn-primary');
                }
                  document.getElementById('authorised').classList.add("btn-success");
              }
          });
  };




$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $.ajax({
      type: 'GET',
      url: 'user',
      success: function (data) { 
        // console.log(data);
          document.getElementById('entries').innerHTML ="";
          if(data.length > 0){
          var str="";
          for(i=0;i<data.length;i++){
          str += "<tr><td>"+data[i].id+"</td>";
          str += "<td>"+data[i].firstname+"</td>";
          str += "<td>"+data[i].lastname+"</td>";
          str += "<td>"+data[i].role+"</td>";
          str += "<td>"+data[i].yearofgrad+"</td>";
          str += "<td><a href='user/"+data[i].id+"' class='btn btn-primary'>View Record</a></td></tr>"; 
          }
          document.getElementsByClassName('title-entries')[0].innerHTML = "UnAuthorised";
          document.getElementsByClassName('title-entries')[1].innerHTML = "UnAuthorised";
          document.getElementById('entries').innerHTML = str;
          
        }
        else{
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'No record found',
          })
        }
        if(document.getElementById('fake').classList.contains('btn-success'))
        {
          document.getElementById('fake').classList.remove('btn-success');
          document.getElementById('fake').classList.add('btn-primary');
        }
        if(document.getElementById('authorised').classList.contains('btn-success'))
        {
          document.getElementById('authorised').classList.remove('btn-success');
          document.getElementById('authorised').classList.add('btn-primary');
        }
          document.getElementById('unauthorised').classList.add("btn-success");
      }
  });
}


