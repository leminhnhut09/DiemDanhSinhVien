$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// View Student
function viewStudent(masv, mahp, tuan) {
    const form = new FormData();
    form.append("masv", masv);
    form.append("mahp", mahp);
    form.append("tuan", tuan);
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        datatype: "JSON",
        data: form,
        url: "/student",
        success: function (result) {
            if (result.error == false) {
                alert(result.message);
                // location.reload();
            } else {
                alert(result.message);
            }
        },
    });
}

// Delete
function removeRow(id, url) {
    if (confirm("Bạn có muốn xóa danh mục này ? ")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: url,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Vui lòng thử lại");
                }
            },
        });
    }
}

/*Upload File */
// $("#upload-add").change(function () {
//     const form = new FormData();
//     form.append("file", $(this)[0].files[0]);
//     $.ajax({
//         processData: false,
//         contentType: false,
//         type: "POST",
//         dataType: "JSON",
//         data: form,
//         url: "/admin/upload/services",
//         success: function (results) {
//             if (results.error == false) {
//                 $("#image_show").html(
//                     '<a href="' +
//                         results.url +
//                         '" target="_blank">' +
//                         '<img src="' +
//                         results.url +
//                         '" width="100px"></a>'
//                 );

//                 $("#thumb").val(results.url);
//             } else {
//                 alert("Upload error");
//             }
//         },
//     });
// });
