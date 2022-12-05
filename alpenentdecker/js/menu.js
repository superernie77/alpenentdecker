var autocollapse = function (menu,maxHeight) {
    
    var nav = $(menu);
    var navHeight = nav.innerHeight();
    // menü ist 2 zeilsen groß => element ist umgebrochen worden => in das menü setzen
    if (navHeight >= maxHeight) {
        
        $(menu + ' .collapser').removeClass('d-none');
        $(".navbar-nav").removeClass('w-auto').addClass("w-100");
        
        while (navHeight > maxHeight) {
            //  add child to dropdown
            var children = nav.children(menu + ' li:not(:last-child)');
            var count = children.length;
            $(children[count - 1]).prependTo(menu + ' .collapseitems');
            navHeight = nav.innerHeight();
        }
        $(".navbar-nav").addClass("w-auto").removeClass('w-100');
        
    }
    // menü ist nur eine zeile groß
    else {
        
        var collapsed = $(menu + ' .collapseitems').children(menu + ' li');
      
        if (collapsed.length===0) {
          $(menu + ' .collapser').addClass('d-none');
        }
      
        while (navHeight <= maxHeight && (nav.children(menu + ' li').length > 0) && collapsed.length > 0) {
            //  remove child from dropdown
            collapsed = $(menu + ' .collapseitems').children('li');
            $(collapsed[0]).insertBefore(nav.children(menu + ' li:last-child'));
            navHeight = nav.innerHeight();
        }

        if (navHeight > maxHeight) { 
            autocollapse(menu,maxHeight);
        }
    }
}
