<?php 
  
  session_start();

  if(array_key_exists("id",$_COOKIE)){

    // if cookie exists set session id = cookie id

    $_SESSION['id']=$_COOKIE['id'];
    $_SESSION['username']=$_COOKIE['username'];

  }

  // check session id
  if(array_key_exists("id", $_SESSION)){

    //echo "<p>Logged in! </p> "; 
  }
  else{
    // not logged in
    header("Location: index.php");
  }
  
         //Create a DateTime object using the user's date of birth.
        //$dob = new DateTime($row['adob']);
         
        //We need to compare the user's date of birth with today's date.
       // $now = new DateTime();
         
        //Calculate the time difference between the two dates.
       // $difference = $now->diff($dob);
         
        //Get the difference in years, as we are looking for the user's age.
       // $uage = $difference->y;

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Caste Certificate And Validity System</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <style type="text/css">
                #addappinfo{
                        
                     
                        
                        
                        
                }
                .submitBtn{
                        align-self:center;
                        padding-bottom:20px;
                }
        </style>
       
</head>
<body>

        
	<div class="wrapper">
		<div class="main-header">
      
        
			<div class="logo-header">
				<a href="index.html" class="logo">
				CCVS
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto bmd-btn-fab dropdown-toggle" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				
			</div>
			
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
			
					
					<ul class="nav">
            <li class="nav-item active">
              <a href="#">
                <i class="la la-home"></i>
                <p>Home</p>
                <span class="badge badge-count"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="la la-edit"></i>
                <p>Apply</p>
                <span class="badge badge-count"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="la la-download"></i>
                <p>Downloads</p>
                <span class="badge badge-count"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="la la-upload"></i>
                <p>Upload Documents</p>
                <span class="badge badge-count"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="la la-user"></i>
                <p>Edit Profile</p>
                <span class="badge badge-success"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="la la-files-o"></i>
                <p>Verify Certificate</p>
                <span class="badge badge-danger"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href ='index.php?logout=99'>
                <i class="la la-sign-out"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container">

 <?php
                  require 'connection.php';
                  $username=$_SESSION['username'];
                  $sql="select * from appdetails where username='$username'";
                $result= mysqli_query($connection, $sql);
                                    while ($row=mysqli_fetch_array($result)){ 

                                    if($row['status']=='submitted'){
                                      echo "Your form Already Submitted";
                                    } 
                                    else{                
                  ?>
        <div class="container col-12">        
            <form class="needs-validation"  method="POST"  id="apform" name="aform" action="savep.php">    
                
          <!--*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*++*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*--> 
         
                        <div class="card">
                           <div class="card-body">
                       
                            <h2 class="card-header">Caste Certificate</h2>
                            
                 
                               <div class="card">                
                                <div class="col-xs-12 col-sm-12 mb-3 form-group">
                                     <label class="manadatory col-form-label" for="Caste_Certificate">Caste Certificates</label>
                                     <select class=" custom-select" id="castetype" name="castetype" title="Select Caste Type" required>
                                         <option selected><?php echo $row['castetype'];?></option>
                                             <option value="">Select caste certificate</option
                                             <option value="Caste Migrant Certificate">Caste Migrant Certificate</option>
                                             <option value="Caste SC Certificate">Caste SC Certificate</option>
                                             <option value="Caste ST Certificate">Caste ST Certificate</option>
                                             <option value="Caste OBC Certificate">Caste OBC Certificate</option>
                                             <option value="Caste SBC Certificate">Caste SBC Certificate</option>
                                             <option value="Caste VJNT Certificate">Caste VJNT Certificate</option>
                                             <option value="Caste Buddhism Certificate">Caste Buddhism Certificate</option>
                                             <option value="Caste Certificate For GOI Posts">Caste Certificate For GOI Posts</option>
                                             <option value="Caste ESBC Certificate">Caste ESBC Certificate</option>
                                      </select>
                                     
                                     <div class="invalid-feedback" >please select caste</div>

                                 </div>

       
                           </div>
                       </div> 
                       
              <!--*****************************************************************************************************************-->
                                 <div class="card-header backround-color:#001b4d"><h4>Applicants Details</h4></div>
                           
            <!--*****************************************************************************************************-->       
                       
			<div class="container card">
                           <div class="card-body">
                               <div class="form-row ">
                                   <div class="form-group col-sm-2">
                                       <label for="salutation">Salutation</label>
                                       <select class="custom-select" id="salutation" name="salutation" required>
                                           <option selected> <?php echo $row['salutation'];?></option>
                                           <option>Advocate</option>
                                           <option>Kumar</option>
                                           <option>Kumari</option>
                                           <option>Mr.</option>
                                           <option>Mrs</option>
                                            <option>Shri</option>
                                             <option>Shrimati</option>
                                              </select>   
                                       <div class="invalid-feedback" >Please Select caste</div>
                                   </div>
                                   
                                   <div class="form-group col-sm-10 ">
                                       <label >Full Name(English)</label>
                                       <input type="text" class="form-control" id="fullnameEnglish" placeholder="Enter Full Name In English" name="fullnameEnglish"  value="<?php echo $row['fullnameEnglish'];?>" required readonly>
                                     
                                       <div class="invalid-feedback">
                                     Please Enter Valid name .
                                    </div>
                                   </div>
                                   
                                   <!-- <div hidden class="form-group col-sm-5">
                                           <label for="nameMarathi">Full Name(Marathi)</label>
                                           <input type="text" id="fullnameMarathi" hi class="form-control" name="fullnameMarathi" placeholder="Enter Full Name in Marathi" value="<?php echo $row['fullnameMarathi'];?>" required>
                                           <div class="invalid-feedback" >please select caste</div>
                                       </div> -->
                                       
                               </div>   
                                            
   
                                <div class="row">
                                     
                                    <div class="form-group col-sm-2">
                                        <label >Father's Salutation</label>
                                        <select class="custom-select" id="fatherSalutation" name="fatherSalutation">
                                            <option><?php echo $row['fatherSalutation'];?></option>
                                                                                 
                                          <option>Mr.</option>
                                            <option>Shri</option>
                                        </select>    
                                        
                                    </div> 
                                       
                                    <div class="form-group col-sm-10">
                                        <label >Father's Name(English)</label>
                                        <input type="text" class="form-control" id="fatherNameEnglish" placeholder="Enter Father's Name" name="fatherNameEnglish" value="<?php echo $row['fathernameEnglish'];?>" required="">
                                    </div>                                                                            
                                
<!--                                     <div hidden class="form-group col-sm-5">
                                        <label >Father's Name(Marathi)</label>
                                        <input type="text" class="form-control" id="fatherNameMarathi" placeholder="Enter Father's Name" name="fatherNameMarathi" value="<?php echo $row['fathernameMarathi'];?>" required="">
                                    </div>  -->
                                    
                                    
                                </div>
                  <!----------------------------------------------------------------------------->
                  
                                <div class="row">
                                   <div class="form-group col-sm-2">
                                           <label for="Adob">Date of Birth</label>
                                           <input type="date" id="dob" class="form-control" name="Adob" placeholder="Enter Date of Birth"  value="<?php echo $row['adob'];?>" required readonly>
                                    </div>
                                       
                                   
                                    
                                      <div class="form-group col-sm-2">
                                           <label for="mob">Mobile Number</label>
                                           <input type="tel" id="Amob" class="form-control" name="Amob" placeholder="Enter Mobile Number" value="<?php echo $row['amob'];?>" required readonly>
                                   </div>
                                    
                                    <div class="form-group col-sm-2">
                                        <label for="gender">Gender</label>
                                        <select class="custom-select" id="Agender" name="Agender" required readonly>
                                            <option><?php echo $row['Agender'];?></option>
                                            
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>  
                                    
                                     <div class="form-group col-sm-5">
                                           <label for="Aemail">Email ID</label>
                                           <input type="email" id="Aemail" class="form-control" name="Aemail" placeholder="Enter Email ID"value="<?php echo $row['aemail'];?>" required readonly>
                                   </div>
                                       
                                </div>
                  
                  <!--------------------------------------------------------------------------------->
                  
                          
                            <div class="row">
                                   <div class="form-group col-sm-2">
                                        <label for="occupation">Occupation</label>
                                        <select class=" custom-select" id="Aoccupation" name="Aoccupation" required>
                                            <option selected="selected"><?php echo $row['aoocupation'];?></option>         
                                
<option value="Artist">Artist</option>
<option value="B.A">B.A</option>
<option value="B.E">B.E</option>
<option value="Bussiness">Bussiness</option>
<option value="Doctor">Doctor</option>
<option value="Engineer">Engineer</option>
<option value="Farm Wages">Farm Wages</option>
<option value="Farmer">Farmer</option>
<option value="Government Employee">Government Employee</option>
<option value="Hardware Professional">Hardware Professional</option>
<option value="Housewife">Housewife</option>
<option value="Industrialist">Industrialist</option>
<option value="Lawyer">Lawyer</option>
<option value="Nurse">Nurse</option>
<option value="Others">Others</option>
<option value="Private Service">Private Service</option>
<option value="Professor">Professor</option>
<option value="Software Professional">Software Professional</option>
<option value="Student">Student</option>
<option value="Teacher">Teacher</option>
<option value="Wages">Wages</option>
<option value="Worker">Worker</option>
<option value="Writer">Writer</option>
</select>
 <input class="form-control" id="ApplicantOccupation" name="BasicInformation.ApplicantOccupation" value="<?php echo $row['aoocupation'];?>" type="hidden">
            </div>

                                              
                                    <div class="form-group col-sm-5">
                                        <label for="aadhar">Aadhar Number</label>
                                        <input type="text" class="form-control" id="Aadhar" placeholder="Enter 12 Digit Aadhar" name="Aadhar" value="<?php echo $row['aaadhar'];?>" required readonly>
                                    </div>                  
                                
                                     <div class="form-group col-sm-5">
                                           <label for="applicantNationality">Applicant Nationality</label>
                                           <input type="email" id="AapplicantNationality" class="form-control"  name="AapplicantNationality" value="INDIAN" readonly>
                                   </div>
                                    
                                </div>
                           </div>
                       </div>
                  <!------------------------------------------------------------------------------------>
                          
            
              <!-- ***********************************************************************************************************-->        
                        <br>   
                                <div class="bg-info text-white card-header col-sm-12">
                Address for Correspondence
            </div>
            
             
             <div class="card col-md-12">  
             <div class="alert alert-warning col-sm-12 ">
			 If State is other than Maharashtra,then district & taluka will not be available. Please mention your entire address in Address Line 2 along with state and pincode      
        </div>
            <div class="form-group required">
                    <label for="Aaddress1" class="col-md-12 col-form-label control-label">Address Line 1
                        <input type="text" class="form-control" id="Aaddress1" name="Aaddress1" placeholder="Address Line 1" value="<?php echo $row['aaddressline1'];?>" required>
                    </label>
            </div>
            
            <div class="form-group">
                    <label for="Aaddress2" class="col-md-12 col-form-label control-label">Address Line 2
                        <input type="text" class="form-control" id="Aaddress2" name="Aaddress2" placeholder="Address Line 2" value="<?php echo $row['aaddressline2'];?>" required="">
                    </label>
            
            </div> 


               


            <div class="form-group required row" >
   		    <div class="col-md-6">
   		        <label for="acountry " class="col-md-12 col-form-label control-label">Country
                            <select class="form-control custom-select" id="acountry" name="acountry" required>
                                <option ><?php echo $row['acountry'];?> </option>
       	                <option>India</option>
       	            </select>
   		        </label>
   		    </div>
   		   


   		    <div class="form group required col-md-6">
   			    <label for="astate" class="col-md-12 col-form-label control-label">State
 					<select class=" custom-select" id="astate" name="astate" required>
                                            <option selected><?php echo $row['astate'];?></option>
				<option>Maharashtra</option>
   		                <option>Other</option>
       	            </select>
                </label>
   		    </div>
   	    </div>
              

        <div class="form-group required row" >
   		    <div class="col-md-6">
   		        <label for="adistrict" class="col-md-12 col-form-label control-label">District
   			   		<select class="custom-select" id="adistrict" name="adistrict">
   		                    <option selected><?php echo $row['adistrict'];?></option>
                      <option >Ahmadnagar</option>
                      <option >Akola</option>
                      <option >Amravati</option>
                      <option >Aurangabad</option>
                      <option >Beed</option>
                      <option >Bhandara</option>
                      <option >Buldana</option>
                      <option >Chandrapur</option>
                      <option >Dhule</option>
                      <option >Gadchiroli</option>
                      <option >Gondiya</option>
                      <option  >Hingoli</option>
                      <option >Jalgaon</option>
                      <option  >Jalna</option>
                      <option >Kolhapur</option>
                      <option  >Latur</option>
                      <option  >Mumbai City</option>
                      <option >Mumbai Suburban</option>
                      <option >Nagpur</option>
                      <option >Nanded</option>
                      <option >Nandurbar</option>
                      <option >Nashik</option>
                      <option >Osmanabad</option>
                      <option >Palghar</option>
                      <option >Parbhani</option>
                      <option >Pune</option>
                      <option >Raigarh</option>
                      <option >Ratnagiri</option>
                      <option >Sangli</option>
                      <option >Satara</option>
                      <option>Sindhudurg</option>
                      <option >Solapur</option>
                      <option >Thane</option>
                      <option >Wardha</option>
                      <option >Washim</option>
                      <option >Yavatmal</option>
       	            </select>
   		        </label>
   		    </div>
       


   		    <div class="form-group required col-md-6">
   			    <label for="ataluka" class="col-md-12 col-form-label control-label">Taluka
 					<select class=" custom-select" id="ataluka" name="ataluka" required>
                                            <option selected>  <?php echo $row['ataluka'];?></option>
                                            <option>select</option>
                                      
       	            </select>
                </label>
   		    </div>
                 <div class="form-group col-md-6">
                    <label for="avillage" class="col-md-12 col-form-label control-label">Village/Town</label>
	<select class=" custom-select" id="avillage" name="avillage" required>
            <option selected><?php echo $row['avillage'];?></option>
   		                <option>--select--</option>		
       	                                   
        </select>
                 </div>
            
            <div class="form-group required col-md-6">
                    <label for="a_pincode" class="col-md-12 col-form-label control-label">Pin code</label>
                        <input type="text" class="form-control col-md-6" value="<?php echo $row['apincode'];?>" id="a_pincode" name="a_pincode" placeholder="Pin code" maxlength="6" required>
                    
            </div>
            </div>
 </div>
        
                                              
            <!--*****************************************************************************************************-->                          
                     
                       
                       <div class="card">
                           <div class="card-body">
                             <h3 class="card-header"><strong >Relation Of Beneficiary With Applicant</strong></h3>  
                             <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="relation">Relation Of Beneficiary With Applicant</label>
                                    <select class="custom-select" id="relben" name="relben" required>
                                        <option selected><?php echo $row['arelben'];?></option>
                                        <option value="Father">Father</option>
                                        <option value="Grand Daughter">Grand Daughter</option>
                                        <option value="Grand Son">Grand Son</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Nephew">Nephew</option>
                                        <option value="Niece">Niece</option>
                                        <option value="Self">Self</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Son">Son</option>
                                        <option value="Wife">Wife</option>
                                        
                                    </select>
                                </div>
                             </div>
                               
                           </div>
                           <div class="form-group" id="returndata" name="returndata"> </div>
                           </fieldset>
              <div class="" id="dis"></div>
                           
                       </div>
                       <div class="container submitBtn">
                             
                           <input type="submit" class="form-control custom-control btn btn-raised btn-success" id="addappinfo" name="addappinfo" value="Save & Next..">

                          <!-- <input type="reset"  style="display: none;" class=" btn col-md-2" id="updateappinfo" name="updateappinfo" value="Reset">
                             <a href="BeneficiaryDetail.php" class="btn btn-raised btn-primary" hidden="">Next..</a>  --> 
            
                       </div>
                    </form>

                       </div>
        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
            <script type="text/javascript">
            
            
            
            $(document).ready(function(){
             
                
            $('#adistrict').on('change',function(){
             var distID = $(this).val();
             if(distID){
            $.ajax({
                url:'getData.php',
                method:'GET',
                data: {
                    'distID':distID,
                },
                success:function(html){
                    $('#ataluka').html(html);
             
                },
    });
    }
    });
    $('#ataluka').on('change',function(){
             var subdistID = $(this).val();
             if(subdistID){
            $.ajax({
                url:'getData.php',
                method:'GET',
                data: {
                    'subdistID':subdistID,
                },
                success:function(html){
                    $('#avillage').html(html);
             
                },
    });
    }
    });

/*
             $('#apform').on('click','#addappinfo', function(event){ 
              
             
             event.preventDefault();
            
              $.ajax({  
                   url:"savep.php",  
                method:"POST", 
                   data:$('#apform').serialize(),
                   success:function(result){  
                   console.log(result);
                   //$('#myfieldset').attr("disabled","disabled");
                  // $('#addappinfo').hide();
                   //$('#updateappinfo').show();
                   //alert("Your Information Saved");
                   $('#dis').html(result);
  
                 },
                error:function(){
                    alert("Your Info Not Saved");
                  
                     },
  
   
   
     
   });*/ 
  }  
 );      
                
      
          </script>
        </div>
        
     <?php
       }
       } ?>

				</div>
				</div>
				</div>
                                
                                
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>


</body>
</html>