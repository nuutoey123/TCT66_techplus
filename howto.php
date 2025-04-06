<?php include 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บริการจองห้องประชุม</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/software/css/style-rules.css" />
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lastScrollTop = 0;
            const navbar = document.querySelector("header");
            window.addEventListener("scroll", function () {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > 50) {
                    navbar.style.top = "-80px";
                } else {
                    navbar.style.top = "0";
                }
                lastScrollTop = scrollTop;
            });

            const fadeInElements = document.querySelectorAll(".fade-in");
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            fadeInElements.forEach(element => observer.observe(element));
        });

        document.addEventListener("DOMContentLoaded", function () {
            let lastScrollTop = 0;
            const navbar = document.querySelector("header");
            const goTopButton = document.getElementById("goTop");

            window.addEventListener("scroll", function () {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > 50) {
                    navbar.style.top = "-80px";
                    goTopButton.classList.add("show");
                } else {
                    navbar.style.top = "0";
                    goTopButton.classList.remove("show");
                }
                lastScrollTop = scrollTop;
            });
        });

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</head>

<body>
    <header class="fade-in">
        <nav>
            <div class="logo">
                <img src="/software/images/logo.png" alt="logo">
            </div>
            <ul>
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="booking.php">จองห้อง</a></li>
                <li><a href="howto.php">วิธีจองห้อง</a></li>
                <li><a href="rules.php">กฎระเบียบ</a></li>
                <li><a href="my_bookings.php">การจองของท่าน</a></li>
                <li><a href="booking_calendar.php">ปฏิทิน</a></li>
            </ul>
        </nav>
    </header>
    <button id="goTop" class="go-top" onclick="scrollToTop()">▲</button>
    <section class="hero fade-in">
        <div class="overlay"></div>
    </section>

    <section class="rules-section fade-in">
        <div class="rules-text">
            <h2>วิธีการจองห้อง</h2>
            <ul>
                <li>กรุณาเลือกห้องประชุมที่ท่านต้องการ</li>
                <li>เลือกวัน เวลา</li>
                <li>กด จองห้อง</li>
            </ul>
            </br>
            </br>
            <h2>วิธีการยกเลิกห้อง</h2>
            <ul>
                <li>ติดต่อเจ้าหน้าที่</li>
            </ul>
        </div>
    </section>
    <footer class="footer fade-in">
        <div class="contact-info">
            <h3>ติดต่อสอบถามเพิ่มเติม</h3>
            <p><strong>องค์การบริหารส่วนจังหวัดนนทบุรี</strong></p>
            <p>NONTABURI PROVINCIAL ADMINISTRATIVE ORGANIZATION</p>
            <p>ถนนรัตนาธิเบศร์ 6 ตำบลบางกระสอ อำเภอเมืองนนทบุรี จังหวัดนนทบุรี 11000</p>
        </div>
        <div class="contact-details">
            <p><strong>โทรศัพท์:</strong> 02-589-0481-5</p>
            <p><strong>โทรสาร:</strong> 0-2591-6929</p>
            <p><strong>Email:</strong> admin@nont-pro.go.th</p>
        </div>
    </footer>
</body>

</html>