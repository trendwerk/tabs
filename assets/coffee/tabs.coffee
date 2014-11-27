$ ->
	
	tp_set_active_tab = ( obj ) ->
		obj.closest( '.tabs' ).find( '.tab' ).each -> 
			$( $( this ).prop( 'hash' ) ).hide()

		obj.closest( '.tabs' ).find( '.tab' ).removeClass( 'active' )
		
		$( obj.prop( 'hash' ) ).show()
		obj.addClass( 'active' )

	tp_update_tabs = () ->
		$( '.tabs .tab' ).each ->	
			if( $( this ).prop('hash') == document.location.hash && $( this ).prop( 'hash' ).length > 0 )
				tp_set_active_tab( $( this ) )
	
	tp_initialize_tabs = () ->
		$('.tabs .tab').each ->	
			if( $( this ).is( ':first-child' ) )
				$( this ).addClass( 'active' )
			else
				$( $( this ).prop( 'hash' ) ).hide()
			
			tp_update_tabs()
	
	tp_initialize_tabs()
	
	$( window ).on 'hashchange', ->
		tp_update_tabs()
	
	$( '.tabs .tab' ).click ->
		if( $( this ).prop( 'hash' ) == document.location.hash && $( this ).prop( 'hash' ).length > 0 )
			return false
