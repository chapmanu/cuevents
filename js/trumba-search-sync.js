(function($) {
  var debounceTimer;

  function getSearchInput() {
    return $('#search').find('input[type="text"], input[type="search"]').first();
  }

  function updateSearchParam(term) {
    var url = new URL(window.location.href);
    var trimmed = $.trim(term);

    if (trimmed) {
      url.searchParams.set('search', trimmed);
    } else {
      url.searchParams.delete('search');
    }

    var nextUrl = url.pathname + url.search + url.hash;
    if (nextUrl !== window.location.pathname + window.location.search + window.location.hash) {
      window.history.replaceState(null, '', nextUrl);
    }
  }

  function bindSearchInput(input) {
    if (!input.length || input.data('trumbaSearchSyncBound')) {
      return;
    }

    input.data('trumbaSearchSyncBound', true);

    input.on('input change', function() {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(function() {
        updateSearchParam(input.val());
      }, 300);
    });

    input.on('keydown', function(event) {
      if (event.key === 'Enter') {
        clearTimeout(debounceTimer);
        updateSearchParam(input.val());
      }
    });

    if ($.trim(input.val()) && !new URL(window.location.href).searchParams.get('search')) {
      updateSearchParam(input.val());
    }
  }

  function watchForSearchInput() {
    var input = getSearchInput();
    if (input.length) {
      bindSearchInput(input);
      return;
    }

    var observer = new MutationObserver(function() {
      input = getSearchInput();
      if (input.length) {
        bindSearchInput(input);
        observer.disconnect();
      }
    });

    var searchContainer = document.getElementById('search');
    if (searchContainer) {
      observer.observe(searchContainer, { childList: true, subtree: true });
    }
  }

  $(document).ready(function() {
    watchForSearchInput();

    $(document).on('click', '#search a, #events a', function() {
      var linkText = $.trim($(this).text());
      if (linkText.toLowerCase() === 'clear') {
        setTimeout(function() {
          updateSearchParam('');
        }, 0);
      }
    });
  });
})(jQuery);
