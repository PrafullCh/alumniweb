@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="animated fadeIn delay-1s jumbotron">
        <h1>Find your classmates</h1>
        <p class="lead">Renew bonds with old classmates, reach out to alumni with similar interests, network within your domains and catch up with alumni in your location.</p>
        <div class="container mx-auto">
            <div class="row">
                    <a href="{{route('verify')}}" target="_blank" class="animated fadeInLeft delay-2s mx-3 btn btn-success btn-lg ">Sign In</a>
                    <a href="{{route('login')}}" target="_blank" class="animated fadeInRight delay-2s mx-3 btn btn-success btn-lg">Log In</a>        
            </div>
            </div>
        
    </div>
        <div class="row">  
            <div class="col-md-4 row-no-gutters">
                    <form action="public/records" style="none" method="post">
                        
                <div class="animated fadeIn delay-1s card ">
                    <h3 class=" font-weight-bold card-body text-center align-middle">Filters</h3>
                </div>
                <!--options1-->
                <div  data-aos="flip-up" data-aos-delay="500"  class="col-md-12  customStyle align-middle text-center my-2 " data-toggle="collapse" data-target=".options">
                    <h4 class="my-2" id="style">Search For</h4>
                </div>
                <div class="col-md-12 row collapse options">
                    <h5 class="checkbox col-md-12 text-center align-middle"><input type="checkbox" name="searchfor[]" onclick="searchforFunction(this.value)" value="alumni" class="inputStyle"><span class="borderStyle">Alumni</span></h5>
                    <h5 class="checkbox col-md-12 text-center align-middle"><input type="checkbox" name="searchfor[]" onclick="searchforFunction(this.value)" value="faculty" class="inputStyle"><span class="borderStyle">Faculty</span></h5>
                    <h5 class="checkbox col-md-12 text-center align-middle"><input type="checkbox" name="searchfor[]" onclick="searchforFunction(this.value)" value="student" class="inputStyle"><span class="borderStyle">Student</span></h5>
                </div>
                <!--options2-->
                <div data-aos="flip-up" data-aos-delay="500" class="col-md-12  customStyle text-center my-2" data-toggle="collapse" data-target=".options2" >
                    <h4 class="my-2 " >Year of Graduation</h4>
                </div>
                <div class="col-md-12 row collapse options2">
                    
                    <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04" name="year" onchange="setyear(this.value)">
                              <option selected>Year...</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                            </select>
                            <div class="input-group-append">
                              <a class="btn btn-outline-secondary" type="button">Button</a>
                            </div>
                          </div>
                </div>
                <!-- options3  -->
                <div data-aos="flip-up" data-aos-delay="500" class="col-md-12  customStyle text-center my-2" data-toggle="collapse" data-target=".options3">
                    <h4 class="my-2">Division/Department</h4>
                </div>
                <div class="col-md-12 row collapse options3">
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="mechanical engineering" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspMechanical</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="civil engineering" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspCivil</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="electrical engineering" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspElectrical</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="computer technology" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspComputer Technology</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="information technology" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspInformation Technology</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="electronics and telecommunication" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspElect. and Telecommunication</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="plastic engineering" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspPlastic Engineering</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="dress design and garment manufacture" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspDress Design and Garment</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="interior designing" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspInterior Design and Decoration</span></h5>
                    <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="branch[]" value="automobile engineering" onclick="branchFunction(this.value)" class="inputStyle"><span class="borderStyle">&nbsp&nbspAutomobile</span></h5>
                </div>
                <!-- options4  -->
                <!--div class="col-md-12  border text-center my-2" data-toggle="collapse" data-target=".options4">
                    <h4 class="my-2">Degree</h4>
                    data-aos="slide-up" data-aos-delay="500"
                </div-->
                <!-- options5  -->
                <div data-aos="flip-up" data-aos-delay="500" class="col-md-12  customStyle text-center my-2" data-toggle="collapse" data-target=".options5">
                    <h4 class="my-2">Current Location</h4>
                </div>
                <div class="input-group mb-3 col-md-12 row collapse options5">
                        <input type="text" name="currloc" class="form-control" onchange="setcurrloc(this.value)" placeholder="Current Location" aria-label="CLocation" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">Enter Current Location</span>
                        </div>
                      </div>


                <!-- options6  -->
                <div data-aos="flip-up" data-aos-delay="500" class="col-md-12  customStyle text-center my-2" data-toggle="collapse" data-target=".options6">
                    <h4 class="my-2">Hometown</h4>
                </div>
                <div class="input-group mb-3 col-md-12 row collapse options6">
                    <input type="text" class="hometown form-control" onchange="sethometown(this.value)" name="hometown" placeholder="Hometown" aria-label="Hometown" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Enter hometown</span>
                </div>
                </div>
                <!-- options7  -->
                <div data-aos="flip-up" data-aos-delay="500" class="col-md-12  customStyle text-center my-2" data-toggle="collapse" data-target=".options7">
                    <h4 class="my-2">Designation</h4>
                </div>    
                <div class="col-md-12 row collapse options7">
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="designation[]" value="mechanical" onclick="designation(this.value)" class="inputStyle">&nbsp&nbspMechanical</h5>
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="designation[]" value="professor" onclick="designation(this.value)" class="inputStyle">&nbsp&nbspProfessor</h5>
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="designation[]" value="developer" onclick="designation(this.value)" class="inputStyle">&nbsp&nbspSoftware Engineer</h5>
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="designation[]" value="assistant manager" onclick="designation(this.value)" class="inputStyle">&nbsp&nbspAssistant Manager</h5>
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="designation[]" value="student" onclick="designation(this.value)" class="inputStyle">&nbsp&nbspStudent</h5>
                    </div>
                <!-- options8  -->
                <div data-aos="flip-up" data-aos-delay="500" class="customStyle col-md-12  text-center my-2" data-toggle="collapse" data-target=".options8">
                    <h4 class="my-2">Industry</h4>
                </div>
                <div class="col-md-12 row collapse options8">
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="industry[]" value="industry" onclick="industry(this.value)" class="inputStyle">&nbsp&nbspIndustry</h5>
                        <h5 class="checkbox col-md-12 text-left align-middle"><input type="checkbox" name="industry[]" value="education" onclick="industry(this.value)" class="inputStyle">&nbsp&nbspEducation</h5>
                    </div>
                </form>
            </div>
    
            <div class="col-md-8 row-no-gutters">
                <!--Students cards -->
                <div class="card col-md-12 ">
                            
                        <table class="table tableStyle">
                          <tbody id="content">
                            
                          </tbody>
                        </table>
                        
                </div> 
                
            </div>
    </div>
    <hr>
    <script type="text/javascript" src="{{ asset('public/js/directoryFilter-1.js') }}">    
    </script>
@endsection