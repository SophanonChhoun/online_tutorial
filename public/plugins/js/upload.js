
$('input[type=file]').change(function () {
    try{
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch(ext)
        {
            case 'jpg':
            case 'jpeg':
            case 'bmp':
            case 'png':
                break;
            default:
                alert('File type not allow');
                this.value='';
        }
    }catch(ex){
        
    }
});
$('input[name="upload"]').change(function () {
    setTimeout(function(){
        jQuery('input[name="image"]').val(jQuery('.fileinput-preview img').attr('src'));
    }, 200);
});

