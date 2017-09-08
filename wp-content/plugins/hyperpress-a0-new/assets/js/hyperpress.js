var $ = jQuery.noConflict();
HYPER = {
  ready : function (){
    this.mediaUploader();
    this.WPcolorPicker();
    this.addToggleButtons();
    this.createSearchBar();
    this.addBodyClass();
    this.filterOnChange();
    this.fajax.actions();
    this.checkAdminMenu();
    this.screenOpToggle();
  },
  load : function () {
    this.wrapCheckboxesRadios();
    this.wrapTableHeaders();
    this.addColumnIcon();
    this.fajax.load();
  },
  checkAdminMenu : function(){
    $('#adminmenu li.wp-first-item').find('a').attr('target', '_blank');
    if (($('#adminmenuwrap').height() + $('hyperpress-logout').height()) > $(window).height()){
      $('#adminmenuwrap').addClass('unfixed');
    }else{
      $('#adminmenuwrap').removeClass('unfixed');
    }
    $('.hyperpress-logout').appendTo('#adminmenuwrap');
  },
  resize : function(){
    this.checkAdminMenu();
  },
  fajax : {
    load : function(){
      $('html').addClass('loaded');
      $('#pageLoader').css({'padding-left': this.scrollbarWidth()});
    },
     actions : function(){
      fajax = this;
      var siteURL = "http://" + top.location.host.toString(),
          pathName = (top.location.pathname.match(/[^\/]+$/)) ? top.location.pathname.match(/[^\/]+$/)[0] : '',
          $internalLinks = $('a[href!=""][target!="_blank"]');//$("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
      // $internalLinks.click(function(event){
      //   event.preventDefault();
      //   fajax.gotoLink($(this).attr('href'));
      // });
      $('#adminmenu > li').click(function(){
        $(this).addClass('fj-active');
      });
      $('.wp-has-submenu.wp-not-current-submenu').click(function(){
        clickedli =$(this);
        $('.wp-has-submenu.wp-has-current-submenu').addClass('fj-close-menu');
        $('#adminmenu > li').addClass('fj-inactive');
        setTimeout(function(){
          clickedli.addClass('fj-open-menu');
          clickedli.addClass('fj-active');
        },500);
      });
    },
    gotoLink : function(link){
      $('body').css({'overflow-y':'scroll'});
      $('html').removeClass('loaded');
      setTimeout(function(){
        $('#pageLoader').css({'padding-left': 0});
        $('body').css({'overflow-y':'hidden'});
      },500);
      setTimeout(function(){
        window.location = link;
      },750);
    },
    scrollbarWidth : function() {
      var parent, child, width;
      if (width === undefined){
        parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');
        child=parent.children();
        width=child.innerWidth()-child.height(99).innerWidth();
        parent.remove();
      }
      return width;
     },
  },
  addColumnIcon : function(){
    function getURLParameter(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
        );
    }
    var typeName = getURLParameter('post_type');
    $('#adminmenu li a[href*="post_type='+typeName+'"]').find('.wp-menu-image').clone().appendTo('tbody .column-post_thumb');
  },
  addBodyClass : function(){
    var loc = window.location.href;
    var output  = loc.split('/').pop().split('.').shift();
    $('body').addClass('page-'+output);
  },
  filterOnChange : function(){
    $('#filter-by-date').change(function(){
      $(this).closest('form').submit();
    });
  },
  screenOpToggle : function(){
    $('#wpfooter').html('<a id="hyperpress-screen-option-toggle" title="Screen Options">Screen Options</a>');
    $('#hyperpress-screen-option-toggle').click(function(){
      $('body').toggleClass('hyperpress-screen-options-open');
    });
    if ($('body.hyperpress-screen-options-open')){
      $('#pageLoader').click(function(){
        $('body').removeClass('hyperpress-screen-options-open');
      });
    }
  },
  addToggleButtons : function(){
    $('.wrap h2').prepend('<div id="menu-toggle"><span></span><span></span><span></span></div>');
    $('.wrap h2 a').after('<div id="filter-toggle"><span>Filter</span></div>');
    $('.wrap h2 a').append('<span>New</span>')
    $('#filter-toggle').click(function(){
      $('body').toggleClass('hyperpress-filters-open');
    });
    $('#menu-toggle').click(function(){
      $('body').toggleClass('hyperpress-menu-open');
    });
  },
  createSearchBar : function(){
    $('p.search-box').wrap('<div class="hyperpress-filters"></div>');
    $('label[for="filter-by-date"]').parent('.actions').appendTo('.hyperpress-filters');
    $('.subsubsub').appendTo('.hyperpress-filters');
  },
  WPcolorPicker: function(){
    $('.color-field').wpColorPicker();
  },
  wrapCheckboxesRadios : function(){
    $('input[id*=select-all]').click(function(){
      if ($(this).prop('checked')){
        $(this).closest('table').find('tbody .check-column input[type=checkbox]').addClass('checked');  
      }else{
        $(this).closest('table').find('tbody .check-column input[type=checkbox]').removeClass('checked');  
      }
    });
    number=0;
    $('html').find('input[type=checkbox],input[type=radio]').each(function(){
      number++;
      var id = $(this).attr('id') || 'id_' + number;
      if (!$(this).attr('id')){
        $(this).attr('id', 'id_' + number);
      }
      $('label[for='+id+']').remove();
      $(this).after('<label for="'+id+'"><span></span></label>')
    });
  },
  wrapTableHeaders : function(){
    $('html').find('table.wp-list-table thead tr th').each(function(){
      var title = $(this).html();
      $(this).append('<div>'+ title+'</div>');
    });
  },
  mediaUploader : function(){
    var custom_uploader;
    $('#upload_button').click(function(e) {
      e.preventDefault();

      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {text: 'Choose Image'},
        multiple: false
      });

      custom_uploader.on('select', function() {
        attachment = custom_uploader.state().get('selection').first().toJSON();
        $('#image_field').val(attachment.url);
        $('#image').attr('src', attachment.url);
      });

      if (custom_uploader) {
        custom_uploader.open();
        return;
      }else{
        custom_uploader.open();  
      }
    });
  }
};

$(document).ready(function(){
  HYPER.ready();      
});

$(window).load(function(){
  HYPER.load();      
});

$(window).resize(function(){
  HYPER.resize();      
});