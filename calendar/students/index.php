<!doctype html>
<?php include "../includes/header.php" ?>
  
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-6">
              <h1 class="text-white"><a href="<?php echo $baseUrl.'/student/index.php' ?>">Student Events </a></h1>
            </div>
            <div class="col-md-6">
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
    <script type="text/javascript">
       $Trumba.addSpud({
          webName: "student-event-calendar-2",
          spudType : "searchlabeled",
           spudId: "search"
        });

        $Trumba.addSpud({
        webName: "student-event-calendar-2",
        spudType : "main",
        spudId: "events" });

        $Trumba.addSpud({
        webName: "student-event-calendar-2",
        spudType : "datefinder" ,
        teaserBase : "<?php echo $baseUrl.'/students/index.php' ?>",
        spudId: "dates" });

        $Trumba.addSpud({
        webName: "student-event-calendar-2",
        spudType : "monthlist", 
        spudId: "months"
        });

        $Trumba.addSpud({
        webName: "student-event-calendar-2",
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