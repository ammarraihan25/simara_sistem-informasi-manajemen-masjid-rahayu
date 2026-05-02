// Admin Dashboard Renderers
function renderAdminDashboard(container) {
    if (sessionStorage.getItem('isAdmin') !== 'true') {
        navigateTo('login');
        return;
    }

    container.innerHTML = `
        <div class="admin-layout animate-fade">
            <aside class="sidebar">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 30px;">
                    <i data-lucide="layout-dashboard"></i>
                    <h2>Panel Admin</h2>
                </div>
                <nav class="sidebar-nav">
                    <a href="#" onclick="renderAdminOverview()" class="active" id="btnOverview"><i data-lucide="home"></i> Overview</a>
                    <a href="#" onclick="renderAdminJadwal()" id="btnJadwal"><i data-lucide="calendar"></i> Kelola Jadwal</a>
                    <a href="#" onclick="renderAdminKeuangan()" id="btnKeuangan"><i data-lucide="dollar-sign"></i> Kelola Keuangan</a>
                    <a href="#" onclick="renderAdminArtikel()" id="btnArtikel"><i data-lucide="file-text"></i> Kelola Artikel</a>
                    <hr style="opacity: 0.2; margin: 10px 0;">
                    <a href="#" onclick="logoutAdmin()"><i data-lucide="log-out"></i> Keluar</a>
                </nav>
            </aside>
            <main class="admin-content" id="adminMain">
                <!-- Admin view will be injected here -->
            </main>
        </div>
    `;
    
    renderAdminOverview();
    lucide.createIcons();
}

function renderAdminOverview() {
    const main = document.getElementById('adminMain');
    const totalArticles = db.articles.length;
    const totalSchedules = db.schedules.length;
    const totalMasuk = db.finance.filter(f => f.type === 'pemasukan').reduce((acc, curr) => acc + curr.amount, 0);

    main.innerHTML = `
        <div class="animate-fade">
            <h1 style="margin-bottom: 30px;">Dashboard Overview</h1>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <div class="card">
                    <p style="color: var(--text-muted)">Total Artikel</p>
                    <h2>${totalArticles}</h2>
                </div>
                <div class="card">
                    <p style="color: var(--text-muted)">Data Jadwal</p>
                    <h2>${totalSchedules}</h2>
                </div>
                <div class="card">
                    <p style="color: var(--text-muted)">Pemasukan Bulan Ini</p>
                    <h2 style="color: var(--primary)">Rp ${totalMasuk.toLocaleString('id-ID')}</h2>
                </div>
            </div>
            
            <div class="card" style="margin-top: 40px;">
                <h3>Status Sistem</h3>
                <p style="margin-top: 15px; color: var(--text-muted)">Selamat datang di Panel SIMARA. Gunakan menu di samping untuk mengelola data website Masjid Rahayu secara digital.</p>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button class="btn btn-primary" onclick="renderAdminJadwal()">Input Jadwal Baru</button>
                    <button class="btn" onclick="renderAdminKeuangan()">Catat Transaksi</button>
                </div>
            </div>
        </div>
    `;
    updateActiveSidebar('btnOverview');
    lucide.createIcons();
}

function renderAdminJadwal() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h1>Kelola Jadwal Sholat</h1>
                <button class="btn btn-primary" onclick="showJadwalForm()">+ Tambah Jadwal</button>
            </div>
            
            <div class="card">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                            <th style="padding: 15px;">Tanggal</th>
                            <th style="padding: 15px;">Imam</th>
                            <th style="padding: 15px;">Khotib</th>
                            <th style="padding: 15px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${db.schedules.map(s => `
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px;">${s.date}</td>
                                <td style="padding: 15px;">${s.petugas_imam}</td>
                                <td style="padding: 15px;">${s.petugas_khotib}</td>
                                <td style="padding: 15px;">
                                    <button class="btn" style="padding: 5px 10px; background: #eee;" onclick="deleteJadwal(${s.id})">Hapus</button>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        </div>
    `;
    updateActiveSidebar('btnJadwal');
}

function renderAdminKeuangan() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h1>Kelola Keuangan</h1>
                <button class="btn btn-primary" onclick="showFinanceForm()">+ Tambah Transaksi</button>
            </div>
            
            <div class="card">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                            <th style="padding: 15px;">Tanggal</th>
                            <th style="padding: 15px;">Tipe</th>
                            <th style="padding: 15px;">Kategori</th>
                            <th style="padding: 15px; text-align: right;">Jumlah</th>
                            <th style="padding: 15px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${db.finance.map(f => `
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px;">${f.date}</td>
                                <td style="padding: 15px;">${f.type.toUpperCase()}</td>
                                <td style="padding: 15px;">${f.category}</td>
                                <td style="padding: 15px; text-align: right;">Rp ${f.amount.toLocaleString('id-ID')}</td>
                                <td style="padding: 15px;">
                                    <button class="btn" style="padding: 5px 10px; background: #eee;" onclick="deleteFinance(${f.id})">Hapus</button>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        </div>
    `;
    updateActiveSidebar('btnKeuangan');
}

function renderAdminArtikel() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h1>Kelola Artikel & Event</h1>
                <button class="btn btn-primary" onclick="showArtikelForm()">+ Tambah Artikel</button>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                ${db.articles.map(art => `
                    <div class="card">
                        <img src="${art.image}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                        <h3>${art.title}</h3>
                        <p style="color: var(--text-muted); font-size: 0.8rem; margin: 10px 0;">${art.date}</p>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="flex: 1; padding: 8px; background: #eee;" onclick="deleteArticle(${art.id})">Hapus</button>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;
    updateActiveSidebar('btnArtikel');
}

