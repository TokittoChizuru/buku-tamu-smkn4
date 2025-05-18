function takePicture() {
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var photo = document.getElementById('photo');
    var context = canvas.getContext('2d');

    context.drawImage(video, 0, 0, 320, 240);
    photo.src = canvas.toDataURL('image/png');
    photo.style.display = 'block';
}

// Ambil elemen tombol "Ambil Foto"
var captureBtn = document.getElementById('captureBtn');

// Ketika tombol "Ambil Foto" ditekan
captureBtn.onclick = function() {
    takePicture();
    document.getElementById("submitBtn").classList.toggle("hidden");
};

var submitBtn = document.getElementById('submitBtn');

// Ketika tombol "Selesai" ditekan
submitBtn.onclick = function() {
    // Ambil foto dari canvas
    var canvas = document.getElementById('canvas');
    var dataURL = canvas.toDataURL('image/png');

    // Masukkan data foto ke dalam input tersembunyi
    document.getElementById('photoInput').value = dataURL;

    // Submit form
    document.getElementById('form_list').submit();
};