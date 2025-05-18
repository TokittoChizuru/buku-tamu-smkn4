
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Tamu SMK Negeri 4 Bandar Lampung</title>
    <link rel="stylesheet" href="{{ asset('css/filament/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
<div id="loadingOverlay" style="
    display: none;
    position: fixed;
    top:0; left:0; right:0; bottom:0;
    background: rgba(0,0,0,0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 24px;
    font-weight: bold;
">
    Loading...
</div>


    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('img/logo.png')}}" alt="" srcset=""><b>Buku Tamu</b></a>
            <div class="d-flex" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <b>List Tamu</b>
                            </button>
                                <ul class="dropdown-menu p-3" style="max-height: 300px; overflow-y: auto; min-width: 500px; white-space: normal;">
                                    @forelse ($tamus as $tamu)
                                        <li>
                                            <span class="dropdown-item" style="white-space: normal; padding: 8px 12px; border-radius: 20px;">
                                                <strong>{{ $tamu->nama_lengkap }}</strong><br>
                                                <small>{{ $tamu->asal_tamu }}</small>
                                            </span>
                                        </li>
                                    @empty
                                        <li><span class="dropdown-item text-muted">Belum ada tamu</span></li>
                                    @endforelse
                                </ul>
                        </div>
                    </li>
                    <li class="nav-item" style="margin-left: 600px">
                        <a class="nav-link" href="/admin"><b>Admin</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  

    

    <div class="con">
    <div class="teks">
        <div class="title">
            <div class="logo">
                <img src="{{ asset('img/logo.png')}}" alt="" srcset="" class="logo">
            </div>
            <h3>SMK NEGERI 4 BANDAR LAMPUNG</h3>
            <h5>Buku Tamu</h5>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
        <h2>Selamat Datang</h2>
        <p>Terima kasih telah berkunjung ke SMK Negeri 4 Bandar Lampung. Silakan isi buku tamu berikut untuk keperluan kunjungan Anda.</p>
        <br>
        <b><i>2025&copy;Create By Bangkit</i></b>
    </div>

    <div class="form">
        
        <form id="form_list" action="{{ route('tamu.add') }}" method="POST">
    @csrf

    <label for="nama">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama" placeholder="Nama Lengkap" required>

    <label for="instansi">Instansi</label>
    <input type="text" name="asal_tamu" id="instansi" placeholder="Instansi" required>

    <label for="menemui">Menemui</label>
    <input type="text" name="menemui" id="menemui" placeholder="Menemui" required>

    <label for="alasan">Alasan</label>
    <input type="text" name="alasan" id="alasan" placeholder="Alasan" required>

    <label>Ambil Foto</label>
    <video class="foto" id="video" width="320" height="240" autoplay></video>
    <canvas class="foto" id="canvas" width="320" height="240" style="display:none;"></canvas>

    <img class="foto" id="photo" style="display:none; border:1px solid #ccc; margin-top:10px; width: 320px;" />

    <input class="hidden" type="hidden" id="photoInput" name="foto_tamu" />

    <button class="btn" type="button" id="captureBtn">Ambil Foto</button>
    <button class="btn" type="button" id="ulangiBtn" style="display:none;">Ulangi Foto</button>
    <button class="btn" type="submit" id="submitBtn" style="display:none;">Selesai</button>
</form>

    </div>
</div>

<script>
let streamRef = null;

navigator.mediaDevices.getUserMedia({ video: true })
.then(function(stream) {
    streamRef = stream;
    const video = document.getElementById('video');
    video.srcObject = stream;
    video.play();
})
.catch(function(err) {
    alert('Tidak dapat mengakses kamera: ' + err.message);
});

function takePicture() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const photo = document.getElementById('photo');
    const captureBtn = document.getElementById('captureBtn');
    const ulangiBtn = document.getElementById('ulangiBtn');
    const submitBtn = document.getElementById('submitBtn');
    const context = canvas.getContext('2d');

    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    const dataURL = canvas.toDataURL('image/png');
    photo.src = dataURL;
    photo.style.display = 'block';

    video.style.display = 'none';
    captureBtn.style.display = 'none';

    ulangiBtn.style.display = 'inline-block';
    submitBtn.style.display = 'inline-block';

    document.getElementById('photoInput').value = dataURL;
}

function ulangiFoto() {
    const video = document.getElementById('video');
    const photo = document.getElementById('photo');
    const captureBtn = document.getElementById('captureBtn');
    const ulangiBtn = document.getElementById('ulangiBtn');
    const submitBtn = document.getElementById('submitBtn');

    document.getElementById('photoInput').value = "";

    video.style.display = 'block';
    captureBtn.style.display = 'inline-block';

    photo.style.display = 'none';
    ulangiBtn.style.display = 'none';
    submitBtn.style.display = 'none';
}

document.getElementById('captureBtn').onclick = takePicture;
document.getElementById('ulangiBtn').onclick = ulangiFoto;

document.getElementById('form_list').addEventListener('submit', function(e) {
    e.preventDefault();

    if (!document.getElementById('photoInput').value) {
        alert('Harap ambil foto terlebih dahulu!');
        return false;
    }

    document.getElementById('loadingOverlay').style.display = 'flex';

    const formData = new FormData(this);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('HTTP status ' + response.status);
        return response.json();
    })
    .then(data => {
        document.getElementById('loadingOverlay').style.display = 'none';

        if (data.success) {
            alert('Data berhasil dikirim!');
            this.reset();
            ulangiFoto();
        } else {
            alert('Gagal mengirim data: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        document.getElementById('loadingOverlay').style.display = 'none';
        console.error('Fetch error:', error);
        alert('Terjadi kesalahan jaringan: ' + error.message);
    });
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>