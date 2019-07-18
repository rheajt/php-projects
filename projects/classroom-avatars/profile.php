<?php 
include 'includes/header.html';


include 'includes/redirect_user.function.php';
if(!isset($_SESSION['email'])) {
    redirect_user();
}

include_once 'includes/avatar.class.php';

$d = 'large-avs';
$av = new Avatar($d, 'male');



 ?>



        <!-- first column -->
        <div class="col-md-4">
            <div class="imageWrapper">
                <img class="overlayImage" id="head" src="<?= $av->heads[0]; ?>">
                <img class="overlayImage" id="hair" src="<?= $av->hairs[0]; ?>">
                <img class="overlayImage" id="eyes" src="<?= $av->eyes[0]; ?>">
                <img class="overlayImage" id="mouth" src="<?= $av->mouths[0]; ?>">
                <img class="overlayImage" id="beards" src="<?= $av->beards[0]; ?>">
                <img class="overlayImage" id="accessories" src="<?= $av->accs[0]; ?>">
            </div>
            <h1 class="text-center" style="padding-top: 450px;"><?= $_SESSION['email']; ?></h1>
            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
            </div>      
        </div>

        <!-- second column -->
        <div class="col-md-8">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#basic" data-toggle="tab" aria-expanded="true">Basic</a></li>
              <li><a href="#charInfo" data-toggle="tab" aria-expanded="false">Character Info</a></li>
              <li><a href="#stats" data-toggle="tab" aria-expanded="false">Character Sheet</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="basic">
                <p>Basic information about the students character</p>
              </div>

              <div class="tab-pane fade" id="charInfo">
                <p>Lets you modify the avatar modifiers</p>
              </div>
              <div class="tab-pane fade" id="stats">
                <p>Lets you modify the avatar modifiers</p>
              </div>
            </div>
        </div>
    </div>


<?php 
include 'includes/footer.html';
 ?>