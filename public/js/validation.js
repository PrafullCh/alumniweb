var link = (window.location.href);
link.replace('notification','validate');
console.log(link);
document.getElementById('submit-btn1').onclick = function(event){
    event.preventDefault();
    if((document.getElementById('rollno').value.length<5 || document.getElementById('rollno').value.length>6))
    {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Invalid Roll No',
            footer: 'Roll No should be of minimum 5 length and maximum 6 length'
          });
        //   event.preventDefault();
    }
    else if(document.getElementById('msg').value == "")
    {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Message can not be null',
            footer: 'You muct enter some message'
          });
    }
    else
    {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: ('./validate/'+document.getElementById('rollno').value),
            // dataType: 'json',
            // data:{
            //     _token:$('meta[name="csrf-token"]').attr('content')
            // },
            success: function (data) {
                // console.log(data);
                if(data != "true")
                {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Roll No not found',
                        footer: 'Roll No is not present'
                      });
                      
                }
                else{
                    document.getElementById('myForm').submit();
                }
            },error:function(){ 
                 console.log(data);
            }
        });
        // alert(event);
    }
    
    
    
}
// db notofication
document.getElementById('submit-btn2').onclick = function(event){
    event.preventDefault();
    // alert("hello there");
    if((document.getElementById('rollno').value.length<5 || document.getElementById('rollno').value.length>6))
    {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Invalid Roll No',
            footer: 'Roll No should be of minimum 5 length and maximum 6 length'
          });
        //   event.preventDefault();
    }
    else if(document.getElementById('msg').value == "")
    {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Message can not be null',
            footer: 'You muct enter some message'
          });
    }
    else
    {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: ('./validate/'+document.getElementById('rollno').value),
            // dataType: 'json',
            // data:{
            //     _token:$('meta[name="csrf-token"]').attr('content')
            // },
            success: function (data) {
                // console.log(data);
                if(data != "true")
                {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Roll No not found',
                        footer: 'Roll No is not present'
                      });
                      
                }
                else{
                    // alert("form is submitting");
                    document.getElementById('myForm').action="notifyDB";
                    document.getElementById('myForm').submit();
                }
            },error:function(){ 
                 console.log(data);
            }
        });
        // alert(event);
    }
    
    
    
}