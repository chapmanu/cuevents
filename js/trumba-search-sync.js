(function(window) {
  'use strict';

  function updateSearchParam(term) {
    var url = new URL(window.location.href);
    var trimmed = (term || '').replace(/^\s+|\s+$/g, '');

    if (trimmed) {
      url.searchParams.set('search', trimmed);
    } else {
      url.searchParams.delete('search');
    }

    var nextUrl = url.pathname + url.search + url.hash;
    var currentUrl = window.location.pathname + window.location.search + window.location.hash;

    if (nextUrl !== currentUrl) {
      window.history.replaceState(window.history.state, '', nextUrl);
    }
  }

  function getSearchFromSpuds() {
    if (!window.$Trumba || !$Trumba.Spuds || !$Trumba.Spuds.controller) {
      return '';
    }

    var controller = $Trumba.Spuds.controller;
    var spudIds = ['events', 'search'];
    var i, spud, term;

    for (i = 0; i < spudIds.length; i++) {
      spud = controller.getSpudById(spudIds[i]);
      if (spud && spud.queryString && typeof spud.queryString.getValue === 'function') {
        term = spud.queryString.getValue('search');
        if (term) {
          return term;
        }
      }
    }

    return '';
  }

  function syncFromSpuds() {
    updateSearchParam(getSearchFromSpuds());
  }

  function bindSpudArgumentListener(spud) {
    if (!spud || !spud.addEventListener || spud._trumbaSearchSyncBound) {
      return;
    }

    spud._trumbaSearchSyncBound = true;
    spud.addEventListener('onargumentchanged', function(args) {
      if (args && args.name === 'search') {
        window.setTimeout(syncFromSpuds, 0);
      }
    });
  }

  function initSearchSync() {
    if (!window.$Trumba || !$Trumba.Spuds || !$Trumba.Spuds.controller) {
      window.setTimeout(initSearchSync, 50);
      return;
    }

    var controller = $Trumba.Spuds.controller;

    if (controller._trumbaSearchSyncInit) {
      return;
    }
    controller._trumbaSearchSyncInit = true;

    controller.addEventListener('navigate', function() {
      window.setTimeout(syncFromSpuds, 50);
    });

    bindSpudArgumentListener(controller.getSpudById('events'));
    bindSpudArgumentListener(controller.getSpudById('search'));

    syncFromSpuds();
  }

  window.TrumbaSearchSync = {
    init: initSearchSync,
    syncFromSpuds: syncFromSpuds
  };

  if (window.jQuery) {
    window.jQuery(initSearchSync);
  } else {
    initSearchSync();
  }
})(window);