// Form Handlers (Modals/Overlays can be added later, for now simple forms)
function showJadwalForm() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade card" style="max-width: 600px; margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Tambah Jadwal Sholat</h2>
            <form id="jadwalForm">
                <div class="form-group"><label>Tanggal</label><input type="date" id="jDate" class="form-control" required></div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="form-group"><label>Subuh</label><input type="text" id="jSubuh" class="form-control" placeholder="04:30"></div>
                    <div class="form-group"><label>Dzuhur</label><input type="text" id="jDzuhur" class="form-control" placeholder="11:45"></div>
                    <div class="form-group"><label>Ashar</label><input type="text" id="jAshar" class="form-control" placeholder="15:00"></div>
                    <div class="form-group"><label>Maghrib</label><input type="text" id="jMaghrib" class="form-control" placeholder="17:40"></div>
                    <div class="form-group"><label>Isya</label><input type="text" id="jIsya" class="form-control" placeholder="18:50"></div>
                </div>
                <div class="form-group"><label>Petugas Imam</label><input type="text" id="jImam" class="form-control"></div>
                <div class="form-group"><label>Petugas Khotib (Jika Jumat)</label><input type="text" id="jKhotib" class="form-control" value="-"></div>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <button type="button" class="btn" onclick="renderAdminJadwal()">Batal</button>
                </div>
            </form>
        </div>
    `;
    
    document.getElementById('jadwalForm').onsubmit = (e) => {
        e.preventDefault();
        const newJadwal = {
            id: Date.now(),
            date: document.getElementById('jDate').value,
            subuh: document.getElementById('jSubuh').value,
            dzuhur: document.getElementById('jDzuhur').value,
            ashar: document.getElementById('jAshar').value,
            maghrib: document.getElementById('jMaghrib').value,
            isya: document.getElementById('jIsya').value,
            petugas_imam: document.getElementById('jImam').value,
            petugas_muadzin: 'Admin',
            petugas_khotib: document.getElementById('jKhotib').value
        };
        db.schedules.push(newJadwal);
        saveDB();
        renderAdminJadwal();
    };
}

function showFinanceForm() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade card" style="max-width: 600px; margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Catat Transaksi</h2>
            <form id="financeForm">
                <div class="form-group"><label>Tanggal</label><input type="date" id="fDate" class="form-control" required></div>
                <div class="form-group">
                    <label>Tipe Transaksi</label>
                    <select id="fType" class="form-control">
                        <option value="pemasukan">Pemasukan (Infaq/Donasi)</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group"><label>Kategori</label><input type="text" id="fCat" class="form-control" placeholder="Contoh: Infaq Jumat"></div>
                <div class="form-group"><label>Jumlah (Rp)</label><input type="number" id="fAmount" class="form-control" required></div>
                <div class="form-group"><label>Keterangan</label><textarea id="fDesc" class="form-control"></textarea></div>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <button type="button" class="btn" onclick="renderAdminKeuangan()">Batal</button>
                </div>
            </form>
        </div>
    `;
    
    document.getElementById('financeForm').onsubmit = (e) => {
        e.preventDefault();
        const newFinance = {
            id: Date.now(),
            date: document.getElementById('fDate').value,
            type: document.getElementById('fType').value,
            category: document.getElementById('fCat').value,
            amount: parseInt(document.getElementById('fAmount').value),
            description: document.getElementById('fDesc').value
        };
        db.finance.push(newFinance);
        saveDB();
        renderAdminKeuangan();
    };
}

function showArtikelForm() {
    const main = document.getElementById('adminMain');
    main.innerHTML = `
        <div class="animate-fade card" style="max-width: 800px; margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Tambah Artikel Baru</h2>
            <form id="artikelForm">
                <div class="form-group"><label>Judul Artikel</label><input type="text" id="aTitle" class="form-control" required></div>
                <div class="form-group"><label>Tanggal</label><input type="date" id="aDate" class="form-control" required></div>
                <div class="form-group"><label>URL Gambar Kegiatan</label><input type="text" id="aImg" class="form-control" placeholder="https://..."></div>
                <div class="form-group"><label>Konten Artikel</label><textarea id="aContent" class="form-control" rows="8"></textarea></div>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Publikasikan</button>
                    <button type="button" class="btn" onclick="renderAdminArtikel()">Batal</button>
                </div>
            </form>
        </div>
    `;
    
    document.getElementById('artikelForm').onsubmit = (e) => {
        e.preventDefault();
        const newArt = {
            id: Date.now(),
            title: document.getElementById('aTitle').value,
            date: document.getElementById('aDate').value,
            image: document.getElementById('aImg').value || 'https://via.placeholder.com/1000x600?text=Masjid+Rahayu',
            content: document.getElementById('aContent').value
        };
        db.articles.push(newArt);
        saveDB();
        renderAdminArtikel();
    };
}

// Helper Functions
function updateActiveSidebar(id) {
    const links = document.querySelectorAll('.sidebar-nav a');
    links.forEach(l => l.classList.toggle('active', l.id === id));
}

function logoutAdmin() {
    sessionStorage.removeItem('isAdmin');
    navigateTo('home');
}

function deleteJadwal(id) {
    if(confirm('Hapus data jadwal ini?')) {
        db.schedules = db.schedules.filter(s => s.id !== id);
        saveDB();
        renderAdminJadwal();
    }
}

function deleteFinance(id) {
    if(confirm('Hapus data transaksi ini?')) {
        db.finance = db.finance.filter(f => f.id !== id);
        saveDB();
        renderAdminKeuangan();
    }
}

function deleteArticle(id) {
    if(confirm('Hapus artikel ini?')) {
        db.articles = db.articles.filter(a => a.id !== id);
        saveDB();
        renderAdminArtikel();
    }
}
