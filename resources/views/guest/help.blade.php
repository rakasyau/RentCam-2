@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5" style="color: var(--text-color);">Pusat Bantuan</h1>
        <p class="lead opacity-75" style="color: var(--text-color);">Ada kendala? Hubungi tim support kami atau temukan kami di sosial media.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 p-4 border-0 position-relative overflow-hidden">
                <div class="position-absolute top-0 end-0 p-3 opacity-10">
                    <i class="fas fa-headset fa-5x text-primary"></i>
                </div>

                <h4 class="mb-4 fw-bold"><i class="fas fa-address-book me-2 text-primary"></i>Hubungi Kami</h4>
                
                <div class="d-flex flex-column gap-3">
                    <a href="https://wa.me/6281234567890" target="_blank" class="d-flex align-items-center p-3 glass text-decoration-none customer-card">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-lg" style="width: 50px; height: 50px;">
                            <i class="fab fa-whatsapp fs-4"></i>
                        </div>
                        <div>
                            <small class="d-block text-muted">Chat WhatsApp (24 Jam)</small>
                            <span class="fw-bold fs-5" style="color: var(--text-color);">+62 812-3456-7890</span>
                        </div>
                    </a>

                    <a href="mailto:support@rentcam.id" class="d-flex align-items-center p-3 glass text-decoration-none customer-card">
                        <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-lg" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fs-4"></i>
                        </div>
                        <div>
                            <small class="d-block text-muted">Email Support</small>
                            <span class="fw-bold fs-5" style="color: var(--text-color);">support@rentcam.id</span>
                        </div>
                    </a>

                    <div class="d-flex align-items-center p-3 glass customer-card">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-lg" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fs-4"></i>
                        </div>
                        <div>
                            <small class="d-block text-muted">Alamat Studio</small>
                            <span class="fw-bold" style="color: var(--text-color);">Kampus Sekolah Vokasi IPB, Bogor.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card p-4 border-0 mb-4">
                <h4 class="mb-4 fw-bold"><i class="fas fa-hashtag me-2 text-info"></i>Ikuti Kami</h4>
                <p class="mb-4 opacity-75">Dapatkan info promo terbaru, tips fotografi, dan showcase hasil sewa kamera di sosial media kami.</p>
                
                <div class="row g-3">
                    <div class="col-6">
                        <a href="https://instagram.com/rakasyau_" target="_blank" class="btn w-100 py-3 d-flex flex-column align-items-center glass socmed-btn instagram">
                            <i class="fab fa-instagram fs-1 mb-2"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn w-100 py-3 d-flex flex-column align-items-center glass socmed-btn tiktok">
                            <i class="fab fa-tiktok fs-1 mb-2"></i>
                            <span>TikTok</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn w-100 py-3 d-flex flex-column align-items-center glass socmed-btn youtube">
                            <i class="fab fa-youtube fs-1 mb-2"></i>
                            <span>YouTube</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn w-100 py-3 d-flex flex-column align-items-center glass socmed-btn facebook">
                            <i class="fab fa-facebook fs-1 mb-2"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card p-2 border-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4658458553968!2d106.8036414745362!3d-6.588872464408376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5344e742491%3A0x50876f85f6c0d99b!2sSEKOLAH%20VOKASI%20IPB%20KAMPUS%20GUNUNG%20GEDE!5e0!3m2!1sid!2sid!4v1764683887792!5m2!1sid!2sid"
                        width="100%" height="350" style="border:0; border-radius: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Khusus Halaman Bantuan */
    .customer-card {
        transition: transform 0.3s ease, background 0.3s;
    }
    .customer-card:hover {
        transform: translateX(10px); /* Efek geser ke kanan saat hover */
        background: rgba(255, 255, 255, 0.2);
    }
    [data-bs-theme="dark"] .customer-card:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    /* Warna Brand Social Media dengan Glow */
    .socmed-btn {
        transition: all 0.3s;
        color: var(--text-color);
        border: 1px solid var(--glass-border);
    }
    
    .socmed-btn:hover {
        color: white;
        transform: translateY(-5px);
    }

    .instagram:hover {
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        box-shadow: 0 0 20px rgba(220, 39, 67, 0.5);
        border-color: transparent;
    }
    .tiktok:hover {
        background: #000000;
        box-shadow: 0 0 20px rgba(0,0,0, 0.5);
        border-color: transparent;
        color: white;
    }
    [data-bs-theme="dark"] .tiktok:hover {
        background: #333; /* Supaya kelihatan di dark mode */
    }

    .youtube:hover {
        background: #FF0000;
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
        border-color: transparent;
    }
    .facebook:hover {
        background: #1877F2;
        box-shadow: 0 0 20px rgba(24, 119, 242, 0.5);
        border-color: transparent;
    }
</style>
@endsection