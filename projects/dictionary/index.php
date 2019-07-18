<?php 
$page_title = "Dictionary";
include 'includes/header.html';

 ?>
<div class="container-fluid">
    
    <div class="row">
        <div class="search-box">
            <h1>Dictionary Search <small>Enter a list of words below</small></h1>
            <form id="search" action="">
                <div class="input-group">
                  <input type="text" class="form-control" id="words" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" id="search-button" type="submit">Go!</button>
                  </span>
                </div><!-- /input-group -->
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="results-box">
            
        </div>
    </div>
    
</div>


<?php include 'includes/footer.html'; ?>