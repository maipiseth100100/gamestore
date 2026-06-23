<div class="sidebar">

    <div class="brand">
        Game Store
    </div>

    <ul>

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-gauge"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.categories.index') }}">
                <i class="fas fa-list"></i>
                Categories
            </a>
        </li>

        <li>
            <a href="{{ route('admin.games.index') }}">
                <i class="fas fa-gamepad"></i>
                Games
            </a>
        </li>

        <li>
            <a href="{{ route('admin.sliders.index') }}">
                <i class="fas fa-images"></i>
                Sliders
            </a>
        </li>

        <li>
            <a href="{{ route('admin.orders.index') }}">
                <i class="fas fa-cart-shopping"></i>
                Orders
            </a>
        </li>

        <li>
            <a href="{{ route('admin.payments.index') }}">
                <i class="fas fa-credit-card"></i>
                Payments
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                Users
            </a>
        </li>

        <li>
            <a href="{{ route('admin.reviews.index') }}">
                <i class="fas fa-star"></i>
                Reviews
            </a>
        </li>

        <li>
            <a href="{{ route('admin.coupons.index') }}">
                <i class="fas fa-ticket"></i>
                Coupons
            </a>
        </li>

        <li>
            <a href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cog"></i>
                Settings
            </a>
        </li>

       <!-- BACK TO WEBSITE -->
<li>
    <a href="{{ route('home') }}" 
        class="fas fa-house"></i>
        Back to Site
    </a>
</li>

    </ul>

</div>

<style>

.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#0f172a;
    color:white;
}

.brand{
    padding:25px;
    font-size:24px;
    font-weight:700;
    text-align:center;
    border-bottom:1px solid #1e293b;
}

.sidebar ul{
    list-style:none;
    padding:20px 0;
    margin:0;
}

.sidebar ul li a{
    display:flex;
    gap:12px;
    padding:15px 25px;
    color:#cbd5e1;
    text-decoration:none;
    transition:.3s;
}

.sidebar ul li a:hover{
    background:#1e293b;
    color:white;
}

</style>