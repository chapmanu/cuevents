<?php 
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

include "includes/header.php" ?>

<!doctype html>
    
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-6">
              <h1 class="text-white">All Chapman Events </h1>
            </div>
            <div class="col-md-6">
              <a class="btn btn-danger float-end border-0 rounded-0" href="https://25live.collegenet.com/chapman/" target="_blank"> Submit Event </a>
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

                      <label> Search & Filter Events </label>
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

           <!-- <div id="calendars" class="mt-4">
              
            </div> -->

            <?php include "includes/calendar-links.php" ?>
          </div>
          
        </div>
      </div>
      <?php include "includes/footer.php" ?>
    
    <script type="text/javascript">
       $Trumba.addSpud({
          webName: "test-public-events-calendar",
          spudType : "searchlabeled",
           spudId: "search"
        });

        $Trumba.addSpud({
        webName: "test-public-events-calendar",
        spudType : "main",
        spudId: "events" });

        $Trumba.addSpud({
        webName: "test-public-events-calendar",
        spudType : "datefinder" ,
        teaserBase : "/calendar/index.php",
        spudId: "dates" });

        $Trumba.addSpud({
        webName: "test-public-events-calendar",
        spudType : "monthlist", 
        spudId: "months"
        });

        $Trumba.addSpud({
        webName: "test-public-events-calendar",
        spudType : "filter",
        spudId: "calendars" });
       

        $(document).ready(function() {
          if ($('#ctl04_credit').length) {
            $('#ctl04_credit').hide();
          } else {
            console.log("Element with ID 'yourID' is not loaded.");
          }
        });
     
    </script>
  </body>
</html>