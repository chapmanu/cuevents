<!doctype html>
<?php include "../includes/header.php" ?>
  
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-10">
              <h1 class="text-white"><a href="<?php echo $baseUrl.'/crean/index.php' ?>">Crean College of Health and Behavioral Sciences Events</a></h1>
            </div>
            <div class="col-md-2">
              <a class="btn btn-danger float-end border-0 rounded-0" href="<?php echo $basePath.'/submit-events.php' ?>"> Submit an Event </a>
            </div>
        </div>
        </div>
      </div>

    
      <div class="container">

      <div class="row pt-4">
           <div class="col-md-9">
            <div id="months" class="mb-2 bg-sand p-3 pb-2"></div>
          </div>
          <div class="col-md-3">
            <div id="search">
            </div>
          </div>
        </div>

        <div class="row pt-4">
      
          <div class="col-md-9">            
            
            <div id="events"></div>
          </div>
          <div class="col-md-3">
           
            <div id="dates" class="mt-4">
            </div>

            <?php include "../includes/calendar-links.php" ?>
          </div>
          
        </div>
      </div>
      <?php include "../includes/footer.php" ?>
    <?php
    $calendarWebName = 'crean-event-calendar';
    $teaserBase = $baseUrl . '/crean/index.php';
    include '../includes/trumba-spuds.php';
    ?>
    
  </body>
</html>