

var obj = {
    _token:$('meta[name="csrf-token"]').attr('content'),
    searchfor:['alumni'],
    yearofgrad : null,
    branch:[],
    currloc:null,
    hometown:null,
    designation:[],
    industry:[]
};


var    profile=[];
var    firstname=[];
var   lastname=[];
var    batch=[];
var    DEPT=[];
var    clocation=[];


window.onload=function(){
    collectData();
};

function searchforFunction(val)
{
    //console.log("adding search of ");
    if(obj.searchfor.indexOf(val)==-1)
    {
        //console.log("added search of ");
        obj.searchfor.push(val);
        
    }
    else if(val=="student"){

    }
    else
    {
        //console.log("already exist popping "+val);
        obj.searchfor.pop(val);
    }
    collectData();
}

function branchFunction(val)
{//console.log("adding branch ");
    if(obj.branch.indexOf(val)==-1)
    {
        //console.log(val);
        obj.branch.push(val);
    }
    else
    {
        obj.branch.pop(val);
    }
    collectData();
}

function designation(val)
{//console.log("designation ");
    if(obj.designation.indexOf(val)==-1)
    {
        obj.designation.push(val);
    }
    else{
        obj.designation.pop(val);
    }
    collectData();
}

function industry(val)
{//console.log("adding industry ");
    if(obj.industry.indexOf(val)==-1)
    {
        obj.industry.push(val);
    }
    else{
        obj.industry.pop(val);
    }
    collectData();
}
function setyear(val)
{//console.log("adding year ");
    obj.yearofgrad = val;
    collectData();
}

function setcurrloc(val)
{//console.log("adding currloc ");
    obj.currloc = val;
    collectData();
}
function sethometown(val)
{//console.log("adding hometown ");
    obj.hometown = val;
    collectData();
}



function collectData(){
    

    //console.log(obj);
    // passing data
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    ////console.log();

        $.ajax({
            /* the route pointing to the post function */
            type: 'POST',
            url: 'http://localhost:82/alumniWeb/public/records',
            
            /* send the csrf-token and the input to the controller */
            data: obj,
            
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                ////console.log("data come");
                 firstname.length=0;
                lastname.length=0;
                 profile.length=0;
                 DEPT.length=0;
                 clocation.length=0;
                 batch.length=0;
                //console.log("look at me");
                //console.log(firstname);
                //console.log("data received");
                //console.log(data); 
                filterData(data)
                //
            }
        }); 
    
    }


    function insertDataIn(data)
    {
        if(data.length==0)
        {
            document.getElementById('content').innerHTML="<h1>No Record Exist</h1>";
        }
        else{
            for(i=0;i<data.length;i++)
            {
                if(firstname.indexOf(data[i].firstname)===-1){
                ////console.log(data[i].dept);
                 firstname.push(data[i].firstname);
                 lastname.push(data[i].lastname);
                 profile.push(data[i].profileimg);
                    DEPT.push(data[i].dept);
                 clocation.push(data[i].currloc);
                 batch.push(data[i].yearofgrad);
                }
            }
        }
        ////console.log( );
        display(data);
    }
    function display(data)
    {
        var stringToInsert="";
        ////console.log( profile.length);
        for(i=0;i< profile.length;i++)
        {
            ////console.log("12");
            stringToInsert += "<tr><td ><img src=\"public/images/"+ profile[i]+"\" class=\" mx-auto styleImg img-responsive img-fluid img-thumbnail\" alt=\"No Image\"></td><td><p>"+  firstname[i]+" "+  lastname[i]+"</p><p>"+ batch[i]+"</p><p>"+DEPT[i]+"</p><p>"+ clocation[i]+"</p></td></tr>";
        }
        ////console.log(stringToInsert);
        document.getElementById('content').innerHTML = "";
        
        document.getElementById('content').innerHTML = stringToInsert;
    }


    function filterData(data)
    {
        //console.log("I m  here in filter data "+data.length);
        var i=0;
        while(i<data.length)
        {
            var flag = 0;
            //console.log("iteration "+i);
            if(obj.searchfor.length!=0)
            {
                
                if(obj.searchfor.indexOf(data[i].role)==-1)
                {
                    flag=0;
                    //console.log("in search for "+i);
                    //console.log(data[i]);
                    data.splice(i,i+1);
                    continue;
                }
            
            }
            if(obj.yearofgrad!=null)
            {
                if(obj.yearofgrad!=data[i].yearofgrad)
                {
                    flag=0;
                    
                    data.splice(i,i+1);
                    continue;
                }
            }

            if(obj.branch.length>0)
            {
                if(obj.branch.indexOf(data[i].dept))
               {
                    flag=0;
                    //console.log(i+" "+obj.branch.indexOf(data[i].dept));
                    //console.log(data[i]);
                    data.splice(i,i+1);
                    continue;
                }
            }
            if(obj.currloc!=null)
            {
                if(obj.currloc!=data[i].currloc)
                {
                    flag=0;
                    //console.log("in checking currloc "+i+" status "+(obj.currloc!=data[i].currloc));
                    data.splice(i,i+1);
                    continue;
                }
            }
            if(obj.hometown!=null)
            {
                if(obj.hometown!=data[i].hometown)
                {
                    flag=0;
                    data.splice(i,i+1);
                    continue;
                }
            }
            /*if(obj.designation.length!=0)
            {
                if(obj.designation.indexOf(data[i].designaion)===-1)
                {
                    flag=0;
                    data.splice(i,i+1);
                    continue;
                }
            }*/
            ////console.log("obj here");
            ////console.log(data);
            i++;
        }
        //console.log(obj);
        //console.log(data);
        insertDataIn(data);
    }