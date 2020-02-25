
<!--  Header End  -->


<!-- Inner Banner Start -->
<section id="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="inner-banner-detail">					
					<h2 style="color: #1A1A1A !important">PROJECTS REFERENCE</h2>
					<h3>GOT AUTOMATION</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner Banner End -->

	
<!-- Latest News Start  -->
<section id="news" class="padding_bottom padding_top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 p-b-35">
				<div class="gym_heading">
					<p>GOT AUTOMATION</p>
					<h2>PROJECTS REFERENCE</h2>
				</div>
			</div>
		</div>

		<div class="row">                                                                                                    <?php
  $limit =''; $notUse ='';                            
$countAll=$this->Product_model->getreferenceDetail1($limit,$notUse,'-100','-100');

        $countRow = $countAll->num_rows(); 
        $totalRow = ceil($countRow/$perpage);
foreach ($referenceDetail->result() AS $data) {
    $firstImg = $this->Product_model->getreferenceImg($data->id);
    ?>
			<div class="col-md-6 col-sm-6 col-xs-12 m-t-35">
				<div class="logistic_news">
					<img src="<?php echo base_url('uploadfile/reference/') . $firstImg ?>" alt="GOT AUTOMATION">
					<div class="logistic_news_detail">
						<h3><a href="<?php echo base_url('Reference/reference_detail/').$data->id ?>"><?php echo substr_replace($data->reference_title,'....',50);?></a></h3>
						<?php echo $this->Product_model->str_limit_html($data->reference_detail,300)?>
						<span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $this->Product_model->getDayMonthYear($data->reference_date_add)?></span>
					</div>
				</div>
			</div>
<?php }?>
		</div>
		
		
		<div class="col-md-12 text-center padding-top-50">
					<nav aria-label="...">
                                             <?php 
                                                    $page2 =$page-1; 
                                                    $page3 =$page+1; 
                                                    
                                                    ?>
						<ul class="pagination">
							<li> <a href="<?php echo base_url('Reference/Page/').$page2?> " >
								<span>
                      <span aria-hidden="true">Prev</span>
								</span>
                                                                </a>
							</li>
                                                         <?php for($i=1;$i<=$totalRow;$i++){ ?>     
							<li class=" <?php if($page == $i){ echo 'active'; }?>">
                                                             <a href="<?php echo base_url('Reference/Page/').$i?>  " >
								<span><?php echo $i?><span class="sr-only">(current)</span></span>
                                                                </a>
							</li>
<?php }?>     
                                                        <li>
                                                            <a href="<?php echo base_url('Reference/Page/').$page3?> " >
								<span>
                      <span aria-hidden="true">Next</span>
								</span>
                                                                </a>
							</li>
						</ul>
					</nav>
				</div>

		
		
	</div>
</section>
<!-- Latest News End  -->

<script>

function bigImg(Oopen,Cclose){
		
	if(Cclose != '0'){	
		$("."+Cclose).css("display", "none");
		
	}
	if(Oopen != '0'){	
		$("#"+Oopen).css("display", "block");
	}
	}	

		function aaa(element){
			$("#"+element).css("display", "none");
			
		}
</script>

</body>

</html>