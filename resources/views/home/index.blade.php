<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* تحسين مظهر الصور */
        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .gallery-image:hover {
            transform: scale(1.05);
        }

        /* تنسيق تفعيل تأثير عند التمرير على الأقسام */
        .titlepage {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #A52A2A;
            border-color: #A52A2A;
        }

        .btn-primary:hover {
            background-color: #8B0000;
            border-color: #8B0000;
        }

        /* نافذة الموافقة على الكوكيز */
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            z-index: 9999;
        }
        .cookie-consent button {
            margin-left: 10px;
            padding: 10px;
            color: white;
            border: none;
            background-color: #007bff;
            cursor: pointer;
        }
        .cookie-consent button.reject {
            background-color: #dc3545;
        }
    </style>
</head>

<body class="main-layout">
    <!-- header -->
    <header>
        @include('home.header')   
    </header>

    <!-- banner -->
    @include('home.slider')  

    <!-- about -->
    @include('home.about0')  

    <!-- our_room -->
    @include('home.room')  

    <!-- gallery -->
    @include('home.gallery0')

    <br>

    <section class="py-5 bg-light text-center">
        <div class="container">
            <div class="titlepage">
                <h2>Visitor Counter</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Today</p>
                    <span id="dailyCounter">0</span>
                </div>
                <div class="col-md-6">
                    <p>Total</p>
                    <span id="counter">0</span>
                </div>
            </div>
        </div>
    </section>

    <!-- contact -->
    @include('home.contact0')

    <!-- footer -->
    <footer>
        @include('home.footer')
    </footer>

    <!-- نافذة الكوكيز -->
    <div class="cookie-consent">
        <p>We use cookies to improve your experience. By continuing to browse, you agree to our use of cookies.</p>
        <form method="POST" action="/accept-cookies" style="display: inline;">
            @csrf
            <button type="submit">Accept</button>
        </form>
        <form method="POST" action="/reject-cookies" style="display: inline;">
            @csrf
            <button type="submit" class="reject">Reject</button>
        </form>
    </div>

    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1U5e9EE7T2s6Gmbl8f7bzg5TqD1Xg+cI6JpS+W" crossorigin="anonymous"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- Scroll memory script -->
    <script type="text/javascript">
        $(window).scroll(function() {
            sessionStorage.scrollTop = $(this).scrollTop();
        });

        $(document).ready(function() {
            if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);
            }
        });
    </script>

    <!-- Visitor Counter script -->
    <script type="text/javascript">
        $(document).ready(function() {
            async function updateVisitorCount() {
                try {
                    const response = await fetch('/update-visitor-count');
                    const data = await response.json();

                    document.getElementById("dailyCounter").innerHTML = data.today;
                    document.getElementById("counter").innerHTML = data.total;
                } catch (error) {
                    console.error('Error:', error);
                }
            }

            // Call the function when the page loads
            updateVisitorCount();
        });
    </script>

    <!-- Cookie consent scripts -->
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            // التحقق من حالة الكوكيز عند تحميل الصفحة
            let cookieConsent = getCookie("cookie_consent");
            if (cookieConsent === "accepted" || cookieConsent === "rejected") {
                document.querySelector('.cookie-consent').style.display = 'none';
            }
        });

        // وظيفة للحصول على قيمة الكوكيز
        function getCookie(name) {
            let value = "; " + document.cookie;
            let parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        // إخفاء نافذة الكوكيز بعد القبول أو الرفض
        document.querySelectorAll('.cookie-consent form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();  // منع إعادة تحميل الصفحة
                let formAction = form.getAttribute('action');
                let csrfToken = document.querySelector('input[name="_token"]').value;

                // إرسال الطلب
                fetch(formAction, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    if (response.ok) {
                        document.querySelector('.cookie-consent').style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>

</body>
</html>
