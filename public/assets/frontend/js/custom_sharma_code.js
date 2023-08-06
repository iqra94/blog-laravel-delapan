$(document).ready(function(){

  loadCart()
  loadWishlist()

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function loadCart(){
    $.ajax({
      method: "GET",
      url: "/load-cart-data",
      success: function(response){
        // console.log(response.count)
        $('.count-cart').html('')
        $('.count-cart').html(response.count)
      }
    })
  }

  function loadWishlist(){
    $.ajax({
      method: "GET",
      url: "/load-wishlist-count",
      success: function(response){
        // console.log(response.count)
        $('.count-wishlist').html('')
        $('.count-wishlist').html(response.count)
      }
    })
  }

  $(document).on('click', '.addToCartBtn', function(e){  
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.prod_id').val(); 
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();
    
    // $.ajaxSetup({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   }
    // });

    $.ajax({
      method: "POST",
      url: "/add-to-cart",
      data: {
        'product_id': product_id,
        'product_qty': product_qty
      },
      success: function(response){
        swal(response.status)
        loadCart()
      }
    })
  })

  $(document).on('click', '.increment-btn', function(e){
    e.preventDefault();

    // var inc_value = $('.qty-input').val();
    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10){
      value++;
      // $('.qty-input').val(value);
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });

  $(document).on('click', '.decrement-btn', function(e){
    e.preventDefault();

    // var dec_value = $('.qty-input').val();
    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1){
      value--;
      // $('.qty-input').val(value);
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });

  // $('.delete-cart-item').click(function(e){
  $(document).on('click', '.delete-cart-item', function(e){
    e.preventDefault();

    var prod_id = $(this).closest('.product_data').find('.prod_id').val();    
    
    $.ajax({
      method: "POST",
      url: "/delete-cart-item",
      data: {
        'prod_id': prod_id,
      },
      success: function(response){
        // window.location.reload();
        loadCart()
        $('.cartitems').load(location.href +' .cartitems')
        swal('', response.status, 'success')
      }
    })
  })

  $(document).on('click', '.changeQty', function(e){
    e.preventDefault();

    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    var qty = $(this).closest('.product_data').find('.qty-input').val();
        
    $.ajax({
      method: "POST",
      url: "/update-cart-item",
      data: {
        'prod_id': prod_id,
        'prod_qty': qty,
      },
      success: function(response){
        $('.cartitems').load(location.href +' .cartitems')
      }
    })
  })

  $(document).on('click', '.addToWishlist', function(e){
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.prod_id').val(); 
    
    $.ajax({
      method: "POST",
      url: "/add-to-wishlist",
      data: {
        'product_id': product_id,
      },
      success: function(response){
        swal(response.status)
        loadWishlist()
      }
    })
  })

  $(document).on('click', '.remove-wishlist-item', function(e){
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();    
    
    $.ajax({
      method: "POST",
      url: "/remove-wishlist-item",
      data: {
        'prod_id': prod_id,
      },
      success: function(response){
        loadWishlist()
        $('.wishlistitems').load(location.href +' .wishlistitems')
        swal('', response.status, 'success')
      }
    })
  })
});