dropship-marketplace/
│
# ======================================================================
# PUBLIC PAGES (Mobile-first, multi-language, Lazada-inspired UI)
# ======================================================================
│
├─ index.php                          # HOMEPAGE UTAMA
│   ├─ Fungsi: Landing page dengan semua section marketplace
│   ├─ Komponen:
│   │  ├─ Sticky header dengan logo, search, language selector (default Indonesia), cart
│   │  ├─ Banner slider (3 slide utama + 2 side banner) - auto slide
│   │  ├─ Category icons grid (10 kategori dengan icon SVG)
│   │  ├─ Flash Sale section dengan countdown timer real-time
│   │  │  └─ Data produk dari database (filter diskon > 0)
│   │  ├─ Recommended products grid dengan infinite scroll
│   │  │  └─ Data produk dari database (5000+ produk dari hasil scrape)
│   │  ├─ Brands section (logo brand ternama dari database)
│   │  └─ Footer dengan bank logos, policy links, social media, livechat widget
│   └─ File terkait: includes/header.php, includes/footer.php, ajax/products.php
│
├─ product.php                        # DETAIL PRODUK
│   ├─ Fungsi: Menampilkan detail lengkap produk dari database
│   ├─ Fitur:
│   │  ├─ Gallery gambar produk (slider/thumbnail) dari database
│   │  ├─ Info produk: nama, harga USD, rating, terjual (dari hasil scrape)
│   │  ├─ Store info: nama toko (English names), verified badge, lokasi (US/AU/UK)
│   │  ├─ Variasi produk (warna, ukuran) - AJAX update harga
│   │  ├─ Deskripsi detail dari hasil scrape
│   │  ├─ Spesifikasi produk
│   │  ├─ Ulasan pembeli (dummy names: John, Sarah, Michael, David)
│   │  ├─ Rekomendasi produk terkait (dari kategori sama)
│   │  └─ Tombol "Add to Wishlist" (AJAX)
│   └─ File terkait: ajax/product-quick.php, ajax/wishlist.php
│
├─ category.php                       # LISTING KATEGORI
│   ├─ Fungsi: Menampilkan produk per kategori dengan filter
│   ├─ Fitur:
│   │  ├─ Sidebar filter (harga, brand, rating, lokasi toko)
│   │  ├─ Sort by (popular, terbaru, termurah, termahal)
│   │  ├─ Product grid dengan infinite scroll (dari database)
│   │  ├─ Subkategori navigation
│   │  └─ Active filters display
│   └─ File terkait: ajax/products.php?category=slug
│
├─ search.php                         # PENCARIAN
│   ├─ Fungsi: Hasil pencarian produk dari database
│   ├─ Fitur:
│   │  ├─ Live search suggestion (AJAX) dari database
│   │  ├─ Filter dan sort seperti category.php
│   │  ├─ "No result" suggestion
│   │  └─ Recent searches (localStorage)
│   └─ File terkait: ajax/search.php, ajax/search-suggest.php
│
├─ cart.php                           # KERANJANG BELANJA
│   ├─ Fungsi: Menampilkan produk yang ditambahkan (untuk buyer biasa)
│   ├─ Fitur:
│   │  ├─ List produk dengan quantity updater (AJAX)
│   │  ├─ Subtotal per produk (USD)
│   │  ├─ Total keseluruhan (USD)
│   │  ├─ Tombol "Checkout" (mengarah ke login jika perlu)
│   │  └─ Catatan: Produk tidak bisa benar-benar dibeli (hanya simulasi)
│   └─ File terkait: ajax/cart.php (add, update, remove)
│
├─ checkout.php                       # CHECKOUT
│   ├─ Fungsi: Halaman checkout sederhana
│   ├─ Fitur:
│   │  ├─ Form alamat pengiriman
│   │  ├─ Pilihan pengiriman (dummy)
│   │  ├─ Ringkasan pesanan (USD)
│   │  ├─ Metode pembayaran (display only - tidak bisa proses)
│   │  └─ Tombol "Place Order" (akan redirect ke login/register)
│   └─ Catatan: Ini hanya untuk tampilan, order hanya via admin inject
│
├─ wishlist.php                       # WISHLIST
│   ├─ Fungsi: Menampilkan produk favorit user
│   ├─ Fitur:
│   │  ├─ Grid produk wishlist
│   │  ├─ Tombol remove dari wishlist (AJAX)
│   │  ├─ Pindah ke cart
│   │  └─ Share wishlist (opsional)
│   └─ File terkait: ajax/wishlist.php
│
├─ login.php                          # LOGIN
│   ├─ Fungsi: Halaman login untuk semua role (admin, agent, buyer)
│   ├─ Fitur:
│   │  ├─ Form email/username + password
│   │  ├─ Remember me
│   │  ├─ Forgot password link
│   │  ├─ Register link
│   │  ├─ CSRF protection
│   │  ├─ Rate limiting (max 5 attempts per 15 menit)
│   │  └─ Redirect berdasarkan role setelah login
│   └─ File terkait: includes/auth.php, includes/csrf.php
│
├─ register.php                       # REGISTRASI
│   ├─ Fungsi: Registrasi akun baru (buyer/agent)
│   ├─ Fitur:
│   │  ├─ Form: nama, email, password, confirm password
│   │  ├─ Pilihan role: Buyer atau Calon Agent
│   │  ├─ Captcha/Google reCAPTCHA
│   │  ├─ Email verifikasi (kirim token)
│   │  ├─ Password strength meter
│   │  └─ Terms & conditions checkbox
│   └─ File terkait: includes/mailer.php, ajax/check-email.php
│
├─ verify.php                         # VERIFIKASI EMAIL
│   ├─ Fungsi: Verifikasi token email
│   ├─ Fitur:
│   │  ├─ Terima token dari URL
│   │  ├─ Validasi token di database
│   │  ├─ Update email_verified_at
│   │  └─ Redirect ke login dengan pesan sukses
│   └─ File terkait: includes/auth.php
│
├─ forgot-password.php                 # LUPA PASSWORD
│   ├─ Fungsi: Request reset password
│   ├─ Fitur:
│   │  ├─ Form input email
│   │  ├─ Kirim link reset ke email
│   │  ├─ Rate limiting
│   │  └─ Feedback pesan
│   └─ File terkait: includes/mailer.php
│
├─ reset-password.php                  # RESET PASSWORD
│   ├─ Fungsi: Set password baru setelah reset
│   ├─ Fitur:
│   │  ├─ Validasi token
│   │  ├─ Form password baru + confirm
│   │  ├─ Update password di database
│   │  └─ Redirect ke login
│   └─ File terkait: includes/auth.php
│
├─ logout.php                         # LOGOUT
│   ├─ Fungsi: Menghancurkan session
│   ├─ Fitur:
│   │  ├─ Hapus semua session data
│   │  ├─ Regenerate session ID
│   │  └─ Redirect ke homepage
│   └─ File terkait: includes/session.php
│
├─ help.php                           # PUSAT BANTUAN
│   ├─ Fungsi: Halaman FAQ dan bantuan
│   ├─ Fitur:
│   │  ├─ Kategori pertanyaan
│   │  ├─ Search FAQ
│   │  ├─ Contact form (ke email admin)
│   │  └─ Live chat widget (terintegrasi)
│   └─ File terkait: ajax/contact.php, includes/livechat-widget.php
│
├─ terms.php                          # SYARAT & KETENTUAN
│   ├─ Fungsi: Halaman legal terms of service
│   └─ Isi: Dokumen legal lengkap
│
├─ privacy.php                        # KEBIJAKAN PRIVASI
│   ├─ Fungsi: Halaman privacy policy
│   └─ Isi: Dokumen privacy lengkap
│
├─ refund-policy.php                  # KEBIJAKAN PENGEMBALIAN
│   ├─ Fungsi: Halaman refund dan return policy
│   └─ Isi: Dokumen refund policy lengkap
│
├─ about.php                          # TENTANG KAMI
│   ├─ Fungsi: Informasi tentang perusahaan
│   └─ Isi: Visi misi, tim, kontak (menggunakan images/about.png)
│
├─ contact.php                        # KONTAK KAMI
│   ├─ Fungsi: Form kontak dan peta lokasi
│   └─ Fitur: Contact form dengan email tujuan, live chat widget
│
├─ sitemap.xml                        # SITEMAP UNTUK SEO
│   ├─ Fungsi: Daftar semua URL untuk search engine
│   └─ Generate otomatis via cron dari database products
│
├─ robots.txt                         # ROBOTS UNTUK SEO
│   ├─ Fungsi: Petunjuk untuk web crawler
│   └─ Isi: Allow/disallow paths
│
# ======================================================================
# MULTI-LANGUAGE SYSTEM (17 BAHASA LENGKAP)
# ======================================================================
│
├─ lang/
│  ├─ id.php                          # BAHASA INDONESIA (PRIMARY/DEFAULT)
│  │   ├─ Fungsi: Array key-value untuk semua teks
│  │   ├─ Isi: 1000+ string translations
│  │   └─ Kategori: general, auth, product, cart, checkout, seller, admin, errors, chat
│  │
│  ├─ en.php                          # ENGLISH
│  │   └─ Struktur sama dengan id.php
│  │
│  ├─ ms.php                          # MELAYU
│  ├─ zh.php                          # 简体中文
│  ├─ zh_tw.php                       # 繁體中文
│  ├─ ja.php                          # 日本語
│  ├─ ko.php                          # 한국어
│  ├─ th.php                          # ภาษาไทย
│  ├─ vi.php                          # Tiếng Việt
│  ├─ my.php                          # မြန်မာ
│  ├─ de.php                          # DEUTSCH
│  ├─ fr.php                          # FRANÇAIS
│  ├─ es.php                          # ESPAÑOL
│  ├─ it.php                          # ITALIANO
│  ├─ pt.php                          # PORTUGUÊS
│  ├─ ru.php                          # РУССКИЙ
│  └─ tr.php                          # TÜRKÇE
│
# ======================================================================
# CORE SYSTEM (HEART OF THE APPLICATION)
# ======================================================================
│
├─ .env                               # ENVIRONMENT VARIABLES
│   ├─ Fungsi: Menyimpan konfigurasi sensitif
│   ├─ Isi:
│   │  ├─ APP_NAME="Dropship Marketplace"
│   │  ├─ APP_URL="https://yourdomain.com"
│   │  ├─ APP_ENV="production"
│   │  ├─ APP_DEBUG=false
│   │  ├─ DB_HOST="localhost"
│   │  ├─ DB_NAME="anakwrpf_lazada"
│   │  ├─ DB_USER="anakwrpf_sincut"
│   │  ├─ DB_PASS="@Inikuncinya098"
│   │  ├─ MAIL_HOST="smtp.gmail.com"
│   │  ├─ MAIL_PORT=587
│   │  ├─ MAIL_USER="lazadahotdropshiper@gmail.com"
│   │  ├─ MAIL_PASS="qlbk ixds cklj zpvw"
│   │  ├─ USDT_WALLET="TXsuRgXHgHc3VPcmBcaeFNHD5S1Rk3hMu1"
│   │  ├─ RECAPTCHA_KEY="..."
│   │  └─ PUSHER_* (untuk real-time chat, opsional)
│
├─ .env.example                       # TEMPLATE ENV
│   └─ Copy dari .env tanpa nilai sensitif
│
├─ .htaccess                          # APACHE CONFIGURATION
│   ├─ Fungsi: URL rewriting, security headers, caching
│   ├─ Fitur:
│   │  ├─ Language prefix routing (/id/, /en/, dll)
│   │  ├─ Remove trailing slash
│   │  ├─ Force HTTPS
│   │  ├─ Security headers (XSS, CSRF, Clickjacking)
│   │  ├─ Block sensitive files
│   │  ├─ Gzip compression
│   │  └─ Browser caching
│
├─ database.sql                       # DATABASE SCHEMA + SEED
│   ├─ Fungsi: File SQL lengkap untuk import
│   ├─ Isi:
│   │  ├─ 35+ tabel dengan foreign keys (termasuk scraped_products)
│   │  ├─ Indexes untuk optimasi
│   │  ├─ Triggers untuk auto update
│   │  ├─ Stored procedures untuk import scraped data
│   │  ├─ Seed data: 350+ agents (US/AU/UK names), 5000+ products (USD prices)
│   │  └─ Default admin: watasiduk@gmail.com / @Inikuncinya098
│
├─ composer.json                      # COMPOSER DEPENDENCIES
│   ├─ Fungsi: Manajemen dependency PHP
│   ├─ Isi:
│   │  ├─ "phpmailer/phpmailer": "^6.8"        # Email
│   │  ├─ "ramsey/uuid": "^4.7"                # Generate UUID
│   │  ├─ "vlucas/phpdotenv": "^5.5"           # Load .env
│   │  ├─ "intervention/image": "^2.7"         # Image manipulation
│   │  ├─ "spatie/simple-excel": "^1.0"        # Excel export/import
│   │  ├─ "cboden/ratchet": "^0.4.4"           # WebSocket untuk real-time chat
│   │  └─ "league/csv": "^9.0"                  # CSV processing untuk import scraped data
│
├─ vendor/                            # COMPOSER LIBRARIES
│   └─ (Auto-generated by composer)
│
├─ includes/                          # CORE INCLUDE FILES
│  ├─ config.php                      # MAIN CONFIGURATION
│  │   ├─ Fungsi: Load semua konfigurasi
│  │   ├─ Isi:
│  │   │  ├─ Load .env variables
│  │   │  ├─ Define constants
│  │   │  ├─ Set timezone (Asia/Jakarta)
│  │   │  ├─ Session configuration
│  │   │  ├─ Error reporting
│  │   │  └─ Load language (default: id)
│  │
│  ├─ database.php                    # DATABASE CONNECTION
│  │   ├─ Fungsi: Koneksi PDO ke database
│  │   ├─ Fitur:
│  │   │  ├─ Singleton pattern
│  │   │  ├─ Prepared statements ready
│  │   │  ├─ Error handling
│  │   │  └─ Transaction support
│  │   └─ Fungsi helper: db()->query(), db()->prepare()
│  │
│  ├─ session.php                     # SESSION HANDLING
│  │   ├─ Fungsi: Secure session management
│  │   ├─ Fitur:
│  │   │  ├─ Session start dengan konfigurasi aman
│  │   │  ├─ Regenerate ID periodically
│  │   │  ├─ Session timeout
│  │   │  ├─ Prevent session fixation
│  │   │  └─ Flash messages
│  │
│  ├─ functions.php                   # GLOBAL HELPER FUNCTIONS
│  │   ├─ Fungsi: Kumpulan helper untuk seluruh aplikasi
│  │   ├─ Daftar fungsi:
│  │   │  ├─ __($key, $params=[]) - Translate string
│  │   │  ├─ moneyFmt($amount) - Format USD ($1,299.99)
│  │   │  ├─ dateFmt($date) - Format MM/DD/YYYY
│  │   │  ├─ h($string) - HTML escape (htmlspecialchars)
│  │   │  ├─ redirect($url) - Redirect
│  │   │  ├─ slugify($string) - Buat URL slug
│  │   │  ├─ generateInvoice() - Buat nomor invoice unik
│  │   │  ├─ randomBuyer($country) - Generate data buyer US/AU/UK
│  │   │  ├─ getCurrencySymbol() - Return $
│  │   │  ├─ flash($key, $value=null) - Flash messaging
│  │   │  ├─ old($key) - Old input value
│  │   │  ├─ asset($path) - Generate asset URL
│  │   │  └─ getProductsFromDB($category, $limit, $offset) - Ambil produk dari database
│  │
│  ├─ language.php                    # MULTI-LANGUAGE LOADER
│  │   ├─ Fungsi: Load dan manage file bahasa
│  │   ├─ Fitur:
│  │   │  ├─ Load file berdasarkan session/cookie/URL prefix
│  │   │  ├─ Default: Indonesia (id)
│  │   │  ├─ Fallback ke Indonesia jika file tidak ada
│  │   │  ├─ Cache translations
│  │   │  ├─ Language switcher logic
│  │   │  └─ RTL support untuk bahasa tertentu
│  │
│  ├─ auth.php                        # AUTHENTICATION SYSTEM
│  │   ├─ Fungsi: Login, register, logout, role checks
│  │   ├─ Fungsi:
│  │   │  ├─ login($email, $password, $remember)
│  │   │  ├─ logout()
│  │   │  ├─ isLoggedIn()
│  │   │  ├─ currentUser()
│  │   │  ├─ requireLogin()
│  │   │  ├─ hasRole($role) - admin/agent/buyer
│  │   │  ├─ requireRole($role)
│  │   │  ├─ isAdmin()
│  │   │  └─ isAgent()
│  │   └─ Fitur: Brute force protection, remember me tokens
│  │
│  ├─ csrf.php                        # CSRF PROTECTION
│  │   ├─ Fungsi: Mencegah Cross-Site Request Forgery
│  │   ├─ Fungsi:
│  │   │  ├─ generateCsrfToken()
│  │   │  ├─ validateCsrfToken($token)
│  │   │  ├─ csrfField() - Return HTML input hidden
│  │   │  └─ checkCsrf() - Validasi otomatis untuk POST
│  │
│  ├─ uploader.php                    # FILE UPLOAD HANDLER
│  │   ├─ Fungsi: Upload dan validasi file
│  │   ├─ Fitur:
│  │   │  ├─ Validasi tipe file (jpg, png, pdf)
│  │   │  ├─ Validasi ukuran file
│  │   │  ├─ Generate unique filename
│  │   │  ├─ Compress image
│  │   │  ├─ Create thumbnail
│  │   │  └─ Upload ke folder yang sesuai
│  │
│  ├─ mailer.php                      # EMAIL HANDLER
│  │   ├─ Fungsi: Kirim email via SMTP
│  │   ├─ Fitur:
│  │   │  ├─ Kirim verifikasi email
│  │   │  ├─ Kirim reset password
│  │   │  ├─ Kirim notifikasi order
│  │   │  ├─ Kirim invoice
│  │   │  ├─ Kirim notifikasi chat (opsional)
│  │   │  ├─ Support HTML template
│  │   │  └─ Attachment support
│  │
│  ├─ logger.php                      # LOGGING SYSTEM
│  │   ├─ Fungsi: Mencatat aktivitas sistem
│  │   ├─ Fungsi:
│  │   │  ├─ logInfo($message, $context=[])
│  │   │  ├─ logError($message, $context=[])
│  │   │  ├─ logWarning($message, $context=[])
│  │   │  ├─ logAdmin($action, $details)
│  │   │  ├─ logSeller($action, $details)
│  │   │  └─ logChat($action, $details)
│  │   └─ Output: File di /storage/logs/
│  │
│  ├─ pagination.php                  # PAGINATION HELPER
│  │   ├─ Fungsi: Cursor-based pagination untuk infinite scroll
│  │   ├─ Fungsi:
│  │   │  ├─ paginate($query, $perPage, $lastId)
│  │   │  ├─ renderLinks()
│  │   │  └─ nextCursor()
│  │
│  ├─ validation.php                  # FORM VALIDATION
│  │   ├─ Fungsi: Validasi input form
│  │   ├─ Aturan:
│  │   │  ├─ required, email, min, max, unique
│  │   │  ├─ matches, date, numeric, alpha
│  │   │  ├─ file, image, mimes
│  │   │  └─ custom rules
│  │
│  ├─ cart.php                        # CART MANAGEMENT
│  │   ├─ Fungsi: Kelola keranjang belanja
│  │   ├─ Fitur:
│  │   │  ├─ Add to cart
│  │   │  ├─ Update quantity
│  │   │  ├─ Remove item
│  │   │  ├─ Get cart total (USD)
│  │   │  └─ Clear cart
│  │
│  ├─ wishlist.php                    # WISHLIST MANAGEMENT
│  │   ├─ Fungsi: Kelola wishlist user
│  │   ├─ Fitur:
│  │   │  ├─ Add to wishlist
│  │   │  ├─ Remove from wishlist
│  │   │  ├─ Check if in wishlist
│  │   │  └─ Get wishlist count
│  │
│  ├─ header.php                      # PUBLIC HEADER TEMPLATE
│  │   ├─ Fungsi: Header untuk semua halaman public
│  │   ├─ Komponen:
│  │   │  ├─ Top bar dengan language selector (default: Indonesia)
│  │   │  ├─ Logo (menggunakan images/lazada-logo.png)
│  │   │  ├─ Search bar dengan autocomplete (dari database)
│  │   │  ├─ Cart icon dengan count badge
│  │   │  ├─ Wishlist icon
│  │   │  ├─ User menu (login/register atau profile dropdown) dengan icon login.png
│  │   │  └─ Mobile bottom navigation (menggunakan images/f1.png - f5.png dan f1-active.png - f5-active.png)
│  │
│  ├─ footer.php                      # PUBLIC FOOTER TEMPLATE
│  │   ├─ Fungsi: Footer untuk semua halaman public
│  │   ├─ Komponen:
│  │   │  ├─ Bank logos (BCA, Mandiri, BRI, BNI, bsi.png, dll)
│  │   │  ├─ Trust badges (pcidss.png, visa.png, mastercard.png)
│  │   │  ├─ Policy links
│  │   │  ├─ Social media links (facebook.png, instagram.png, tiktok.png, twiter.png, youtube.png)
│  │   │  ├─ App store badges (googleplay.png, appstore.png, appgalery.png)
│  │   │  ├─ Newsletter signup
│  │   │  ├─ Contact info
│  │   │  ├─ Copyright
│  │   │  └─ **LIVECHAT WIDGET** (menggunakan images/livechat.png dan livechat2.png)
│  │
│  └─ livechat-widget.php             # LIVECHAT WIDGET COMPONENT
│      ├─ Fungsi: Include file untuk menampilkan widget chat
│      ├─ Komponen:
│      │  ├─ Chat button (floating di pojok kanan bawah) dengan images/livechat.png
│      │  ├─ Chat box (popup)
│      │  ├─ Message history
│      │  ├─ Typing indicator
│      │  ├─ File attachment (optional)
│      │  └─ Emoji picker (optional)
│      └─ File terkait: ajax/chat/
│
# ======================================================================
# SCRAPER INTEGRATION MODULE
# ======================================================================
│
├─ scrapers/                          # PYTHON SCRAPERS (SELENIUM)
│  ├─ requirements.txt                # Python dependencies
│  │   ├─ selenium==4.15.0
│  │   ├─ beautifulsoup4==4.12.0
│  │   ├─ pandas==2.0.0
│  │   ├─ requests==2.31.0
│  │   ├─ python-slugify==8.0.0
│  │   ├─ colorama==0.4.6
│  │   ├─ mysql-connector-python==8.1.0
│  │   └─ python-dotenv==1.0.0
│  │
│  ├─ config.py                       # Scraper configuration
│  │   ├─ Fungsi: Load konfigurasi dari .env
│  │   ├─ Isi:
│  │   │  ├─ Database connection
│  │   │  ├─ Proxy settings (optional)
│  │   │  ├─ User agents list
│  │   │  └─ Output directories
│  │
│  ├─ amazon_scraper.py               # AMAZON USA SCRAPER (SELENIUM)
│  │   ├─ Fungsi: Scrape produk dari Amazon US
│  │   ├─ Fitur:
│  │   │  ├─ Anti-detection dengan Chrome options
│  │   │  ├─ Random user agents
│  │   │  ├─ Handle CAPTCHA detection
│  │   │  ├─ Auto scroll untuk load products
│  │   │  ├─ Extract: nama, harga USD, toko, gambar, rating
│  │   │  ├─ Save ke JSON dan CSV
│  │   │  └─ **INTEGRASI DATABASE LANGSUNG**
│  │   └─ File: (sudah diberikan script lengkap)
│  │
│  ├─ ebay_scraper.py                  # EBAY SCRAPER
│  │   ├─ Fungsi: Scrape produk dari eBay
│  │   ├─ Fitur: Sama dengan amazon_scraper.py
│  │   └─ Target: Produk international
│  │
│  ├─ walmart_scraper.py                # WALMART SCRAPER
│  │   ├─ Fungsi: Scrape produk dari Walmart
│  │   └─ Target: Produk US dengan harga kompetitif
│  │
│  ├─ aliexpress_scraper.py              # ALIEXPRESS SCRAPER
│  │   ├─ Fungsi: Scrape produk dari AliExpress
│  │   └─ Target: Produk China dengan harga murah
│  │
│  ├─ utils/
│  │  ├─ proxy_rotator.py                # Rotate proxies
│  │  │   ├─ Fungsi: Rotate proxy untuk hindari block
│  │  │   └─ Support: HTTP, HTTPS, SOCKS5
│  │  │
│  │  ├─ user_agents.py                   # Rotate user agents
│  │  │   ├─ Fungsi: Random user agent
│  │  │   └─ List: 100+ user agents
│  │  │
│  │  ├─ captcha_handler.py                # Handle CAPTCHA
│  │  │   ├─ Fungsi: Deteksi dan handle CAPTCHA
│  │  │   └─ Integrasi: 2captcha API (optional)
│  │  │
│  │  └─ db_importer.py                    # DATABASE IMPORTER
│  │      ├─ Fungsi: Import hasil scrape ke database website
│  │      ├─ Fitur:
│  │      │  ├─ Connect ke database MySQL
│  │      │  ├─ Insert ke tabel scraped_products
│  │      │  ├─ Update jika produk sudah ada (berdasarkan URL/sku)
│  │      │  ├─ Auto mapping kategori
│  │      │  ├─ Download gambar ke folder assets/images/products/[source]/
│  │      │  └─ Logging hasil import
│  │      └─ Fungsi: import_to_database($data, $source)
│  │
│  ├─ run_scraper.py                      # MAIN SCRAPER RUNNER
│  │   ├─ Fungsi: Menjalankan semua scraper
│  │   ├─ Fitur:
│  │   │  ├─ Command line interface
│  │   │  ├─ Pilih source (amazon/ebay/walmart/all)
│  │   │  ├─ Pilih kategori
│  │   │  ├─ Set jumlah halaman
│  │   │  ├─ Headless mode
│  │   │  ├─ **AUTO IMPORT KE DATABASE**
│  │   │  └─ Schedule dengan cron
│  │   └─ Usage: python run_scraper.py --source=amazon --pages=5 --import-db
│  │
│  ├─ scheduler.py                        # CRON JOBS SCHEDULER
│  │   ├─ Fungsi: Menjadwalkan scraping otomatis
│  │   ├─ Fitur:
│  │   │  ├─ Run setiap 6 jam
│  │   │  ├─ Rotate source
│  │   │  ├─ Random delay
│  │   │  └─ Auto import ke database
│  │   └─ Run: python scheduler.py &
│  │
│  ├─ sample_data/                         # Sample output
│  │  ├─ products_amazon.json
│  │  ├─ products_ebay.json
│  │  └─ categories_mapping.json
│  │
│  └─ logs/                                 # Scraper logs
│     ├─ scraper_2025-02-23.log
│     └─ db_import_2025-02-23.log
│
# ======================================================================
# SCRAPED PRODUCTS MANAGEMENT (ADMIN PANEL)
# ======================================================================
│
├─ admin/modules/scraped-products/          # MANAJEMEN HASIL SCRAPE
│  ├─ index.php
│  │   ├─ Fungsi: List semua produk hasil scrape
│  │   ├─ Fitur:
│  │   │  ├─ DataTable dengan server-side processing
│  │   │  ├─ Filter by source (Amazon/eBay/Walmart)
│  │   │  ├─ Filter by category
│  │   │  ├─ Filter by status (pending/approved/rejected)
│  │   │  ├─ Search produk
│  │   │  ├─ Preview gambar
│  │   │  ├─ Harga USD
│  │   │  └─ Store info (nama toko internasional)
│  │
│  ├─ view.php
│  │   ├─ Fungsi: Detail produk hasil scrape
│  │   ├─ Informasi:
│  │   │  ├─ Semua data asli dari source
│  │   │  ├─ Gambar produk
│  │   │  ├─ Raw JSON data
│  │   │  └─ Similar products di database
│  │
│  ├─ approve.php
│  │   ├─ Fungsi: Approve produk untuk ditampilkan di website
│  │   ├─ Proses:
│  │   │  ├─ Pindah ke tabel products
│  │   │  ├─ Assign ke agent (random/auto)
│  │   │  ├─ Set harga jual (markup otomatis)
│  │   │  └─ Update status scraped_products
│  │
│  ├─ reject.php
│  │   ├─ Fungsi: Tolak produk
│  │   └─ Update status ke rejected
│  │
│  ├─ bulk-approve.php
│  │   ├─ Fungsi: Approve massal
│  │   ├─ Fitur:
│  │   │  ├─ Pilih multiple produk
│  │   │  ├─ Set markup percentage (default: 30%)
│  │   │  └─ Assign ke agent yang dipilih
│  │
│  ├─ settings.php
│  │   ├─ Fungsi: Pengaturan auto-approve
│  │   ├─ Fields:
│  │   │  ├─ Auto-approve products (yes/no)
│  │   │  ├─ Default markup percentage
│  │   │  ├─ Min price untuk auto-approve
│  │   │  ├─ Max price
│  │   │  └─ Default category mapping
│  │
│  └─ ajax/
│     ├─ get-products.php
│     ├─ update-status.php
│     └─ import-selected.php
│
# ======================================================================
# LIVECHAT SYSTEM (REAL-TIME CUSTOMER SUPPORT)
# ======================================================================
│
├─ chat-server.php                    # WEBSOCKET SERVER (RATCHET)
│   ├─ Fungsi: Server WebSocket untuk real-time chat
│   ├─ Fitur:
│   │  ├─ Handle koneksi real-time
│   │  ├─ Broadcast pesan ke admin yang tepat
│   │  ├─ Typing notifications
│   │  ├─ Online/offline status
│   │  └─ Read receipts
│   └─ Run: php chat-server.php (background process)
│
├─ ajax/chat/
│  ├─ send-message.php                 # KIRIM PESAN CHAT
│  │   ├─ Fungsi: Simpan pesan baru ke database
│  │   ├─ Parameter: POST {message, session_id, user_id (optional)}
│  │   ├─ Proses:
│  │   │  ├─ Insert ke chat_messages
│  │   │  ├─ Trigger notifikasi ke admin via WebSocket
│  │   │  └─ Play notifmasuk.mp3 di admin panel
│  │   └─ Response: JSON {success, message_id, timestamp}
│  │
│  ├─ get-messages.php                  # AMBIL HISTORY CHAT
│  │   ├─ Fungsi: Ambil riwayat pesan
│  │   ├─ Parameter: GET {session_id, last_id (optional)}
│  │   ├─ Response: JSON array pesan
│  │   └─ Method: GET
│  │
│  ├─ mark-read.php                      # TANDAI SUDAH DIBACA
│  │   ├─ Fungsi: Update status pesan ke 'read'
│  │   ├─ Parameter: POST {message_ids[]}
│  │   └─ Response: JSON {success}
│  │
│  ├─ typing-status.php                   # TYPING INDICATOR
│  │   ├─ Fungsi: Broadcast status typing
│  │   ├─ Parameter: POST {session_id, is_typing}
│  │   └─ Response: JSON {success}
│  │
│  ├─ get-unread-count.php                 # JUMLAH PESAN UNREAD
│  │   ├─ Fungsi: Hitung pesan belum dibaca
│  │   ├─ Parameter: GET {admin_id}
│  │   ├─ Response: JSON {total_unread, sessions: [...]}
│  │   └─ Method: GET (dipanggil setiap 5 detik)
│  │
│  └─ end-session.php                       # AKHIRI SESI CHAT
│      ├─ Fungsi: Tutup sesi chat
│      ├─ Parameter: POST {session_id}
│      └─ Response: JSON {success}
│
# ======================================================================
# ADMIN PANEL - LIVECHAT MODULE (DENGAN NOTIFIKASI SUARA)
# ======================================================================
│
├─ admin/modules/livechat/                   # MODUL LIVECHAT UNTUK ADMIN
│  ├─ index.php
│  │   ├─ Fungsi: Dashboard livechat untuk admin
│  │   ├─ Fitur:
│  │   │  ├─ List active chat sessions
│  │   │  ├─ Status online/offline admin
│  │   │  ├─ Unread count badge dengan animasi
│  │   │  ├─ **NOTIFIKASI SUARA** otomatis saat ada pesan masuk
│  │   │  ├─ Quick replies template
│  │   │  └─ Transfer chat ke admin lain
│  │
│  ├─ chat.php
│  │   ├─ Fungsi: Halaman chat detail dengan user
│  │   ├─ Fitur:
│  │   │  ├─ Real-time messaging (WebSocket)
│  │   │  ├─ Typing indicator
│  │   │  ├─ User info (location, device, page visited)
│  │   │  ├─ File attachment viewer
│  │   │  ├─ Chat history
│  │   │  └─ **PLAY SOUND** otomatis saat pesan baru
│  │
│  ├─ history.php
│  │   ├─ Fungsi: Riwayat semua chat
│  │   ├─ Fitur:
│  │   │  ├─ Filter by date/user
│  │   │  ├─ Export chat log
│  │   │  └─ Search conversations
│  │
│  ├─ settings.php
│  │   ├─ Fungsi: Pengaturan livechat
│  │   ├─ Fields:
│  │   │  ├─ Auto greeting message
│  │   │  ├─ Offline message
│  │   │  ├─ Working hours
│  │   │  ├─ Max chat per admin
│  │   │  └─ **SOUND SETTINGS**: Enable/disable notifikasi suara
│  │
│  └─ ajax/
│     ├─ get-active-sessions.php
│     ├─ transfer-chat.php
│     └─ update-settings.php
│
# ======================================================================
# ASSETS - SOUND NOTIFICATIONS
# ======================================================================
│
├─ assets/sound/
│  ├─ notifmasuk.mp3                    # SUARA NOTIFIKASI CHAT MASUK
│  │   ├─ Fungsi: Diputar saat ada pesan baru di admin panel
│  │   └─ Sumber: Bisa pakai notif Telegram/Whatsapp style
│  │
│  ├─ notif-order.mp3                    # SUARA NOTIFIKASI ORDER BARU
│  │   ├─ Fungsi: Diputar saat admin inject order
│  │   └─ Untuk notifikasi ke seller (opsional)
│  │
│  └─ notif-payment.mp3                   # SUARA NOTIFIKASI PEMBAYARAN
│      ├─ Fungsi: Diputar saat payment verified
│      └─ Untuk admin/seller
│
# ======================================================================
# ASSETS - CSS, JS, IMAGES, FONTS
# ======================================================================
│
├─ assets/
│  ├─ css/
│  │  ├─ mobile.css                      # MOBILE-FIRST STYLES (PRIMARY)
│  │  │   ├─ Fungsi: Styling untuk mobile (0-768px)
│  │  │   ├─ Komponen:
│  │  │   │  ├─ Reset CSS
│  │  │   │  ├─ Variables (warna: #f57224, #9333EA, #10B981)
│  │  │   │  ├─ Typography (Poppins, Roboto)
│  │  │   │  ├─ Layout (flexbox, grid)
│  │  │   │  ├─ Header sticky
│  │  │   │  ├─ Bottom navigation (menggunakan images f1-f5)
│  │  │   │  ├─ Product cards (harga USD, source badge)
│  │  │   │  ├─ Category icons
│  │  │   │  ├─ Flash sale timer dengan images/super-flash.png
│  │  │   │  ├─ **LIVECHAT WIDGET STYLES**
│  │  │   │  ├─ Modal
│  │  │   │  ├─ Skeleton loading
│  │  │   │  └─ Animations
│  │  │
│  │  ├─ desktop.css                     # DESKTOP ENHANCEMENTS
│  │  │   ├─ Fungsi: Override untuk desktop (769px+)
│  │  │   ├─ Komponen:
│  │  │   │  ├─ Wider containers
│  │  │   │  ├─ Hover effects
│  │  │   │  ├─ Dropdown menus
│  │  │   │  └─ Multi-column layouts
│  │  │
│  │  ├─ admin.css                        # ADMIN PANEL STYLES
│  │  │   ├─ Fungsi: Styling khusus admin
│  │  │   ├─ Komponen:
│  │  │   │  ├─ Dashboard cards
│  │  │   │  ├─ DataTables customization
│  │  │   │  ├─ Forms
│  │  │   │  ├─ Charts
│  │  │   │  ├─ **LIVECHAT NOTIFICATION ANIMATIONS**
│  │  │   │  └─ **SCRAPER STATUS BADGES**
│  │  │
│  │  ├─ seller.css                       # SELLER DASHBOARD STYLES
│  │  │   ├─ Fungsi: Styling khusus seller
│  │  │   └─ Komponen:
│  │  │      ├─ Order cards
│  │  │      ├─ Status badges
│  │  │      ├─ Payment modal
│  │  │      └─ Wallet display (USD) dengan images/wallet.png
│  │  │
│  │  ├─ chat.css                         # LIVECHAT SPECIFIC STYLES
│  │  │   ├─ Fungsi: Styling untuk komponen chat
│  │  │   ├─ Komponen:
│  │  │   │  ├─ Chat widget floating button dengan images/livechat.png
│  │  │   │  ├─ Chat box (popup)
│  │  │   │  ├─ Message bubbles
│  │  │   │  ├─ Typing indicator
│  │  │   │  ├─ Emoji picker
│  │  │   │  └─ File attachment UI
│  │  │
│  │  └─ components/                       # COMPONENT-SPECIFIC CSS
│  │     ├─ cards.css
│  │     ├─ buttons.css
│  │     ├─ modals.css
│  │     ├─ forms.css
│  │     ├─ tables.css
│  │     ├─ badges.css
│  │     ├─ skeleton.css
│  │     ├─ slider.css
│  │     └─ infinite-scroll.css
│  │
│  ├─ js/
│  │  ├─ main.js                           # GLOBAL JAVASCRIPT
│  │  │   ├─ Fungsi: Inisialisasi semua komponen
│  │  │   ├─ Fitur:
│  │  │   │  ├─ DOM ready handler
│  │  │   │  ├─ AJAX setup (CSRF token)
│  │  │   │  ├─ Mobile menu toggle
│  │  │   │  ├─ Back to top
│  │  │   │  └─ Toast notifications
│  │  │
│  │  ├─ language.js                       # LANGUAGE SWITCHER
│  │  │   ├─ Fungsi: Handle pergantian bahasa
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Dropdown language selector dengan images/lang1.png
│  │  │   │  ├─ AJAX call ke switch-language.php
│  │  │   │  ├─ Update UI tanpa reload (optional)
│  │  │   │  └─ Save preference ke cookie
│  │  │
│  │  ├─ infinite-scroll.js                 # INFINITE SCROLL
│  │  │   ├─ Fungsi: Load more products saat scroll dari database
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Intersection Observer API
│  │  │   │  ├─ Loading spinner
│  │  │   │  ├─ No more data handling
│  │  │   │  └─ Error handling
│  │  │
│  │  ├─ slider.js                          # BANNER SLIDER
│  │  │   ├─ Fungsi: Banner carousel dengan images/slide-1.jpg, slide-2.jpg, slide-3.jpg
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Auto slide
│  │  │   │  ├─ Touch support
│  │  │   │  ├─ Navigation dots
│  │  │   │  └─ Pause on hover
│  │  │
│  │  ├─ cart.js                            # CART FUNCTIONALITY
│  │  │   ├─ Fungsi: AJAX cart operations
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Add to cart
│  │  │   │  ├─ Update quantity
│  │  │   │  ├─ Remove item
│  │  │   │  └─ Update cart count badge
│  │  │
│  │  ├─ wishlist.js                        # WISHLIST FUNCTIONALITY
│  │  │   ├─ Fungsi: AJAX wishlist toggle
│  │  │   └─ Fitur: Heart icon toggle
│  │  │
│  │  ├─ search.js                          # LIVE SEARCH
│  │  │   ├─ Fungsi: Autocomplete search dari database
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Debounce input
│  │  │   │  ├─ AJAX suggestions
│  │  │   │  └─ Keyboard navigation
│  │  │
│  │  ├─ countdown.js                       # FLASH SALE TIMER
│  │  │   ├─ Fungsi: Countdown timer real-time dengan images/super-flash.png
│  │  │   └─ Update setiap detik
│  │  │
│  │  ├─ chat.js                            # LIVECHAT CLIENT-SIDE
│  │  │   ├─ Fungsi: Semua fungsionalitas chat untuk pengunjung
│  │  │   ├─ Fitur:
│  │  │   │  ├─ WebSocket connection
│  │  │   │  ├─ Send/receive messages
│  │  │   │  ├─ Typing indicator
│  │  │   │  ├─ Emoji picker
│  │  │   │  ├─ File upload
│  │  │   │  └─ Minimize/expand widget dengan images/livechat.png dan livechat2.png
│  │  │
│  │  ├─ admin.js                           # ADMIN PANEL JS
│  │  │   ├─ Fungsi: Semua JS untuk admin
│  │  │   ├─ Fitur:
│  │  │   │  ├─ DataTables initialization
│  │  │   │  ├─ Chart.js
│  │  │   │  ├─ Form validation
│  │  │   │  ├─ **LIVECHAT NOTIFICATION HANDLER** (play sound)
│  │  │   │  ├─ **SCRAPER STATUS POLLER**
│  │  │   │  └─ AJAX handlers
│  │  │
│  │  ├─ admin-chat.js                      # ADMIN LIVECHAT JS
│  │  │   ├─ Fungsi: JS khusus untuk modul livechat admin
│  │  │   ├─ Fitur:
│  │  │   │  ├─ **PLAY NOTIFMASUK.MP3** saat pesan baru
│  │  │   │  ├─ Real-time message updates
│  │  │   │  ├─ Multiple chat sessions
│  │  │   │  ├─ Quick replies
│  │  │   │  └─ Transfer chat
│  │  │
│  │  ├─ seller.js                          # SELLER DASHBOARD JS
│  │  │   ├─ Fungsi: Semua JS untuk seller
│  │  │   ├─ Fitur:
│  │  │   │  ├─ Order actions (confirm, ship, deliver)
│  │  │   │  ├─ Payment modal
│  │  │   │  ├─ Copy USDT address
│  │  │   │  ├─ File upload preview
│  │  │   │  ├─ Wallet management dengan images/wallet.png, recharge.png, withdraw.png, withdrawals.png
│  │  │   │  └─ Notification poller (setInterval)
│  │  │
│  │  └─ vendor/                             # THIRD-PARTY LIBRARIES
│  │     ├─ alpine.min.js                    # Alpine.js (optional)
│  │     ├─ chart.min.js                     # Chart.js
│  │     ├─ jquery.min.js                    # jQuery (if needed)
│  │     ├─ datatables.min.js                # DataTables
│  │     ├─ moment.min.js                    # Moment.js
│  │     ├─ emoji-picker.js                   # Emoji picker untuk chat
│  │     └─ socket.io.js                      # Socket.io client (jika pakai)
│  │
│  ├─ images/
│  │  # ===== LOGO & BRAND IDENTITY =====
│  │  ├─ lazada-logo.png                    # Logo utama website (header/footer)
│  │  ├─ lazada.png                          # Logo alternatif untuk berbagai keperluan
│  │  ├─ pinters.png                          # Gambar identitas brand alternatif
│  │  ├─ favicon.ico                          # Icon tab browser
│  │  ├─ verified-badge.svg                   # Verified badge icon
│  │  ├─ placeholder.jpg                       # Placeholder image
│  │  ├─ no-image.jpg                          # No image available
│  │  ├─ cart.url                              # Shortcut/URL keranjang (file konfigurasi)
│  │
│  │  # ===== BOTTOM NAVIGATION (MOBILE) =====
│  │  ├─ f1.png                                # Bottom nav - Home (non-aktif)
│  │  ├─ f1-active.png                          # Bottom nav - Home (aktif)
│  │  ├─ f2.png                                # Bottom nav - Kategori (non-aktif)
│  │  ├─ f2-active.png                          # Bottom nav - Kategori (aktif)
│  │  ├─ f3.png                                # Bottom nav - Keranjang (non-aktif)
│  │  ├─ f3-active.png                          # Bottom nav - Keranjang (aktif)
│  │  ├─ f4.png                                # Bottom nav - Order (non-aktif)
│  │  ├─ f4-active.png                          # Bottom nav - Order (aktif)
│  │  ├─ f5.png                                # Bottom nav - Akun (non-aktif)
│  │  └─ f5-active.png                          # Bottom nav - Akun (aktif)
│  │
│  │  # ===== BANNERS & SLIDERS =====
│  │  ├─ slide-1.jpg                            # Slider homepage utama - slide 1
│  │  ├─ slide-2.jpg                            # Slider homepage utama - slide 2
│  │  ├─ slide-3.jpg                            # Slider homepage utama - slide 3
│  │  ├─ header-banner.png                       # Banner utama di header
│  │  ├─ haibao.jpg                              # Banner promosi flash sale
│  │  ├─ main-huodong.jpg                         # Banner event/campaign besar
│  │  ├─ bg-myhead3.jpg                           # Background header/dashboard user
│  │  ├─ blog.jpg                                 # Banner/cover halaman blog
│  │  └─ j&tcard.jpg                              # Banner kartu promo J&T Express
│  │
│  │  # ===== COUNTRY FLAGS (MULTI-LANGUAGE) =====
│  │  ├─ indonesia.png                            # Bendera Indonesia (default)
│  │  ├─ malaysia.png                             # Bendera Malaysia
│  │  ├─ singapura.png                            # Bendera Singapore
│  │  ├─ thailand.png                             # Bendera Thailand
│  │  ├─ vietnam.png                              # Bendera Vietnam
│  │  ├─ philippines.png                           # Bendera Philippines
│  │  └─ in.png                                   # Bendera India
│  │
│  │  # ===== SOCIAL MEDIA ICONS =====
│  │  ├─ facebook.png                             # Icon Facebook
│  │  ├─ instagram.png                            # Icon Instagram
│  │  ├─ tiktok.png                               # Icon TikTok
│  │  ├─ twiter.png                               # Icon Twitter/X
│  │  ├─ youtube.png                              # Icon YouTube
│  │  ├─ livechat.png                             # Icon live chat (default)
│  │  └─ livechat2.png                            # Icon live chat aktif/online
│  │
│  │  # ===== PAYMENT METHODS & LOGISTICS =====
│  │  ├─ visa.png                                 # Logo pembayaran Visa
│  │  ├─ mastercard.png                           # Logo pembayaran Mastercard
│  │  ├─ pcidss.png                               # Logo sertifikasi keamanan PCI DSS
│  │  ├─ bsi.png                                  # Logo Bank Syariah Indonesia
│  │  ├─ cashondelivery.png                       # Icon metode pembayaran COD
│  │  ├─ gosen.png                                # Icon metode pembayaran/partner
│  │  ├─ grab.png                                 # Icon GrabPay / Grab Express
│  │  ├─ sap.png                                  # Icon metode pembayaran/payment gateway
│  │  ├─ j&t.png                                  # Logo ekspedisi J&T Express
│  │  ├─ jne.png                                  # Logo ekspedisi JNE
│  │  ├─ sicepat.png                              # Logo ekspedisi SiCepat
│  │  ├─ anteraja.png                             # Logo ekspedisi AnterAja
│  │  ├─ ninja.png                                # Logo ekspedisi Ninja Express
│  │  └─ lazadalogistik.png                       # Logo logistik internal Lazada
│  │
│  │  # ===== APP STORE BADGES =====
│  │  ├─ googleplay.png                           # Badge Google Play Store
│  │  ├─ appstore.png                             # Badge Apple App Store
│  │  └─ appgalery.png                            # Badge Huawei AppGallery
│  │
│  │  # ===== SAMPLE PRODUCT IMAGES (DARI SCRAPE) =====
│  │  ├─ products/
│  │  │  ├─ amazon/
│  │  │  │  ├─ 2025/02/23/
│  │  │  │  │  ├─ 06b5ca63-b409-46df-9ff6-2477ac0f2550_ID-776-194.png_2200x2200q80.png_.avif
│  │  │  │  │  ├─ c507d4d3-f70c-4f1a-9e97-7cec37181888_ID-776-194.jpg_2200x2200q80.jpg_.avif
│  │  │  │  │  └─ fca37b07-74f5-461e-9143-8a5df8fd417c_ID-776-194.jpg_2200x2200q80.jpg_.avif
│  │  │  │  └─ ...
│  │  │  ├─ ebay/
│  │  │  └─ walmart/
│  │  │
│  │  # ===== ICON UI/UX - NAVIGATION & MENU =====
│  │  ├─ about.png                                 # Icon halaman tentang kami
│  │  ├─ address.png                               # Icon alamat pengiriman
│  │  ├─ apply.png                                 # Icon ajukan permintaan
│  │  ├─ categories.png                            # Icon menu kategori
│  │  ├─ collection.png                            # Icon koleksi
│  │  ├─ product-collection.png                    # Icon koleksi produk (alternatif)
│  │  ├─ shop-street.png                            # Icon halaman marketplace/toko
│  │  ├─ login.png                                 # Icon login
│  │  ├─ signout.png                               # Icon logout
│  │  ├─ lang1.png                                 # Icon pilihan bahasa
│  │  ├─ customer-service.png                       # Icon layanan pelanggan
│  │  ├─ management.png                            # Icon manajemen akun
│  │  ├─ setup.png                                 # Icon pengaturan akun
│  │  └─ icon-myWaitComment.png                     # Icon notifikasi menunggu komentar
│  │
│  │  # ===== USER WALLET & FINANCE =====
│  │  ├─ wallet.png                                # Icon dompet user / saldo utama
│  │  ├─ walet-addres.png                          # Icon alamat wallet (USDT/crypto)
│  │  ├─ recharge.png                              # Icon isi saldo / top up wallet
│  │  ├─ withdraw.png                              # Icon tarik dana / withdraw
│  │  ├─ withdrawals.png                           # Icon riwayat penarikan dana
│  │  ├─ refund.png                                # Icon pengembalian dana / refund
│  │  ├─ payment.png                               # Icon menu pembayaran
│  │  └─ payment-password.png                       # Icon password transaksi
│  │
│  │  # ===== ORDER & SHIPPING =====
│  │  ├─ shipment.png                              # Icon status pengiriman umum
│  │  ├─ delivery.png                              # Icon pengiriman (alternatif)
│  │  ├─ history.png                               # Icon riwayat transaksi
│  │  ├─ empty-cart.png                            # Gambar keranjang belanja kosong
│  │  └─ source-badges/                            # Badge untuk source scraper
│  │      ├─ amazon.png
│  │      ├─ ebay.png
│  │      └─ walmart.png
│  │
│  │  # ===== FLASH SALE & PROMO =====
│  │  └─ super-flash.png                            # Icon/label untuk flash sale
│  │
│  │  # ===== BRAND LOGOS =====
│  │  └─ brands/                                   # BRAND LOGOS
│  │      ├─ apple.png
│  │      ├─ samsung.png
│  │      ├─ sony.png
│  │      ├─ nike.png
│  │      ├─ adidas.png
│  │      └─ ...
│  │
│  │  # ===== CATEGORY ICONS =====
│  │  └─ categories/                               # CATEGORY ICONS
│  │      ├─ electronics.svg
│  │      ├─ fashion.svg
│  │      ├─ home-living.svg
│  │      ├─ sports.svg
│  │      ├─ beauty.svg
│  │      ├─ automotive.svg
│  │      ├─ books.svg
│  │      ├─ toys.svg
│  │      ├─ pets.svg
│  │      └─ baby.svg
│  │
│  ├─ sounds/                                   # NOTIFICATION SOUNDS
│  │  ├─ notifmasuk.mp3                    # SUARA NOTIF CHAT MASUK
│  │  ├─ notif-order.mp3                    # SUARA ORDER BARU
│  │  └─ notif-payment.mp3                   # SUARA PAYMENT VERIFIED
│  │
│  └─ fonts/                                   # GOOGLE FONTS LOCAL
│     ├─ Poppins-Regular.woff2
│     ├─ Poppins-Bold.woff2
│     ├─ Roboto-Regular.woff2
│     └─ Roboto-Bold.woff2
│
# ======================================================================
# DATABASE TABLES (ADDITIONAL FOR SCRAPER & LIVECHAT)
# ======================================================================
│
├─ database/tables/
│  ├─ 001_scraped_products.sql
│  │   ├─ CREATE TABLE scraped_products (
│  │   │  id INT PRIMARY KEY AUTO_INCREMENT,
│  │   │  source VARCHAR(50) NOT NULL,           # amazon/ebay/walmart
│  │   │  source_url VARCHAR(500),
│  │   │  source_product_id VARCHAR(100),        # ASIN untuk Amazon
│  │   │  name VARCHAR(500) NOT NULL,
│  │   │  slug VARCHAR(500) UNIQUE,
│  │   │  description TEXT,
│  │   │  price_usd DECIMAL(10,2) NOT NULL,
│  │   │  sale_price_usd DECIMAL(10,2) NULL,
│  │   │  currency VARCHAR(10) DEFAULT 'USD',
│  │   │  store_name VARCHAR(255),
│  │   │  store_location VARCHAR(100),
│  │   │  shipping_from VARCHAR(100),
│  │   │  image_url VARCHAR(500),
│  │   │  additional_images JSON,
│  │   │  rating DECIMAL(2,1) DEFAULT 0,
│  │   │  review_count INT DEFAULT 0,
│  │   │  sold_count INT DEFAULT 0,
│  │   │  category_name VARCHAR(100),
│  │   │  category_id INT NULL,
│  │   │  brand VARCHAR(100),
│  │   │  specifications JSON,
│  │   │  raw_data JSON,                          # Data lengkap dari scraper
│  │   │  status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
│  │   │  approved_by INT NULL,
│  │   │  approved_at DATETIME NULL,
│  │   │  created_at DATETIME,
│  │   │  updated_at DATETIME,
│  │   │  INDEX idx_source (source),
│  │   │  INDEX idx_status (status),
│  │   │  INDEX idx_price (price_usd),
│  │   │  FOREIGN KEY (category_id) REFERENCES categories(id),
│  │   │  FOREIGN KEY (approved_by) REFERENCES users(id)
│  │   │  )
│  │
│  ├─ 002_products.sql (update)
│  │   ├─ ALTER TABLE products ADD COLUMN
│  │   │  scraped_from_id INT NULL,
│  │   │  source_url VARCHAR(500),
│  │   │  FOREIGN KEY (scraped_from_id) REFERENCES scraped_products(id)
│  │
│  ├─ 003_scraper_jobs.sql
│  │   ├─ CREATE TABLE scraper_jobs (
│  │   │  id INT PRIMARY KEY AUTO_INCREMENT,
│  │   │  source VARCHAR(50) NOT NULL,
│  │   │  status ENUM('running', 'completed', 'failed') DEFAULT 'running',
│  │   │  products_found INT DEFAULT 0,
│  │   │  products_imported INT DEFAULT 0,
│  │   │  started_at DATETIME,
│  │   │  completed_at DATETIME NULL,
│  │   │  error_message TEXT NULL,
│  │   │  log_file VARCHAR(255)
│  │   │  )
│  │
│  ├─ 004_category_mapping.sql
│  │   ├─ CREATE TABLE category_mapping (
│  │   │  id INT PRIMARY KEY AUTO_INCREMENT,
│  │   │  source VARCHAR(50) NOT NULL,
│  │   │  source_category VARCHAR(255) NOT NULL,
│  │   │  local_category_id INT NOT NULL,
│  │   │  confidence DECIMAL(3,2) DEFAULT 1.0,
│  │   │  created_at DATETIME,
│  │   │  UNIQUE KEY unique_mapping (source, source_category),
│  │   │  FOREIGN KEY (local_category_id) REFERENCES categories(id)
│  │   │  )
│  │
│  ├─ 021_chat_sessions.sql
│  │   ├─ CREATE TABLE chat_sessions (...)
│  │
│  ├─ 022_chat_messages.sql
│  │   ├─ CREATE TABLE chat_messages (...)
│  │
│  └─ 023_chat_typing_status.sql
│      ├─ CREATE TABLE chat_typing_status (...)
│
# ======================================================================
# SELLER DASHBOARD (AGENT/DROPSHIPPER) - WITH FOREIGN NAMES
# ======================================================================
│
├─ seller/
│  ├─ index.php                           # REDIRECT KE DASHBOARD
│  │   └─ Fungsi: Redirect ke seller/modules/dashboard/
│  │
│  ├─ login.php                           # SELLER LOGIN
│  │   ├─ Fungsi: Halaman login khusus seller
│  │   ├─ Fitur:
│  │   │  ├─ Form email + password
│  │   │  ├─ Remember me
│  │   │  ├─ Link ke register-store
│  │   │  └─ Redirect ke dashboard setelah login
│  │
│  ├─ logout.php                          # SELLER LOGOUT (menggunakan images/signout.png)
│  │
│  ├─ register-store.php                   # REGISTRASI TOKO (INTERNATIONAL)
│  │   ├─ Fungsi: Pendaftaran toko baru
│  │   ├─ Fitur MULTI-STEP FORM:
│  │   │  ├─ Step 1: Akun (email, password)
│  │   │  ├─ Step 2: Info Toko (nama toko internasional, deskripsi, logo)
│  │   │  ├─ Step 3: Dokumen (KTP - untuk WNI, atau Passport - untuk luar)
│  │   │  ├─ Step 4: Bank account (US/AU/UK banks)
│  │   │  └─ Step 5: Submit untuk review admin
│  │
│  ├─ store-status.php                     # STATUS PENDAFTARAN
│  │   ├─ Fungsi: Cek status aplikasi toko
│  │   ├─ Status:
│  │   │  ├─ pending: Menunggu verifikasi admin
│  │   │  ├─ approved: Bisa login dan akses dashboard
│  │   │  └─ rejected: Alasan penolakan
│  │
│  ├─ assets/                              # ASSET KHUSUS SELLER
│  │  ├─ css/seller.css
│  │  └─ js/seller.js
│  │
│  ├─ includes/
│  │  ├─ auth.php                          # SELLER AUTH GUARD
│  │  │   ├─ Fungsi: Cek apakah seller sudah login
│  │  │   ├─ requireSeller()
│  │  │   └─ getCurrentStore()
│  │  │
│  │  ├─ header.php                        # HEADER SELLER DASHBOARD
│  │  │   ├─ Top navbar dengan notifikasi
│  │  │   ├─ Store name (English/International)
│  │  │   ├─ Logout button dengan images/signout.png
│  │  │   └─ Background menggunakan images/bg-myhead3.jpg
│  │  │
│  │  └─ sidebar.php                       # SIDEBAR SELLER
│  │      ├─ Menu: Dashboard, Orders, Products, Wallet, Settings
│  │      ├─ Badge pending orders
│  │      └─ Store balance (USD) dengan images/wallet.png
│  │
│  └─ modules/                              # MODUL-MODUL SELLER
│     ├─ dashboard/                          # DASHBOARD
│     │  └─ index.php
│     │      ├─ Fungsi: Halaman utama seller
│     │      ├─ Komponen:
│     │      │  ├─ Welcome card + store stats
│     │      │  ├─ Pending orders notification (popup)
│     │      │  ├─ KPI Cards:
│     │      │  │  ├─ Total orders
│     │      │  │  ├─ Total sales (USD)
│     │      │  │  ├─ Pending orders count
│     │      │  │  └─ Current balance (USD) dengan images/wallet.png
│     │      │  ├─ Recent orders table
│     │      │  ├─ Sales chart (last 7 days)
│     │      │  ├─ Top products
│     │      │  └─ Activity log
│     │      └─ File terkait: ajax/seller/dashboard-stats.php
│     │
│     ├─ orders/                             # ⭐ MANAJEMEN ORDER (CORE)
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua order yang diinject ke seller
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Filter by status (pending, waiting_payment, payment_verified, processing, shipped, delivered, cancelled)
│     │  │   │  ├─ Search by invoice/customer
│     │  │   │  ├─ Date range filter
│     │  │   │  ├─ Sort by date/amount
│     │  │   │  └─ Export to Excel
│     │  │   └─ Tampilan: Card view dengan:
│     │  │       ├─ Invoice number + status badge
│     │  │       ├─ Product image + name
│     │  │       ├─ Buyer info (US/AU/UK names)
│     │  │       ├─ 🟣 Modal amount (USD - purple)
│     │  │       ├─ 🟢 Total withdrawal (USD - green)
│     │  │       └─ Action buttons
│     │  │
│     │  ├─ detail.php
│     │  │   ├─ Fungsi: Detail lengkap order
│     │  │   ├─ Section:
│     │  │   │  ├─ Order Info (invoice, date, status)
│     │  │   │  ├─ Product Details (image, name, price USD, qty)
│     │  │   │  ├─ Financial Summary:
│     │  │   │  │  ├─ Harga jual: $1,199.99
│     │  │   │  │  ├─ 🟣 Modal Gudang (60%): $719.99
│     │  │   │  │  ├─ Keuntungan (15%): $180.00
│     │  │   │  │  └─ 🟢 Total Penarikan: $899.99
│     │  │   │  ├─ Buyer Information (US/AU format)
│     │  │   │  ├─ Payment Status
│     │  │   │  └─ Shipping Information dengan images/shipment.png, delivery.png
│     │  │   └─ Actions berdasarkan status
│     │  │
│     │  └─ process.php
│     │      ├─ Fungsi: Proses aksi order
│     │      ├─ Aksi:
│     │      │  ├─ confirm: Jika modal_paid = 1
│     │      │  ├─ ship: Input resi + kurir (dengan pilihan jne.png, j&t.png, sicepat.png, anteraja.png, ninja.png)
│     │      │  ├─ deliver: Tandai delivered + tambah balance (USD)
│     │      │  └─ cancel: Batalkan order
│     │      └── File terkait: ajax/seller/confirm-order.php
│     │
│     ├─ products/                           # MANAJEMEN PRODUK
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List produk milik seller (dari database)
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Table dengan pagination
│     │  │   │  ├─ Search
│     │  │   │  ├─ Filter by category/status
│     │  │   │  ├─ Filter by source (scraped/manual) dengan source badges
│     │  │   │  ├─ Bulk actions
│     │  │   │  └─ Export data
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Tambah produk baru
│     │  │   ├─ Form fields:
│     │  │   │  ├─ Nama produk (English/International)
│     │  │   │  ├─ Kategori (dengan subkategori)
│     │  │   │  ├─ Brand (Apple, Samsung, Nike, dll) dengan brand logos
│     │  │   │  ├─ Harga (USD)
│     │  │   │  ├─ Stok
│     │  │   │  ├─ Deskripsi (WYSIWYG editor)
│     │  │   │  ├─ Spesifikasi
│     │  │   │  ├─ Gambar (multiple upload) ke folder products/
│     │  │   │  └─ Variasi (opsional)
│     │  │
│     │  ├─ edit.php
│     │  │   ├─ Fungsi: Edit produk
│     │  │   └─ Form sama dengan create
│     │  │
│     │  ├─ import-scraped.php
│     │  │   ├─ Fungsi: Import produk dari scraped_products
│     │  │   ├─ Fitur:
│     │  │   │  ├─ List produk yang belum di-approve
│     │  │   │  ├─ Filter by source
│     │  │   │  ├─ Preview gambar
│     │  │   │  └─ Set harga jual (auto markup)
│     │  │
│     │  └─ delete.php
│     │      ├─ Fungsi: Hapus produk
│     │      └─ Method: POST dengan CSRF
│     │
│     ├─ wallet/                              # MANAJEMEN SALDO (USD)
│     │  ├─ index.php
│     │  │   ├─ Fungsi: Lihat saldo dan history
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Current balance (USD) dengan images/wallet.png
│     │  │   │  ├─ Total earned (USD)
│     │  │   │  ├─ Pending withdrawal (USD)
│     │  │   │  ├─ Transaction history table
│     │  │   │  └─ Filter by date
│     │  │
│     │  ├─ withdraw.php
│     │  │   ├─ Fungsi: Request penarikan saldo
│     │  │   ├─ Form:
│     │  │   │  ├─ Jumlah penarikan (USD, max balance)
│     │  │   │  ├─ Pilih bank tujuan (US/AU/UK/Indonesia) dengan bank logos
│     │  │   │  ├─ Konfirmasi dengan images/withdraw.png
│     │  │   │  └─ Riwayat penarikan dengan images/withdrawals.png
│     │  │
│     │  └─ ledger.php
│     │      ├─ Fungsi: Detail ledger transaksi
│     │      └─ Menampilkan semua credit/debit (USD)
│     │
│     └─ settings/                            # PENGATURAN TOKO
│        ├─ profile.php
│        │   ├─ Fungsi: Edit profil toko
│        │   ├─ Fields:
│        │   │  ├─ Nama toko (International)
│        │   │  ├─ Deskripsi (English/Indonesia)
│        │   │  ├─ Logo dengan images/logo.png
│        │   │  ├─ Banner dengan images/header-banner.png
│        │   │  └─ Kontak
│        │
│        └─ bank-account.php
│            ├─ Fungsi: Kelola rekening bank
│            ├─ Fitur:
│            │  ├─ Tambah bank (US: Chase, Bank of America, Wells Fargo; AU: Commonwealth, Westpac; UK: Barclays, HSBC; Indonesia: BCA, Mandiri, BRI, BNI, BSI)
│            │  ├─ Edit
│            │  └─ Set default untuk withdrawal
│
# ======================================================================
# ADMIN PANEL (FULL CONTROL) - DENGAN LIVECHAT & SCRAPER MANAGEMENT
# ======================================================================
│
├─ admin/
│  ├─ index.php                           # REDIRECT KE DASHBOARD
│  │   └─ Fungsi: Redirect ke admin/modules/dashboard/
│  │
│  ├─ login.php                           # ADMIN LOGIN
│  │   ├─ Fungsi: Halaman login khusus admin
│  │   ├─ Fitur:
│  │   │  ├─ Form email + password
│  │   │  ├─ Remember me (optional)
│  │   │  └─ Redirect ke dashboard
│  │
│  ├─ logout.php                          # ADMIN LOGOUT
│  │
│  ├─ assets/                              # ASSET KHUSUS ADMIN
│  │  ├─ css/admin.css
│  │  ├─ js/admin.js
│  │  └─ vendor/                           # Chart.js, DataTables, dll
│  │
│  ├─ includes/
│  │  ├─ auth.php                          # ADMIN AUTH GUARD
│  │  │   ├─ Fungsi: Cek apakah admin sudah login
│  │  │   └─ requireAdmin()
│  │  │
│  │  ├─ header.php                        # HEADER ADMIN
│  │  │   ├─ Top navbar
│  │  │   ├─ **LIVECHAT NOTIFICATION ICON** dengan badge + animasi
│  │  │   ├─ **SCRAPER STATUS** (running/completed)
│  │  │   └─ User menu
│  │  │
│  │  └─ sidebar.php                       # SIDEBAR ADMIN
│  │      ├─ Menu: Dashboard, Agents, Inject Orders, Verify Payments, Products, 
│  │      │        Categories, **SCRAPED PRODUCTS**, **SCRAPER JOBS**, LIVECHAT, 
│  │      │        Reports, Settings
│  │      └─ Livechat menu dengan badge unread count
│  │
│  └─ modules/                              # MODUL-MODUL ADMIN
│     ├─ dashboard/                          # DASHBOARD UTAMA
│     │  ├─ index.php
│     │  │   ├─ Fungsi: Ringkasan seluruh sistem
│     │  │   ├─ Komponen:
│     │  │   │  ├─ KPI Cards:
│     │  │   │  │  ├─ Total Agents (350+)
│     │  │   │  │  ├─ Total Products (5000+ dari scrape)
│     │  │   │  │  ├─ Total Orders
│     │  │   │  │  ├─ Total Revenue (USD)
│     │  │   │  │  └─ Pending Payments
│     │  │   │  ├─ **SCRAPER STATUS** (last run, products found)
│     │  │   │  ├─ **LIVECHAT WIDGET** mini (active chats)
│     │  │   │  ├─ Charts (orders, revenue USD)
│     │  │   │  ├─ Recent orders table
│     │  │   │  ├─ Recent agents
│     │  │   │  └─ System health
│     │  │   └─ widgets.php (komponen terpisah)
│     │
│     ├─ agents/                             # MANAJEMEN AGENT/SELLER
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua seller (350+ dengan nama internasional)
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Table dengan sorting
│     │  │   │  ├─ Search
│     │  │   │  ├─ Filter by status/country (US, AU, UK, ID) dengan flag icons
│     │  │   │  ├─ Export
│     │  │   │  └─ Bulk actions
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Buat seller baru manual
│     │  │   └─ Form lengkap
│     │  │
│     │  ├─ edit.php
│     │  │   ├─ Fungsi: Edit seller
│     │  │   └─ Form lengkap
│     │  │
│     │  ├─ view.php
│     │  │   ├─ Fungsi: Detail seller
│     │  │   ├─ Info:
│     │  │   │  ├─ Store details (nama toko internasional)
│     │  │   │  ├─ Statistics
│     │  │   │  ├─ Recent orders
│     │  │   │  └─ Products
│     │  │
│     │  ├─ suspend.php
│     │  │   ├─ Fungsi: Suspended/aktifkan seller
│     │  │   └── Method: POST
│     │  │
│     │  └─ delete.php
│     │      ├─ Fungsi: Hapus seller
│     │      └── Method: POST (soft delete)
│     │
│     ├─ verify-sellers/                     # VERIFIKASI SELLER BARU
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List aplikasi seller pending
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Card/list aplikasi
│     │  │   │  ├─ Filter
│     │  │   │  └─ Search
│     │  │
│     │  ├─ view.php
│     │  │   ├─ Fungsi: Lihat detail aplikasi
│     │  │   ├─ Informasi:
│     │  │   │  ├─ Data diri (nama internasional)
│     │  │   │  ├─ Dokumen KTP/Passport (view image)
│     │  │   │  ├─ Dokumen NPWP (jika Indonesia)
│     │  │   │  └─ Bank account (international/Indonesia)
│     │  │
│     │  ├─ approve.php
│     │  │   ├─ Fungsi: Setujui aplikasi
│     │  │   ├─ Proses:
│     │  │   │  ├─ Update status to approved
│     │  │   │  ├─ Kirim email notifikasi
│     │  │   │  └─ Buat user seller
│     │  │
│     │  └─ reject.php
│     │      ├─ Fungsi: Tolak aplikasi
│     │      ├─ Form: Alasan penolakan
│     │      └─ Kirim email
│     │
│     ├─ scraped-products/                    # ⭐ MANAJEMEN HASIL SCRAPE
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua produk hasil scrape
│     │  │   ├─ Fitur:
│     │  │   │  ├─ DataTable dengan semua kolom
│     │  │   │  ├─ Filter by source (Amazon/eBay/Walmart) dengan source badges
│     │  │   │  ├─ Filter by status
│     │  │   │  ├─ Search
│     │  │   │  ├─ Preview gambar (dari folder products/)
│     │  │   │  └─ Bulk actions
│     │  │
│     │  ├─ view.php
│     │  │   ├─ Fungsi: Detail produk hasil scrape
│     │  │   └─ Informasi lengkap + raw JSON
│     │  │
│     │  ├─ approve.php
│     │  │   ├─ Fungsi: Approve single product
│     │  │   ├─ Form:
│     │  │   │  ├─ Pilih agent (auto-assign)
│     │  │   │  ├─ Set markup percentage
│     │  │   │  └─ Set kategori lokal
│     │  │
│     │  ├─ bulk-approve.php
│     │  │   ├─ Fungsi: Approve multiple products
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Select products
│     │  │   │  ├─ Set markup (default 30%)
│     │  │   │  └─ Assign to agent/random
│     │  │
│     │  ├─ settings.php
│     │  │   ├─ Fungsi: Auto-approve settings
│     │  │   └─ Form pengaturan
│     │  │
│     │  └─ ajax/
│     │     ├─ get-products.php
│     │     └─ update-status.php
│     │
│     ├─ scraper-jobs/                        # ⭐ MANAJEMEN SCRAPER JOBS
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua job scraping
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Table dengan status
│     │  │   │  ├─ Filter by source/status
│     │  │   │  ├─ View log file
│     │  │   │  └─ Run scraper manually
│     │  │
│     │  ├─ run.php
│     │  │   ├─ Fungsi: Trigger scraper manual
│     │  │   ├─ Form:
│     │  │   │  ├─ Pilih source (Amazon/eBay/Walmart)
│     │  │   │  ├─ Jumlah halaman
│     │  │   │  └─ Auto-import setelah selesai
│     │  │
│     │  ├─ schedule.php
│     │  │   ├─ Fungsi: Atur jadwal scraping
│     │  │   ├─ Fields:
│     │  │   │  ├─ Enable/disable
│     │  │   │  ├─ Interval (6/12/24 jam)
│     │  │   │  └─ Source to scrape
│     │  │
│     │  ├─ logs.php
│     │  │   ├─ Fungsi: View log file
│     │  │   └─ Real-time tail (optional)
│     │  │
│     │  └─ ajax/
│     │     ├─ start-job.php
│     │     └─ stop-job.php
│     │
│     ├─ inject-orders/                       # ⭐ FITUR UTAMA: INJECT ORDER
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua injected orders
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Table dengan status
│     │  │   │  ├─ Filter by agent/status/date
│     │  │   │  ├─ Search
│     │  │   │  └─ Export
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Form inject order manual
│     │  │   ├─ FORM:
│     │  │   │  ├─ Pilih Agent (dari 350+ dengan nama internasional) dengan flag icons
│     │  │   │  │  ├─ Search agent
│     │  │   │  │  ├─ Verified badge indicator
│     │  │   │  │  └─ Country filter (US, AU, UK, ID)
│     │  │   │  ├─ Pilih Produk (dari 5000+ hasil scrape) dengan source badges
│     │  │   │  │  ├─ Search produk
│     │  │   │  │  ├─ List produk dengan harga USD
│     │  │   │  │  ├─ Source badge (Amazon/eBay)
│     │  │   │  │  └─ Quantity input
│     │  │   │  ├─ Buyer Information (RANDOM GENERATOR)
│     │  │   │  │  ├─ Tombol "Generate Random US"
│     │  │   │  │  ├─ Tombol "Generate Random AU"
│     │  │   │  │  ├─ Tombol "Generate Random UK"
│     │  │   │  │  ├─ Fields auto-fill:
│     │  │   │  │  │  ├─ Nama (John Smith, Sarah Johnson, dll)
│     │  │   │  │  │  ├─ Telepon (format US/AU/UK)
│     │  │   │  │  │  ├─ Alamat dengan images/address.png
│     │  │   │  │  │  ├─ Kota
│     │  │   │  │  │  ├─ State
│     │  │   │  │  │  ├─ Zip
│     │  │   │  │  │  └─ Country dengan flag icons
│     │  │   │  │  └─ Bisa edit manual
│     │  │   │  └─ Financial Calculation (OTOMATIS dalam USD)
│     │  │   │      ├─ Harga Jual: $1,199.99
│     │  │   │      ├─ 🟣 Modal (60%): $719.99
│     │  │   │      ├─ Profit Agent (15%): $180.00
│     │  │   │      └─ 🟢 Total Withdrawal: $899.99
│     │  │   │
│     │  │   └─ Tombol: "Inject Order"
│     │  │
│     │  ├─ process.php
│     │  │   ├─ Fungsi: Proses simpan order
│     │  │   ├─ Validasi:
│     │  │   │  ├─ Agent valid
│     │  │   │  ├─ Product valid
│     │  │   │  ├─ Buyer data lengkap
│     │  │   │  └─ CSRF
│     │  │   ├─ Proses:
│     │  │   │  ├─ Generate invoice unik
│     │  │   │  ├─ Insert ke tabel orders (status = 'pending')
│     │  │   │  ├─ Insert ke order_items
│     │  │   │  ├─ Insert notification untuk agent
│     │  │   │  └─ Log activity
│     │  │
│     │  ├─ import.php
│     │  │   ├─ Fungsi: Import massal orders dari CSV
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Download template
│     │  │   │  ├─ Upload CSV
│     │  │   │  ├─ Preview data
│     │  │   │  └─ Process import
│     │  │
│     │  └─ templates/
│     │     └─ sample-import.csv
│     │         ├─ Format: agent_id, product_id, quantity, buyer_name, buyer_phone, buyer_address, buyer_city, buyer_state, buyer_zip, buyer_country
│     │         └── 10 sample rows dengan nama internasional
│     │
│     ├─ verify-payments/                      # ⭐ VERIFIKASI PEMBAYARAN
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List orders waiting for payment verification
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Table orders dengan status 'waiting_payment'
│     │  │   │  ├─ Filter by date/agent
│     │  │   │  ├─ Highlight urgent
│     │  │   │  └── Count badge
│     │  │
│     │  ├─ view.php
│     │  │   ├─ Fungsi: Lihat detail pembayaran
│     │  │   ├─ Informasi:
│     │  │   │  ├─ Order details
│     │  │   │  ├─ Payment Proof (image viewer) dari folder payment-proofs/
│     │  │   │  ├─ TX Hash (jika USDT) dengan images/walet-addres.png
│     │  │   │  ├─ Amount due (USD)
│     │  │   │  └─ Timestamp
│     │  │
│     │  ├─ verify.php
│     │  │   ├─ Fungsi: Verifikasi pembayaran
│     │  │   ├─ Proses:
│     │  │   │  ├─ Update order.modal_paid = 1
│     │  │   │  ├─ Update order.status = 'payment_verified'
│     │  │   │  ├─ Set payment_verified_at = NOW()
│     │  │   │  ├─ Kirim notifikasi ke agent
│     │  │   │  └─ Log activity
│     │  │
│     │  └─ reject.php
│     │      ├─ Fungsi: Tolak pembayaran
│     │      ├─ Form: Alasan penolakan
│     │      └── Update status ke 'pending' + kirim notifikasi
│     │
│     ├─ products/                              # MANAJEMEN PRODUK (LIVE)
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua produk live (5000+)
│     │  │   ├─ Fitur:
│     │  │   │  ├─ DataTable dengan server-side processing
│     │  │   │  ├─ Search
│     │  │   │  ├─ Filter by category/agent/brand
│     │  │   │  ├─ Filter by source (scraped/manual) dengan source badges
│     │  │   │  ├─ Sort by price USD/sold/rating
│     │  │   │  ├─ Bulk actions (delete, change category)
│     │  │   │  └─ Export Excel/PDF
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Tambah produk manual
│     │  │   └─ Form lengkap (sama dengan seller)
│     │  │
│     │  ├─ edit.php
│     │  │   ├─ Fungsi: Edit produk
│     │  │   └─ Form lengkap
│     │  │
│     │  ├─ import.php
│     │  │   ├─ Fungsi: Import massal produk dari CSV
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Download template CSV
│     │  │   │  ├─ Upload CSV
│     │  │   │  ├─ Map columns
│     │  │   │  ├─ Preview
│     │  │   │  └─ Process (insert 5000+ produk)
│     │  │
│     │  └─ delete.php
│     │      └─ Fungsi: Hapus produk (soft delete)
│     │
│     ├─ categories/                            # MANAJEMEN KATEGORI
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List kategori (nested)
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Tree view
│     │  │   │  ├─ Drag & drop reorder
│     │  │   │  ├─ Expand/collapse
│     │  │   │  ├─ Mapping ke source categories
│     │  │   │  └─ Search
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Tambah kategori
│     │  │   ├─ Form:
│     │  │   │  ├─ Nama kategori (multi-language)
│     │  │   │  ├─ Parent category
│     │  │   │  ├─ Slug
│     │  │   │  ├─ Icon dari folder categories/
│     │  │   │  └─ Image
│     │  │
│     │  └─ edit.php
│     │      └─ Fungsi: Edit kategori
│     │
│     ├─ brands/                                 # MANAJEMEN BRAND
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List brand internasional
│     │  │   └─ Fitur: Apple, Samsung, Sony, Nike, Adidas, dll dengan brand logos
│     │  ├─ create.php
│     │  └─ edit.php
│     │
│     ├─ orders/                                 # MANAJEMEN SEMUA ORDER
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List semua orders
│     │  │   ├─ Fitur:
│     │  │   │  ├─ DataTable dengan semua kolom
│     │  │   │  ├─ Advanced filters
│     │  │   │  ├─ Export
│     │  │   │  └─ Bulk status update
│     │  │
│     │  ├─ view.php
│     │  │   ├─ Fungsi: Detail order
│     │  │   └─ Sama seperti di seller, tapi lebih lengkap
│     │  │
│     │  └─ edit.php
│     │      └─ Fungsi: Edit order (untuk koreksi)
│     │
│     ├─ livechat/                               # ⭐ MODUL LIVECHAT
│     │  ├─ index.php
│     │  │   ├─ Fungsi: Dashboard livechat
│     │  │   ├─ Fitur:
│     │  │   │  ├─ List active chat sessions
│     │  │   │  ├─ **NOTIFIKASI SUARA** otomatis (notifmasuk.mp3)
│     │  │   │  ├─ Badge unread per session
│     │  │   │  ├─ Filter by status
│     │  │   │  └─ Quick stats (total chats, response time)
│     │  │
│     │  ├─ chat.php
│     │  │   ├─ Fungsi: Halaman chat detail
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Real-time messaging
│     │  │   │  ├─ Typing indicator
│     │  │   │  ├─ Visitor info (IP, location, page)
│     │  │   │  ├─ Quick replies
│     │  │   │  ├─ File sharing dengan upload ke chat-attachments/
│     │  │   │  └─ **PLAY SOUND** on new message
│     │  │
│     │  ├─ history.php
│     │  │   ├─ Fungsi: Riwayat chat
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Filter by date/user
│     │  │   │  ├─ Search conversations
│     │  │   │  └─ Export chat log
│     │  │
│     │  └─ settings.php
│     │      ├─ Fungsi: Pengaturan livechat
│     │      ├─ Fields:
│     │      │  ├─ Auto greeting (multi-language)
│     │      │  ├─ Offline message
│     │      │  ├─ Working hours
│     │      │  ├─ Max chats per admin
│     │      │  └─ **SOUND ENABLED** toggle
│     │
│     ├─ banners/                                # MANAJEMEN SLIDER
│     │  ├─ index.php
│     │  │   ├─ Fungsi: List banner slider
│     │  │   └─ Fitur: Sort order, aktif/nonaktif
│     │  │
│     │  ├─ create.php
│     │  │   ├─ Fungsi: Tambah banner
│     │  │   ├─ Form:
│     │  │   │  ├─ Title
│     │  │   │  ├─ Image (desktop + mobile) upload ke banners/
│     │  │   │  ├─ Link
│     │  │   │  ├─ Position (utama/side)
│     │  │   │  └─ Active period
│     │  │
│     │  └─ edit.php
│     │      └─ Fungsi: Edit banner
│     │
│     ├─ settings/                               # PENGATURAN SISTEM
│     │  ├─ general.php
│     │  │   ├─ Fungsi: Pengaturan umum
│     │  │   ├─ Fields:
│     │  │   │  ├─ Site name
│     │  │   │  ├─ Logo upload ke images/
│     │  │   │  ├─ Favicon
│     │  │   │  ├─ Meta description
│     │  │   │  └─ Contact email
│     │  │
│     │  ├─ language.php
│     │  │   ├─ Fungsi: Pengaturan multi-language
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Default language (Indonesia)
│     │  │   │  ├─ Enable/disable 17 languages dengan flag icons
│     │  │   │  └─ Translation manager
│     │  │
│     │  ├─ payment.php
│     │  │   ├─ Fungsi: Pengaturan payment
│     │  │   ├─ USDT Settings:
│     │  │   │  ├─ Wallet address (TXsuRgXHgHc3VPcmBcaeFNHD5S1Rk3hMu1) dengan images/walet-addres.png
│     │  │   │  ├─ Network (TRC-20)
│     │  │   │  └─ Auto-verify (on/off)
│     │  │   └─ Bank Accounts (10 bank Indonesia + International) dengan bank logos
│     │  │
│     │  └─ email.php
│     │      ├─ Fungsi: Pengaturan SMTP
│     │      └─ Fields: Host, Port, Username, Password
│     │
│     ├─ scraper-settings/                       # PENGATURAN SCRAPER
│     │  ├─ index.php
│     │  │   ├─ Fungsi: Pengaturan scraping
│     │  │   ├─ Fields:
│     │  │   │  ├─ Enable/disable auto scrape
│     │  │   │  ├─ Schedule interval
│     │  │   │  ├─ Max pages per category
│     │  │   │  ├─ Delay between requests
│     │  │   │  ├─ Proxy settings
│     │  │   │  ├─ Auto-approve products
│     │  │   │  ├─ Default markup percentage
│     │  │   │  └── Category mapping rules
│     │  │
│     │  └─ category-mapping.php
│     │      ├─ Fungsi: Mapping kategori source ke lokal
│     │      ├─ Fitur:
│     │      │  ├─ List semua source categories
│     │      │  └─ Pilih local category untuk mapping
│     │
│     ├─ reports/                                # LAPORAN
│     │  ├─ index.php
│     │  │   ├─ Fungsi: Halaman utama laporan
│     │  │   └─ Pilihan jenis laporan
│     │  │
│     │  ├─ sales.php
│     │  │   ├─ Fungsi: Laporan penjualan (USD)
│     │  │   ├─ Fitur:
│     │  │   │  ├─ Date range picker
│     │  │   │  ├─ Chart (daily/weekly/monthly)
│     │  │   │  ├─ Table summary
│     │  │   │  └─ Export (Excel, PDF)
│     │  │
│     │  ├─ agents.php
│     │  │   ├─ Fungsi: Laporan performa agent
│     │  │   ├─ Ranking by orders/sales (USD)
│     │  │   └─ Export
│     │  │
│     │  └─ financial.php
│     │      ├─ Fungsi: Laporan keuangan (USD)
│     │      ├─ Total revenue
│     │      ├─ Platform fee
│     │      ├─ Agent withdrawals
│     │      └─ Profit
│     │
│     └─ logs/                                   # SYSTEM LOGS
│        ├─ index.php
│        │   ├─ Fungsi: View system logs
│        │   ├─ Fitur:
│        │   │  ├─ Filter by level (info, error, warning)
│        │   │  ├─ Filter by date
│        │   │  └─ Search
│        │
│        └─ viewer.php
│            └─ Fungsi: View detail log
│
# ======================================================================
# UPLOADS (USER-GENERATED FILES)
# ======================================================================
│
├─ uploads/
│  ├─ .htaccess                                # PROTECT UPLOADS
│  │   ├─ Options -Indexes
│  │   └─ Order deny,allow
│  │
│  ├─ payment-proofs/                           # BUKTI PEMBAYARAN USDT
│  │   ├─ 2025/02/23/
│  │   │  └─ order-1001-proof.jpg
│  │   └─ ...
│  │
│  ├─ shipping-proofs/                           # BUKTI PENGIRIMAN
│  │   ├─ 2025/02/23/
│  │   │  └─ order-1001-resi.jpg
│  │   └─ ...
│  │
│  ├─ products/                                   # FOTO PRODUK (SELLER UPLOAD)
│  │   ├─ 2025/02/23/
│  │   │  ├─ product-5001-1.jpg
│  │   │  └─ product-5001-2.jpg
│  │   └─ ...
│  │
│  ├─ chat-attachments/                           # ATTACHMENTS FROM CHAT
│  │   ├─ 2025/02/23/
│  │   │  └─ chat-1001-image.jpg
│  │   └─ ...
│  │
│  ├─ ktp/                                        # KTP SELLER (VERIFIKASI)
│  │   ├─ 2025/02/23/
│  │   │  └─ agent-123-ktp.jpg
│  │   └─ ...
│  │
│  ├─ npwp/                                       # NPWP SELLER
│  │   └─ ...
│  │
│  └─ temp/                                       # TEMPORARY FILES
│      └─ ...
│
# ======================================================================
# STORAGE (LOGS & CACHE)
# ======================================================================
│
├─ storage/
│  ├─ .gitignore                                 # IGNORE LOGS FROM GIT
│  │
│  ├─ logs/                                       # SYSTEM LOGS
│  │  ├─ app-2025-02-23.log                       # Daily log
│  │  ├─ admin-2025-02-23.log                      # Admin actions
│  │  ├─ seller-2025-02-23.log                      # Seller actions
│  │  ├─ chat-2025-02-23.log                        # Chat logs
│  │  ├─ scraper-2025-02-23.log                     # Scraper logs
│  │  └─ error-2025-02-23.log                       # Error logs
│  │
│  └─ cache/                                       # CACHE FILES
│     ├─ categories.json                            # Cached category tree
│     ├─ settings.json                               # Cached settings
│     ├─ products-count.json                          # Total products count
│     └─ translations/                                # Cached translations
│        ├─ id.cache
│        ├─ en.cache
│        └─ ...
│
# ======================================================================
# CRON JOBS
# ======================================================================
│
├─ cron/
│  ├─ run-scraper.sh                              # Script untuk menjalankan scraper
│  │   ├─ Fungsi: Cron job untuk scraping otomatis
│  │   ├─ Isi:
│  │   │  #!/bin/bash
│  │   │  cd /path/to/project/scrapers
│  │   │  python3 run_scraper.py --source=all --pages=2 --import-db >> ../storage/logs/cron-scraper.log 2>&1
│  │   └─ Schedule: 0 */6 * * * (setiap 6 jam)
│  │
│  ├─ generate-sitemap.php                        # Generate sitemap.xml
│  │   ├─ Fungsi: Update sitemap dari database products
│  │   └─ Schedule: 0 0 * * * (setiap hari)
│  │
│  ├─ cleanup-temp.php                             # Bersihkan file temporary
│  │   ├─ Fungsi: Hapus file > 7 hari
│  │   └─ Schedule: 0 2 * * * (jam 2 pagi)
│  │
│  ├─ update-stats.php                             # Update statistik
│  │   ├─ Fungsi: Update aggregate stats di database
│  │   ├─ Update: total products, total sales, agent rankings
│  │   └─ Schedule: 0 */3 * * * (setiap 3 jam)
│  │
│  └─ backup-database.sh                           # Backup database otomatis
│      ├─ Fungsi: Backup database ke file SQL
│      ├─ Isi:
│      │  #!/bin/bash
│      │  mysqldump -u user -p password database_name > /backup/db-$(date +%Y%m%d).sql
│      └─ Schedule: 0 1 * * * (jam 1 pagi)
│
# ======================================================================
# API ENDPOINTS (UNTUK AJAX & INTEGRASI)
# ======================================================================
│
├─ api/
│  ├─ v1/
│  │  ├─ products.php                     # API PRODUK
│  │  │   ├─ Fungsi: REST API untuk produk
│  │  │   ├─ Endpoints:
│  │  │   │  ├─ GET /products - List produk (paginated)
│  │  │   │  ├─ GET /products/{id} - Detail produk
│  │  │   │  ├─ GET /products/search?q= - Search produk
│  │  │   │  └─ GET /products/category/{id} - Produk by kategori
│  │  │   └─ Response: JSON
│  │  │
│  │  ├─ categories.php                    # API KATEGORI
│  │  │   ├─ Fungsi: REST API untuk kategori
│  │  │   └─ Endpoints: GET /categories (tree), GET /categories/{id}
│  │  │
│  │  ├─ orders.php                        # API ORDER
│  │  │   ├─ Fungsi: REST API untuk order (dengan auth)
│  │  │   └─ Endpoints: GET /orders, POST /orders, GET /orders/{id}
│  │  │
│  │  ├─ auth.php                          # API AUTHENTIKASI
│  │  │   ├─ Fungsi: Login/register via API
│  │  │   └─ Endpoints: POST /login, POST /register, POST /logout
│  │  │
│  │  └─ webhook.php                       # WEBHOOK RECEIVER
│  │      ├─ Fungsi: Terima notifikasi dari scraper
│  │      ├─ Endpoint: POST /webhook/scraper
│  │      └─ Update status job scraping
│  │
│  └─ docs/                                # DOKUMENTASI API
│     ├─ index.html                        # Swagger UI
│     └─ openapi.yaml                       # OpenAPI specification
│
# ======================================================================
# CONFIGURATION FILES
# ======================================================================
│
├─ config/
│  ├─ constants.php                        # CONSTANTS GLOBAL
│  │   ├─ Fungsi: Define konstanta aplikasi
│  │   ├─ Isi:
│  │   │  ├─ SITE_NAME, SITE_URL
│  │   │  ├─ DEFAULT_LANG = 'id'
│  │   │  ├─ AVAILABLE_LANGS = ['id','en','ms','zh',...] dengan flag icons
│  │   │  ├─ CURRENCY = 'USD', CURRENCY_SYMBOL = '$'
│  │   │  ├─ PAGINATION_LIMIT = 20
│  │   │  ├─ MARKUP_PERCENTAGE = 30
│  │   │  ├─ MODAL_PERCENTAGE = 60
│  │   │  ├─ PROFIT_PERCENTAGE = 15
│  │   │  ├─ SCRAPER_SOURCES = ['amazon','ebay','walmart']
│  │   │  └─ MAX_SCRAPE_PAGES = 5
│  │
│  ├─ database.php                         # DATABASE CONFIG
│  │   ├─ Fungsi: Konfigurasi koneksi database
│  │   └─ Load dari .env
│  │
│  └─ scraper.php                          # SCRAPER CONFIG
│      ├─ Fungsi: Konfigurasi scraper
│      ├─ Isi:
│      │  ├─ USER_AGENTS list
│      │  ├─ PROXY_LIST (optional)
│      │  ├─ REQUEST_DELAY = 5
│      │  ├─ MAX_RETRIES = 3
│      │  ├─ DOWNLOAD_IMAGES = true (ke folder products/)
│      │  ├─ AUTO_IMPORT = true
│      │  └─ CATEGORY_MAPPING rules
│
# ======================================================================
# INSTALLATION & DEPLOYMENT SCRIPTS
# ======================================================================
│
├─ install/
│  ├─ install.sh                           # INSTALLATION SCRIPT
│  │   ├─ Fungsi: Auto install aplikasi
│  │   ├─ Fitur:
│  │   │  ├─ Check prerequisites (PHP, MySQL, Python)
│  │   │  ├─ Create database
│  │   │  ├─ Import database.sql
│  │   │  ├─ Setup .env file
│  │   │  ├─ Install PHP dependencies (composer)
│  │   │  ├─ Install Python dependencies (pip)
│  │   │  ├─ Setup cron jobs
│  │   │  └─ Setup permissions untuk folder uploads/ dan assets/
│  │   └─ Usage: ./install/install.sh
│  │
│  ├─ update.sh                             # UPDATE SCRIPT
│  │   ├─ Fungsi: Update aplikasi
│  │   ├─ Fitur:
│  │   │  ├─ Backup database
│  │   │  ├─ Run migrations
│  │   │  ├─ Update dependencies
│  │   │  └─ Clear cache
│  │
│  └─ requirements/                         # REQUIREMENTS CHECK
│     ├─ check-php.php                       # Check PHP extensions
│     ├─ check-python.py                      # Check Python modules
│     └─ check-server.sh                       # Check server config
│
# ======================================================================
# DOCUMENTATION
# ======================================================================
│
├─ docs/
│  ├─ README.md                             # README UTAMA
│  │   ├─ Fungsi: Dokumentasi proyek
│  │   ├─ Isi:
│  │   │  ├─ Deskripsi proyek
│  │   │  ├─ Fitur-fitur
│  │   │  ├─ Teknologi yang digunakan
│  │   │  ├─ Cara instalasi
│  │   │  ├─ Cara menjalankan scraper
│  │   │  ├─ Struktur database
│  │   │  └─ Troubleshooting
│  │
│  ├─ USER_GUIDE.md                         # PANDUAN PENGGUNA
│  │   ├─ Fungsi: Panduan untuk pengguna
│  │   ├─ Untuk buyer, seller, admin
│  │   └─ Cara menggunakan fitur-fitur
│  │
│  ├─ SCRAPER_GUIDE.md                       # PANDUAN SCRAPER
│  │   ├─ Fungsi: Panduan lengkap scraping
│  │   ├─ Isi:
│  │   │  ├─ Cara setup scraper
│  │   │  ├─ Sources yang didukung
│  │   │  ├─ Konfigurasi
│  │   │  ├─ Troubleshooting CAPTCHA
│  │   │  ├─ Proxy setup
│  │   │  └─ Auto-import ke database
│  │
│  ├─ API_DOCS.md                            # DOKUMENTASI API
│  │   ├─ Fungsi: Dokumentasi REST API
│  │   └─ Contoh request/response
│  │
│  └─ DEPLOYMENT.md                          # PANDUAN DEPLOY
│      ├─ Fungsi: Cara deploy ke production
│      ├─ Shared hosting
│      ├─ VPS (DigitalOcean, Linode)
│      └─ Docker setup
│
# ======================================================================
# TESTS
# ======================================================================
│
├─ tests/
│  ├─ php/                                   # PHP UNIT TESTS
│  │  ├─ TestDatabase.php
│  │  ├─ TestAuth.php
│  │  ├─ TestCart.php
│  │  └─ TestScraperImport.php
│  │
│  ├─ python/                                # PYTHON TESTS
│  │  ├─ test_amazon_scraper.py
│  │  ├─ test_db_importer.py
│  │  └─ test_utils.py
│  │
│  └─ fixtures/                               # TEST DATA
│     ├─ sample_products.json
│     └─ test_database.sql
│
# ======================================================================
# DOCKER (OPTIONAL - UNTUK MUDAH DEPLOY)
# ======================================================================
│
├─ docker/
│  ├─ Dockerfile                              # Docker image untuk PHP
│  │   ├─ Fungsi: Build image PHP dengan semua ekstensi
│  │   └─ Base: php:8.1-apache
│  │
│  ├─ docker-compose.yml                      # Docker Compose
│  │   ├─ Fungsi: Orchestrate semua service
│  │   ├─ Services:
│  │   │  ├─ web (Apache/PHP)
│  │   │  ├─ db (MySQL)
│  │   │  ├─ phpmyadmin (optional)
│  │   │  └─ scraper (Python)
│  │
│  ├─ nginx/                                  # NGINX CONFIG (jika pakai nginx)
│  │  └─ default.conf
│  │
│  └─ scripts/
│     ├─ entrypoint.sh
│     └─ wait-for-it.sh
│
# ======================================================================
# EXAMPLE FILES - IMPLEMENTASI LANGSUNG
# ======================================================================
│
├─ examples/
│  ├─ index.php.example                       # CONTOH IMPLEMENTASI INDEX.PHP
│  │   ├─ Fungsi: Contoh kode untuk homepage
│  │   ├─ Menampilkan produk dari database
│  │   └─ Integrasi dengan infinite scroll
│  │
│  ├─ product.php.example                      # CONTOH DETAIL PRODUK
│  │   ├─ Fungsi: Menampilkan detail dari database
│  │   └─ Mengambil data dari tabel products
│  │
│  ├─ ajax/
│  │  └─ products.php.example                  # CONTOH AJAX ENDPOINT
│  │      ├─ Fungsi: Mengambil produk untuk infinite scroll
│  │      └─ Query ke database dengan pagination
│  │
│  └─ scraper/
│     └─ amazon_scraper_with_db.py.example     # CONTOH SCRAPER + DB
│         ├─ Fungsi: Scrape Amazon dan langsung import
│         └── Koneksi ke database website
│
# ======================================================================
# INTEGRATION FLOW - BAGAIMANA SEMUA TERHUBUNG
# ======================================================================
#
# 1. SCRAPER -> DATABASE
#    - Python scraper jalan (manual/cron)
#    - Scrape produk dari Amazon/eBay/Walmart
#    - Simpan ke tabel `scraped_products` dengan status 'pending'
#    - Download gambar ke `assets/images/products/[source]/` (contoh: 06b5ca63-...avif, c507d4d3-...avif)
#    - Log ke `storage/logs/scraper-*.log`
#
# 2. ADMIN APPROVE -> PRODUCTS LIVE
#    - Admin buka `admin/modules/scraped-products/`
#    - Lihat produk pending, preview gambar dari folder products/
#    - Approve single/bulk
#    - Pilih kategori, set markup (default 30%)
#    - Assign ke agent (random/tertentu)
#    - System pindahkan ke tabel `products` dengan status 'active'
#    - Update `scraped_products.status` = 'approved'
#
# 3. PRODUCTS TAMPIL DI HOMEPAGE
#    - `index.php` query ke tabel `products` (status='active')
#    - Tampilkan di flash sale dengan images/super-flash.png
#    - Recommended products dengan infinite scroll
#    - Gambar dari `assets/images/products/[source]/`
#    - Bottom navigation menggunakan images/f1.png - f5.png (aktif/non-aktif)
#
# 4. INJECT ORDER (ADMIN)
#    - Admin buka `admin/modules/inject-orders/create.php`
#    - Pilih agent, pilih produk (dari tabel products) dengan source badges
#    - Generate random buyer (US/AU/UK) dengan flag icons dan images/address.png
#    - System hitung: modal 60%, profit 15%
#    - Insert ke tabel `orders` (status='pending')
#    - Notifikasi ke seller via WebSocket
#
# 5. SELLER PROSES ORDER
#    - Seller login, lihat order di dashboard dengan images/wallet.png
#    - Order muncul dengan status 'pending'
#    - Seller upload bukti transfer modal (USDT/bank) dengan images/walet-addres.png
#    - Pilih kurir pengiriman dengan logo jne.png, j&t.png, sicepat.png, anteraja.png, ninja.png
#    - System update status ke 'waiting_payment'
#
# 6. ADMIN VERIFY PAYMENT
#    - Admin lihat di `verify-payments`
#    - Cek bukti transfer dari folder payment-proofs/
#    - Verify -> update `orders.modal_paid` = 1, status = 'payment_verified'
#    - Notifikasi ke seller dengan notif-payment.mp3
#
# 7. SELLER SHIP ORDER
#    - Seller input resi, update status ke 'shipped' dengan images/shipment.png
#    - System kurangi stok, update ledger
#    - Tambah balance seller (untuk withdrawal) dengan images/withdrawals.png
#
# 8. LIVECHAT
#    - Visitor buka website, chat widget muncul dengan images/livechat.png
#    - Kirim pesan -> simpan ke `chat_messages`
#    - Admin panel trigger notif suara `notifmasuk.mp3`
#    - Admin reply real-time via WebSocket dengan images/livechat2.png
#
# 9. MULTI-LANGUAGE
#    - User memilih bahasa melalui dropdown dengan images/lang1.png
#    - Flag icons (indonesia.png, malaysia.png, singapura.png, thailand.png, vietnam.png, philippines.png, in.png)
#    - System load file bahasa dari folder lang/
#
# 10. PAYMENT & WALLET
#     - User melihat saldo dengan images/wallet.png
#     - Top up saldo dengan images/recharge.png
#     - Withdraw dana dengan images/withdraw.png
#     - Riwayat penarikan dengan images/withdrawals.png
#     - Refund dengan images/refund.png
#     - Payment method dengan visa.png, mastercard.png, pcidss.png, bsi.png, cashondelivery.png, grab.png, sap.png
#
# ======================================================================
# FILE YANG PERLU DIBUAT FIRST (PRIORITAS)
# ======================================================================
#
# 1. Database schema (`database.sql`) - PRIORITAS #1
# 2. .env file dengan konfigurasi
# 3. Core includes (`config.php`, `database.php`, `functions.php`)
# 4. Public pages (`index.php`, `product.php`, `category.php`) dengan integrasi gambar
# 5. Scraper (`amazon_scraper.py` dengan integrasi DB) untuk download gambar ke products/
# 6. Admin panel modules (`scraped-products`, `inject-orders`)
# 7. Seller dashboard dengan fitur wallet
# 8. Livechat system dengan notifikasi suara
#
# ======================================================================
# ENVIRONMENT VARIABLES LENGKAP (.env)
# ======================================================================
#
# APP_NAME="Lazada"
# APP_URL="http://localhost:8000"
# APP_ENV="production"
# APP_DEBUG=false
# APP_TIMEZONE="Asia/Jakarta"
#
# # DATABASE
# DB_HOST="localhost"
# DB_PORT="3306"
# DB_NAME="anakwrpf_lazada"
# DB_USER="anakwrpf_sincut"
# DB_PASS="@Inikuncinya098"
#
# # EMAIL (SMTP Gmail)
# MAIL_HOST="smtp.gmail.com"
# MAIL_PORT=587
# MAIL_USER="lazadahotdropshiper@gmail.com"
# MAIL_PASS="denu pmvt oijm hxnq"
# MAIL_ENCRYPTION="tls"
# MAIL_FROM="lazadahotdropshiper@gmail.com"
# MAIL_FROM_NAME="Lazada Dropship Marketplace"
#
# # PAYMENT
# USDT_WALLET="TXsuRgXHgHc3VPcmBcaeFNHD5S1Rk3hMu1"
# USDT_NETWORK="TRC-20"
# BANK_BCA="1234567890"
# BANK_MANDIRI="1234567890"
# BANK_BRI="1234567890"
# BANK_BSI="1234567890"
#
# # SECURITY
# CSRF_TOKEN_NAME="csrf_token"
# SESSION_NAME="dropship_session"
# SESSION_LIFETIME=120 # menit
# REMEMBER_ME_LIFETIME=43200 # menit (30 hari)
#
# # RECAPTCHA
# RECAPTCHA_SITE_KEY="your_site_key"
# RECAPTCHA_SECRET_KEY="your_secret_key"
#
# # SCRAPER CONFIG
# SCRAPER_USER_AGENT="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"
# SCRAPER_DELAY=5
# SCRAPER_MAX_PAGES=3
# SCRAPER_DOWNLOAD_IMAGES=true
# SCRAPER_AUTO_IMPORT=true
# SCRAPER_DEFAULT_MARKUP=30
#
# # PROXY (optional)
# PROXY_ENABLED=false
# PROXY_LIST="http://proxy1:port,http://proxy2:port"
#
# # PUSHER (untuk real-time)
# PUSHER_APP_ID=""
# PUSHER_KEY=""
# PUSHER_SECRET=""
# PUSHER_CLUSTER="ap1"
#
# ======================================================================
# SELESAI - STRUKTUR LENGKAP DENGAN INTEGRASI SCRAPER & ASSETS
# ======================================================================
#
# 🚀 FITUR UTAMA YANG SUDAH TERINTEGRASI:
# 1. Scraper Python (Selenium) ambil produk dari Amazon/eBay dengan download gambar
# 2. Auto import ke database website
# 3. Admin approve produk sebelum live
# 4. Produk langsung tampil di homepage (index.php)
# 5. Infinite scroll dari database
# 6. Inject order dengan produk hasil scrape
# 7. Livechat dengan notifikasi suara (notifmasuk.mp3)
# 8. Multi-language 17 bahasa dengan flag icons
# 9. Seller dashboard dengan wallet USD (recharge, withdraw, withdrawals)
# 10. Admin panel lengkap
# 11. Bottom navigation mobile dengan icon aktif/non-aktif (f1-f5)
# 12. Payment methods (Visa, Mastercard, COD, Grab, dll)
# 13. Logistic partners (JNE, J&T, SiCepat, AnterAja, Ninja)
# 14. Social media integration (FB, IG, TikTok, Twitter, YouTube)
# 15. App store badges (Google Play, App Store, AppGallery)
#
# 📁 TOTAL FOLDER/FILE: ~500+ files
# 💾 TOTAL DATABASE TABLES: 35+ tables
# 🐍 SCRAPER: Python + Selenium
# 🐘 BACKEND: PHP Native (tanpa framework)
# 🎨 FRONTEND: Mobile-first, CSS Vanilla dengan images lengkap
# 🔧 WEBSOCKET: Ratchet PHP untuk livechat
# 🖼️ TOTAL ASSETS: 100+ images (logo, flags, icons, banners, badges)
#
# ======================================================================

untuk logo brandnya tolong ambil dari toko hasil scrapt aja broo
nama toko toko dalam website juga tolong di