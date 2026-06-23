<footer class="footer-section">

    <div class="footer-glow"></div>

    <div class="container">

        <div class="row g-5">

            {{-- Logo --}}
            <div class="col-lg-4">

                <h2 class="footer-logo">
                    🎮 GameStore
                </h2>

                <p class="footer-description">
                    Your ultimate destination for PC, PlayStation,
                    Xbox and Nintendo games. Explore thousands
                    of games, exclusive discounts and premium content.
                </p>

                <div class="social-links">

                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-youtube"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-discord"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-twitch"></i>
                    </a>

                </div>

            </div>

            {{-- Navigation --}}
            <div class="col-lg-2 col-md-6">

                <h5 class="footer-title">
                    Navigation
                </h5>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('games.index') }}">
                            Games
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Deals
                        </a>
                    </li>

                </ul>

            </div>

            {{-- Categories --}}
            <div class="col-lg-3 col-md-6">

                <h5 class="footer-title">
                    Popular Categories
                </h5>

                <ul class="footer-links">

                    <li><a href="#">Action Games</a></li>
                    <li><a href="#">Adventure Games</a></li>
                    <li><a href="#">Racing Games</a></li>
                    <li><a href="#">Sports Games</a></li>
                    <li><a href="#">RPG Games</a></li>

                </ul>

            </div>

            {{-- Newsletter --}}
            <div class="col-lg-3">

                <h5 class="footer-title">
                    Newsletter
                </h5>

                <p class="footer-description">
                    Subscribe for game updates, coupons and special offers.
                </p>

                <form>

                    <div class="newsletter-box">

                        <input
                            type="email"
                            class="newsletter-input"
                            placeholder="Enter your email">

                        <button type="submit"
                                class="newsletter-btn">

                            Join

                        </button>

                    </div>

                </form>

                <div class="contact-info">

                    <p>
                        <i class="fas fa-envelope"></i>
                        support@gamestore.com
                    </p>

                    <p>
                        <i class="fas fa-phone"></i>
                        +855 12 345 678
                    </p>

                </div>

            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">

            <div>
                © {{ date('Y') }} GameStore.
                All Rights Reserved.
            </div>

            <div>
                Made with ❤️ for Gamers
            </div>

        </div>

    </div>

</footer>

<style>

.footer-section{
    position:relative;
    overflow:hidden;
    background:
        linear-gradient(
            180deg,
            #020617,
            #0f172a
        );
    color:white;
    padding:90px 0 30px;
}

.footer-glow{
    position:absolute;
    top:-150px;
    right:-150px;
    width:350px;
    height:350px;
    background:#4f46e5;
    opacity:.15;
    border-radius:50%;
    filter:blur(120px);
}

.footer-logo{
    font-size:2rem;
    font-weight:800;
    margin-bottom:20px;
}

.footer-description{
    color:#94a3b8;
    line-height:1.8;
}

.footer-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:25px;
}

.footer-links{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-links li{
    margin-bottom:12px;
}

.footer-links a{
    color:#94a3b8;
    text-decoration:none;
    transition:.3s;
}

.footer-links a:hover{
    color:#60a5fa;
    padding-left:6px;
}

.social-links{
    display:flex;
    gap:12px;
    margin-top:25px;
}

.social-links a{
    width:48px;
    height:48px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
    transition:.3s;
}

.social-links a:hover{
    background:#4f46e5;
    transform:translateY(-5px);
}

.newsletter-box{
    display:flex;
    overflow:hidden;
    border-radius:14px;
    margin-bottom:20px;
}

.newsletter-input{
    flex:1;
    border:none;
    padding:14px;
    background:#1e293b;
    color:white;
}

.newsletter-input:focus{
    outline:none;
}

.newsletter-btn{
    border:none;
    background:#4f46e5;
    color:white;
    padding:0 22px;
    font-weight:600;
}

.contact-info p{
    color:#94a3b8;
    margin-bottom:10px;
}

.contact-info i{
    margin-right:10px;
    color:#60a5fa;
}

.footer-divider{
    border-color:rgba(255,255,255,.08);
    margin:50px 0 25px;
}

.footer-bottom{
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:#94a3b8;
}

@media(max-width:768px){

    .footer-bottom{
        flex-direction:column;
        gap:10px;
        text-align:center;
    }

    .newsletter-box{
        flex-direction:column;
    }

    .newsletter-btn{
        padding:14px;
    }

}

</style>