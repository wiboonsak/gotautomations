<?php foreach ($quotationsDetail->result() AS $Data){}
$getproduct_data = $this->Product_model->getproduct_data($Data->product_id);
foreach ($getproduct_data->result() AS $product_data){}
?>
<style>
@media print {
    body * {
        visibility:hidden;
    }
}	
	
  </style>
<input type="hidden" name="DataId" id="DataID" value="<?php echo $DataID?>">
<input type="hidden" name="bookingID" id="bookingID" value="<?php echo $Data->quotation_id?>">
<div class="card" style="margin-top: -20px;">
   
    <div class="card-body" style="height: 100%">
		 
		<div id="printThis" >
            
			<div class="row">
                            
                            <div class="col-md-5">
					<span>
                          <img src="<?php echo base_url('HTML_2/images/logo-dark.png') ?>" alt="" width="90%" style="text-align:center" >
           			</span>
				
				</div>
			   <div class="col-md-7" style="vertical-align:middle; padding-top: 20PX;">
				<!--	<h5 class="card-title">รายละเอียดลูกค้า</h5>-->
		
		    <div class="row">
				<div class="col-4" style="text-align: right">Product : </div>
				<div class="col-8"><?php echo $product_data->name_th?></div>
		     </div>	
		    <div class="row">
				<div class="col-4" style="text-align: right">Name : </div>
				<div class="col-8"><?php echo $Data->name?></div>
		     </div>	
			 <div class="row">
				<div class="col-4"  style="text-align: right">Phone :</div>
				<div class="col-8"> <a href="tel:<?php echo $Data->phone ?>">
												<?php echo $Data->phone ?>
												</a>		
				</div>
		    </div>	
		    <div class="row">
				<div class="col-4"  style="text-align: right">Email : </div>
				<div class="col-8"><?php echo $Data->email?></div>
		    </div>	
		   <div class="row">
				<div class="col-4"  style="text-align: right">ID LINE : </div>
				<div class="col-8"><?php echo $Data->line?></div>
		    </div>	
		   <div class="row">
				<div class="col-4"  style="text-align: right">Address : </div>
				<div class="col-8"><?php echo $Data->address?></div>
		    </div>
				</div>
			</div>

		<hr>
		
		<h5 class="card-title"> Quotation Number: <span class="text-danger"><?php echo $Data->quotation_id; ?></span>&nbsp;วันที่ : <?php echo $Data->date_add?></h5>
		
		
			<div class="row">
				<div class="col-md-12">
					<table class="table" width="100%">
													<tr>
        <td colspan="2" style="background-color:#E1E1E1">Message</td>
													</tr>
                                                                                                        <tr>
                   <td><span><?php echo $Data->message?></span></td>
               </tr>

		</table>
				</div>
			</div>
		  </div>

</div>



