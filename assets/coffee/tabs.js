// Generated by CoffeeScript 1.8.0
(function() {
  $(function() {
    var tp_initialize_tabs, tp_set_active_tab, tp_update_tabs;
    tp_set_active_tab = function(obj) {
      obj.closest('.tabs').find('.tab').each(function() {
        return $($(this).prop('hash')).hide();
      });
      obj.closest('.tabs').find('.tab').removeClass('active');
      $(obj.prop('hash')).show();
      return obj.addClass('active');
    };
    tp_update_tabs = function() {
      return $('.tabs .tab').each(function() {
        if ($(this).prop('hash') === document.location.hash && $(this).prop('hash').length > 0) {
          return tp_set_active_tab($(this));
        }
      });
    };
    tp_initialize_tabs = function() {
      return $('.tabs .tab').each(function() {
        if ($(this).is(':first-child')) {
          $(this).addClass('active');
        } else {
          $($(this).prop('hash')).hide();
        }
        return tp_update_tabs();
      });
    };
    tp_initialize_tabs();
    $(window).on('hashchange', function() {
      return tp_update_tabs();
    });
    return $('.tabs .tab').click(function() {
      if ($(this).prop('hash') === document.location.hash && $(this).prop('hash').length > 0) {
        return false;
      }
    });
  });

}).call(this);