//slider
const boxes = document.querySelectorAll('.expand-item');
if(boxes.length > 0){
    var currentIndex = 0; 
    function toggleActiveClass() { 
        boxes[currentIndex].classList.toggle("expand-item-active"); 
        boxes[currentIndex].classList.toggle("expand-item-unactive"); 
        currentIndex = (currentIndex + 1) % boxes.length; 
        boxes[currentIndex].classList.toggle("expand-item-unactive"); 
        boxes[currentIndex].classList.toggle("expand-item-active"); 
    } 
}
function runAnimation() { 
    setInterval(toggleActiveClass, 1500); // Thay đổi khoảng thời gian nếu cần 
} 
runAnimation(); 


/*Woo quantity*/
jQuery( function( $ ) {
  if ( ! String.prototype.getDecimals ) {
      String.prototype.getDecimals = function() {
          var num = this,
              match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
          if ( ! match ) {
              return 0;
          }
          return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
      }
  }
  function wcqi_refresh_quantity_increments(){
      $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
  }
  $( document ).on( 'updated_wc_div', function() {
      wcqi_refresh_quantity_increments();
  } );
  $( document ).on( 'click', '.plus, .minus', function() {
      // Get values
      var $qty      = $( this ).closest( '.quantity' ).find( '.qty'),
          currentVal = parseFloat( $qty.val() ),
          max          = parseFloat( $qty.attr( 'max' ) ),
          min          = parseFloat( $qty.attr( 'min' ) ),
          step      = $qty.attr( 'step' );
      // Format values
      if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
      if ( max === '' || max === 'NaN' ) max = '';
      if ( min === '' || min === 'NaN' ) min = 0;
      if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
      // Change the value
      if ( $( this ).is( '.plus' ) ) {
          if ( max && ( currentVal >= max ) ) {
              $qty.val( max );
          } else {
              $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
          }
      } else {
          if ( min && ( currentVal <= min ) ) {
              $qty.val( min );
          } else if ( currentVal > 0 ) {
              $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
          }
      }
      // Trigger change event
      $qty.trigger( 'change' );
  });
  wcqi_refresh_quantity_increments();
});

//button xem thêm 
const buttonAdd = document.querySelector('.button_readadd');
const buttonRemoveAdd = document.getElementById('button_readadd_removed');
const tabContent = document.getElementById('tab-description');
if(buttonAdd){
  buttonAdd.addEventListener( 'click',function(){
  if(tabContent.style.maxHeight =='200px'){
    tabContent.style.maxHeight='100%';
    buttonAdd.innerHTML='Thu gọn';
  }else{
    tabContent.style.maxHeight='200px';
    buttonAdd.innerHTML='Xem thêm';
  }
}
);
}

if(tabContent){
  if(tabContent.offsetHeight<200){
    buttonAdd.style.display='none';
  }
  else{
    buttonAdd.style.display='inline-flex';
  }
}


//header scoll
window.onscroll = function() {stickyMenu()};
var menu = document.querySelector('.header-container');
var sticky = menu.offsetTop+1;
console.log(sticky);
function stickyMenu() {
  if (window.pageYOffset >= sticky) {
    menu.classList.add('stuck');
  } else {
    menu.classList.remove('stuck');
  }
}
window.addEventListener('wheel', function(event) {
    if (event.deltaY < 0 && window.pageYOffset <= sticky) {
      menu.classList.remove('stuck');
    }
});
//scoll top 
jQuery(document).ready(function($) {
  $(window).scroll(function() {
      if (window.pageYOffset  > 150) {
          $('.scroll-to-top').css('display', 'block');
      } else {
          $('.scroll-to-top').css('display', 'none');
      }
  });

  $('.scroll-to-top').click(function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop: 0}, 800);
  });
});
// Lấy phần tử mà bạn muốn cuộn lên (ví dụ: body hoặc một phần tử có id)
// const element = document.querySelector('html');
// document.querySelector('.scroll-to-top').addEventListener('click', function(){
//   element.scrollIntoView({ behavior: 'smooth', block: 'start' });
// });
// Cuộn đến đầu trang
// document.querySelector('.scroll-to-top').style.scrollTop  = 0;

