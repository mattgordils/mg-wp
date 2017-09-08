var $ = jQuery.noConflict();
HYPER = {
  ready : function (){
    this.mediaUploader();
    this.WPcolorPicker();
  },
  WPcolorPicker: function(){
    $('.color-field').wpColorPicker();
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