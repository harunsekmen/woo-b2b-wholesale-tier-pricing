# 🚀 WooCommerce B2B Toptan ve Kademeli Fiyatlandırma Motoru

[🇬🇧 English](README.md) · [🇹🇷 Türkçe](README.tr.md)

> B2B toptan alıcılar için kullanıcı rolüne ve satın alma adedine göre kademeli indirimler uygulayan, veritabanını yormayan yüksek performanslı fiyatlandırma motoru.

Geliştirici ve Bakım Sorumlusu: **[Harun Sekmen](https://github.com/harunsekmen)** — E-Ticaret Sistem Mühendisi & WooCommerce Uzmanı.

[✉️ İletişime Geç](mailto:sekmenwp@gmail.com) · [💼 Upwork Profili](https://www.upwork.com/freelancers/~01a7a8b58043e6e6d9) · [🔗 GitHub Ana Profil](https://github.com/harunsekmen)

---

## ⚡ Çözdüğü Kritik Sorun

B2B e-ticaret sitelerinde toptan fiyatlandırma eklentileri genellikle veritabanını kilitler:
- Her ürün sayfası açıldığında yüzlerce veritabanı sorgusu atılarak sunucu yavaşlatılır.
- Karmaşık kurallar sepet hesaplamalarını tutarsızlaştırır ve checkout aşamasında hatalara yol açar.

Bu motor, fiyat kurallarını önbelleğe alarak mikro saniyeler seviyesinde fiyat hesaplaması yapar.

---

## 🛠️ Öne Çıkan Özellikler

- **Role Dayalı Fiyatlandırma:** Toptancı, bayi veya VIP üyelere özel fiyat tabloları tanımlayın.
- **Adet Bazlı Kademeli İndirim:** '10+ alımda %15 indirim, 50+ alımda %25 indirim' gibi dinamik kurallar.
- **Önbellek Dostu Mimari:** WooCommerce nesne önbelleği (object cache) ile tam entegre çalışır.
- **HPOS Uyumlu:** Yeni sipariş tablolarında sipariş satırlarını doğru indirim oranlarıyla kaydeder.

---

## 🏗️ Teknik Mimari ve Standartlar

`PHP 8.1+` • `WooCommerce HPOS` • `WordPress Transients API` • `Unit Tested`

---

## 🚀 Kurulum ve Test

1. Klonlayın ve test edin:
   ```bash
   git clone https://github.com/harunsekmen/woo-b2b-wholesale-tier-pricing.git wp-content/plugins/woo-b2b-wholesale-tier-pricing
   php wp-content/plugins/woo-b2b-wholesale-tier-pricing/tests/test-b2b.php
   ```

---

## 📄 Lisans

Bu proje **GPL-3.0 Lisansı** ile açık kaynak olarak sunulmaktadır.
