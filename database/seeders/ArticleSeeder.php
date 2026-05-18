<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing articles first to avoid duplicates if re-seeded
        Article::truncate();

        $articles = [
            [
                'title' => 'Sejarah Berdirinya Masjid Rahayu Laweyan: Bermula dari Tanah Wakaf',
                'slug' => 'sejarah-berdirinya-masjid-rahayu-laweyan',
                'content' => "Masjid Rahayu berdiri kokoh di Kelurahan Bumi, Kecamatan Laweyan, Surakarta. Berdasarkan penuturan narasumber Ibu Kusrini (seorang tokoh remaja masjid aktif tahun 1980-an), masjid ini didirikan di atas tanah wakaf yang mulia dari Almarhum Bapak Atmotenoyo.\n\nSebelum dipugar secara besar-besaran menjadi bangunan permanen modern pada tahun 1980, Masjid Rahayu memiliki sejarah fisik yang sangat bersahaja. Dahulu kala, area di sekitar masjid dikelilingi oleh area pemakaman umum dan rumpun bambu lebat yang memberikan suasana sunyi khas pedesaan. Bangunan aslinya pun sangat sederhana, berdindingkan setengah batu bata di bagian bawah dan papan kayu di bagian atas.\n\nPada masa lampau, masjid ini memiliki keunikan tersendiri dalam penataan saf salat. Karena keterbatasan lahan yang melebar ke samping ketimbang memanjang ke belakang, saf jamaah laki-laki dan perempuan dibagi secara bersebelahan (sisi kanan dan sisi kiri), bukan depan-belakang seperti kelaziman saat ini.\n\nTitik balik perkembangan masjid terjadi pada tanggal 19 Oktober 1980 (Minggu Kliwon), di mana peletakan batu pertama renovasi total secara permanen dilakukan oleh warga dan takmir. Pembangunan ini selesai dua tahun kemudian dan diresmikan secara khidmat pada 27 Februari 1982.\n\nMenariknya, nama 'Rahayu' yang disematkan pada masjid ini terbilang unik karena tidak menggunakan istilah serapan bahasa Arab. Nama tersebut diambil dari sosok Sri Rahayu, putri salah seorang tokoh penting dalam kepengurusan takmir masjid kala itu. Dalam filosofi bahasa Jawa, kata 'Rahayu' juga melambangkan makna 'selamat', 'damai', dan 'sejahtera', yang sekaligus menjadi doa agar seluruh jamaah yang beribadah di dalamnya senantiasa dianugerahi keselamatan dan ketenteraman oleh Allah SWT.\n\nPada tahun 2016, pengurus masjid kembali mendapatkan perluasan tanah dari pemerintah daerah setempat. Lahan tambahan ini sangat bermanfaat dalam memfasilitasi kelancaran ibadah jamaah, seperti perluasan saf shalat Jumat, pelaksanaan shalat Idul Fitri dan Idul Adha, hingga area penyembelihan hewan kurban, tanpa perlu lagi mengganggu lalu lintas jalan kampung di sebelah utara.",
                'image' => 'https://kampoengbatiklaweyan.org/wp-content/uploads/2024/03/masjid-laweyan-570x320.jpg',
                'date' => '2017-11-21',
            ],
            [
                'title' => 'Mengenal Keunikan Arsitektur Klasik dan Fasilitas Masjid Rahayu',
                'slug' => 'keunikan-arsitektur-dan-fasilitas-masjid-rahayu',
                'content' => "Masjid Rahayu tidak hanya menjadi mercusuar spiritual bagi warga Kelurahan Bumi, Laweyan, tetapi juga memiliki keunikan fisik yang menarik untuk dikaji. Begitu melangkahkan kaki ke area masjid, jamaah akan disambut oleh keanggunan kubah hijau besar di bagian atapnya yang menjadi simbol keislaman yang agung.\n\nDi bagian interior, masjid ini menggunakan alas marmer putih bersih yang memberikan kesan sejuk nan elegan. Ditambah dengan fasilitas penyejuk udara (AC), kenyamanan dan kekhusyukan jamaah dalam menunaikan ibadah di dalam ruangan senantiasa terjaga dengan baik. Untuk menyimpan kitab-kitab suci Al-Qur'an secara rapi dan bersih, pihak takmir menyediakan rak-rak kaca khusus di sudut strategis.\n\nAspek fungsionalitas tata ruang di Masjid Rahayu dirancang sangat matang. Area wudhu bagi jamaah laki-laki dan perempuan dibuat terpisah penuh demi menjaga privasi dan ketertiban. Tempat wudhu laki-laki diposisikan di sebelah utara masjid, sedangkan area wudhu perempuan berada di sisi selatan. Guna menyuplai kebutuhan air bersih yang melimpah bagi para jamaah, sebuah tower penampungan air raksasa yang permanen dibangun dengan kokoh di area selatan masjid.\n\nSalah satu keunikan arsitektur luar ruang yang khas adalah tersedianya kolam air khusus di sisi timur masjid. Kolam ini berfungsi sebagai tempat membasuh kaki setelah jamaah berwudhu, memastikan kaki dalam kondisi paling bersih dan segar sebelum menapak ke area suci dalam masjid.\n\nSelain itu, Masjid Rahayu juga menjadi rumah bagi benda-benda bersejarah yang penuh nilai nostalgia. Di dekat ruang imam (mihrab), bersanding sebuah mimbar kayu antik ukiran tradisional yang digunakan khatib untuk menyampaikan khutbah. Tepat di sisi selatan mihrab, terdapat jam lonceng kayu kuno (grandfather clock) setinggi manusia yang telah berusia lebih dari 50 tahun dan masih berfungsi dengan baik.\n\nTak kalah bersejarah, terdapat pula sebuah kentongan kayu kuno yang berumur lebih dari setengah abad. Pada mulanya, kentongan ini digantung di atas kolam basuh kaki sebelah timur sebagai penanda waktu shalat tradisional, namun seiring renovasi perluasan area wudhu, pusaka kayu tersebut kini dipindahkan dan dirawat dengan baik di dekat area parkir utara masjid.",
                'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=800',
                'date' => '2017-11-21',
            ],
            [
                'title' => 'Menghidupkan Syiar Islam: Ragam Kegiatan Rutin di Masjid Rahayu',
                'slug' => 'kegiatan-syiar-islam-masjid-rahayu',
                'content' => "Sebagai pusat peradaban dan dakwah di daerah Laweyan, Surakarta, Masjid Rahayu membuktikan diri sebagai masjid yang dinamis and makmur. Keberhasilan ini tidak lepas dari konsistensi pengurus takmir dan kesadaran tinggi jamaah sekitar dalam meramaikan rumah Allah dengan berbagai ibadah ritual maupun sosial.\n\nSelain shalat jamaah lima waktu yang menjadi fondasi utama, Masjid Rahayu memiliki program dakwah unggulan yang sangat dinanti warga, yaitu Pengajian Ahad Pagi. Kajian umum ini diselenggarakan rutin sekali dalam sebulan pada hari Minggu pagi, menghadirkan asatidzah berkompeten untuk mengupas tafsir, hadits, fikih sehari-hari, hingga sirah nabawiyah. Pengajian ini selalu dipadati jamaah lintas usia dari berbagai penjuru kampung.\n\nUntuk memperdalam pemahaman keagamaan secara kontinu, pihak takmir juga memfasilitasi kajian-kajian tematis berdurasi pendek setelah shalat Maghrib (Kajian Ba'da Maghrib) dan subuh (Kajian Ba'da Subuh). Program ini dikemas santai namun sarat ilmu, membuka ruang tanya jawab interaktif bagi jamaah yang ingin berkonsultasi seputar hukum Islam.\n\nSetiap malam Jumat, suasana syahdu menyelimuti Masjid Rahayu melalui lantunan tadarus dalam program Semaan & Tadarus Al-Qur'an. Warga berkumpul membaca dan menyimak ayat-ayat suci Al-Qur'an secara bergantian, memohon keberkahan dan ketenteraman bagi lingkungan sekitar.\n\nInvestasi generasi masa depan Islam juga menjadi perhatian utama di masjid ini. Setiap sore pada hari Selasa, Kamis, dan Sabtu, serambi masjid diramaikan oleh gelak tawa dan semangat anak-anak yang belajar di Taman Pendidikan Al-Qur'an (TPA) Masjid Rahayu. Di sini, anak-anak tidak hanya diajarkan membaca Iqra dan Al-Qur'an, tetapi juga hafalan doa harian, adab sopan santun, serta kisah-kisah teladan islami.\n\nMemasuki Sabtu malam, giliran para pemuda remaja masjid yang berkreasi. Suara tabuhan rebana yang harmonis bergema dari area serambi dalam kegiatan latihan kesenian Hadrah. Melalui seni selawat ini, para pemuda tidak hanya melestarikan budaya Islam nusantara tetapi juga memupuk kecintaan mendalam kepada Baginda Nabi Muhammad SAW sekaligus mempererat tali ukhuwah antarremaja.",
                'image' => 'https://mediadakwah.id/wp-content/uploads/2021/04/masjid_amerika.png',
                'date' => '2017-11-21',
            ],
            [
                'title' => 'Peran Aktif Remaja Masjid Rahayu dalam Membangun Peradaban Islam',
                'slug' => 'peran-aktif-remaja-masjid-rahayu',
                'content' => "Sejarah emas sebuah peradaban selalu menempatkan pemuda sebagai aktor utamanya. Begitu pula yang terjadi di Masjid Rahayu, Bumi, Laweyan. Sejak masa pembangunannya kembali pada era 1980-an, organisasi remaja masjid (Risalah/Remaja Masjid Rahayu) telah memainkan peranan yang sangat vital dan strategis dalam menggerakkan denyut nadi syiar Islam.\n\nBerdasarkan kenangan Ibu Kusrini yang merupakan salah satu aktivis pemudi masjid pada era 1980-an, semangat keremajaan kala itu begitu berkobar. Para remaja bahu-membahu menyukseskan renovasi masjid, menyebarkan pamflet kegiatan, serta menjadi motor penggerak gotong-royong warga kampung.\n\nSalah satu pilar kontribusi terbesar remaja masjid adalah pengelolaan perpustakaan masjid. Melalui inisiatif ini, para pemuda menyediakan bahan bacaan berkualitas mulai dari buku agama, sejarah Islam, hingga ilmu pengetahuan umum untuk meningkatkan literasi umat dan anak-anak sekitar.\n\nDalam momentum hari besar Islam, seperti Peringatan Hari Besar Islam (PHBI) Maulid Nabi, Isra Miraj, hingga semarak Ramadhan, panitia remaja masjid selalu menjadi garda terdepan dalam menyusun konsep acara yang menarik, mendidik, dan relevan dengan perkembangan zaman. Kehadiran mereka membawa warna segar sehingga dakwah Islam dapat diterima dengan sukacita oleh masyarakat modern.\n\nSelain itu, remaja Masjid Rahayu juga aktif membina kesenian Islami berupa grup musik Hadrah. Latihan rutin rebana yang digelar tiap malam Minggu tidak hanya bertujuan mengasah keterampilan musikal religius, melainkan menjadi wadah berkumpul yang positif guna menghindarkan remaja dari pergaulan bebas dan pengaruh negatif lingkungan luar.\n\nRefleksi penting dari sejarah keremajaan ini mengajarkan kita bahwa masjid yang makmur adalah masjid yang ramah dan merangkul kaum mudanya. Kontribusi tanpa pamrih yang diwariskan generasi remaja 80-an di Masjid Rahayu terus menjadi inspirasi bagi kepengurusan remaja masjid generasi masa kini untuk terus kreatif dan teguh berkhidmat demi peradaban Islam yang rahmatan lil 'alamin.",
                'image' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=800',
                'date' => '2017-11-21',
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
