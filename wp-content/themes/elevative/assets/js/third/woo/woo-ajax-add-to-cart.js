jQuery( function( $ ) {

	if ( typeof elevativeLocalize === 'undefined' ) {
		return false;
	}

	/**
	 * AddToCartHandler class.
	 */
	var owpAddToCartHandler = function() {
		$( document.body )
			.on( 'click', '.product:not(.product-type-external) .single_add_to_cart_button:not(.disabled)', this.onAddToCart )
			.on( 'added_to_cart', this.updateButton );
	};

	/**
	 * Handle the add to cart event.
	 */
	owpAddToCartHandler.prototype.onAddToCart = function( e ) {
		e.preventDefault();

		var button 					= $( this ),
			product_id 				= $( this ).val(),
			variation_id 			= $('input[name="variation_id"]').val(),
			quantity 				= $('input[name="quantity"]').val(),
			variation_form 			= $( this ).closest( '.variations_form' ),
			variations 				= variation_form.find( 'select[name^=attribute]' ),
			item 					= {};

		button.removeClass( 'added' );
		button.addClass( 'loading' );

		if ( ! variations.length ) {
			variations = variation_form.find( '[name^=attribute]:checked' );
		}

		if ( ! variations.length ) {
			variations = variation_form.find( 'input[name^=attribute]' );
		}

		variations.each( function() {
			var $this 			= $( this ),
				attributeName 	= $this.attr( 'name' ),
				attributevalue 	= $this.val(),
				index,
				attributeTaxName;

			$this.removeClass( 'error' );

			if ( attributevalue.length === 0 ) {
				index = attributeName.lastIndexOf( '_' );
				attributeTaxName = attributeName.substring( index + 1 );
				$this.addClass( 'required error' ).before( 'Please select ' + attributeTaxName + '' );
			} else {
				item[attributeName] = attributevalue;
			}
		} );

		// Ajax action.
		if ( variation_id != '' ) {
			$.ajax ({
				url: elevativeLocalize.ajax_url,
				type: 'POST',
				data : {
			        action : 'elevative_add_cart_single_product',
			        product_id : product_id,
			        variation_id: variation_id,
			        variation: item,
			        quantity: quantity
			    },

				success:function(results) {
					$( document.body ).trigger( 'wc_fragment_refresh' );
					$( document.body ).trigger( 'added_to_cart', [ results.fragments, results.cart_hash, button ] );

					// Redirect to cart option
					if ( elevativeLocalize.cart_redirect_after_add === 'yes' ) {
						window.location = elevativeLocalize.cart_url;
						return;
					}
				}
			});
		} else {
			$.ajax ({
				url: elevativeLocalize.ajax_url,  
				type: 'POST',
				data : {
			        action : 'elevative_add_cart_single_product',
			        product_id : product_id,
			        quantity: quantity
			    },

				success:function(results) {
					$( document.body ).trigger( 'wc_fragment_refresh' );
					$( document.body ).trigger( 'added_to_cart', [ results.fragments, results.cart_hash, button ] );

					// Redirect to cart option
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						window.location = wc_add_to_cart_params.cart_url;
						return;
					}
				}
			});
		}
	};

	/**
	 * Update cart page elements after add to cart events.
	 */
	owpAddToCartHandler.prototype.updateButton = function( e, fragments, cart_hash, $button ) {
		$button = typeof $button === 'undefined' ? false : $button;

		if ( $button ) {
			$button.removeClass( 'loading' );
			$button.addClass( 'added' );

			// View cart text.
			if ( ! elevativeLocalize.is_cart && $button.parent().find( '.added_to_cart' ).length === 0 ) {
				$button.after( ' <a href="' + elevativeLocalize.cart_url + '" class="added_to_cart wc-forward" title="' +
					elevativeLocalize.view_cart + '">' + elevativeLocalize.view_cart + '</a>' );
			}
		}
	};

	/**
	 * Init owpAddToCartHandler.
	 */
	new owpAddToCartHandler();
});