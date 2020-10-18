Dropzone.options.myDropzone = {
    maxFiles:20,
    timeout:120000,
    autoProcessQueue: false,
    uploadMultiple:false,
    parallelUploads:20,
    maxFilesize: 15,
    thumbnailWidth: 300,
    thumbnailHeight: 200,
    addRemoveLinks: false,
    clickable:".clickable",
    acceptedFiles: 'image/jpeg, image/png',
    dictFileTooBig: 'Image is larger than 5MB',
    dictInvalidFileType: "You can upload images only.",
    dictMaxFilesExceeded: "You can only add 20 files at once.",
    previewTemplate: document.querySelector('#preview').innerHTML,
    headers: { "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content },
    init: function () {
        var t=this;
        e=$("#upload-start");
        n=$("#upload-clear");
        o=$("#upload-done");
        r=$("#upload-has-fails");
        s=[];
        a=!1;

        e.click(function(){
            e.removeClass("live");
            n.removeClass("live");
            t.processQueue()
        });
        n.click(function(){
            t.getQueuedFiles().forEach(
                t.removeFile.bind(t)
            );
            t.getRejectedFiles().forEach(
                t.removeFile.bind(t)
            );
            s.forEach(
                t.removeFile.bind(t)
            );
            s=[];
            n.removeClass("live")
        });

        // o.click(function(){document.location.reload(false)});

        this.on("addedfile",function(){
            e.addClass("live");
            n.addClass("live")
        });

        this.on("removedfile",function(){
            t.getQueuedFiles().length||t.getRejectedFiles().length||(e.removeClass("live"),n.removeClass("live"))
        });

        this.on("maxfilesexceeded",function(e){
            i.error("You can only add "+t.options.maxFiles+" files at once.");
            t.removeFile(e)
        });

        this.on("thumbnail", function(t){
            // $(t.previewElement).removeClass("dz-preview-pending");
            $(".wall-res",t.previewElement).text(t.width+" x "+t.height)
        });

        this.on("error",function(t,e,i){
            i&&s.push(t),
            n.addClass("live"),
            $(".dz-error-message",t.previewElement).html(e['errors']['file'][0])
        });

        this.on("success",function(t){
            a=true,
            $(".remove",t.previewElement).remove()
        });

        this.on("queuecomplete",function(){
            // a&&(s.length?r.show():document.location.reload(false))
        });
    }
}


// this.on("removedfile", function (file) {
//     $.post({
//         url: '/images-delete',
//         data: {id: file.customName, _token: $('[name="_token"]').val()},
//         dataType: 'json',
//     });
// });