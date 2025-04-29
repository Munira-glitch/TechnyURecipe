<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="./images/TECHNYON-BANNER-2022-white.png" alt="Company Logo">
        </div>

        <div class="footer-contact">
            <p>20 Ali Akilu Road, Kaduna, Nigeria</p>
            <p>services@technyon.io | +234701 531 8136</p>
        </div>

        <div class="footer-social">
            <a href="https://facebook.com" class="social-icon" aria-label="Facebook">&#xf09a;</a>
            <a href="https://twitter.com" class="social-icon" aria-label="Twitter">&#xf099;</a>
            <a href="https://google.com" class="social-icon" aria-label="Google">&#xf1a0;</a>
            <a href="https://linkedin.com" class="social-icon" aria-label="LinkedIn">&#xf08c;</a>
        </div>
    </div>

    <hr class="footer-divider">

    <div class="footer-bottom">
        &copy; {{ date('Y') }} Technyon Technologies. All rights reserved.
    </div>
</footer>

<style>
    .footer {
        background-color: rgb(14, 26, 53);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        border-top: 1px solid #ddd;
        font-size: 0.9rem;
        text-align: center;
        margin-left: calc(100vw < 768px ? 0 : 250px);
        width: calc(100vw < 768px ? 100% : calc(100% - 250px));
    }

    .footer-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        padding: 0 20px;
        margin-bottom: 1rem;
    }

    .footer-logo img {
        width: 120px;
    }

    .footer-contact p {
        margin: 0;
    }

    .footer-social {
        display: flex;
        gap: 15px;
    }

    .social-icon {
        color: #6c757d;
        text-decoration: none;
        font-family: "FontAwesome";
        font-size: 20px;
    }

    .footer-divider {
        width: 100%;
        border-color: #6c757d;
        margin: 1rem 0;
    }

    .footer-bottom {
        margin-top: 1rem;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