// Sử dụng AJAX để lấy số lượng sản phẩm trong giỏ hàng
function updateCartCount() {
    jQuery.ajax({
      url: wc_cart_params.ajax_url,
      type: 'POST',
      data: {
        action: 'get_cart_count'
      },
      success: function(response) {
        // Hiển thị số lượng sản phẩm
        jQuery('.cart-image-icon-mount').text(response);
      }
    });
  }
  // Xử lý sự kiện thêm sản phẩm vào giỏ hàng
jQuery(document).ready(function($) {
  $(document.body).on('added_to_cart', function(event, fragments, cart_hash, button) {
    updateCartCount(); // Gọi hàm updateCartCount để cập nhật số lượng sản phẩm
  });
});

  
// Gọi hàm updateCartCount khi trang web tải xong và sau mỗi lần thay đổi giỏ hàng
jQuery(document).ready(function($) {
  updateCartCount();

  // Theo dõi sự kiện thay đổi giỏ hàng sử dụng AJAX
  $(document.body).on('updated_cart_totals', function() {
    updateCartCount();
  });
});

// Xử lý sự kiện nhấp vào menu và menu đa cấp
jQuery(document).ready(function($) {
  $('.menu-toggle').on('click', function() {
    $('.mobile-menu').toggleClass('active');
  });
});
//checkout
var contentBox = document.getElementById("contentBox");
var showCoupon = document.querySelector(".showcoupon");
if(showCoupon){
  showCoupon.addEventListener("click", function(event) {
    event.preventDefault(); // Ngăn chặn hành vi gửi biểu mẫu mặc định
    if (contentBox.clientHeight) {
      contentBox.style.height = 0;
      contentBox.style.display = 'none';
      contentBox.classList.remove("has-border");
    } else {
      contentBox.style.height = 120 + "px";
      contentBox.style.display = 'block';
      contentBox.classList.add("has-border");
    }
  });
}
//end checkout
//menu mobile
const overlay = document.getElementById('overlay');
const menuMobile= document.querySelector('.mobile-menu');
const logoMenu = document.querySelector('.menu-toggle');
const removeIcon = document.querySelector('.remove-menu');
const removeCart = document.querySelector('.remove-cart');
const cartMoblie = document.querySelector('.cart-mobile');
const cartContentMoblie = document.querySelector('.cart-content-mobile');
const widgetCartMoblie = document.querySelector('.widget_shopping_cart_content');

logoMenu.addEventListener('click',function(){
  menuMobile.style.transform='translateX(0%)'; 
  menuMobile.style.transition=' transform .3s';
  overlay.classList.add('active');
});
removeIcon.addEventListener('click',function(){
  menuMobile.style.transform='translateX(-100%)'; 
  menuMobile.style.transition=' transform 0s';
  overlay.classList.remove('active');
})
removeCart.addEventListener('click',function(){
  cartContentMoblie.style.transform='translateX(+100%)';
  overlay.classList.remove('active');
});
overlay.addEventListener('click',function(){
  menuMobile.style.transform='translateX(-100%)'; 
  menuMobile.style.transition=' transform 0s';
  cartContentMoblie.style.transform='translateX(+100%)';
  overlay.classList.remove('active');
});
cartMoblie.addEventListener('click',function(){
  cartContentMoblie.style.transform='translateX(0)';
  widgetCartMoblie.classList.add('active');
  overlay.classList.add('active');
});

//ẩn số 0 trên icon giỏ hàng
document.addEventListener('DOMContentLoaded', function() {
  const mount = document.querySelector('.cart-image-icon-mount');
  const mountMobile = document.querySelector('.cart-mobile .cart-image-icon-mount');
  if(mount.innerHTML.trim() === '0' || mountMobile.innerHTML.trim() === '0') {
    mount.classList.add('hidden');
    mountMobile.classList.add('hidden');
  }else{
    mount.classList.remove('hidden');
    mountMobile.classList.remove('hidden');
  }
});

//hover overlay menu desktop
const headerVerticals = document.querySelectorAll(".header-vertical-menu");
headerVerticals.forEach(function (headerVertical) {
	headerVertical.addEventListener("mouseover", function () {
		overlay.classList.add("active");
	});
	headerVertical.addEventListener("mouseout", function () {
		overlay.classList.remove("active");
	});
});



