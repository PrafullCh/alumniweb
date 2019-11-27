window.onload=function(){
    document.getElementById('blog').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changeblogsetting',
                data: obj,
                success: function (data) { 
                    var str;
                    if(document.getElementById('blog').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'Blog Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('directory').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changedirectorysetting',
                data: obj,
                success: function (data) { 
                    var str;
                    if(document.getElementById('contact_us').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'Contact Us Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('yearbook').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changeyearbooksetting',
                data: obj,
                success: function (data) { 
                    var str;
                    if(document.getElementById('yearbook').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'Yearbook Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('about_us').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changeaboutussetting',
                data: obj,
                success: function (data) { 
                    var str;
                    if(document.getElementById('about_us').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'About Us Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('contact_us').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changecontactussetting',
                data: obj,
                success: function (data) { 
                    // console.log(data);
                    var str;
                    if(document.getElementById('contact_us').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'Contact Us Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('gallery').onchange=function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var obj;
            $.ajax(obj={
                type: 'POST',
                url: 'changegallerysetting',
                data: obj,
                success: function (data) { 
                    // console.log(data);
                    var str;
                    if(document.getElementById('gallery').checked==true)
                    str = "enabled";
                    else
                    str = "disabled";
                    Swal.fire({
                        // position: 'top-end',
                        type: 'success',
                        title: 'Gallery Page is '+str,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
            // console.log(obj);
    }
    document.getElementById('donation').onchange=function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var obj;
          $.ajax(obj={
              type: 'POST',
              url: 'changedonationsetting',
              data: obj,
              success: function (data) { 
                  // console.log(data);
                  var str;
                  if(document.getElementById('gallery').checked==true)
                  str = "enabled";
                  else
                  str = "disabled";
                  Swal.fire({
                      // position: 'top-end',
                      type: 'success',
                      title: 'Donation Page is '+str,
                      showConfirmButton: false,
                      timer: 1500
                    })
              }
          });
          // console.log(obj);
  }
  document.getElementById('login').onchange=function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var obj;
        $.ajax(obj={
            type: 'POST',
            url: 'changeloginsetting',
            data: obj,
            success: function (data) { 
                // console.log(data);
                var str;
                if(document.getElementById('gallery').checked==true)
                str = "enabled";
                else
                str = "disabled";
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'Login Page is '+str,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        });
        // console.log(obj);
  }
  document.getElementById('register').onchange=function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var obj;
        $.ajax(obj={
            type: 'POST',
            url: 'changeregistersetting',
            data: obj,
            success: function (data) { 
                // console.log(data);
                var str;
                if(document.getElementById('gallery').checked==true)
                str = "enabled";
                else
                str = "disabled";
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'Register Page is '+str,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        });
        // console.log(obj);
  }
}