@extends('layouts.master')
@extends('layouts.navigation')
@section('content')



<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-check-circle"></i> Reservations </h1>
   
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
				
				{{ Form::open(['role' => 'form', 'url' => '/admin/manage_roles']) }}
			
			
<!--accordion container-->
<div class="container">
	<div class="panel-group" id="accordion">
				 
	<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				<span class="glyphicon glyphicon-minus"></span>
				Buyers Information
			</a>
		</h4>
		</div>
			<div id="collapseOne" class="panel-collapse collapse in">
				<div class="panel-body">
						
	<!-- container for the tab-->			
	<div class="container">

			<div class="col-md-6">
			  <h3>Buyers Information</h3>
				<!-- tabs -->
				
				<div class="tabbable">
				  <ul class="nav nav-pills" role="navigation">
				  
					<li class="active"><a href="#one" data-toggle="tab">Basic Information</a></li>
					<li><a href="#two" data-toggle="tab">Contact</a></li>
					<li><a href="#three" data-toggle="tab">Employment</a></li>
					<li><a href="#four" data-toggle="tab">Government ID</a></li>
					<li><a href="#five" data-toggle="tab"></a></li>
					
				  </ul>
				  
				  <div class="tab-content">
					
					<div class="tab-pane active" id="one">
						
						<br/>
					
						{{ Form::label('lblFullName', 'Full Name (Last Name, First Name, Middle Name)') }}
						{{ Form::text('txtFullName', null, ['placeholder' => 'Full Name', 'class' => 'form-control']) }}

								
						<br/>
								
						{{ Form::label('lblCitizenship', 'Citizenship') }}
						{{ Form::text('txtCitizenship', null, ['placeholder' => 'Citizenship', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblCivilStat', 'Civil Status') }}
						{{ Form::text('txtCivilStatus', null, ['placeholder' => 'Civil Status', 'class' => 'form-control']) }}	
							
						<br/>
						
						<div class="control-group">							
							{{ Form::label('lblGender', 'Gender') }}
							<div class="controls">
								<div id="gender" name="gender" class="btn-group" data-toggle="buttons-radio">
								
								{{ Form::button('Male', ['class' => 'btn btn-primary']) }}
								{{ Form::button('Female', ['class' => 'btn btn-primary']) }}
								
								</div>
							</div>
						
						</div> <!-- Control-group -->
						
						<br/>
					
					</div>
					
					
					<div class="tab-pane" id="two">
						
						<br/>
						
						{{ Form::label('lblHomeAdd', 'Permanent Home Address') }}
						{{ Form::text('txtHomeAdd', null, ['placeholder' => 'Home Address', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblMailAdd', 'Mailing Address') }}
						{{ Form::text('txtMailAdd', null, ['placeholder' => 'Mailing Address', 'class' => 'form-control']) }}	
								
						<br/>
						
						{{ Form::label('lblHomePhone', 'Home Phone') }}
						{{ Form::text('txtHomePhone', null, ['placeholder' => 'Home Phone', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblCellphone', 'Cellphone') }}
						{{ Form::text('txtCellphone', null, ['placeholder' => 'Cellphone', 'class' => 'form-control']) }}
					
					</div>
					

					<div class="tab-pane" id="three">
						<br/>
						
						{{ Form::label('lblOccupation', 'Occupation') }} &nbsp;					
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Self-employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Unemployed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Retired</label>
						
						<br/>
						<br/>
							
						{{ Form::label('position', 'Position') }}
						{{ Form::text('position', null, ['placeholder' => 'Position', 'class' => 'form-control']) }}
							
						<br/>
								
						{{ Form::label('lblEmpType', 'Employment Status') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Regular</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Casual</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Probationary</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Contractual</label> &nbsp;

						<br/>
						<br/>
						
						{{ Form::label('lblEmpType', 'Employment Type') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Local</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>OFW</label> &nbsp;
						

						<br/>
						<br/>
								
						{{ Form::label('company_name', 'Company Name') }}
						{{ Form::text('company_name', null, ['placeholder' => 'Company', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('company_add', 'Company Address') }}
						{{ Form::text('company_add', null, ['placeholder' => 'Company Address', 'class' => 'form-control']) }}
								
						<br/>
						
						{{ Form::label('lblBusPhone', 'Business Phone') }}
						{{ Form::text('txtBusPhone', null, ['placeholder' => 'Business Phone', 'class' => 'form-control']) }}
						
						<br/>
						
						{{ Form::label('lblEmail', 'Email') }}
						{{ Form::text('txtEmail', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}
								
						<br/>
						
					</div>
					
					<div class="tab-pane" id="four">
						
						<br/>
								
						{{ Form::label('lblPassport', 'Passport No.') }}
						{{ Form::text('txtPassport', null, ['placeholder' => 'Passport', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblIssuance', 'Place and Date of Issue') }}
						{{ Form::text('txtIssuance', null, ['placeholder' => 'Issuance', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblTin', 'TIN No.') }}
						{{ Form::text('txtTin', null, ['placeholder' => 'Tin No.', 'class' => 'form-control']) }}
					
					</div>
					
				   </div>
				   <!--tab content-->
				   
				</div>
				<!-- /tabs -->
				
				<br/>
				  			<!--div class='form-group'>
								{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
							</div-->

			</div>
	</div>
	<!--tab container-->
						
						
						
						
				</div>
			</div>
	</div>
	
	<!--accordion panel 2-->
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <span class="glyphicon glyphicon-plus"></span>
          Buyer's Representative
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
       
	  <!-- container for the tab-->			
	<div class="container">

			<div class="col-md-6">
			  <h3>Buyer's Representative</h3>
				<!-- tabs -->
				
				<div class="tabbable">
				  <ul class="nav nav-pills" role="navigation">
				  
					<li class="active"><a href="#one2" data-toggle="tab">Basic Information</a></li>
					<li><a href="#two2" data-toggle="tab">Contact</a></li>
					<li><a href="#three2" data-toggle="tab">Employment</a></li>
					<li><a href="#four2" data-toggle="tab">Government ID</a></li>
					<li><a href="#five2" data-toggle="tab"></a></li>
					
				  </ul>
				  
				  <div class="tab-content">
					
					<div class="tab-pane active" id="one2">
						
						<br/>
					
						{{ Form::label('lblFullName', 'Full Name (Last Name, First Name, Middle Name)') }}
						{{ Form::text('txtFullName', null, ['placeholder' => 'Full Name', 'class' => 'form-control']) }}

								
						<br/>
								
						{{ Form::label('lblCitizenship', 'Citizenship') }}
						{{ Form::text('txtCitizenship', null, ['placeholder' => 'Citizenship', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblCivilStat', 'Civil Status') }}
						{{ Form::text('txtCivilStatus', null, ['placeholder' => 'Civil Status', 'class' => 'form-control']) }}	
							
						<br/>
						
						<div class="control-group">							
							{{ Form::label('lblGender', 'Gender') }}
							<div class="controls">
								<div id="gender" name="gender" class="btn-group" data-toggle="buttons-radio">
								
								{{ Form::button('Male', ['class' => 'btn btn-primary']) }}
								{{ Form::button('Female', ['class' => 'btn btn-primary']) }}
								
								</div>
							</div>
						
						</div> <!-- Control-group -->
						
						<br/>
					
					</div>
					
					
					<div class="tab-pane" id="two2">
						
						<br/>
						
						{{ Form::label('lblHomeAdd', 'Permanent Home Address') }}
						{{ Form::text('txtHomeAdd', null, ['placeholder' => 'Home Address', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblMailAdd', 'Mailing Address') }}
						{{ Form::text('txtMailAdd', null, ['placeholder' => 'Mailing Address', 'class' => 'form-control']) }}	
								
						<br/>
						
						{{ Form::label('lblHomePhone', 'Home Phone') }}
						{{ Form::text('txtHomePhone', null, ['placeholder' => 'Home Phone', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblCellphone', 'Cellphone') }}
						{{ Form::text('txtCellphone', null, ['placeholder' => 'Cellphone', 'class' => 'form-control']) }}
					
					</div>
					

					<div class="tab-pane" id="three2">
						<br/>
						
						{{ Form::label('lblOccupation', 'Occupation') }} &nbsp;					
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Self-employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Unemployed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Retired</label>
						
						<br/>
						<br/>
							
						{{ Form::label('position', 'Position') }}
						{{ Form::text('position', null, ['placeholder' => 'Position', 'class' => 'form-control']) }}
							
						<br/>
								
						{{ Form::label('lblEmpType', 'Employment Status') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Regular</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Casual</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Probationary</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Contractual</label> &nbsp;

						<br/>
						<br/>
						
						{{ Form::label('lblEmpType', 'Employment Type') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Local</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>OFW</label> &nbsp;
						

						<br/>
						<br/>
								
						{{ Form::label('company_name', 'Company Name') }}
						{{ Form::text('company_name', null, ['placeholder' => 'Company', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('company_add', 'Company Address') }}
						{{ Form::text('company_add', null, ['placeholder' => 'Company Address', 'class' => 'form-control']) }}
								
						<br/>
						
						{{ Form::label('lblBusPhone', 'Business Phone') }}
						{{ Form::text('txtBusPhone', null, ['placeholder' => 'Business Phone', 'class' => 'form-control']) }}
						
						<br/>
						
						{{ Form::label('lblEmail', 'Email') }}
						{{ Form::text('txtEmail', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}
								
						<br/>
						
					</div>
					
					<div class="tab-pane" id="four2">
						
						<br/>
								
						{{ Form::label('lblPassport', 'Passport No.') }}
						{{ Form::text('txtPassport', null, ['placeholder' => 'Passport', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblIssuance', 'Place and Date of Issue') }}
						{{ Form::text('txtIssuance', null, ['placeholder' => 'Issuance', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblTin', 'TIN No.') }}
						{{ Form::text('txtTin', null, ['placeholder' => 'Tin No.', 'class' => 'form-control']) }}
					
					</div>
					
				   </div>
				   <!--tab content-->
				   
				</div>
				<!-- /tabs -->
				
				<br/>
				  			<!--div class='form-group'>
								{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
							</div-->

			</div>
	</div>
	<!--tab container-->
	   
	   
      </div>
    </div>
  </div>
  	<!--accordion panel 2-->
  
	<!--accordion panel 3-->
  	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <span class="glyphicon glyphicon-plus"></span>
         Corporate Buyer
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       
	   <!-- container for the tab-->			
	<div class="container">

			<div class="col-md-6">
			  <h3>Corporate Buyer</h3>
				<!-- tabs -->
				
				<div class="tabbable">
				  <ul class="nav nav-pills" role="navigation">
				  
					<li class="active"><a href="#one3" data-toggle="tab">Basic Information</a></li>
					<li><a href="#two3" data-toggle="tab">Contact</a></li>
					<li><a href="#three3" data-toggle="tab">Employment</a></li>
					<li><a href="#four3" data-toggle="tab">Government ID</a></li>
					<li><a href="#five3" data-toggle="tab"></a></li>
					
				  </ul>
				  
				  <div class="tab-content">
					
					<div class="tab-pane active" id="one3">
						
						<br/>
					
						{{ Form::label('lblFullName', 'Full Name (Last Name, First Name, Middle Name)') }}
						{{ Form::text('txtFullName', null, ['placeholder' => 'Full Name', 'class' => 'form-control']) }}

								
						<br/>
								
						{{ Form::label('lblCitizenship', 'Citizenship') }}
						{{ Form::text('txtCitizenship', null, ['placeholder' => 'Citizenship', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblCivilStat', 'Civil Status') }}
						{{ Form::text('txtCivilStatus', null, ['placeholder' => 'Civil Status', 'class' => 'form-control']) }}	
							
						<br/>
						
						<div class="control-group">							
							{{ Form::label('lblGender', 'Gender') }}
							<div class="controls">
								<div id="gender" name="gender" class="btn-group" data-toggle="buttons-radio">
								
								{{ Form::button('Male', ['class' => 'btn btn-primary']) }}
								{{ Form::button('Female', ['class' => 'btn btn-primary']) }}
								
								</div>
							</div>
						
						</div> <!-- Control-group -->
						
						<br/>
					
					</div>
					
					
					<div class="tab-pane" id="two3">
						
						<br/>
						
						{{ Form::label('lblHomeAdd', 'Permanent Home Address') }}
						{{ Form::text('txtHomeAdd', null, ['placeholder' => 'Home Address', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblMailAdd', 'Mailing Address') }}
						{{ Form::text('txtMailAdd', null, ['placeholder' => 'Mailing Address', 'class' => 'form-control']) }}	
								
						<br/>
						
						{{ Form::label('lblHomePhone', 'Home Phone') }}
						{{ Form::text('txtHomePhone', null, ['placeholder' => 'Home Phone', 'class' => 'form-control']) }}	
								
						<br/>
								
						{{ Form::label('lblCellphone', 'Cellphone') }}
						{{ Form::text('txtCellphone', null, ['placeholder' => 'Cellphone', 'class' => 'form-control']) }}
					
					</div>
					

					<div class="tab-pane" id="three3">
						<br/>
						
						{{ Form::label('lblOccupation', 'Occupation') }} &nbsp;					
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Self-employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Employed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Unemployed</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Retired</label>
						
						<br/>
						<br/>
							
						{{ Form::label('position', 'Position') }}
						{{ Form::text('position', null, ['placeholder' => 'Position', 'class' => 'form-control']) }}
							
						<br/>
								
						{{ Form::label('lblEmpType', 'Employment Status') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Regular</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Casual</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Probationary</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>Contractual</label> &nbsp;

						<br/>
						<br/>
						
						{{ Form::label('lblEmpType', 'Employment Type') }} &nbsp;		
						<input type="checkbox" class="faChkRnd" checked="">&nbsp;<label>Local</label> &nbsp;
						<input type="checkbox" class="faChkRnd">&nbsp;<label>OFW</label> &nbsp;
						

						<br/>
						<br/>
								
						{{ Form::label('company_name', 'Company Name') }}
						{{ Form::text('company_name', null, ['placeholder' => 'Company', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('company_add', 'Company Address') }}
						{{ Form::text('company_add', null, ['placeholder' => 'Company Address', 'class' => 'form-control']) }}
								
						<br/>
						
						{{ Form::label('lblBusPhone', 'Business Phone') }}
						{{ Form::text('txtBusPhone', null, ['placeholder' => 'Business Phone', 'class' => 'form-control']) }}
						
						<br/>
						
						{{ Form::label('lblEmail', 'Email') }}
						{{ Form::text('txtEmail', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}
								
						<br/>
						
					</div>
					
					<div class="tab-pane" id="four3">
						
						<br/>
								
						{{ Form::label('lblPassport', 'Passport No.') }}
						{{ Form::text('txtPassport', null, ['placeholder' => 'Passport', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblIssuance', 'Place and Date of Issue') }}
						{{ Form::text('txtIssuance', null, ['placeholder' => 'Issuance', 'class' => 'form-control']) }}
								
						<br/>
								
						{{ Form::label('lblTin', 'TIN No.') }}
						{{ Form::text('txtTin', null, ['placeholder' => 'Tin No.', 'class' => 'form-control']) }}
					
					</div>
					
				   </div>
				   <!--tab content-->
				   
				</div>
				<!-- /tabs -->
				
				<br/>
				  			<!--div class='form-group'>
								{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
							</div-->

			</div>
	</div>
	<!--tab container-->
	   
	   
	   
      </div>
    </div>
  </div>
  <!--accordion panel 3-->
				  
				  				  
	</div>
</div>
<!--container for accordion-->

				
	
  

  

<hr>


				
				
				
				
				
				
				{{ Form::close() }}
				
            </thead>
 
            <tbody>
            </tbody>
 
        </table>
    </div>

   
 
</div>

	
@stop