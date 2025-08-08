<?php
// Get the path from the URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Set default title
$title = "Events Calendar | Chapman University";

// Define custom titles for specific paths
if (strpos($uri, 'copa') !== false) {
    $title = "College of Performing Arts Events Calendar | Chapman University";
} elseif (strpos($uri, 'argyros') !== false) {
    $title = "Argyros College of Business & Economics Events Calendar | Chapman University";
} elseif (strpos($uri, 'attallah') !== false) {
    $title =  "Attallah College of Educational Studies Events Calendar | Chapman University";
} elseif (strpos($uri, 'crean') !== false) {
    $title = "Blog";
} else {
    $title = "Events Calendar | Chapman University";
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php echo $title ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/opk5ckj.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/calendar/footer.css" rel="stylesheet" type="text/css" />
    <style>
      body, html{
        font-family: "futura-pt", sans-serif;
        background-color: #ffffff;
      }
      div.twDescription a{
        font-weight: 500 !important;
      } 
      .logo{
        width: 70%;
      }
      .bg-light{
        background-color: white !important;
        border-bottom: 1px solid #eaeaea;
      }
      .site-title{
        font-size: 1.05em;
        margin-left: 0.5em;
        text-transform: uppercase;
        color: #a50034;
      }
     .bg-dark, .text-bg-dark{
        background-color: #231F20;
      }
      .bg-sand{
        background-color: #DDCBA4;
      }
      #months{
        height: auto !important;
      }
      .btn-danger{
        background-color: #a50034;
      }
      h1{
        font-size: 2rem;
        margin: 0;
        padding: 0;
      }
      h1 a{
        color: #fff;
        text-decoration: none;
      }
      .calendars a{
        color: #a50034;
      }
    </style>
  </head>
  <body>

  <header data-bs-theme="light">
        <div class="collapse text-bg-dark" id="navbarHeader">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                <h4><strong>Discover What’s Happening at Chapman</strong></h4>
                <p>Looking for something to do on campus or around Orange? Our interactive events calendar makes it easy to explore what’s happening at Chapman University. Want to feature your event? Submit it through 25Live and help get the word out.</p>
              </div>
              <div class="col-sm-4 offset-md-1 py-4">
                <h4><strong>Explore Chapman University</strong></h4>
                <ul class="list-unstyled">
                  <li><a href="https://chapman.edu" class="text-white">Chapman Home</a></li>
                  <li><a href="https://www.chapman.edu/academics/degrees-and-programs.aspx" class="text-white">Degrees & Programs</a></li>
                  <li><a href="https://www.chapman.edu/academics/schools-colleges.aspx" class="text-white">Schools & Colleges</a></li>
                  <li><a href="https://news.chapman.edu/" class="text-white">Chapman News</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-light bg-light">
          <div class="container">
            <a href="/calendar/index.php" class="navbar-brand d-flex align-items-center">
              <img src="/calendar/Chapman_University_logo.svg" alt="chapman logo" class="logo" /> <span class="site-title">Events</span>
            </a>
            <div>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </div>
        </div>
      </header>
  