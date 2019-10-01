

tinymce.init({  
    selector: "textarea",
    formats: {
        removeformat: [
          {selector: 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand: true, deep : true},
          {selector: 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
          {selector: '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
        ]
      },
      toolbar: 'fontsizeselect',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      
    plugins: [
    "textcolor",
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "forecolor backcolor | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: 'kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 200,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        }
    
    
    });