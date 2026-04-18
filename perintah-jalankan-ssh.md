# Panduan SSH, Database, dan Scraper

## 1. Jalankan SSH Tunnel

```bash
ssh -v -i ~/.ssh/sincut -p 21098 -N -L 3308:127.0.0.1:3306 anakwrpf@premium52.web-hosting.com
```

## 2. Connect ke Database

```bash
mysql -h 127.0.0.1 -P 3308 -u anakwrpf_sincut -p anakwrpf_lazada
```

## 3. Cara Jalankan Scraper

### Scrape 10 produk harga ribuan dolar

```bash
python3 run_scraper.py --source amazon --premium-thousands --target-count 10 --save-json
```

### Scrape dengan filter manual

```bash
python3 run_scraper.py --source amazon --min-price 1000 --target-count 10 --pages 3 --limit 20 --save-json
```

### Rekomendasi harian

```bash
python3 run_scraper.py --source amazon --premium-thousands --target-count 18 --pages 3 --limit 36 --save-json --import-db --headless
```

## 4. Contoh Pemakaian

### Satu kategori

```bash
python3 run_scraper.py --source amazon --category "Elektronik"
```

### Banyak kategori sekaligus

```bash
python3 run_scraper.py --source amazon --categories "Fashion,Elektronik,Handphone & Tablet,Book,Komputer & Laptop,Kamera,TV & Audio,Aksesoris Elektronik,Rumah Tangga,Kesehatan & Kecantikan,Olahraga & Outdoor" --save-json
```

### 10 kategori utama, masing-masing target 50 produk aktif

#### Sekali jalan semua kategori

```bash
python3 scrapers/run_scraper.py --source amazon --categories "Aksesoris Elektronik,Elektronik,Fashion,Handphone & Tablet,Kamera,Kesehatan & Kecantikan,Komputer & Laptop,Olahraga & Outdoor,Rumah Tangga,TV & Audio" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
```

#### Jalankan satu per satu

```bash
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Aksesoris Elektronik" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Elektronik" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Fashion" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Handphone & Tablet" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Kamera" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Kesehatan & Kecantikan" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Komputer & Laptop" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Olahraga & Outdoor" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "Rumah Tangga" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --premium-thousands --category "TV & Audio" --target-count 50 --pages 4 --limit 50 --save-json --import-db --headless
```

### Kategori yang kamu minta

#### Elektronik premium

```bash
python3 scrapers/run_scraper.py --source amazon --category "Electronics" --min-price 300 --target-count 300 --pages 8 --limit 72 --save-json --import-db --headless
```

#### Makeup / beauty premium

```bash
python3 scrapers/run_scraper.py --source amazon --category "Health & Beauty" --min-price 300 --target-count 300 --pages 8 --limit 72 --save-json --import-db --headless
```

#### Tas perempuan premium 500 produk harga minimal $300

```bash
python3 scrapers/run_scraper.py --source amazon --women-bags-luxury --min-price 300 --target-count 500 --pages 12 --limit 72 --save-json --import-db --headless
```

#### Perhiasan premium 500 produk harga minimal $300

```bash
python3 scrapers/run_scraper.py --source amazon --jewelry-luxury --min-price 300 --target-count 500 --pages 12 --limit 72 --save-json --import-db --headless
```

#### Jalankan satu-satu biar hasil lebih bersih

```bash
python3 scrapers/run_scraper.py --source amazon --category "Electronics" --min-price 300 --target-count 300 --pages 8 --limit 72 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --category "Health & Beauty" --min-price 300 --target-count 300 --pages 8 --limit 72 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --women-bags-luxury --min-price 300 --target-count 500 --pages 12 --limit 72 --save-json --import-db --headless
python3 scrapers/run_scraper.py --source amazon --jewelry-luxury --min-price 300 --target-count 500 --pages 12 --limit 72 --save-json --import-db --headless
```

### Semua source + semua kategori default

```bash
python3 run_scraper.py --source all --all-default-categories
```

### Semua source + headless

```bash
python3 run_scraper.py --source all --all-default-categories --headless
```

### Semua source + kategori default + simpan JSON tanpa import DB

```bash
python3 run_scraper.py --source all --all-default-categories --no-import-db --save-json
```
python3 amazon_scraper.py --category "women handbag luxury" --premium-thousands --pages 3 --limit 60 --headless --save-json --save-db
