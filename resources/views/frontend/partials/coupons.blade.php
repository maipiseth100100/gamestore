<section class="coupon-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="coupon-tag">
                EXCLUSIVE DEALS
            </span>

            <h2 class="coupon-title mt-3">
                🎁 Special Game Coupons
            </h2>

            <p class="coupon-subtitle">
                Unlock exclusive discounts and save on your favorite games
            </p>

        </div>

        <div class="row g-4">

            @forelse($coupons as $coupon)

            <div class="col-lg-4 col-md-6">

                <div class="coupon-card">

                    <div class="discount-circle">
                        {{ $coupon->discount }}%
                    </div>

                    <div class="coupon-content">

                        <span class="coupon-status">
                            ACTIVE
                        </span>

                        <h3 class="coupon-code">
                            {{ $coupon->code }}
                        </h3>

                        <div class="coupon-info">

                            <p>
                                <i class="fas fa-calendar-alt me-2"></i>
                                Expires:
                                {{ \Carbon\Carbon::parse($coupon->expire_date)->format('d M Y') }}
                            </p>

                            <p>
                                <i class="fas fa-users me-2"></i>
                                Limit:
                                {{ $coupon->usage_limit }}
                            </p>

                        </div>

                        <button
                            class="btn-copy"
                            onclick="copyCoupon('{{ $coupon->code }}')">

                            <i class="fas fa-copy me-2"></i>
                            Copy Coupon

                        </button>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">
                    No Coupons Available
                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.coupon-section{
    background:
        radial-gradient(circle at top right,#312e81,#0f172a);
}

.coupon-tag{
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
}

.coupon-title{
    color:white;
    font-size:48px;
    font-weight:800;
}

.coupon-subtitle{
    color:#94a3b8;
    font-size:18px;
}

.coupon-card{
    position:relative;
    overflow:hidden;
    height:100%;
    border-radius:24px;
    background:rgba(17,24,39,.85);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.08);
    transition:.4s;
    padding:35px;
}

.coupon-card:hover{
    transform:translateY(-12px);
    box-shadow:0 25px 60px rgba(99,102,241,.35);
}

.discount-circle{
    position:absolute;
    top:-20px;
    right:-20px;
    width:90px;
    height:90px;
    background:linear-gradient(
        135deg,
        #6366f1,
        #06b6d4
    );
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:800;
    font-size:20px;
}

.coupon-status{
    display:inline-block;
    background:#22c55e20;
    color:#22c55e;
    padding:8px 16px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
    margin-bottom:20px;
}

.coupon-code{
    color:#60a5fa;
    font-size:34px;
    font-weight:800;
    letter-spacing:3px;
    margin-bottom:20px;
}

.coupon-info{
    color:#cbd5e1;
    margin-bottom:25px;
}

.coupon-info p{
    margin-bottom:12px;
}

.btn-copy{
    width:100%;
    border:none;
    padding:14px;
    border-radius:14px;
    background:linear-gradient(
        135deg,
        #4f46e5,
        #6366f1
    );
    color:white;
    font-weight:700;
    transition:.3s;
}

.btn-copy:hover{
    transform:scale(1.03);
}

@media(max-width:768px){

    .coupon-title{
        font-size:32px;
    }

    .coupon-code{
        font-size:28px;
    }

}

</style>

<script>

function copyCoupon(code)
{
    navigator.clipboard.writeText(code);

    const Toast = document.createElement('div');

    Toast.innerHTML = '✅ Coupon Copied: ' + code;

    Toast.style.position = 'fixed';
    Toast.style.bottom = '20px';
    Toast.style.right = '20px';
    Toast.style.background = '#22c55e';
    Toast.style.color = '#fff';
    Toast.style.padding = '12px 20px';
    Toast.style.borderRadius = '10px';
    Toast.style.zIndex = '9999';

    document.body.appendChild(Toast);

    setTimeout(() => {
        Toast.remove();
    }, 2500);
}

</script>