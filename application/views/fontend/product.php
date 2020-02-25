
<!--  Header End  -->
<style>
    
    .isDisabled {
  pointer-events: none;
  cursor: not-allowed !important;
  opacity: 0.5;
  text-decoration: none;
}
</style>

<!-- Inner Banner Start -->
<section id="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="inner-banner-detail">					
					<h2 style="color: #1A1A1A !important"><?php echo $cateGoryName?></h2>
					<h3>GOT AUTOMATION</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner Banner End -->


<!--  Shop Start  -->
<section id="shop-section" class="padding_top">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				
				<div class="shop-sidebar-box">
					<h3>Categories</h3>
					<ul class="blog-sidebar-category">
                                             <?php 
                                                    foreach ($categoryList->result() AS $data){
                                                    ?>
							<li><a href="<?php echo base_url('Product/category/').$data->id ?>"><?php echo $data->category_title?></a></li>
						
                                                    <?php }?>
					</ul>					
				</div>
				
				<div class="shop-sidebar-box">
					<h3>Search Now</h3>
					<form class="blog-sidbar-search">
						<input type="search" name="searchinput" id="searchtext" class="form-control" placeholder="Search key words...">
                                                <button onclick="searchinput1()" type="button" id="searchinput" class="btn btn-warning" style="width:100%">Search Now</button>
					</form>
				</div>

				
			</div>
                    <div class="col-md-9 col-sm-9 col-xs-12" >
				<div class="blog-box" id="searchID">
					<div class="row heading_space">
						<div class="col-md-12">
							<div class="commerce_heading">
								<h2><?php echo $cateGoryName?></h2>
							</div>
						</div>
					</div>
					<div class="row">
<?php   $cateGoryID = $this->uri->segment(3);  $limit =''; $notUse ='';
$countAll=$this->Product_model->productListByCate($cateGoryID,$limit,$notUse,'-100','-100');

        $countRow = $countAll->num_rows(); 
        $totalRow = ceil($countRow/$perpage);
foreach ($productList->result() AS $productList2) {
    $firstImg = $this->Product_model->getFirstImg($productList2->id);
    ?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="product_box web_box">
								<figure class="wpf-demo-6">
<!--									<span class="product_tag_yellow">NEW</span>-->
                                                                        <a href="<?php echo base_url('uploadfile/product/').$firstImg?>" target="_blank"><img src="<?php echo base_url('uploadfile/product/').$firstImg?>" style="width:100%;height: 190px"alt="Owl Image">
									</a>
									<figcaption class="view-caption">
										<div class="overly_bg">
											<a data-fancybox="gallery" href="<?php echo base_url('uploadfile/product/').$firstImg?>" target="_blank" class="overlay_search"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
											<a href="<?php echo base_url('Product/product_detail/') .$productList2->product_category .'/'.$productList2->id ?>" class="overlay_link"><i class="fa fa-external-link" aria-hidden="true"></i></a>
										</div>
									</figcaption>
								</figure>
								<div class="product_detail">
									<a href="<?php echo base_url('Product/product_detail/') .$productList2->product_category .'/'.$productList2->id ?>">
										<h3><?php echo $productList2->product_nameen?></h3>
									</a>
									<img src="<?php echo base_url('HTML/images/line.png')?>" alt="image">
									<span><?php echo $productList2->product_nameth?></span>									
								</div>
							</div>
						</div>
<?php }?>	
					</div>
					
<?php if($countRow>0){?>
                                    <div class="col-md-12 text-center padding-top-50">
					<nav aria-label="...">
                                             <?php 
                                                    $page2 =$page-1; 
                                                    $page3 =$page+1; 
                                                    
                                                    ?>
						<ul class="pagination">
							<li <?php if($page == 1){?>class="isDisabled"<?php }?>> <a href="<?php echo base_url('Product/category/').$cateGoryID.'/'.$page2?> " >
								<span>
                      <span aria-hidden="true">Prev</span>
								</span>
                                                                </a>
							</li>
                                                         <?php for($i=1;$i<=$totalRow;$i++){ ?>     
							<li class="active">
                                                             <a href="<?php echo base_url('Product/category/').$cateGoryID.'/'.$i?> " class=" <?php if($page == $i){ echo 'active'; }?>">
								<span><?php echo $i?><span class="sr-only">(current)</span></span>
                                                                </a>
							</li>
<?php }?>     
                                                        <li <?php if($totalRow == 1){?>class="isDisabled"<?php }?>>
                                                            <a href="<?php echo base_url('Product/category/').$cateGoryID.'/'.$page3?> " >
								<span>
                      <span aria-hidden="true">Next</span>
								</span>
                                                                </a>
							</li>
						</ul>
					</nav>
				</div>
<?php }?>	
                                    
				</div>
			</div>
		</div>
	</div>
</section>
<!--  Shop End  -->
 

	