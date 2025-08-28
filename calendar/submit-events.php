<?php 
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
include "includes/header.php" ?>

<style>
  h2{
    font-size: 24px;
    font-weight: bold;
  }
  h3{
    font-size: 20px;
    font-weight: 600;
  }
  hr{
    margin: 2rem 0;
  }
</style>

<!doctype html>
    
      <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-3">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-white">FAQ - Adding Public Events to 25Live</h1>
            </div>
           
        </div>
        </div>
      </div>

    
      <div class="container">
        <div class="row pt-4">
           <div class="col-md-12">


            <h2>How Do I Add An Event to the Event Calendar?</h2>
            <p>The public events calendar pulls events directly from 25Live. To add an event to the calendar, the event must be created in 25Live with Public as the Event Type.  Once the event has been confirmed, the event will appear on the public events calendar. </p>
            <a class="btn btn-danger border-0 rounded-0" href="https://25live.collegenet.com/chapman/" target="_blank"> Login to Submit an Event </a>
            <hr />
            <h2>Which Fields Appear on the Event Calendar?</h2>
            <p>The following 25Live fields are pushed to the event calendar:</p>
             <h3> Required Fields</h3>
            <ul>
              <li>Event Title</li>
              <li>Event Description</li>
              <li>Event Host (displays as Organization on the calendar)</li>
             <li>Event Date and Time</li>
             <li>Event Location(s)</li>
            </ul>
           <h3> Optional Fields (under Event Custom Attributes)</h3>
              <ul>
                <li>Event Image – Thumbnail-sized image that displays in the list of events. See How Do I Add Images to an Event for more information.</li>
                <li>Detail Image – Larger-sized banner image that displays on the event description page. See How Do I Add Images to an Event for more information.</li>
                <li>Open To – event audience; check all that apply</li>
                <li>RSVP is Required? – Yes/No</li>
                <li>Registration Link – on the toggle, select Link and enter the registration link. If the Ticketing Office is managing registration, please contact them to confirm the registration link. </li>
              </ul>

              <hr />

              <h2>How Do I Add Images to an Event?</h2>
              <p>The Event Custom Attributes in 25Live, Event Image and Detail Image, can be used to add images to an event. </p>
	            <h3>Event Image </h3>
              
              <div class="row mb-4">
                 <div class="col-md-6">
              <p>A thumbnail-sized image that appears at the bottom of each event listing; it also appears on the event description page if a Detail Image isn’t provided. Minimum size: 250x250px (images larger than 250px wide will be automatically resized).</p>
              </div>
              <div class="col-md-6">
                  <img src="event-thumbnail.png" alt="Event Thumbnail Example" class="w-100" />
              </div>
             
              </div>    
              
             
              <h3>Detail Image</h3>
              <div class="row mb-4">
                 <div class="col-md-6">
              <p>Larger-sized banner image that appears on the event description page. It overrides the Event Image on the event description page. Recommended size: 1200x400 (images larger than 400px high will be automatically resized).</p>
              </div>
              <div class="col-md-6">
                <img src="detailed-event.png" alt="Event Detail Image Example" class="w-100" />
              </div>
             
              </div>    
             
              <h3>Adding an Event Image or Detail Image</h3>

              <div class="row mb-4">
                <div class="col-md-6">
              <p>On the 25Live event form, <strong>Event Type must be set as Public</strong> for the two image fields to appear on the event form.</p>
              </div>
              <div class="col-md-6">
              <img src="event2.png" alt="Image Example 2" class="w-100" />
              </div>
              </div>   


              <div class="row mb-4">
                <div class="col-md-6">
                  <h3> Uploading an Image </h3>
                  <p>Click <strong>Add</strong> to upload an image or enter an image URL in the text box.</p>
                  <p>A pop-up window will appear, giving you the option to <strong>Upload</strong> an image or <strong>Select</strong> an image already uploaded to 25Live..</p>
                  <p>Set the <strong>toggle to Upload</strong></p>
<p>Enter <strong>Image Name</strong> – recommended naming convention is event date (YYYY-MM-DD), event title, and the type of image (e.g., 2025-05-23 University Commencement event image; 2025-05-23 University Commencement detail image)</p>
<p>Add an <strong>Image Description</strong> (optional)</p>
<p><strong>Image Type</strong>: Photograph</p>
<p>Click the <strong>white Upload button</strong> to select the image on your computer to upload. A preview of the image will appear.</p>
<p>Click the <strong>blue Upload button</strong> to upload the image.</p>

                </div>
                <div class="col-md-6">
                  <img src="event3.png" alt="Image Example 3" class="w-100" />
                  <p><strong>Note:</strong> 25Live allows duplicate Image Names; using the naming convention for Image Name will help prevent duplicates and make it easier to identify images.</p>
                </div>
              </div>   

              <div class="row mb-4">
                <div class="col-md-6">
                  <h3>Selecting an Image</h3>
                  <p>Set the <strong>toggle to Select</strong> and click the image name to see a preview of the image.</p>
                  <p>Click <strong>Select</strong> to add the image.</p>

                </div>
                <div class="col-md-6">
                  <img src="event4.png" alt="Image Example 4" class="w-100" />
                </div>
              </div>   


              <hr />

              <h2>How Do I Make Changes to Events on the Event Calendar?</h2>
                <p>To edit events on the event calendar, the changes must be made in 25Live. Changes cannot be made on events.chapman.edu.</p>
                <p><strong>Note:</strong> If you want to replace an existing Event Image or Detail Image, the filename must be updated as well. If the existing and new filenames are the same, the calendar will not detect a change, and the image will not be updated.</p>
              
              <hr />
              <h2>How Long Will It Take for My Changes to Appear Online?</h2>
              <p>It can take up to 10 minutes for the changes made in 25Live to appear on the calendar. </p>

              <a class="btn btn-danger border-0 rounded-0" href="https://25live.collegenet.com/chapman/" target="_blank"> Login to Submit an Event</a>


          </div>
          
        </div>
      </div>
      <?php include "includes/footer.php" ?>
    
   
  </body>
</html>