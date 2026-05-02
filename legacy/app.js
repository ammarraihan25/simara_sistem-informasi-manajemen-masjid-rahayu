// Initial Data Mockup
const initialData = {
    schedules: [
        { id: 1, date: '2026-05-02', subuh: '04:25', dzuhur: '11:42', ashar: '15:01', maghrib: '17:35', isya: '18:46', petugas_imam: 'Ust. Abdullah', petugas_muadzin: 'Bpk. Hasan', petugas_khotib: '-' },
        { id: 2, date: '2026-05-08', subuh: '04:26', dzuhur: '11:42', ashar: '15:02', maghrib: '17:34', isya: '18:45', petugas_imam: 'Ust. Mansyur', petugas_muadzin: 'Bpk. Ridwan', petugas_khotib: 'KH. Ahmad Fauzi (Jumat)' },
    ],
    finance: [
        { id: 1, type: 'pemasukan', date: '2026-04-25', category: 'Infaq Jumat', amount: 2500000, description: 'Infaq kotak amal jumat rutin' },
        { id: 2, type: 'pengeluaran', date: '2026-04-26', category: 'Operasional', amount: 500000, description: 'Bayar listrik dan air' },
        { id: 3, type: 'pemasukan', date: '2026-04-28', category: 'Donasi', amount: 1000000, description: 'Donasi hamba Allah untuk renovasi' },
    ],
    articles: [
        { id: 1, title: 'Persiapan Ramadhan 1447 H', date: '2026-04-20', content: 'Masjid Rahayu mulai melakukan persiapan menyambut bulan suci Ramadhan...', image: 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=1000' },
        { id: 2, title: 'Kajian Rutin Ahad Pagi', date: '2026-04-27', content: 'Kajian kitab Riyadhush Shalihin bersama Ust. Hamzah setiap hari Ahad...', image: 'https://images.unsplash.com/photo-1590073844006-33379778ae09?auto=format&fit=crop&q=80&w=1000' },
    ]
};

// State Management
let db = JSON.parse(localStorage.getItem('simara_db')) || initialData;

function saveDB() {
    localStorage.setItem('simara_db', JSON.stringify(db));
}

// Router
function navigateTo(page) {
    const content = document.getElementById('appContent');
    const navItems = document.querySelectorAll('.nav-item');
    
    // Update active nav
    navItems.forEach(item => {
        item.classList.toggle('active', item.dataset.page === page);
    });

    window.scrollTo(0, 0);

    switch(page) {
        case 'home': renderHome(content); break;
        case 'jadwal': renderJadwal(content); break;
        case 'keuangan': renderKeuangan(content); break;
        case 'artikel': renderArtikel(content); break;
        case 'tentang': renderTentang(content); break;
        case 'kontak': renderKontak(content); break;
        case 'login': renderLogin(content); break;
        case 'admin': renderAdminDashboard(content); break;
        default: renderHome(content);
    }
    
    lucide.createIcons();
}

// Page Renderers
function renderHome(container) {
    const latestArticle = db.articles[db.articles.length - 1];
    const todaySchedule = db.schedules[0];

    container.innerHTML = `
        <header class="hero animate-fade">
            <div class="container">
                <h1>Masjid Rahayu Surakarta</h1>
                <p>Pusat Ibadah, Pendidikan, dan Dakwah untuk Masyarakat Rahayu. Mewujudkan pengelolaan masjid yang transparan dan akuntabel.</p>
                <div style="display: flex; gap: 15px; justify-content: center;">
                    <button class="btn btn-primary" onclick="navigateTo('jadwal')">Lihat Jadwal Sholat</button>
                    <button class="btn" style="background: white; color: var(--primary)" onclick="navigateTo('tentang')">Profil Masjid</button>
                </div>
            </div>
        </header>

        <section class="container animate-fade">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2rem">Jadwal Sholat Hari Ini</h2>
                <p style="color: var(--text-muted)">Waktu Sholat untuk wilayah Surakarta dan sekitarnya</p>
            </div>
            
            <div class="prayer-grid">
                <div class="prayer-card"><h4>Subuh</h4><div class="time">${todaySchedule.subuh}</div></div>
                <div class="prayer-card active"><h4>Dzuhur</h4><div class="time">${todaySchedule.dzuhur}</div></div>
                <div class="prayer-card"><h4>Ashar</h4><div class="time">${todaySchedule.ashar}</div></div>
                <div class="prayer-card"><h4>Maghrib</h4><div class="time">${todaySchedule.maghrib}</div></div>
                <div class="prayer-card"><h4>Isya</h4><div class="time">${todaySchedule.isya}</div></div>
            </div>
            
            <div style="margin-top: 30px; text-align: center; background: white; padding: 20px; border-radius: 12px; border: 1px solid var(--border);">
                <p><strong>Petugas Hari Ini:</strong> Imam: ${todaySchedule.petugas_imam} | Muadzin: ${todaySchedule.petugas_muadzin}</p>
            </div>
        </section>

        <section style="background: white;">
            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                    <h2>Kegiatan & Artikel Terbaru</h2>
                    <a href="#" onclick="navigateTo('artikel')" style="color: var(--secondary); font-weight: 600">Lihat Semua →</a>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    ${db.articles.slice(-2).map(art => `
                        <div class="card animate-fade">
                            <img src="${art.image}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;">
                            <span style="color: var(--secondary); font-size: 0.8rem; font-weight: 600">${art.date}</span>
                            <h3 style="margin: 10px 0">${art.title}</h3>
                            <p style="color: var(--text-muted); font-size: 0.9rem">${art.content.substring(0, 100)}...</p>
                            <button class="btn" style="padding: 8px 0; color: var(--primary)" onclick="navigateTo('artikel')">Baca Selengkapnya</button>
                        </div>
                    `).join('')}
                </div>
            </div>
        </section>
    `;
}

function renderJadwal(container) {
    container.innerHTML = `
        <div class="hero" style="padding: 60px 0;">
            <div class="container">
                <h1>Jadwal Sholat & Petugas</h1>
                <p>Informasi waktu ibadah harian dan petugas Jumat Masjid Rahayu</p>
            </div>
        </div>
        <section class="container animate-fade">
            <div class="card" style="margin-bottom: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Jadwal Sholat Harian</h3>
                    <input type="date" class="form-control" style="width: 200px;" value="2026-05-02">
                </div>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                                <th style="padding: 15px;">Tanggal</th>
                                <th style="padding: 15px;">Subuh</th>
                                <th style="padding: 15px;">Dzuhur</th>
                                <th style="padding: 15px;">Ashar</th>
                                <th style="padding: 15px;">Maghrib</th>
                                <th style="padding: 15px;">Isya</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${db.schedules.map(s => `
                                <tr style="border-bottom: 1px solid var(--border);">
                                    <td style="padding: 15px;">${s.date}</td>
                                    <td style="padding: 15px;">${s.subuh}</td>
                                    <td style="padding: 15px;">${s.dzuhur}</td>
                                    <td style="padding: 15px;">${s.ashar}</td>
                                    <td style="padding: 15px;">${s.maghrib}</td>
                                    <td style="padding: 15px;">${s.isya}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <h3>Petugas Ibadah</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
                    ${db.schedules.filter(s => s.petugas_khotib !== '-').map(s => `
                        <div style="padding: 20px; border: 1px solid var(--border); border-radius: 8px;">
                            <h4 style="color: var(--secondary)">${s.date} (Jumat)</h4>
                            <p style="margin-top: 10px;"><strong>Imam:</strong> ${s.petugas_imam}</p>
                            <p><strong>Muadzin:</strong> ${s.petugas_muadzin}</p>
                            <p><strong>Khotib:</strong> ${s.petugas_khotib}</p>
                        </div>
                    `).join('')}
                </div>
            </div>
        </section>
    `;
}

function renderKeuangan(container) {
    const totalMasuk = db.finance.filter(f => f.type === 'pemasukan').reduce((acc, curr) => acc + curr.amount, 0);
    const totalKeluar = db.finance.filter(f => f.type === 'pengeluaran').reduce((acc, curr) => acc + curr.amount, 0);
    const saldo = totalMasuk - totalKeluar;

    container.innerHTML = `
        <div class="hero" style="padding: 60px 0;">
            <div class="container">
                <h1>Laporan Keuangan Transparan</h1>
                <p>Wujud akuntabilitas pengelolaan dana umat Masjid Rahayu</p>
            </div>
        </div>
        <section class="container animate-fade">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
                <div class="card" style="background: var(--primary); color: white;">
                    <p style="opacity: 0.8">Total Pemasukan</p>
                    <h2 style="color: white; margin: 10px 0">Rp ${totalMasuk.toLocaleString('id-ID')}</h2>
                </div>
                <div class="card" style="background: #ef4444; color: white;">
                    <p style="opacity: 0.8">Total Pengeluaran</p>
                    <h2 style="color: white; margin: 10px 0">Rp ${totalKeluar.toLocaleString('id-ID')}</h2>
                </div>
                <div class="card" style="background: var(--secondary); color: white;">
                    <p style="opacity: 0.8">Saldo Kas</p>
                    <h2 style="color: white; margin: 10px 0">Rp ${saldo.toLocaleString('id-ID')}</h2>
                </div>
            </div>

            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Rincian Transaksi Terakhir</h3>
                    <select class="form-control" style="width: 150px;">
                        <option>April 2026</option>
                        <option>Mei 2026</option>
                    </select>
                </div>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                                <th style="padding: 15px;">Tanggal</th>
                                <th style="padding: 15px;">Kategori</th>
                                <th style="padding: 15px;">Keterangan</th>
                                <th style="padding: 15px; text-align: right;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${db.finance.map(f => `
                                <tr style="border-bottom: 1px solid var(--border);">
                                    <td style="padding: 15px;">${f.date}</td>
                                    <td style="padding: 15px;"><span style="padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; background: ${f.type === 'pemasukan' ? '#dcfce7' : '#fee2e2'}; color: ${f.type === 'pemasukan' ? '#166534' : '#991b1b'}">${f.category}</span></td>
                                    <td style="padding: 15px;">${f.description}</td>
                                    <td style="padding: 15px; text-align: right; color: ${f.type === 'pemasukan' ? '#166534' : '#ef4444'}; font-weight: 600;">
                                        ${f.type === 'pemasukan' ? '+' : '-'} Rp ${f.amount.toLocaleString('id-ID')}
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    `;
}

function renderArtikel(container) {
    container.innerHTML = `
        <div class="hero" style="padding: 60px 0;">
            <div class="container">
                <h1>Kegiatan & Artikel</h1>
                <p>Dokumentasi kegiatan dan informasi terbaru dari Masjid Rahayu</p>
            </div>
        </div>
        <section class="container animate-fade">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                ${db.articles.map(art => `
                    <div class="card">
                        <img src="${art.image}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;">
                        <span style="color: var(--secondary); font-size: 0.8rem; font-weight: 600">${art.date}</span>
                        <h3 style="margin: 10px 0">${art.title}</h3>
                        <p style="color: var(--text-muted)">${art.content}</p>
                    </div>
                `).join('')}
            </div>
        </section>
    `;
}

function renderTentang(container) {
    container.innerHTML = `
        <div class="hero" style="padding: 60px 0;">
            <div class="container">
                <h1>Tentang Masjid Rahayu</h1>
                <p>Mengenal lebih dekat sejarah dan visi kami</p>
            </div>
        </div>
        <section class="container animate-fade">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 50px; align-items: center;">
                <div>
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=1000" style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-lg);">
                </div>
                <div>
                    <h2>Profil & Sejarah</h2>
                    <p style="margin: 20px 0; color: var(--text-muted);">Masjid Rahayu berdiri sejak tahun 1995 sebagai pusat peribadatan masyarakat Laweyan. Berawal dari langgar kecil, kini Masjid Rahayu telah berkembang menjadi pusat dakwah yang aktif dengan berbagai program kemasyarakatan.</p>
                    
                    <h3 style="margin-top: 30px;">Visi Kami</h3>
                    <p style="margin: 10px 0; color: var(--text-muted);">Menjadi masjid yang mandiri, makmur, dan menjadi rahmat bagi lingkungan sekitar melalui pengelolaan yang profesional dan transparan.</p>
                    
                    <h3 style="margin-top: 30px;">Tujuan SIMARA</h3>
                    <p style="margin: 10px 0; color: var(--text-muted);">Sistem Informasi Manajemen Masjid Rahayu (SIMARA) dikembangkan untuk memudahkan jamaah dalam mengakses informasi dan sebagai sarana keterbukaan informasi publik bagi pengurus masjid.</p>
                </div>
            </div>
        </section>
    `;
}

function renderKontak(container) {
    container.innerHTML = `
        <div class="hero" style="padding: 60px 0;">
            <div class="container">
                <h1>Hubungi Kami</h1>
                <p>Kami siap melayani pertanyaan dan masukan Anda</p>
            </div>
        </div>
        <section class="container animate-fade">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <div class="card">
                    <h3>Informasi Kontak</h3>
                    <div style="margin-top: 20px; display: flex; flex-direction: column; gap: 20px;">
                        <div style="display: flex; gap: 15px;">
                            <i data-lucide="map-pin" style="color: var(--secondary)"></i>
                            <p>Jl. Songgorunggi No. 17C, Bumi, Kec.Laweyan, Kota Surakarta.</p>
                        </div>
                        <div style="display: flex; gap: 15px;">
                            <i data-lucide="phone" style="color: var(--secondary)"></i>
                            <p>+62 812-3456-7890</p>
                        </div>
                        <div style="display: flex; gap: 15px;">
                            <i data-lucide="mail" style="color: var(--secondary)"></i>
                            <p>info@masjidrahayu.com</p>
                        </div>
                    </div>
                    <div style="margin-top: 30px;">
                        <h4>Lokasi Peta</h4>
                        <div style="height: 250px; background: #eee; border-radius: 8px; margin-top: 15px; overflow: hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0212!2d110.8!3d-7.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzAnMDAuMCJTIDExMMKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1620000000000" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3>Kirim Pesan</h3>
                    <form style="margin-top: 20px;">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group">
                            <label>Email / WhatsApp</label>
                            <input type="text" class="form-control" placeholder="Masukkan kontak Anda">
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control" rows="5" placeholder="Tuliskan pesan Anda di sini"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" style="width: 100%;">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </section>
    `;
}

function renderLogin(container) {
    container.innerHTML = `
        <section class="container animate-fade" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
            <div class="card" style="width: 100%; max-width: 400px; padding: 40px;">
                <div style="text-align: center; margin-bottom: 30px;">
                    <i data-lucide="lock" style="width: 48px; height: 48px; color: var(--primary); margin-bottom: 15px;"></i>
                    <h2>Login Admin</h2>
                    <p style="color: var(--text-muted)">Masuk ke Dashboard SIMARA</p>
                </div>
                <form id="loginForm">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" class="form-control" placeholder="admin" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Masuk Sekarang</button>
                </form>
                <div style="margin-top: 20px; text-align: center;">
                    <a href="#" onclick="navigateTo('home')" style="color: var(--text-muted); font-size: 0.9rem">← Kembali ke Beranda</a>
                </div>
            </div>
        </section>
    `;

    document.getElementById('loginForm').onsubmit = (e) => {
        e.preventDefault();
        const user = document.getElementById('username').value;
        const pass = document.getElementById('password').value;
        
        if(user === 'admin' && pass === 'admin') {
            sessionStorage.setItem('isAdmin', 'true');
            navigateTo('admin');
        } else {
            alert('Username atau password salah!');
        }
    };
}

// Initial Load
window.onload = () => {
    navigateTo('home');
    
    // Mobile Menu Toggle
    document.getElementById('menuToggle').onclick = () => {
        const nav = document.getElementById('navLinks');
        nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        nav.style.flexDirection = 'column';
        nav.style.position = 'absolute';
        nav.style.top = '70px';
        nav.style.left = '0';
        nav.style.width = '100%';
        nav.style.background = 'white';
        nav.style.padding = '20px';
        nav.style.boxShadow = 'var(--shadow)';
    };
};