//start sắp xếp sản phẩm trong archive-product 
jQuery(document).ready(function($) {
  $('#sort-name-asc').on('click', function(e) {
      e.preventDefault();
      filterProducts('title', 'asc');
  });

  $('#sort-name-desc').on('click', function(e) {
      e.preventDefault();
      filterProducts('title', 'desc');
  });

  $('#sort-new').on('click', function(e) {
      e.preventDefault();
      filterProducts('date', 'desc');
  });

  $('#sort-price-asc').on('click', function(e) {
      e.preventDefault();
      filterProducts('price', 'ASC');
  });

  $('#sort-price-desc').on('click', function(e) {
      e.preventDefault();
      filterProducts('price', 'DESC');
  });

  $('#reset-filter').on('click', function(e) {
      e.preventDefault();
      resetFilter();
  });

  function filterProducts(orderby, order) {
      var data = {
          action: 'filter_products',
          orderby: orderby,
          order: order
      };
      $.ajax({
          url: woocommerce_params.ajax_url,
          type: 'GET',
          data: data,
          beforeSend: function() {
              $('#product-list').html('<div class="wpc-spinner is-active">GGGGGG</div>');
              $('.loading-spinner').show();

          },
          success: function(response) {
              $('#product-list').html(response);
              $('.loading-spinner').hide();
          }
      });
  }

  function resetFilter() {
      var data = {
          action: 'reset_filter'
      };

      $.ajax({
          url: woocommerce_params.ajax_url,
          type: 'GET',
          data: data,
          beforeSend: function() {
              $('#product-list').html('<div class="wpc-spinner is-active"></div>"></div>');
          },
          success: function(response) {
              $('#product-list').html(response);
          }
      });
  }
});
//end sắp xếp sản phẩm trong archive-product 

//start coupon
function copyCouponCode(button) {
  var couponItem = button.parentElement.parentElement.querySelector('.couponItem');
  var couponCode = couponItem.innerText;

  if (navigator.clipboard && navigator.clipboard.writeText) {
    console.log(navigator)
    console.log(navigator.clipboard)
    navigator.clipboard.writeText(couponCode)
      .then(function() {
        alert('Đã copy thành công: ' + couponCode);
      })
      .catch(function(err) {
        console.error('Lỗi khi copy: ', err);
      });
  } else {
    var tempInput = document.createElement('input');
    tempInput.value = couponCode;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Đã copy thành công: ' + couponCode);
  }
}

//end coupon

//menu
jQuery(document).ready(function($) {
  $('.primary-menu .sub-menu-toggle').click(function() {
    var subMenu = $(this).siblings('.sub-menu');

    if (subMenu.is(':hidden')) {
        subMenu.css('right', '100%');
        subMenu.show();
        subMenu.animate({
            right: 0
        }, 100);
    } else {
        subMenu.animate({
            right: '100%'
        }, 100, function() {
            subMenu.hide();
        });
    }
});
   $('.primary-menu .back-to-parent').click(function() {
    // Lấy URL của menu trước đó từ ngăn xếp
    var previousMenuURL = window.history.back();

    if (previousMenuURL) {
      // Điều hướng đến URL của menu trước đó
      window.location.href = previousMenuURL;
    } else {
      // Nếu không có menu trước đó, xử lý theo nhu cầu của bạn
      // Ví dụ: Trở về trang chủ
      window.location.href = '/';
    }
  });
});
//end menu

