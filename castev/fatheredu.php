<?php 
  
  session_start();

  if(array_key_exists("id",$_COOKIE)){

    // if cookie exists set session id = cookie id

    $_SESSION['id']=$_COOKIE['id'];
    $_SESSION['username']=$_COOKIE['username'];

  }

  // check session id
  if(array_key_exists("id", $_SESSION)){

    //echo "<p>Logged in! </p> "; //logout=1  is a flag
  }
  else{ 
    // not logged in
    header("Location: index.php");
  }
 ?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Caste Certificate And Validity System</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="../assets/css/ready.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
        <script src="../assets/js/core/jquery.3.2.1.min.js"></script>

        <style>
         
		.form-group.required .control-label:before {
  content:"*";
  color:red;
}
  span{
     color: red;
  }
 
            </style>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
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
           <div class="card">
         <p class="bg-info text-white card-header">Applicant's Father Education Details</p>

            <div class="alert alert-warning ">
			     Please fill all the fields for Education type Primary and Secondary. To add new Education category click on "Add" button
            </div>
         <form id="eduform" name="eduform">
         <div class="card-body">

                         <div class="row " >
                <div class="form-group col-md-6">
                    
                    <label>Education Category</label>
                    <select class="custom-select" id="aeducat" name="aeducat">
                        <option>Primary</option>
                        <option>Secondary</option>
                        <option>College</option>
                    </select>
                </div>
                             <div class="form-group col-md-6" ><label>Course Name</label>
                          <input type="textarea" placeholder="Enter Course" name="aecname" id="aecname" class="form-control"> </div>
                <div class="form-group col-md-6"> <label>Institute name</label>
                  <input type="textarea" placeholder="Enter Institute Name" name="aeduiname" id="aeduiname" class="form-control"> </div>
                <div class=" form-group col-md-6"> <label>Institute Address</label>
                  <input type="textarea" placeholder="Enter Institute Address..." name="aeduiaddress" id="aeduiaddress" class="form-control"> </div>
                <div class=" form-group col-md-6"> <label>Year From</label>
                  <input type="textarea" placeholder="Enter here.." name="aeduyfrom" id="aeduyfrom" class="form-control"> </div>
                <div class=" form-group col-md-6"> <label>Year to</label>
                  <input type="textarea" placeholder="Enter here.." name="aeduyto" id="aeduyto" class="form-control"> </div>
                <input type="text" name="etype" id="etype" value="father" hidden>
            
             <button type="submit" class="btn btn-default btn-primary col-md-2" id="eduadd" name="eduadd" >Add</button>
                 <button  style="display: none;" class="btn btn-default btn-primary" id="eduupdate" name="eduupdate">Update</button>

                          
                          </div>    
     
               
             
             
                        <div class="row container">
			  <div id="education_table">
                  <table class="table table-bordered">
                      <tr>
			<th>Sr.No</th>
                          <th width="10%">Education Category</th>
                          <th width="10%">Course Name</th>
                          <th width="20%">Institute name</th>
                          <th width="20%">Institute Address</th>
                           <th width="10%">Year From</th>
                           <th width="10%">Year to</th>
                          <th >Action</th>
                      </tr>
            <?php
            require '../connection.php';
            $username=$_SESSION['username'];
			$sno = 1;
    $query= "select * from studedu where username='$username' and type='father' ORDER BY seid DESC";
     $result = mysqli_query($connection, $query);
      while($row = mysqli_fetch_array($result))
      {
        ?>
        <tr>
			<td><?php echo $sno++; ?></td>
              <td><?php echo $row['aeducat']?></td>
            <td><?php echo $row['aecname']?></td>
            <td><?php echo $row['eduiname']?></td>
            <td><?php echo $row['aeduiaddress']?></td>
            <td><?php echo $row['aeduyfrom']?></td>
            <td><?php echo $row['aeduyto']?></td>
            <td nowrap><button type="submit" class="btn btn-primary btn-edit btn-raised" id="<?php echo $row['seid']; ?>" ><i class="la la-edit "></i></button>
                <button type="button" class="btn btn-primary btn-remove btn-raised" id="<?php echo $row['seid']; ?>"><i class="la la-remove"></i></button>

                </td>
                      </tr>
                      <?php
      }

                      ?>
                  </table>
				  </div>
              </div>
         </div>
		             </form>
                             
                            
	  
			

