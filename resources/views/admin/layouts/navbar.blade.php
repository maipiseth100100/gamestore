<nav class="top-navbar">

    <div>

        <h4 class="mb-0">
            Admin Dashboard
        </h4>

    </div>

    <div class="d-flex align-items-center">

        <span class="me-3">

            {{ auth()->user()->name ?? 'Admin' }}

        </span>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="btn btn-danger btn-sm">

                Logout

            </button>

        </form>

    </div>

</nav>

<style>

.top-navbar{
    height:75px;
    background:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 30px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

</style>