//loc sản phẩm 
jQuery(function($) {
  // Xử lý sự kiện khi người dùng nhấp vào nút "Filter"
  $('.custom-filter-widget input[type="checkbox"]').on('change', function(e) {
      e.preventDefault();
      //lấy title
      var selectedFilters = [];
      $('.custom-filter-widget input[type="checkbox"]:checked').each(function() {
          var attributeName = $(this).attr('name');
          var attributeValue = $(this).val();
          console.log(attributeName+'='+attributeValue)
          selectedFilters.push('<li class="wpc-filter-chip">'+attributeName + ': ' + attributeValue+'<span class="wpc-chip-remove-icon">×</span></li>');
          $(document).on('click', '.wpc-chip-remove-icon', function() {
            var chipIndex = $(this).closest('.wpc-filter-chip').index();
            selectedFilters.splice(chipIndex, 1);
            $(this).closest('.wpc-filter-chip').remove();
          });
      });

      // Hiển thị các tiêu đề bộ lọc đã chọn
      $('#selectedFilters').html(selectedFilters.join(' '));
      //end title

      // Lấy các giá trị thuộc tính đã chọn
      var attributes = {
          manufacturer: [],
          price: [],
          warranty: [],
          type: []
      };
      $('.custom-filter-widget input[type="checkbox"]:checked').each(function() {
          var attributeName = $(this).attr('name');
          var attributeValue = $(this).val();
          attributes[attributeName].push(attributeValue);
          // $(this).closest('.wpc-filter-chip').find('.wpc-chip-remove-icon').click(function() {
          //   var valueIndex = attributes[attributeName].indexOf(attributeValue);
          //   if (valueIndex > -1) {
          //     attributes[attributeName].splice(valueIndex, 1);
          //   }
          //   $(this).closest('li').remove(); // Xóa phần tử li chứa wpc-chip-remove-icon
          //   $(this).closest('.custom-filter-widget').find('input[type="checkbox"][name="' + attributeName + '"][value="' + attributeValue + '"]').prop('checked', false); // Bỏ chọn checkbox tương ứng
          // });
          // console.log(attributes)
      });

      // Gửi yêu cầu AJAX để lọc sản phẩm
      $.ajax({
          url: wc_cart_params.ajax_url, // Đường dẫn đến file admin-ajax.php
          type: 'POST',
          data: {
              action: 'custom_product_filter', // Hành động xử lý yêu cầu AJAX
              attributes: attributes
          },
          success: function(response) {
              // Xử lý kết quả trả về từ yêu cầu AJAX
              if (response.success) {
                  // Hiển thị sản phẩm mới
                  $('.product-list-category .products').html(response.data.products);
              } else {
                  // Xử lý lỗi (nếu có)
                  $('.product-list-category .products').html('Không có sản phẩm phù hợp');
                  console.log(response.data.error);
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              // Xử lý lỗi (nếu có)
              console.log(textStatus + ': ' + errorThrown);
          }
      });
  });
});

//end lọc sản phẩm checkbox

//map company 
jQuery(document).ready(function($) {
  // Xử lý sự kiện khi chọn thành phố
  $('#province-store').on('change', function() {
      let provinceStore = $(this).val();
      $('#ward-store').prop('disabled', provinceStore === '');

      // Gửi yêu cầu AJAX để lấy danh sách quận
      $.ajax({
          url: wc_cart_params.ajax_url,
          type: 'POST',
          data: {
              action: 'get_districts',//gọi tới function 
              province: provinceStore//gửi dữ liệu sáng bên function và bên function dùng $_POST để nhận đúng key truyền sáng và giá trị truyền sang là provinceStore
          },
          success: function(response) {
              $('#ward-store').html(response);
          }
      });

      $.ajax({
        url: wc_cart_params.ajax_url,
        type: 'POST',
        data: {
            action: 'search_store',//gọi tới function 
            province: provinceStore//gửi dữ liệu sáng bên function và bên function dùng $_POST để nhận đúng key truyền sáng và giá trị truyền sang là provinceStore
        },
        success: function(response) {
            $('.list-store-item').html(response);
        }
    });
  });

  // Xử lý sự kiện khi chọn quận
  $('#ward-store').on('change', function() {
      var district = $(this).val();
      console.log(district);
      $.ajax({
        url: wc_cart_params.ajax_url,
        type: 'POST',
        data: {
            action: 'search_store',//gọi tới function 
            district: district//gửi dữ liệu sáng bên function và bên function dùng $_POST để nhận đúng key truyền sáng và giá trị truyền sang là provinceStore
        },
        success: function(response) {
            $('.list-store-item').html(response);
        }
    });
  });
  
});

//end map 

//menu desktop
document.addEventListener("DOMContentLoaded", function() {
  var menuItems = document.querySelectorAll(".menu-main-primary .menu-item-has-children");

  menuItems.forEach(function(menuItem) {
    var submenu = menuItem.querySelector(".sub-menu");

    if (submenu) {
      if (menuItem.closest(".sub-menu")) {//tìm phần tử cha gần nhất 
        menuItem.classList.add("submenu-icon-right");
      } else {
        menuItem.classList.add("submenu-icon-down");
      }
    }
  });
});