<script>
$(document).ready(function(){
 $('#eduadd').click(function(event){  
  event.preventDefault();  
  if($('#aecname').val() == "")  
  {  
   alert("course is required");  
  }  
  else if($('#aeduiname').val() == '')  
  {  
   alert("institute name is required");  
  }  
  else if($('#aeduiaddress').val() == '')
  {  
   alert("Institute address is required");  
  }else if($('#aeduyfrom').val() == '')
  {  
   alert("from year is required");  
  }else if($('#aeduyto').val() == '')
  {  
   alert(" year to is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"./edu/eduinsert.php",  
    method:"POST",  
    data:$('#eduform').serialize(),  
  
    success:function(data){  
     $('#eduform')[0].reset();  
     console.log(data);
     //$('#add_data_Modal').modal('hide');  
     $('#education_table').html(data);  
    }  
   });  
  }  
 });
 

 var tbl_id;
$(document).on('click', '.btn-edit', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
			btn_button.html(' <i class="la la-spinner la-spin"></i> ');
			tbl_id = $(this).attr("id");
			$('.btn-reset').trigger('click');
			$.ajax({
			  cache: false,
			  url: './edu/eduselect.php', // url where to submit the request
			  type : "POST", // type of action POST || GET
			  dataType : 'json', // data type
			  data : { cmd: "get_details", tbl_id: tbl_id }, // post data || get data
			  success : function(result) {
				btn_button.html(' <i class="la la la-pencil-square-o"></i> ');
				console.log(result);
				$("#aecname").val(result['aecname']);
				$("#aeduiname").val(result['eduiname']);
				$("#aeduiaddress").val(result['aeduiaddress']);
				$("#aeduyfrom").val(result['aeduyto']);
				$("#aeduyto").val(result['aeduyto']).change();
				$('#eduadd').hide();
				$('#eduupdate').show();
			  },
			  error: function(xhr, resp, text) {
				console.log(xhr, resp, text);
			  }
			});
		});
		
  $('#eduupdate').click(function(event){   
  event.preventDefault();  
  if($('#aecname').val() == "")  
  {  
   alert("course is required");  
  }  
  else if($('#aeduiname').val() == '')  
  {  
   alert("institute name is required");  
  }  
  else if($('#aeduiaddress').val() == '')
  {  
   alert("Institute address is required");  
  }else if($('#aeduyfrom').val() == '')
  {  
   alert("from year is required");  
  }else if($('#aeduyto').val() == '')
  {  
   alert(" year to is required");  
  } 
  else  
  {  //var ed_id=$(this).attr("id");
         var aeducat=$("#aeducat option:selected").val();
	 var aecname=$('#aecname').val();
	 var eduiname=$('#aeduiname').val();
	 var aeduiaddress=$('#aeduiaddress').val();
	 var aeduyfrom=$('#aeduyfrom').val();
	 var aeduyto=$('#aeduyto').val();
	 
   $.ajax({  
    url:'./edu/eduupdate.php',  
    method:"POST",  
    data:{
		'tbl_id':tbl_id,
                'aeducat':aeducat,
		'aecname':aecname,
		'eduiname':eduiname,
                'aeduiaddress':aeduiaddress,
		'aeduyfrom':aeduyfrom,
		'aeduyto':aeduyto,
	},  
    success:function(data){  
         console.log(data);
     $('#eduform')[0].reset();   
     $('#education_table').html(data);  
	 $('#eduadd').show();
	 $('#eduupdate').hide();
    },
    error:function(data){
        console.log(data);
    },
   });  
  }  
 });
 $(document).on('click', '.btn-remove', function(e){
	 var id = $(this).attr("id");
  	$clicked_btn = $(this);
  	$.ajax({
  	  url: './edu/edudelete.php',
  	  type: 'POST',
  	  data: {
    	'delete': 1,
    	'id': id,
      'etype': father,
      },
      success: function(data){
        // remove the deleted comment
		$('#education_table').html(data);
        $clicked_btn.parent().remove();
        
      }
  	});
  });
		
});  	
</script>		
          


					
	

