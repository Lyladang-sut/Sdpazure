$("document").ready(function() {        
    // Date Picker
    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true
    });        

    // preview image
    function readURL(input,location) {
        if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(location).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $(".form-horizontal").on("change",".file-input-preview",function(){
        readURL(this,'#previewImage');
    });
    $(".form-horizontal").on("click",".btnPhotoRemove",function(){
        $("#previewImage").attr("src","http://192.168.88.2/angkordev/swisscontact/public/images/default.png");
    });
});
