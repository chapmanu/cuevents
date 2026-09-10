<?php
if (!isset($calendarWebName) || !isset($teaserBase)) {
    throw new InvalidArgumentException('trumba-spuds.php requires $calendarWebName and $teaserBase');
}

if (!isset($enableSearchUrlSync)) {
    include __DIR__ . '/trumba-config.php';
}

if ($enableSearchUrlSync) {
    include __DIR__ . '/trumba-search.php';
} else {
    $trumbaSearchTerm = '';
}

$trumbaSearchJson = json_encode($enableSearchUrlSync ? ($trumbaSearchTerm ?: '') : '');
?>
<script type="text/javascript">
(function() {
  var searchSyncEnabled = <?php echo $enableSearchUrlSync ? 'true' : 'false'; ?>;
  var initialSearch = searchSyncEnabled ? <?php echo $trumbaSearchJson; ?> : '';
  var searchUrl = initialSearch ? { search: initialSearch } : null;

  function withSearch(options) {
    if (searchUrl) {
      options.url = searchUrl;
    }
    return options;
  }

  $Trumba.addSpud(withSearch({
    webName: <?php echo json_encode($calendarWebName); ?>,
    spudType: "searchlabeled",
    spudId: "search"
  }));

  $Trumba.addSpud(withSearch({
    webName: <?php echo json_encode($calendarWebName); ?>,
    spudType: "main",
    spudId: "events"
  }));

  $Trumba.addSpud(withSearch({
    webName: <?php echo json_encode($calendarWebName); ?>,
    spudType: "datefinder",
    teaserBase: <?php echo json_encode($teaserBase); ?>,
    spudId: "dates"
  }));

  $Trumba.addSpud(withSearch({
    webName: <?php echo json_encode($calendarWebName); ?>,
    spudType: "monthlist",
    spudId: "months"
  }));

  $Trumba.addSpud({
    webName: <?php echo json_encode($calendarWebName); ?>,
    spudType: "filter",
    spudId: "calendars"
  });

  $(document).ready(function() {
    if ($('#ctl04_credit').length) {
      $('#ctl04_credit').hide();
    }
  });
})();
</script>
