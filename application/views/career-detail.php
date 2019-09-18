<?php include("includes/header.php"); ?>
     <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Career Detail</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Career</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->
    <div class="clearfix"></div>

    <section class="carees-detailpage">   
        <div class="single-job-post-area ptb-130 ptb-sm-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#">
                                <div class="single-job-content"> 
                                    <div class="title"><span>job description</span></div>
                                    <div class="single-job-form">
                                        <p><?php echo $team_data[0]['job_description'];?> </p>
                                    </div>
                                    <div class="title"><span>Job Benefits</span></div>
                                    <div class="single-job-form">
                                        <div class="single-info">
                                            <p><?php echo $team_data[0]['job_benefits'];?></p>
                                        </div>
                                    </div>
                                    <div class="title"><span>job Requirements</span></div>
                                    <div class="single-job-form">
                                        <div class="single-info">
                                            <p class="number block"><?php echo $team_data[0]['job_requirement'];?></p>
                                        </div>
                                        <br/>
                                        <div class="buttonback">
                                            <p>Send us your CV at <a href="mailto:info@benchmark.com" class="link">info@benchmark.com</a> to grow with opportunities. We will be in touch to discuss for furthur process.</p>
                                        </div>
                                    </div> 
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
    </section>

<?php include("includes/footer.php"); ?>