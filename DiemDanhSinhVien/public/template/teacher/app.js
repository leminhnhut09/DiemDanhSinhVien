$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

let canvas = document.querySelector("#canvas");
let context = canvas.getContext("2d");
let video = document.querySelector("#video");
let listAttendence = document.querySelector("#listAttendence");
var isPlay = true;

document.querySelector("#start").addEventListener("click", () => {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then((stream) => {
            video.srcObject = stream;
            video.play();
        });
    }
});

document.querySelector("#stop").addEventListener("click", () => {
    isPlay = false;
});

var arrayDS = [];

document.querySelector("#attendence").addEventListener("click", () => {
    isPlay = true;
    var storeTimeInterval = setInterval(() => {
        if (isPlay) {
            context.drawImage(video, 0, 0, 224, 224);
            var base = canvas.toDataURL("image/png");
            $.ajax({
                url: "http://192.168.1.10:6868/nhandienkhuonmat",
                type: "POST",
                datatype: "JSON",
                data: { facebase64: base },
                success: function (result) {
                    //let intersection = arr1.filter((x) => arr2.includes(x));
                    // var arrResult = [];
                    // for (var i = 0; i < result.length; i++) {
                    //     arrResult[i] = result[i];
                    // }
                    //ngay = new Date().toJSON().slice(0, 10).replace(/-/g, "/");
                    // $.ajax({
                    //     type: "POST",
                    //     datatype: "JSON",
                    //     data: { arrMSSV, mahp, ngay },
                    //     url: "/teacher/attendance",
                    //     success: function (result) {
                    //         if (result.error == false) {
                    //             console.log(result);
                    //         } else {
                    //             console.log("fail");
                    //         }
                    //     },
                    // });
                },
                error: function (err) {
                    console.log(err);
                },
            });
            listAttendence.innerHTML =
                listAttendence.textContent + `send api <br>`;
        } else {
            clearInterval(storeTimeInterval);
            console.log("ngung send");
        }
    }, 500);
});

function takePhote() {
    var storeTimeInterval = setInterval(() => {
        if (isPlay) {
            context.drawImage(video, 0, 0, 224, 224);
            var base64 = canvas.toDataURL("image/png");
            $.ajax({
                url: "http://192.168.1.10:6868/nhandienkhuonmat",
                type: "POST",
                datatype: "JSON",
                data: base64,
                success: function (result) {
                    console.log(result);
                    //  Thanh cong
                    // for (var i = 0; i < result.length; i++) {
                    //     arrMSSV[i] = result[i].name;
                    // }
                    // arrMSSV = [...new Set(arrMSSV)];
                    // ngay = new Date().toJSON().slice(0, 10).replace(/-/g, "/");
                    // $.ajax({
                    //     type: "POST",
                    //     datatype: "JSON",
                    //     data: { arrMSSV, mahp, ngay },
                    //     url: "/teacher/attendance",
                    //     success: function (result) {
                    //         if (result.error == false) {
                    //             console.log(result);
                    //         } else {
                    //             console.log("fail");
                    //         }
                    //     },
                    // });
                },
                error: function (err) {
                    console.log(err);
                },
            });
        } else {
            clearInterval(storeTimeInterval);
        }
    }, 1000);

    //console.log(myImage);
}
