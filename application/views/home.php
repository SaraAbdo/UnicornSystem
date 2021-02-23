<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Unicorn System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/j.png" type="image/x-icon" >
		
        <!-- All Plugin Css --> 
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css">
		
		<!-- Style--> 
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/common.css">
       <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"> 
       <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/all.css" />
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome/css/fontawesome.css">

    </head>
	
    <body>
	
		<!-- Navigation Start  -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">

			<div class="container"> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>home"><h2 style="font-size: 27px"><span class="blue-color">Unicorn</span> System</h1> </a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-menu">
					   <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="<?php echo base_url();?>home"><i class="fa fa-home"></i> Home</a></li>
						</ul>
				</div>
			</div>   
		</nav>
		<!-- Navigation End  -->
		
	    <div id="page-container">
   			<div id="content-wrap">
     			<!-- page content -->
     		<section>
			<div class="container">
				<div class="section_design">	
						
					<div class="row" >
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="table_name">Unicorn Information</div>
							<table class="table table-bordered border-primary table-striped table-hover">
							  <thead>
							    <tr>
							      
							      <th scope="col">unicorn Name</th>
							      <th scope="col">Unicorn Color</th>
							      <th scope="col">Unicorn Owner</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							    <?php foreach($info['all_info'] as $value):?>
							      <td><?php echo $value['unicorn_name']?></td>
							      <td><?php echo $value['unicorn_color']?></td>
							      <td><?php echo $value['name']?></td>
							    </tr>  
							      <?php endforeach;  ?>
							     

							  </tbody>
							</table>
						</div>
					</div>
				</div>
	
		</section>


		<section >
			<div class="container">
				<div class="section_design">	
					<div class="row" >
						<div class="col-lg-12 col-md-12 col-sm-12">

							  <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
							    <label for="name" class="form-label">Unicorn name</label>
							    <input  type="text" class="form-control" id="name">
							  </div>


							  <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
							    <label for="color" class="form-label">Unicorn color</label>
							    <input type="text" class="form-control" id="color">
							  </div>
						</div>	 
					</div>	 
					<div class="row" style="margin-top: 30px " >
					    <div class="col-lg-12 col-md-12 col-sm-12">
					    	<label for="owner" class="form-label">Unicorn Owner</label>
							<select id="owner">
								<?php foreach($owners as $owner):?>
							  <option value="<?php echo $owner->id;?>"><?php echo $owner->name;?></option>
							<?php endforeach;  ?>
							  
							</select>
					     </div>
				       
			        </div>

					
					
                    <div class="row" >
					    <div class="col-lg-12 col-md-12 col-sm-12">
							<button onclick="add_new_unicorn()" class="btn btn-primary">Submit</button>
					     </div>
				       
			        </div>
			    </div>
			</div>
		</section>
 


  			</div>

			<footer>
				<div class="copy-right">
				 <p>copyright &copy; LTUC Web APP - <?php echo date('Y');?> </p>
				</div>
			</footer>
 		</div>
		 
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			
	       function add_new_unicorn()
			{

				    var name= $('#name').val();
					var color= $('#color').val();
					var owner= $('#owner').val();

					if (name==="" || color==="") {
						alert("Please fill the empty fields");
		            }
		            else
		            {
		            	$.ajax({
          
			             url:"http://localhost/TM/home/insert_info",
			             type:"POST",
			             dataType:'json',
			             data:{"name":name,"color":color, "owner":owner},
			             
			              success: function(data){
			                if(data.flag==1){
									url = "/tm/home/";
									window.location.replace(url);

			               } 
			           }
			         });
		            }

						
			}

					
					
			

		</script>

	
    </body>
</html>