<form class="needs-validation" action="addfed.php" method="post" novalidate>
	<div class="container-fluid col-xl-12">
		 <div class="card col-md-12">
      
        <div class="form-group col-md-6 row" required>
 <?php
						
							$username=$_SESSION['username'];
							
							$sql1="select * from fatherdetails where username='$username'";

						$result1= mysqli_query($connection, $sql1);
					while ($row=mysqli_fetch_array($result1)){


							?>



        	<label class="col-md-3">Father's occupation</label>

          <!---  <label class="radio-inline col-md-3"><input type="radio" name="optradio">Service</label>
            <label class="radio-inline col-md-3"><input type="radio" name="optradio">Business</label>
            <label class="radio-inline col-md-3"><input type="radio" name="optradio">other</label>

					-->

					<select class="form-control custom-select" id="occupation" name="occupation" required>
   		                <option><?php echo $row['fathersoccupation'];?></option>
       	                <option>Service</option>
       	                <option>Business</option>
                        <option>Others</option>

       	            </select>



			  </div>


        <div class="form-group row" >
   		    <div class="col-md-6" required has>
   		        <label for="of_name" class="col-md-12 col-form-label control-label">Office Name</label>
   			        <input type="text" class="form-control" id="of_name" name="of_name" value="<?php echo $row['officename'];?>" placeholder="Office Name" required>
   		        <div class="invalid-feedback">Fill Office Name </div>
   		    </div>
   		    <div class="form-group col-md-6 required">
   			    <label for="designation" class="col-md-12 col-form-label">Designation</label>
 			        <input type="text" class="form-control" id="designation" name="designation" value="designation" placeholder="Designation" required>

   		    </div>
        </div>


        <div class="form-group required">
                    <label for="of_address" class="col-md-12 col-form-label control-label">Office Address</label>
                        <textarea class="form-control" rows="2" id="of_address"  name="of_address" value="" required><?php echo $row['officeaddress'];?></textarea>

        </div>


        <div class="form-group required">
                    <label for="of_number" class="col-md-6 col-form-label control-label">Office contact no</label>
                        <input type="text" class="form-control" id="of_number" name="of_number" plceholder="Office contact Number" value="<?php echo $row['officecontact'];?>" required>

        </div>



        <div class="form-group required">
                    <label for="tr_business" class="col-md-6 col-form-label control-label">Traditional Business
                        <input type="text" class="form-control" id="tr_business" name="tr_business" value="<?php echo $row['traditionalbusiness'];?>" plceholder="Office contact Number" required>
                    </label>
        </div>

    </div>
</p>




        <!-- Mention Migration Details -->
        <div class="card col-md-12">
        	<p>
        <div class="form-group col-md-12 row">
        	
        	<label class="col-md-4">Has Applicant or any member of applicant's family migrated from other state</label> 
        	      <div >
            
                                        <label class="form-radio-label"><input class="form-radio-input" type="radio"  name="ismigrated" id="ismigrated"  <?php if ($row['ismigrated'] == 'yes') {echo ' checked ';} ?> value="yes" style="margin-right: 10px"><span class="form-radio-sign">Yes</span></label>
                                     </div>
           <div >

                                        <label class="form-radio-label"><input class="form-radio-input" type="radio"  name="ismigrated" id="ismigrated"  <?php if ($row['ismigrated'] == 'no') {echo ' checked ';} ?> value="no" style="margin-right: 10px"><span class="form-radio-sign">No</span></label>
                                     </div>
           
        </div> 
        </p> 
        
        <div class="form-group col-sm-12">If migrated,</div>



        <div class="form-group row" >
   		    <div class="col-md-6">
   		    	<div class="card-header">Migration Details</div>
   		        <label for="state" class="col-md-12 col-form-label control-label">Which State?
   			   		<select class="form-control" id="mstate" name="mstate">
   		                <option> <?php echo $row['mstate'] ?></option>		
       	                 <option>Andaman and Nicobar Islands</option>
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chandigarh</option>
                                <option>Chhattisgarh</option>
                                <option>Dadra and Nagar Haveli</option>
                                <option>Daman and Diu</option>
                                <option>Delhi</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Haryana</option>
                                <option>Himachal Pradesh</option>
                                <option>Jammu and Kashmir</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Lakshadweep</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Manipur	</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Puducherry</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Tripura</option>
                                <option>Uttar Pradesh</option>
                                <option>Uttarakhand</option>
                                <option>West Bengal</option>
       	            </select>
   		        </label>
   		    </div>
   		   

          <div class="form group col-md-6">
            <label for="when" class="col-md-12 col-form-label control-label">Place
          <input type="text" class="form-control" id="mplace" name="mplace" value=" <?php echo $row['mplace'] ?>">
                </label>
          </div>
        </div>

   		    <div class="form group col-md-6">
   			    <label for="when" class="col-md-12 col-form-label control-label">When(YYYY)
 					<input type="text" class="form-control" id="mwhen" name="mwhen" placeholder="YYYY" value=" <?php echo $row['mwhen'] ?>">
                </label>
   		    </div>
   	    </div>

       
        <div class="form-group">
   		       	<label for="reason" class="col-md-12 col-form-label control-label">Reason for Migration
   			   		<select class="form-control col-md-5" id="mreason" name="mreason">
   		                <option> <?php echo $row['mreason'] ?></option>		
       	                <option>Education</option>
       	                <option>Business</option>
                        <option>Service</option>
                        <option>other</option>
       	            </select>
   		        </label>
   		</div>        
    </div>

</p>

<div class="buttonholder">
    <a href="studentedu.php" class="previous  btn btn-raised btn-primary">&laquo; Previous</a>
       	<button type="submit" class="save btn btn-success btn-raised" id="save">Save & Next..</button>
       

       </div>
</div>

	</div>
</form>
<?php
															 }
															  ?>

                                    </div>
					</div>
				</div>
				
			
	


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="../assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/js/ready.min.js"></script>
<script src="../assets/js/demo.js"></script>
</body>
</html>