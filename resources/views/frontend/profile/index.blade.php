@extends('frontend.layouts.app')

@section('title', 'My Profile')

@section('content')

<section class="profile-section">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="profile-card">

                    <div class="profile-header">

                        <div class="profile-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <h2>{{ auth()->user()->name }}</h2>

                        <p>Gamer Profile</p>

                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', auth()->user()->name) }}"
                                    class="form-control"
                                >

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', auth()->user()->email) }}"
                                    class="form-control"
                                >

                            </div>

                        </div>

                        <div class="profile-stats">

                            <div class="stat-box">

                                <h4>
                                    {{ \App\Models\Order::where('user_id', auth()->id())->count() }}
                                </h4>

                                <span>
                                    Orders
                                </span>

                            </div>

                            <div class="stat-box">

                                <h4>
                                    {{ \App\Models\Library::where('user_id', auth()->id())->count() }}
                                </h4>

                                <span>
                                    Games Owned
                                </span>

                            </div>

                            <div class="stat-box">

                                <h4>
                                    {{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}
                                </h4>

                                <span>
                                    Wishlist
                                </span>

                            </div>

                        </div>

                        <button type="submit" class="btn-save">

                            💾 Update Profile

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.profile-section{
    background:linear-gradient(135deg,#020617,#0f172a);
    min-height:100vh;
}

.profile-card{
    background:#111827;
    border-radius:30px;
    padding:40px;
    color:#fff;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 20px 60px rgba(0,0,0,.35);
}

.profile-header{
    text-align:center;
    margin-bottom:40px;
}

.profile-avatar{
    width:120px;
    height:120px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:50px;
    font-weight:800;
    color:#fff;
    margin-bottom:20px;
}

.profile-header h2{
    font-weight:800;
    margin-bottom:5px;
}

.profile-header p{
    color:#94a3b8;
}

.form-label{
    color:#cbd5e1;
    font-weight:600;
}

.form-control{
    background:#1e293b;
    border:1px solid #334155;
    color:#fff;
    padding:12px;
    border-radius:12px;
}

.form-control:focus{
    background:#1e293b;
    color:#fff;
    border-color:#2563eb;
    box-shadow:none;
}

.profile-stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin:30px 0;
}

.stat-box{
    background:#1e293b;
    text-align:center;
    padding:20px;
    border-radius:15px;
}

.stat-box h4{
    color:#22c55e;
    font-size:28px;
    font-weight:800;
    margin-bottom:5px;
}

.stat-box span{
    color:#94a3b8;
    font-size:14px;
}

.btn-save{
    width:100%;
    border:none;
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    color:#fff;
    padding:14px;
    border-radius:14px;
    font-weight:700;
    font-size:16px;
    transition:.3s;
}

.btn-save:hover{
    opacity:.9;
}

.alert{
    border-radius:15px;
}

@media(max-width:768px){

    .profile-card{
        padding:25px;
    }

    .profile-stats{
        grid-template-columns:1fr;
    }

}

</style>

@endsection