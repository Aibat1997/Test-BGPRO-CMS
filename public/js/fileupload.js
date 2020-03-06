$.fn.fileUploader = function (filesToUpload) {
    this.closest(".files").change(function (evt) {

        for (var i = 0; i < evt.target.files.length; i++) {
            filesToUpload.push(evt.target.files[i]);
        }
        var output = [];

        for (var i = 0, f; f = evt.target.files[i]; i++) {
            var removeLink = "<a class=\"removeFile text-danger\" href=\"#\" data-fileid=\"" + i + "\">&#10005;</a>";

            output.push("<li><strong>", escape(f.name), "</strong> - ",
                f.size, " bytes. &nbsp; &nbsp; ", removeLink, "</li> ");
        }

        $(this).children(".fileList")
            .append(output.join(""));
    });
};

var filesToUpload = [];

$(document).on("click",".removeFile", function(e){
    e.preventDefault();
    var fileName = $(this).parent().children("strong").text();
     // loop through the files array and check if the name of that file matches FileName
    // and get the index of the match
    for(i = 0; i < filesToUpload.length; ++ i){
        if(filesToUpload[i].name == fileName){
            //console.log("match at: " + i);
            // remove the one element at the index where we get a match
            filesToUpload.splice(i, 1);
        }	
	}
    //console.log(filesToUpload);
    // remove the <li> element of the removed file from the page DOM
    $(this).parent().remove();
});