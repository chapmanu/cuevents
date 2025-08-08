<!doctype html>
<?php include "../includes/header.php" ?>
  
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-6">
              <h1 class="text-white"><a href="/calendar/fowler/index.php">Fowler School of Engineering Events </a></h1>
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
            
            
            <div id="events"></div>
          </div>
          <div class="col-md-3">

            <label> Search & Filter Engineering Events </label>
            <div id="search">
            </div>
           
            <div id="dates" class="mt-4">
            </div>

           <!-- <div id="calendars" class="mt-4">
              
            </div>-->

            <?php include "../includes/calendar-links.php" ?>
          </div>
          
        </div>
      </div>
      <?php include "../includes/footer.php" ?>
    <script type="text/javascript">
       $Trumba.addSpud({
          webName: "engineering-event-calendar",
          spudType : "searchlabeled",
           spudId: "search"
        });

        $Trumba.addSpud({
        webName: "engineering-event-calendar",
        spudType : "main",
        spudId: "events" });

        $Trumba.addSpud({
        webName: "engineering-event-calendar",
        spudType : "datefinder" ,
        teaserBase : "/calendar/fowler/index.php",
        spudId: "dates" });

        $Trumba.addSpud({
        webName: "engineering-event-calendar",
        spudType : "monthlist", 
        spudId: "months"
        });

        $Trumba.addSpud({
        webName: "engineering-event-calendar",
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