$(document).ready(function(){

  $.metadata.setType("html5");

  // make sure the 'compare' object is at least as big as
  // the object that called the function
  jQuery.fn.adjustHeight = function(compare) {
     if (this.height() > $(compare).height())
        $(compare).height(this.height()+25);
  };

  $('#right').adjustHeight('.content_panel');

  // tips
  $('#h_notification_num[title], #h_score[title], .user_mod_actions[title]').qtip({ style: { name: 'green', tip: true, textAlign: 'center', border: { radius: 5 } }, position: { corner: { tooltip: 'rightMiddle', target: 'leftMiddle' } } });
  $('.h_badges span[title]').qtip({ style: { name: 'green', tip: true, textAlign: 'center', border: { radius: 5 } }, position: { corner: { tooltip: 'topRight', target: 'bottomLeft' } } });
  $('.notification_clear_all[title], .notification_delete[title], .badges .name[title]').qtip({ style: { name: 'green', tip: true, textAlign: 'center', border: { radius: 5 } }, position: { corner: { tooltip: 'leftMiddle', target: 'rightMiddle' } } });
  $('.badges .in_progress[title], .badges .complete[title], .following .user_action[title]').qtip({ style: { name: 'green', tip: true, textAlign: 'center', border: { radius: 5 } }, position: { corner: { tooltip: 'bottomMiddle', target: 'topMiddle' } } });
  $('.user_link a').qtip({
    content: {
      text: '<div class="user_tab">Loading...</div>'
    },
    style: { name: 'dark', tip: true, border: { radius: 5 } },
    position: { corner: { tooltip: 'bottomMiddle', target: 'topMiddle' } },
    api: {
       beforeShow: function() {
          var url = this.elements.target.attr('alt');
          if (url != '') {
             this.loadContent(url);
          }
       },
       onContentLoad: function() {
          this.elements.target.attr('alt', '');
       }
    }
  })

  // top users tab switching
  $('.side_top_users ul li').each(function(key,value) {
    var self = $(this);
    self.click(function() {
      $('.side_top_users ul li.on').removeClass('on');
      self.addClass('on');
      $('.top_user_list.on').removeClass('on').fadeOut(200, function() {
        $(self.attr('alt')).addClass('on').fadeIn(200);
      });
    });
  });

  // user notification delete
  $('.notification_clear_all, .notification_delete').live('click', function() {
    $.post($(this).attr('href'), function(data) {
      $.each(data.ids, function(key, id) {
        $('#notification_'+id).fadeOut(300, function() {
          $(this).remove()
          $('#h_notification_num a').text(parseInt($('#h_notification_num a').text())-1)
          $('.qtip-active').fadeOut(300);
          if ($('.user_notifications > div').length == 0) {
            $('.user_notifications').append('<h6>you have no new notifications</h6>');
            $('.notification_clear_all').fadeOut(300);
          }
        })
      });
    });
    return false;
  })

  // user minifeed and following feed
  $('#user_feed_more').live('click', function() {
    var self = $(this);
    $.get(self.attr('href'), function(data){
      self.remove();
      $('.action_feed').append(data);
    })
    return false;
  });

  // user settings
  $('.settingE').change(function() {
    var self = $(this);
    $.post('/user/update_setting.json', {setting: self.metadata().setting, value: self.val()}, function(data) {
      var color;
      if (data.success)
        color = "green"
      else
        color = "red"
      self.effect('highlight', {color:color}, 2000);
    });
  });

  // user change profile picture
  if ($('#user_cpi').length > 0) {
    $('#user_cpi').uploadify({
      'uploader'    : '/js/uploadify/uploadify.swf',
      'script'      : '/user/upload_image',
      'scriptData'  : { 'userid' : $('#user_cpi').metadata().uid },
      'cancelImg'   : '/js/uploadify/cancel.png',
      'auto'        : true,
      'folder'      : '/images/profile_images',
      'sizeLimit'   : '2097152',
      'buttonText'  : 'change image',
      'onComplete'  : function(a,b,c,d) {
        $('.prof_img').attr('src', '/images/profile_images/med/' + $('#user_cpi').metadata().uid + c.name);
      }
    });
  }

  $('.user_action').live('click', function() {
    var self = $(this);
    $.post(self.metadata().url, function(data) {
      if(data.result == 'success') {
        displayNotice(data.text, 1);
        self.text(data.new_text).removeClass('user_action');
      } else if (data.result == 'error') {
        displayNotice(data.text, 0);
      } else if (data.result == 'login') {
        
      }
    });
    return false;
  })

  // limelight suggest categories dropdowns
  if ($('#model_container').length > 0) {
    $('#model_container').after('<div id="cat_C" class="rnd_5"><h2>categories</h2></div>')
    $('#cat_C').append('<div class="categories"><span class="add rnd_3">+ add</span></div>')
    $.get('/get_categories', function(data) {
      if (data.categories.length==0)
        $('.categories').append('<span class="none">no categories</span>')
      else {
        for (i=0; i<data.categories.length;i++) {
          $('.categories').append('<span data-id="'+data.categories[i].id+'" class="cat parent rndT_3">'+data.categories[i].name+'</span>')
        }
      }
    });
  }
  $('.cat.parent').live('click', function() {
    var current = $(this).parent()
    $('.categories.children, .categories.grandchildren').remove()
    current.children('.cat').removeClass('on')
    $(this).addClass('on')
    current.after('<div class="categories children"><span class="add rnd_3">+ add</span></div>')
    $.get('/get_categories', { 'id':$(this).metadata().id }, function(data) {
      if (data.categories.length==0)
        current.next().append('<span class="none">no categories</span>')
      else {
        for (i=0; i<data.categories.length;i++) {
          current.next().append('<span data-id="'+data.categories[i].id+'" class="cat child rndT_3">'+data.categories[i].name+'</span>')
        }
      }
    });
  })
  $('.cat.child').live('click', function() {
    var current = $(this).parent()
    $('.categories.grandchildren').remove()
    current.children('.cat').removeClass('on')
    $(this).addClass('on')
    current.after('<div class="categories grandchildren"><span class="add rnd_3">+ add</span></div>')
    $.get('/get_categories', { 'id':$(this).metadata().id }, function(data) {
      if (data.categories.length==0)
        current.next().append('<span class="none">no categories</span>')
      else {
        for (i=0; i<data.categories.length;i++) {
          current.next().append('<span data-id="'+data.categories[i].id+'" class="cat grandchild rndT_3">'+data.categories[i].name+'</span>')
        }
      }
    });
  })
  $('.cat.grandchild').live('click', function() {
    var current = $(this).parent()
    current.children('.cat').removeClass('on')
    $(this).addClass('on')
  })

  $('#model_container').live('click', function() {
    var self = $(this);
    $.post(self.metadata().url, function(data) {
      if(data.result == 'success') {
        displayNotice(data.text, 1);
        self.text(data.new_text).removeClass('user_action');
      } else if (data.result == 'error') {
        displayNotice(data.text, 0);
      } else if (data.result == 'login') {

      }
    });
    return false;
  })
});

// Show universal notice, type == 0 is bad, type == 1 is good
function displayNotice(text, type) {
  var elem;
  if (type == 0)
    elem = $('#ajax_error');
  else
    elem = $('#ajax_notice');

  elem.html(text).fadeIn(400, function() {
    $(this).oneTime(5000, function() {
      elem.fadeOut(400, function() {
        $(this).empty();
      });
    });
  });
}