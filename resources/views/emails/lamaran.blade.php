<!DOCTYPE html>
<html>
<head>
    <title>Informasi Lamaran Anda</title>
</head>
<body>
    <p>Halo, {{ $nama }}!</p>
    <p>Selamat! Anda telah mencapai langkah {{ $status }} dalam proses lamaran kerja Anda di <strong>{{ $perusahaan }}</strong>.</p>
    <p>{!! $pesanEmail !!}</p>

    <p>Kami akan segera menghubungi Anda jika ada perkembangan lebih lanjut.</p>
    <p>Salam,</p>
    <p><strong>{{ $perusahaan }}</strong></p>
</body>
</html>
