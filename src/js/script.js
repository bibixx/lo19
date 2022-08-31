function step() {
  if ( $( ".slideshow" ).css( "display" ) === "block" ) {
    $( ".slideshow" ).removeClass( "init" );

    const $current = $( ".slideshow .current" );
    const $last = $( ".slideshow .last" );
    let $newCurrent = $current.next();
    let $newLast = $last.next();

    if ( $newCurrent.length <= 0 ) {
      $newCurrent = $( ".slideshow li:first-child" );
    }

    if ( $newLast.length <= 0 ) {
      $newLast = $( ".slideshow li:first-child" );
    }

    $current.removeClass( "current" );
    $last.removeClass( "last" );
    $newCurrent.addClass( "current" );
    $newLast.addClass( "last" );
  }
}

function checkMenuSize( sum ) {
  if ( sum + $( "nav#menu img.logo" ).outerWidth( true ) > $( "nav#menu" ).outerWidth() ) {
    $( "nav#menu img.logo" ).hide();
  } else {
    $( "nav#menu img.logo" ).show();
  }

  if ( ( sum + 24 ) > $( "nav#menu" ).outerWidth() ) {
    $( "nav#menu" ).addClass( "mobile-menu" );
  } else {
    $( "nav#menu" ).removeClass( "mobile-menu" );
  }
}

function getCookie( name ) {
  const value = `; ${document.cookie}`;
  const parts = value.split( `; ${name}=` );
  if ( parts.length === 2 ) {
    return parts.pop().split( ";" ).shift();
  }

  return false;
}

$( document ).ready( () => {
  let sum = $( "nav#menu ul.nav.menu" ).css( "margin-right" ).replace( "px", "" ) * 1;

  $( "nav#menu.loading" ).removeClass( "loading" );

  $( "nav#menu ul.nav.menu > li" ).each( function () {
    sum += $( this ).outerWidth( true );
  } );

  checkMenuSize( sum );

  $( window ).on( "resize", () => {
    checkMenuSize( sum );
  } );

  if ( !getCookie( "cookieApproved" ) ) {
    const cookieText = "<button class=\"close-btn\"><i class=\"fa fa-times\"></i></button><p>Ta strona używa plików cookie w celu usprawnienia i ułatwienia dostępu do serwisu oraz prowadzenia danych statystycznych. Dalsze korzystanie z tej witryny oznacza akceptację tego stanu rzeczy. Możesz samodzielnie decydować o tym czy, jakie i przez jakie witryny pliki cookie mogą być zamieszczana na Twoim urządzeniu. Przeczytaj: <a href=\"http://jakwylaczyccookie.pl\" target=\"_blank\">jak wyłączyć pliki cookie</a>. Szczgółowe informacje na temat wykorzystania plików cookie znajdziesz w <a href=\"/polityka-cookies\">Polityce Cookie</a>.</p>";
    const $cookieNotice = $( "<div></div>" ).addClass( "cookie-notice" ).html( cookieText );
    $( "body > nav" ).after( $cookieNotice );

    $cookieNotice.children( ".close-btn" ).click( () => {
      $cookieNotice.addClass( "closed" );
      const date = new Date();
      date.setDate( date.getDate() + 3650 );

      document.cookie = `cookieApproved=true; expires=${date}`;
    } );
  }

  $( ".nav li" ).on( "click", function ( e ) {
    if ( $( document ).width() <= 991 ) {
      $( this ).siblings( "li" ).removeClass( "open" );
      if ( $( this ).children( ".submenu" ).length > 0 && !$( this ).hasClass( "open" ) ) {
        e.preventDefault();
        $( this ).addClass( "open" );
        $( this ).children( "a" ).blur();
      }
    }
  } );

  $( ".container > .row > main article table" ).each( function () {
    if ( !$( this ).parent().hasClass( "table-responsive-container" ) ) {
      const trc = $( "<div></div>" ).addClass( "table-responsive-container" );
      $( this ).before( trc );
      $( this ).appendTo( trc );
    }
  } );


  const slideshowDuration = 5000;

  $( ".slideshow li:first-child" ).addClass( "current" );
  $( ".slideshow li:last-child" ).addClass( "last" );

  setInterval( step, slideshowDuration );
} );
