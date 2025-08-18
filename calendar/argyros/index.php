<!doctype html>
<?php include "../includes/header.php" ?>
  
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-9">
              <h1 class="text-white"><a href="<?php echo $baseUrl.'/argyros/index.php' ?>">Argyros College of Business & Economics </a></h1>
            </div>
            <div class="col-md-3">
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
          webName: "argyros-event-calendar",
          spudType : "searchlabeled",
           spudId: "search"
        });

        $Trumba.addSpud({
        webName: "argyros-event-calendar",
        spudType : "main",
        spudId: "events" });

        $Trumba.addSpud({
        webName: "argyros-event-calendar",
        spudType : "datefinder" ,
        teaserBase : "<?php echo $baseUrl.'/argyros/index.php' ?>",
        spudId: "dates" });

        $Trumba.addSpud({
        webName: "argyros-event-calendar",
        spudType : "monthlist", 
        spudId: "months"
        });

        $Trumba.addSpud({
        webName: "argyros-event-calendar",
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